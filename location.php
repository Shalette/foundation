<?php require 'includes/common.php';
    if((!isset($_SESSION['trainer_id'])) || $_SESSION['trainer_id']!="user1000000")
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
  <body style="background-image: url('images/admin5.jpg'); background-repeat: no-repeat;  background-size: cover;">
    <?php include 'includes/headers.php';?>
    <p><br><br></p>
  <div class="container">
    <div class="row">
      <div class=" col-xs-12 col-md">
        <div class="card" style="height: 43rem;">
            <img class="card-img-top" style="height:300px;" src="images/admin6.jpg"/>
          <div class="card-header bg-secondary text-center">
              <h3 style="color: white;">Add New Location</h3>
          </div>
            <form action="includes/addloc.php" method="post">
              <div class="card-body">
                <div class="form-group">
                  <input type="text" class="form-control" name ="region" pattern="^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$" required = "true" placeholder="Region">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name ="district" pattern="^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$" required = "true" placeholder="District">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name ="taluka" pattern="^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$" required = "true" placeholder="Taluka">
                </div>
                <p><br><br></p>
                <button type="submit" name="submit" value="1" class="btn btn-secondary btn-block">Add</button>
              </div>
            </form>
          </div>
        </div>

      <div class=" col-xs-12 col-md">
        <div class="card" style="height:43rem;">
            <img class="card-img-top" style="height:300px;" src="images/admin7.jpg"/>
          <div class="card-header bg-secondary text-center">
              <h3 style="color: white;">Add New Village</h3>
          </div>
            <form action="includes/addloc.php" method="post">
              <div class="card-body">
                <div class="form-group">
                  <select class="form-control" name="region" required>
                    <?php     $query="select distinct region from location where location_no!=0";
                        $data = mysqli_query($con, $query) or die(mysqli_error($con));?>
                    <option value="" selected hidden>Select The Region</option>
                    <?php while ($row = mysqli_fetch_array($data)){?>
                      <option value=<?php echo $row['region'] ?> ><?php echo $row['region'] ?></option>
                    <?php } ?>
                  </select>
                </div>

            <div class="form-group">
            <select class="form-control" name="district" required>
              <?php     $query="select distinct district from location where location_no != 0;";
                  $data = mysqli_query($con, $query) or die(mysqli_error($con));?>
              <option value="" selected hidden>Select The District</option>
              <?php while ($row = mysqli_fetch_array($data)){?>
                <option value=<?php echo $row['district'] ?> ><?php echo $row['district'] ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
          <select class="form-control" name="taluka" required>
            <?php     $query="select * from location where location_no!=0";
                $data = mysqli_query($con, $query) or die(mysqli_error($con));?>
            <option value="" selected hidden>Select The Taluka</option>
            <?php while ($row = mysqli_fetch_array($data)){?>
              <option value=<?php echo $row['taluka'] ?> ><?php echo $row['taluka'] ?></option>
            <?php } ?>
          </select>
        </div>
          <div class="form-group" style="margin-bottom:25px;">
            <input type="text" class="form-control" name ="village" pattern="^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$" required = "true" placeholder="Village Name">
          </div>
          <button type="submit" value="2" class="btn btn-secondary btn-block">Add</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <P><br><br></P>
  </body>
</html>
