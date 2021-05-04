<?php
session_start();
include("connect.php");
$check_valid_parking = mysqli_query($conn, "SELECT * FROM parking WHERE available = '0'");
$fetch_user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users where username = '$_SESSION[logged]'"));
if (!isset($_SESSION["logged"])) {
    header("location:index.php");
}

$arrayParking = [];
$cnt = 1;
if (mysqli_num_rows($check_valid_parking) > 0) {
    while ($fetch_valid_parking = mysqli_fetch_assoc($check_valid_parking)) {
        $arrayParking[$cnt] = $fetch_valid_parking["code"];
        $cnt2 = $cnt;
        $cnt++;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Document</title>
</head>

<body class="bg-dark ">
    <br>
    <div class="container">
        <div class="shadow-sm p-3 mb-5 bg-body rounded">
            <button class="btn btn-danger logout">Logout</button>
            <br><br>
            <div class="row">
                <div class="col-sm-2">
                    <b>Name: </b> <?php echo $_SESSION["logged"];  ?>
                </div>
                <div class="col balance">
                    <b>Wallet balance: </b> RM<span class="wallet_balance"></span> <button class="btn btn-success add_wallet">+</button>
                </div>
            </div>
            <div class="row">
                <div class="parking_code">
                    <div class="col-md">
                        <hr><b>Select a Parking</b>
                        <br><br>
                        <div class="row">
                            <?php
                            for ($i = 1; $i <= $cnt2; $i++) {
                            ?>
                                <div class="col-2">
                                    <button class="btn btn-info book_<?php echo $arrayParking[$i] ?>"><?php echo $arrayParking[$i] ?></button>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="qr_code">
                    <hr>
                    <center><span class="qr_img"></span></center>
                    <button class="btn btn-info back">Back</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            let engine = "engine.php"

            function update_wallet() {
                $.post(engine, {
                    update_wallet: 1
                }, function(data) {
                    $(".wallet_balance").html(data)
                    console.log(data)
                })
            }
            update_wallet()

            $(".qr_code").hide()
            $(".logout").click(function() {
                $.post(engine, {
                    logout: 1
                }, function(data) {
                    if (data == "OK") {
                        window.location = "index.php"
                    }
                })
            })
            <?php
            for ($i = 1; $i <= $cnt2; $i++) {
            ?>
                $(".book_<?php echo $arrayParking[$i] ?>").click(function() {
                    confirm_book = confirm("Confirm book parking number (<?php echo $arrayParking[$i] ?>)")
                    if (confirm_book == true) {
                        $.post(engine, {
                            payment: 1,
                        }, function(data) {
                            if (data == "OK") {
                                $(".parking_code").hide()
                                $(".qr_code").show()
                                $(".qr_img").html("<img src='qrgen/generate.php?text=<?php echo $arrayParking[$i] . "_" . $fetch_user["plate_num"] ?>' width='50%'>")
                                update_wallet()
                            }
                            if (data == "not_enought") {
                                alert("Not enough money.. please topup")
                            }
                        })
                    }
                })
            <?php
            }
            ?>
            $(".back").click(function() {
                $(".qr_code").hide()
                $(".parking_code").show()
            })

            $(".add_wallet").click(function() {
                money = prompt("How much money you want add")
                $.post(engine, {
                    add_wallet: 1,
                    amount: parseInt(money)
                }, function(data) {
                    console.log(data)
                    if (data == "OK") {
                        alert("Wallet added successfull")
                    }

                    if (data == "num_err") {
                        alert("Must put number only")
                    }
                })
                update_wallet()
            })
        })
    </script>
</body>

</html>