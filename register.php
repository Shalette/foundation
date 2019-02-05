<?php require 'includes/common.php';
    if (isset($_SESSION['trainer_id']))
      header('location: form.php');
      ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include 'includes/links.php' ?>
    <title>Paani Foundation</title>
  </head>
  <body style="background-image: url('images/registerbg.jpg'); background-repeat: no-repeat;  background-size: cover;">
    <?php include 'includes/headers.php';?>
    <p><br><br></p>
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md">
          <img class="card-img-top" style="height:300px;" src="images/LregCard.jpg"/>
      <div class="jumbotron text-center" >
        <h1 style="margin-top: 2%;"> Welcome to Paani Foundation</h1>
        <h2> A water conservation project founded in 2016 with the aim of making Maharashtra drought-free using the power of communication.</h2>
        <P><br></P>
        <a style="color:white;" class="btn btn-lg btn-danger" href="display.php">View Our Registrations</a>
      </div>
    </div>
      <div class=" col-xs-12 col-md">
        <div class="card">
            <img class="card-img-top" style="height:300px;" src="images/RregCard.jpg"/>
          <div class="card-header bg-secondary text-center">
              <h3 style="color: white;">Join Us</h3>
          </div>
            <form action="includes/signup.php" method="post">
              <div class="card-body">
                <div class="form-group">
                  <input type="text" class="form-control" name ="fname" pattern="^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$" required = "true" placeholder="First Name (No Special Characters)">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name ="lname" pattern="^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$" required = "true" placeholder="Last Name (No Special Characters)">
                </div>
                <div class="form-group">
                  <input type="tel" class="form-control" placeholder="Contact" name ="contact" pattern="[789]{1}[0-9]{9}" required = "true">
                </div>
                <div class="form-group">
                <select class="form-control" name="village" required>
                  <?php     $query="select * from village order by village_name";
                      $data = mysqli_query($con, $query) or die(mysqli_error($con));?>
                  <option value="" selected hidden>Select The Village</option>
                  <?php while ($row = mysqli_fetch_array($data)){?>
                    <option value=<?php echo $row['village_name'] ?> ><?php echo $row['village_name'] ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
              <select class="form-control" name="taluka" required>
                <?php     $query="select * from location where location_no!=1000000 order by taluka";
                    $data = mysqli_query($con, $query) or die(mysqli_error($con));?>
                <option value="" selected hidden>Select The Taluka</option>
                <?php while ($row = mysqli_fetch_array($data)){?>
                  <option value=<?php echo $row['taluka'] ?> ><?php echo $row['taluka'] ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
            <select class="form-control" name="district" required>
              <?php     $query="select distinct district from location where location_no !=1000000 order by district";
                  $data = mysqli_query($con, $query) or die(mysqli_error($con));?>
              <option value="" selected hidden>Select The District</option>
              <?php while ($row = mysqli_fetch_array($data)){?>
                <option value=<?php echo $row['district'] ?> ><?php echo $row['district'] ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <select class="form-control" name="region" required>
              <?php     $query="select distinct region from location where location_no!=1000000 order by region";
                  $data = mysqli_query($con, $query) or die(mysqli_error($con));?>
              <option value="" selected hidden>Select The Region</option>
              <?php while ($row = mysqli_fetch_array($data)){?>
                <option value=<?php echo $row['region'] ?> ><?php echo $row['region'] ?></option>
              <?php } ?>
            </select>
          </div>
          <button type="submit" class="btn btn-secondary btn-block" name="submit" value="1">Sign Up</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <P><br><br></P>
  </body>
</html>
