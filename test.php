<form method="post" action = "engine.php">
    <input type="date" name="start_date" placeholder="dd-mm-yyyy" value="" min="1997-01-01" max="2030-12-31">
    <input type="date" name="end_date" placeholder="dd-mm-yyyy" value="" min="1997-01-01" max="2030-12-31">
    <input type="submit" name="check_date">
</form>
<?php
if (isset($_POST["date"])) {
    // start date 
    $start_date = $_POST["s_date"];

    // end date 
    $end_date = $_POST["e_date"];

    // call dateDifference() function to find the number of days between two dates
    $dateDiff = dateDifference($start_date, $end_date);

    echo $dateDiff;
}
?>