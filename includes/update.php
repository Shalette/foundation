<?php require 'common.php';
include 'info.php';

$x=substr($_SESSION['trainer_id'], 4);
if($_POST['submit']=="1"){
$pass = mysqli_real_escape_string($con, $_POST['oldpass']);
$newpass = mysqli_real_escape_string($con, $_POST['newpass']);
$repass = mysqli_real_escape_string($con, $_POST['repass']);
$query = "SELECT trainer_password FROM trainer where trainer_id=$x";
$data = mysqli_query($con, $query) or die(mysqli_error($con));
$row=mysqli_fetch_array($data);

if($row['trainer_password']==$pass)
{
if($newpass==$repass)
{
  $query="update trainer set trainer_password='$newpass' where trainer_id=$x";
  $submit = mysqli_query($con, $query) or die($con);
    info($con, 8);
}
else{
    info($con, 7);
}
}
else {
    info($con, 6);
}
}
else {
  $phno = mysqli_real_escape_string($con, $_POST['phno']);
  $query1= "SET @p0='$phno'; call validate ('@p0')";
  $query2= "select * from trainer where trainer_contact=$phno";
  if((mysqli_num_rows(mysqli_query($con, $query1)) == 0) && (mysqli_num_rows(mysqli_query($con, $query2)) == 0))
  {
    $query="update trainer set trainer_contact='$phno' where trainer_id=$x";
    $submit = mysqli_query($con, $query) or die($con);
      info($con, 12);
  }
  else {
    info($con,13);
  }
}
?>
