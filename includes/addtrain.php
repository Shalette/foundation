<?php require 'common.php';
include 'info.php';
$taluka = mysqli_real_escape_string($con, $_POST['taluka']);
$fname = mysqli_real_escape_string($con, $_POST['fname']);
$lname = mysqli_real_escape_string($con, $_POST['lname']);
$phno = mysqli_real_escape_string($con, $_POST['phno']);
$query = "SELECT trainer_id FROM trainer natural join location where taluka='$taluka'";
$data = mysqli_query($con, $query) or die(mysqli_error($con));
$row=mysqli_fetch_array($data);
$id=$row['trainer_id'];

$query1= "SET @p0='$phno'; call validate ('@p0')";
$query2= "select * from trainer where trainer_contact=$phno";
if((mysqli_num_rows(mysqli_query($con, $query1)) == 0) && (mysqli_num_rows(mysqli_query($con, $query2)) == 0))
{
$query = "UPDATE trainer set trainer_fname='$fname', trainer_lname='$lname', trainer_contact='$phno', trainer_password=DEFAULT where trainer_id=$id";
$data = mysqli_query($con, $query) or die(mysqli_error($con));
if ($_POST['submit']=="1")
info($con, 9);
else
info($con, 10);
}
else {
info($con, 11);
}
?>
