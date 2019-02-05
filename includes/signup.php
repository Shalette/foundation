<?php
require 'common.php';
include 'info.php';
if($_POST['submit'] == "1"){
$fname = mysqli_real_escape_string($con, $_POST['fname']);
$lname = mysqli_real_escape_string($con, $_POST['lname']);
$contact = mysqli_real_escape_string($con, $_POST['contact']);
$village = mysqli_real_escape_string($con, $_POST['village']);
$taluka = mysqli_real_escape_string($con, $_POST['taluka']);
$district = mysqli_real_escape_string($con, $_POST['district']);
$region = mysqli_real_escape_string($con, $_POST['region']);
$query1= "SET @p0='$contact'; CALL validate ('@p0')";
$query2= "SELECT * from trainer where trainer_contact=$contact";
if((mysqli_num_rows(mysqli_query($con, $query1)) == 0) && (mysqli_num_rows(mysqli_query($con, $query2)) == 0))
{
  $query2= "SELECT * from location natural join village where region='$region' AND  village_name='$village' AND taluka='$taluka' AND district='$district'";
if(mysqli_num_rows(mysqli_query($con, $query2)) == 1 )
{
  $dat1=mysqli_query($con, $query2) or die(mysqli_error($con));
  $data=mysqli_fetch_array($dat1);
  $dat= $data['village_no'];
  $loc= $data['location_no'];
  $query3="SELECT trainer_id, trainer_fname from trainer where location_no=$loc";
  $dat3=mysqli_query($con, $query3) or die(mysqli_error($con));
  $data3=mysqli_fetch_array($dat3);
  $no =$data3['trainer_id'];
  $query = "INSERT into `farmer` (`farmer_id`, `farmer_fname`, `farmer_lname`, `farmer_contact`, `trainer_id`, `village_no`)values (DEFAULT,'$fname', '$lname', '$contact', '$no', '$dat');";
  $submit = mysqli_query($con, $query) or die($con);
    info($con, 1);
}
else{
    info($con, 2);
}
}
else {
    info($con, 3);
}
}
else {
  $fname = mysqli_real_escape_string($con, $_POST['fname']);
  $lname = mysqli_real_escape_string($con, $_POST['lname']);
  $contact = mysqli_real_escape_string($con, $_POST['contact']);
  $village = mysqli_real_escape_string($con, $_POST['village']);
  $x=substr($_SESSION['trainer_id'], 4);
  $query = "SELECT region, district, taluka FROM trainer, location where trainer_id=$x";
  $data = mysqli_query($con, $query) or die(mysqli_error($con));
  $row=mysqli_fetch_array($data);
  $taluka= $row['taluka'];
  $district= $row['district'];
  $region= $row['region'];

  $query1= "SET @p0='$contact'; call validate ('@p0')";
  if(mysqli_num_rows(mysqli_query($con, $query1))==0)
  {
    $query2= "select * from village where village_name='$village'";
    $dat1=mysqli_query($con, $query2) or die(mysqli_error($con));
    $data=mysqli_fetch_array($dat1);
    $dat= $data['village_no'];
    $query = "insert into farmer values(DEFAULT,'$fname', '$lname', $contact, $x, $dat);";
    $submit = mysqli_query($con, $query) or die($con);
      info($con, 1);
  }
  else {
      info($con, 3);
  }
}
?>
