<?php
session_start();
if (!isset($_SESSION["logged"])) {
    header("location:index.php");
}

include("../connect.php");
$select_parking = mysqli_query($conn, "SELECT * FROM parking");
if (mysqli_num_rows($select_parking) == TRUE) {
    $arrayParking = [];
    $arrayValid = [];
    $cnt = 0;
    while ($fetch_parking = mysqli_fetch_assoc($select_parking)) {
        $arrayParking[$cnt] = $fetch_parking["code"];
        $arrayValid[$cnt] = $fetch_parking["available"];
        $cnt++;
    }
}
?>
<style>
    .section {
        position: relative;
        height: 100vh
    }

    .section .section-center {
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%)
    }

    #booking {
        font-family: montserrat, sans-serif;
        background-image: url(../img/background.jpg);
        background-size: cover;
        background-position: center
    }

    #booking::before {
        content: '';
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        top: 0;
        background: rgba(47, 103, 177, .6)
    }

    .booking-form {
        background-color: #fff;
        padding: 50px 20px;
        -webkit-box-shadow: 0 5px 20px -5px rgba(0, 0, 0, .3);
        box-shadow: 0 5px 20px -5px rgba(0, 0, 0, .3);
        border-radius: 4px
    }

    .booking-form .form-group {
        position: relative;
        margin-bottom: 30px
    }

    .booking-form .form-control {
        background-color: #ebecee;
        border-radius: 4px;
        border: none;
        height: 40px;
        -webkit-box-shadow: none;
        box-shadow: none;
        color: #3e485c;
        font-size: 14px
    }

    .booking-form .form-control::-webkit-input-placeholder {
        color: rgba(62, 72, 92, .3)
    }

    .booking-form .form-control:-ms-input-placeholder {
        color: rgba(62, 72, 92, .3)
    }

    .booking-form .form-control::placeholder {
        color: rgba(62, 72, 92, .3)
    }

    .booking-form input[type=date].form-control:invalid {
        color: rgba(62, 72, 92, .3)
    }

    .booking-form select.form-control {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none
    }

    .booking-form select.form-control+.select-arrow {
        position: absolute;
        right: 0;
        bottom: 4px;
        width: 32px;
        line-height: 32px;
        height: 32px;
        text-align: center;
        pointer-events: none;
        color: rgba(62, 72, 92, .3);
        font-size: 14px
    }

    .booking-form select.form-control+.select-arrow:after {
        content: '\279C';
        display: block;
        -webkit-transform: rotate(90deg);
        transform: rotate(90deg)
    }

    .booking-form .form-label {
        display: inline-block;
        color: #3e485c;
        font-weight: 700;
        margin-bottom: 6px;
        margin-left: 7px
    }

    .booking-form .submit-btn {
        display: inline-block;
        color: #fff;
        background-color: #1e62d8;
        font-weight: 700;
        padding: 14px 30px;
        border-radius: 4px;
        border: none;
        -webkit-transition: .2s all;
        transition: .2s all
    }

    .booking-form .submit-btn:hover,
    .booking-form .submit-btn:focus {
        opacity: .9
    }

    .booking-cta {
        margin-top: 80px;
        margin-bottom: 30px
    }

    .booking-cta h1 {
        font-size: 52px;
        text-transform: uppercase;
        color: #fff;
        font-weight: 700
    }

    .booking-cta p {
        font-size: 16px;
        color: rgba(255, 255, 255, .8)
    }
</style>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Book parking</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="row">
    <section class="container">
        <div class="set_date">
            <div class="booking-form">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <span class="form-label">Check In</span>
                            <input class="form-control start_date" type="date" required="">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <span class="form-label">Check out</span>
                            <input class="form-control end_date" type="date" required="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <span class="form-label">Select parking spot</span>
                            <div class="row">
                                <?php
                                for ($i = 0; $i < count($arrayParking); $i++) {
                                    $disable = "";
                                    $checked = "";
                                    $color = "#00b536";
                                    if ($arrayValid[$i] == "1") {
                                        $disable = "disabled";
                                        $color = "red";
                                        $checked = "checked";
                                    }
                                ?>
                                    <div class="col-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="parkingLot" id="exampleRadios1" value="<?php echo $arrayParking[$i] ?>" <?php echo $disable . " " . $checked; ?>>
                                            <label class="form-check-label" for="exampleRadios1">
                                                <font color="<?php echo $color; ?>"><?php echo $arrayParking[$i] ?></font>
                                            </label>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                            <hr>
                            <div class="row" style="height:10px">
                                <div class="col-sm-2 mb-5 p-3">
                                    <font color="#00b536">Available</font>
                                </div>
                                <div class="col-sm-2 mb-5 p-3">
                                    <font color="red">Booked</font>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-btn">
                    <div class="row">
                        <div class="col-sm-2 mt-3">
                            <button class="btn btn-info confirm">Confirm</button>
                        </div>
                        <div class="col-sm-2 mt-3">
                            <button class="btn btn-danger cancel">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="payment">
            <div class="card-header bg-info">PAYMENT DETAILS</div>
            <div class="shadow p-3 mb-5 bg-white rounded-bottom">
                <div class="row">
                    <div class="col">
                        <img class="mb-3" src="img/visa-mastercard9.jpg" width="30%">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text card_num1" id="basic-addon1">CARD NUMBER</span>
                            <input type="text" class="form-control card_num" placeholder="Enter card number" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">CARD HOLDER NAME</span>
                            <input type="text" class="form-control card_name" placeholder="Enter card name" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="input-group mb-3">
                            <span class="input-group-text expire" id="basic-addon1">EXPIRE DATE</span>
                            <input type="text" class="form-control expire_date" placeholder="MM/YY" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group mb-3">
                            <span class="input-group-text cvc" id="basic-addon1">CV CODE</span>
                            <input type="text" class="form-control cvc" placeholder="CVC" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <button class="btn btn-success mb-3 doBook">Confirm Payment</button>
                    </div>
                    <div class="col-sm-3">
                        <button class="btn btn-danger mb-3 cancel">Cancel Payment</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="qr_code">
            <div class="card-header bg-info">Qr Code Ticket</div>
            <div class="shadow p-3 mb-5 bg-white rounded-bottom">
                This QR will display when you make a book <br>(<font color="red">Use your phone for better size</font>)
                <div class="qr_content"></div>
            </div>
        </div>
    </section>
</div>
</section>
</div>

<script>
    $(document).ready(function() {
        $(".payment").hide()
        $(".qr_code").hide()

        $.post("engine.php", {
            book_status: 1
        }, function(data) {
            if (data != "none") {
                $(".payment").hide()
                $(".set_date").hide()
                $(".qr_code").show()
                $(".qr_content").html(data)
            }
        })
        $(".cancel").click(function() {
            $(".page-content").load("pages/book.php")
            console.log("hehe")
        })

        $(".confirm").click(function() {
            $.post("engine.php", {
                book: 1,
                start_date: $(".start_date").val(),
                end_date: $(".end_date").val(),
                parking: $("input[name='parkingLot']:checked").val()
            }, function(data) {
                console.log(data)
                if (data == "OK") {
                    $(".set_date").hide()
                    $(".payment").show()
                }

                if (data == "empty") {
                    alert("please fill all form")
                }

                if (data == "user_booked") {
                    alert("You already book parking before..")
                }
            })
        })

        $(".doBook").click(function() {
            $.post("engine.php", {
                book: 1,
                user_payment: 1,
                start_date: $(".start_date").val(),
                end_date: $(".end_date").val(),
                parking: $("input[name='parkingLot']:checked").val()
            }, function(data) {
                console.log(data)
                if (data == "OKOK") {
                    alert("Your payment has been proceed")
                    $(".page-content").load("pages/book.php")
                }
            })
        })

    })
</script>