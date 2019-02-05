<?php require 'common.php';
include 'info.php';
if($_POST['submit']==1){
$taluka = mysqli_real_escape_string($con, $_POST['taluka']);
$record = mysqli_real_escape_string($con, $_POST['record']);
$query = "update watercup set amount='$record' where location_no in (select location_no from location where taluka='$taluka') and year=2018";
$submit = mysqli_query($con, $query) or die(mysqli_error($con));
info($con, 16);
}
else{
  $taluka = mysqli_real_escape_string($con, $_POST['taluka']);
  $record = mysqli_real_escape_string($con, $_POST['record']);
  $query = "select * from location where taluka='$taluka'";
  $data = mysqli_query($con, $query) or die(mysqli_error($con));
  $row=mysqli_fetch_array($data);
  $location_no = $row['location_no'];
  $query1 = "insert into watercup values($location_no, 2018, $record)";
  $submit = mysqli_query($con, $query1) or die(mysqli_error($con));
  info($con, 17);
}
?>
