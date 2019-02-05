<?php require 'includes/common.php';
if ((!isset($_SESSION['trainer_id'])) || ($_SESSION['trainer_id']=="user1000000"))
      header('location: index.php');?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <?php include 'includes/links.php' ?>

       <link rel="stylesheet" href="about.css">
    <title>Paani Foundation</title>
  </head>
  <body style="background-image: url('images/admin13.jpeg'); background-repeat: no-repeat;  background-size: cover;">

    <?php include 'includes/headers.php'?>

<p><br><br></p>
<p><br><br></p>


<div class="container">

  <?php
  $x=substr($_SESSION['trainer_id'], 4);
  $query = "SELECT farmer_fname, farmer_contact FROM farmer natural join trainer where trainer_id='$x' order by farmer_fname ";
  $data = mysqli_query($con, $query) or die(mysqli_error($con));
  $num = mysqli_num_rows($data);
  if($num == 0)
    echo '<div class=jumbotron"><h4>Oops! Looks like something went wrong.</h4></div>';
  else{
?>
<table class="table table-light">
<thead class="thead-dark">
<tr>
<th scope="col">Farmer Name</th>
<th scope="col">Contact</th>
</tr>
</thead>
<tbody>
<?php
while($row=mysqli_fetch_array($data))
{
?>

<tr><td> <?php echo $row['farmer_fname'];?></td> <td><?php echo $row['farmer_contact'];?></td></tr>
<?php
}
}
?>
</table>
</div>
</body>
</html>
