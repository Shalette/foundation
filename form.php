<?php require 'includes/common.php';
if ((!isset($_SESSION['trainer_id'])) || $_SESSION['trainer_id']=="user1000000")
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
  <body style="background-image: url('images/form.jpg'); background-repeat: no-repeat;  background-size: cover;">
    <?php include 'includes/headers.php'?>

<p><br><br></p>
<p><br><br></p>

<p><br></p>
<?php
$x=substr($_SESSION['trainer_id'], 4);
$query="select * from village natural join trainer natural join location where trainer_id=$x; ";
$data = mysqli_query($con, $query) or die(mysqli_error($con));

?>
<div class="container">
  <div class="row">
     <div class="col-md-12">
          <div class="card border-dark mb-3">
              <div class="card-block">
                  <h2 class="card-header"><center>Register Farmer</center></h2>
                  <p class="card-text"></p>
              <form  action="includes/signup.php" method="post">
                      <p> <br></p>
                <div class="form-group col-md-10 offset-md-1">
                  <input type="text" class="form-control" name ="fname" pattern="^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$" required = "true" placeholder="First Name (No Special Characters)">
                </div>
                <div class="form-group col-md-10 offset-md-1">
                  <input type="text" class="form-control" name ="lname" pattern="^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$" required = "true" placeholder="Last Name (No Special Characters)">
                </div>
                <div class="form-group col-md-10 offset-md-1">
                  <input type="tel" class="form-control" placeholder="Contact" name ="contact" pattern="[789]{1}[0-9]{9}" required = "true">
                </div>
                <div class="form-group  col-md-10 offset-md-1">
                <select class="form-control" name="village" required>
                  <option value="" selected hidden>Select</option>
                  <?php while ($row = mysqli_fetch_array($data)){?>
                    <option value=<?php echo $row['village_name'] ?> ><?php echo $row['village_name'] ?></option>
                  <?php } ?>
                </select>
              </div>

                <button class="btn btn-primary  col-md-10 offset-md-1" type="submit" name="submit" value="2">Submit</button>
                                      <p> <br></p>
              </form>
              </div>
          </div>
     </div>
   </div>
</div>
</body>
</html>
