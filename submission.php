<?php require 'includes/common.php';
if (!isset($_SESSION['x'])){
  header('location: index.php');
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <?php include 'includes/links.php' ?>
    <title>Paani Foundation</title>
  </head>
  <body style="background-image: url('images/admin12.jpg'); background-repeat: no-repeat;  background-size: cover;">
    <?php include 'includes/headers.php'?>

    <div class="container">
      <p><br><br></p>
      <p><br><br></p>
    <?php  echo $_SESSION['x']; ?>
    </div>
  </body>
  </html>
