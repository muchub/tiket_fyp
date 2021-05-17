<?php
session_start();
if (!isset($_SESSION["logged"])) {
    header("location:index.php");
}
?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Home</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="shadow-sm p-3 mb-5 rounded" style="background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url(img/homebg.jpeg); background-size: cover; background-position: center; height:500px; ">
    <font color="white">
        <h1>
            Smart parking & reservation system using qr code
        </h1>
        <hr>
        <h5>
            <p> - Berdekatan dng jeti</p>
            <p> - Parking berbumbung</p>
            <p> - Berdekatan dng kaunter tiket</p>
            <p> - Keselamatan kereta terjaga</p>
        </h5>
    </font>
</div>