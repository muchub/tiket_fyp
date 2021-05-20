<?php
session_start();
include("connect.php");

function x($string)
{
    global $conn;
    return mysqli_real_escape_string($conn, $string);
}

function dateDifference($start_date, $end_date)
{
    // calulating the difference in timestamps 
    $diff = strtotime($start_date) - strtotime($end_date);

    // 1 day = 24 hours 
    // 24 * 60 * 60 = 86400 seconds
    return ceil(abs($diff / 86400));
}

if (isset($_POST["register"])) {

    $register = $_POST["register"];
    $username_reg = x($_POST["username_reg"]);
    $password_reg = x($_POST["password_reg"]);
    $password_reg2 = x($_POST["password_reg2"]);
    $email_reg = x($_POST["email_reg"]);
    $plate_reg = x($_POST["plate_reg"]);

    if ($register == 1) {
        if ($password_reg != $password_reg2) {
            echo "pass_not_match";
        } else {
            $check_user = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username_reg' OR email = '$email_reg'");
            if (mysqli_num_rows($check_user) > 0) {
                echo "user_email_error";
            } else {
                $hash_pass = password_hash($password_reg, PASSWORD_DEFAULT);
                $reg_user = mysqli_query($conn, "INSERT INTO users (username, password, email, wallet, plate_num) VALUES ('$username_reg', '$hash_pass', '$email_reg', '0', '$plate_reg')");
                if ($reg_user) {
                    echo "OK";
                }
            }
        }
    }
}

if (isset($_POST["login"])) {
    $login = $_POST["login"];
    $username = x($_POST["username"]);
    $password = x($_POST["password"]);
    if ($login == 1) {
        $check_username = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users where username = '$username'"));
        $password_check = password_verify($password, $check_username['password']);
        if ($password_check) {
            $_SESSION["logged"] = $check_username["username"];
            echo "OK";
        } else {
            echo "err";
        }
    }
}
if (isset($_SESSION["logged"])) {
    $fetch_user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users where username = '$_SESSION[logged]'"));
    if (isset($_POST["logout"])) {
        if (session_destroy()) {
            echo "OK";
        }
    }

    if (isset($_POST["book"])) {

        if (!empty($_POST["start_date"]) && !empty($_POST["end_date"]) && !empty($_POST["parking"])) {
            // start date 
            $start_date = $_POST["start_date"];

            // end date 
            $end_date = $_POST["end_date"];

            // call dateDifference() function to find the number of days between two dates
            $dateDiff = dateDifference($start_date, $end_date);
            $check_user_book = mysqli_query($conn, "SELECT * FROM user_booking WHERE user_id = '$fetch_user[id]'");
            if (mysqli_num_rows($check_user_book) > 0) {
                echo "user_booked";
            } else {
                echo "OK";
            }
            if (isset($_POST["user_payment"])) {
                $parking = mysqli_query($conn, "SELECT * FROM parking where code = '$_POST[parking]'");
                $fparking = mysqli_fetch_assoc($parking);
                $qr_content = $fetch_user["username"] . "_" . $fetch_user["plate_num"] . "_" . $_POST["parking"];
                $do_book = mysqli_query($conn, "INSERT INTO user_booking (qr_content, user_id, parking_id) VALUES ('$qr_content', '$fetch_user[id]', '$fparking[id]')");
                if ($do_book) {
                    $select_spot = mysqli_query($conn, "UPDATE parking set available = '1' WHERE code = '$_POST[parking]'");
                    if ($select_spot) {
                        echo "OK";
                    }else {
                        echo "err update";
                    }
                } else {
                    echo "err insert";
                }
            }
        } else {
            echo "empty";
        }
    }

    if (isset($_POST["book_status"])) {
        $check_user_book = mysqli_query($conn, "SELECT * FROM user_booking WHERE user_id = '$fetch_user[id]'");
        if (mysqli_num_rows($check_user_book) > 0) {
            $fetch_user_book = mysqli_fetch_assoc($check_user_book);
            echo "<img src='https://api.qrserver.com/v1/create-qr-code/?data=$fetch_user_book[qr_content]' width='100%'>";
        } else {
            echo "none";
        }
    }
}

if(isset($_GET["checkqr"])){
    $qrcontent = x($_GET["checkqr"]);

    //echo $qrcontent;

    $checkbook = mysqli_query($conn, "SELECT * FROM user_booking WHERE qr_content = '$qrcontent'");
    if(mysqli_num_rows($checkbook) > 0){
        $fetch_booking = mysqli_fetch_assoc($checkbook);
        if($fetch_booking["qr_status"] == 0){
            $update_qr = mysqli_query($conn, "UPDATE user_booking set qr_status = 1 WHERE qr_content = '$qrcontent'");
            if($update_qr){
                echo "in";
            }
        }

        if($fetch_booking["qr_status"] == 1){
            $delete_qr = mysqli_query($conn, "DELETE FROM user_booking WHERE qr_content = '$qrcontent'");
            $reset_parking = mysqli_query($conn, "UPDATE parking set available = 0 WHERE id = '$fetch_booking[parking_id]'");
            if($delete_qr){
                echo "out";
            }
        }
    }else{
        echo "qr_not_found";
    }
}
