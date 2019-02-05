<?php require 'common.php';
include 'info.php';
$fname = mysqli_real_escape_string($con, $_POST['name']);
$contact = mysqli_real_escape_string($con, $_POST['phno']);
$password = mysqli_real_escape_string($con, $_POST['password']);

$query1="select trainer_fname, trainer_id, trainer_password from trainer where trainer_contact='$contact'";
$data = mysqli_query($con, $query1) or die(mysqli_error($con));
if(mysqli_num_rows($data)!=0) {
  $info = mysqli_fetch_array($data);
  if($info['trainer_password'] == $password)
  {
   if($info['trainer_fname']== $fname){
    $_SESSION['trainer_id']="user".$info['trainer_id'];
    $_SESSION['id']=mysqli_insert_id($con);
    header('location: ../trainerhome.php');
  }
  else{
    info($con, 4);
  }
}
  else{
    info($con, 4);
  }
}
else {
  info($con, 5);
}
?>
