<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Booking Form HTML Template</title>

    <style id="" media="all">
        /* cyrillic-ext */
        @font-face {
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 400;
            src: url(/fonts.gstatic.com/s/montserrat/v15/JTUSjIg1_i6t8kCHKm459WRhyzbi.woff2) format('woff2');
            unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
        }

        /* cyrillic */
        @font-face {
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 400;
            src: url(/fonts.gstatic.com/s/montserrat/v15/JTUSjIg1_i6t8kCHKm459W1hyzbi.woff2) format('woff2');
            unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
        }

        /* vietnamese */
        @font-face {
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 400;
            src: url(/fonts.gstatic.com/s/montserrat/v15/JTUSjIg1_i6t8kCHKm459WZhyzbi.woff2) format('woff2');
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
        }

        /* latin-ext */
        @font-face {
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 400;
            src: url(/fonts.gstatic.com/s/montserrat/v15/JTUSjIg1_i6t8kCHKm459Wdhyzbi.woff2) format('woff2');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }

        /* latin */
        @font-face {
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 400;
            src: url(/fonts.gstatic.com/s/montserrat/v15/JTUSjIg1_i6t8kCHKm459Wlhyw.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }

        /* cyrillic-ext */
        @font-face {
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 700;
            src: url(/fonts.gstatic.com/s/montserrat/v15/JTURjIg1_i6t8kCHKm45_dJE3gTD_u50.woff2) format('woff2');
            unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
        }

        /* cyrillic */
        @font-face {
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 700;
            src: url(/fonts.gstatic.com/s/montserrat/v15/JTURjIg1_i6t8kCHKm45_dJE3g3D_u50.woff2) format('woff2');
            unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
        }

        /* vietnamese */
        @font-face {
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 700;
            src: url(/fonts.gstatic.com/s/montserrat/v15/JTURjIg1_i6t8kCHKm45_dJE3gbD_u50.woff2) format('woff2');
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
        }

        /* latin-ext */
        @font-face {
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 700;
            src: url(/fonts.gstatic.com/s/montserrat/v15/JTURjIg1_i6t8kCHKm45_dJE3gfD_u50.woff2) format('woff2');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }

        /* latin */
        @font-face {
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 700;
            src: url(/fonts.gstatic.com/s/montserrat/v15/JTURjIg1_i6t8kCHKm45_dJE3gnD_g.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }
    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
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
            background-image: url(img/homebg.jpeg);
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
            font-size: 42px;
            text-transform: uppercase;
            color: #fff;
            font-weight: 700
        }

        .booking-cta p {
            font-size: 16px;
            color: rgba(255, 255, 255, .8)
        }
    </style>


    <!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
    <meta name="robots" content="noindex, follow">
</head>

<body>
    <div id="booking" class="section">
        <div class="section-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-md-push-5">
                        <div class="booking-cta">
                            <h1>Smart parking & reservation system using qr code</h1>
                            <p> - Berdekatan dng jeti</p>
                            <p> - Parking berbumbung</p>
                            <p> - Berdekatan dng kaunter tiket</p>
                            <p> - Keselamatan kereta terjaga</p>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 col-md-pull-7">
                        <div class="booking-form">
                            <div class="login_form">
                                <div class="form-group">
                                    <span class="form-label">Username</span>
                                    <input class="form-control username" type="text" placeholder="Enter username">
                                </div>
                                <div class="form-group">
                                    <span class="form-label">Password</span>
                                    <input class="form-control password" type="Password" placeholder="Enter user password">
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-btn">
                                            <button class="btn btn-primary do_login">Login</button>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-btn">
                                            <button class="btn btn-success open_reg">Register</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="reg_form">
                                <div class="form-group">
                                    <span class="form-label">Username</span>
                                    <input class="form-control username_reg" type="text" placeholder="Enter username">
                                </div>
                                <div class="form-group">
                                    <span class="form-label">Email</span>
                                    <input class="form-control email_reg" type="email" placeholder="Enter user password">
                                </div>
                                <div class="form-group">
                                    <span class="form-label">Plate number</span>
                                    <input class="form-control plate_reg" type="text" placeholder="Enter user password">
                                </div>
                                <div class="form-group">
                                    <span class="form-label">Password</span>
                                    <input class="form-control password_reg" type="Password" placeholder="Enter user password">
                                </div>
                                <div class="form-group">
                                    <span class="form-label">Confirm Password</span>
                                    <input class="form-control password_reg2" type="Password" placeholder="Enter user password">
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-btn">
                                            <button class="btn btn-primary open_login">Login</button>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-btn">
                                            <button class="btn btn-success do_reg">Register</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
</body>

</html>
<script>
    $(document).ready(function() {
        $(".reg_form").hide()
        $(".reg_2").hide()
        $(".login_2").hide()

        $(".open_reg").click(function() {
            $(".login_form").hide()
            $(".reg_form").show()
            $(".reg_2").show()
            $(".login_2").show()
            $(".reg_1").hide()
            $(".login_1").hide()
        })

        $(".open_login").click(function() {
            $(".login_form").show()
            $(".reg_form").hide()
            $(".reg_1").show()
            $(".login_1").show()
            $(".reg_2").hide()
            $(".login_2").hide()
        })
        let engine = "engine.php";
        $(".do_reg").click(function() {
            $.post(engine, {
                register: 1,
                username_reg: $(".username_reg").val(),
                password_reg: $(".password_reg").val(),
                password_reg2: $(".password_reg2").val(),
                email_reg: $(".email_reg").val(),
                plate_reg: $(".plate_reg").val()
            }, function(data) {
                console.log(data)
                if (data == "OK") {
                    alert("Berjaya")
                }

                if (data == "user_email_error") {
                    alert("Your username or email already taken")
                }

                if (data == "password_not_match") {
                    alert("Your password not match")
                }
            })
        })

        $(".do_login").click(function() {
            $.post(engine, {
                login: 1,
                username: $(".username").val(),
                password: $(".password").val(),
            }, function(data) {
                console.log(data)
                if (data == "OK") {
                    window.location = "dashboard2.php"
                } else {
                    alert("Your username or password is incorrect")
                }
            })
        })
    })
</script>