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
  <body style="background-image: url('images/admin.jpg'); background-repeat: no-repeat;  background-size: cover;">
    <?php include 'includes/headers.php'?>

   <p><br><br></p>
   <p><br><br></p>
      <div class="container">
        <?php $query = "SELECT * from trainer natural join location where location_no!=1000000 order by taluka;";
        $data = mysqli_query($con, $query) or die(mysqli_error($con));
        $num = mysqli_num_rows($data);
        if($num == 0)
          echo '<div class=jumbotron"><h4>Oops! Looks like something went wrong.</h4></div>';
        else{
    ?>
      <table class="table table-light">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Taluka</th>
      <th scope="col">Trainer Name</th>
      <th scope="col">Contact Information</th>
    </tr>
  </thead>
  <tbody>
    <?php
while($row=mysqli_fetch_array($data))
{
  ?>

  <tr><td><?php echo $row['taluka'];?></td> <td><?php echo $row['trainer_fname']." ".$row['trainer_lname'];?></td><td><?php echo $row['trainer_contact'];?></td></tr>
  <?php
}
}
?>
</table>
</div>
  </body>
</html>
