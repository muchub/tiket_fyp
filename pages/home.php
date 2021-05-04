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
Welcome <?php echo $_SESSION["logged"] ?>
<br>
<font color="red">This page under construction</font>