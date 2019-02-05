<?php require 'common.php';
include 'info.php';
if($_POST['submit']==1){
$taluka = mysqli_real_escape_string($con, $_POST['taluka']);
$region = mysqli_real_escape_string($con, $_POST['region']);
$district = mysqli_real_escape_string($con, $_POST['district']);
$query = "SELECT * from location where taluka='$taluka' and region='$region' and district='$district'";
if(mysqli_num_rows(mysqli_query($con, $query)) == 0)
{
$query = "INSERT into location values(DEFAULT, '$taluka', '$district', '$region', 2018)";
$submit = mysqli_query($con, $query) or die(mysqli_error($con));
info($con, 14);
}
else {
info($con, 15);
}
}
else{
  $taluka = mysqli_real_escape_string($con, $_POST['taluka']);
  $region = mysqli_real_escape_string($con, $_POST['region']);
  $district = mysqli_real_escape_string($con, $_POST['district']);
  $village = mysqli_real_escape_string($con, $_POST['village']);
  $query = "SELECT * from location where taluka='$taluka' and region='$region' and district='$district'";
  if(mysqli_num_rows(mysqli_query($con, $query)) == 1)
  {
    $data=mysqli_query($con, $query);
    $row=mysqli_fetch_array($data);
    $location_no=$row['location_no'];
    $query2 = "SELECT * from village where location_no='$locatin_no' and village='$village'";
    if(mysqli_num_rows(mysqli_query($con, $query2)) == 0)
    {
      $query = "INSERT into village values(DEFAULT, '$village', $location_no)";
      $submit = mysqli_query($con, $query) or die(mysqli_error($con));
      info($con, 14);
    }
    else {
      info($con, 15);
    }
  }
  else{
    info($con, 16);
  }
}
?>
