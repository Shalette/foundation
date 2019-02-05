<?php require 'includes/common.php'; ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <?php include 'includes/links.php' ?>
      <link rel="stylesheet" href="trainerLogin.css">
    <title>Paani Foundation</title>
  </head>
  <body style="background-image: url('images/display.jpg'); background-repeat: no-repeat;  background-size: cover;">
    <?php include 'includes/headers.php'?>

   <p><br><br></p>


      <div class="container">
        <?php $query = "SELECT region, district, taluka, village_name FROM location natural join village;";
        $data = mysqli_query($con, $query) or die(mysqli_error($con));
        $num = mysqli_num_rows($data);
        if($num == 0)
          echo '<div class=jumbotron"><h4>Oops! Looks like something went wrong.</h4></div>';
        else{
    ?>
      <table class="table table-light">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Region</th>
      <th scope="col">District</th>
      <th scope="col">Taluka</th>
      <th scope="col">Village</th>
    </tr>
  </thead>
  <tbody>
    <?php
while($row=mysqli_fetch_array($data))
{
  ?>

  <tr><td> <?php echo $row['region'];?></td> <td><?php echo $row['district'];?></td> <td><?php echo $row['taluka'];?></td><td><?php echo $row['village_name'];?></td></tr>
  <?php
}
}
?>
</table>
</div>

  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  </body>
</html>
