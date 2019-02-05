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
  <body style="background-image: url('images/admin8.jpg'); background-repeat: no-repeat;  background-size: cover;">
    <?php include 'includes/headers.php';?>
    <p><br><br></p>
  <div class="container">
    <div class="row">
      <div class=" col-xs-12 col-md">
        <div class="card">
            <img class="card-img-top" style="height:300px;" src="images/admin9.jpeg"/>
          <div class="card-header bg-secondary text-center">
              <h3 style="color: white;">Update Existing Record (2018)</h3>
          </div>
            <form action="includes/addrec.php" method="post">
              <div class="card-body">
                <div class="form-group">
                  <select class="form-control" name="taluka" required>
                    <?php
                     $query="select taluka from watercup natural join location where location_no!=1000000 and year=2018";
                     $data = mysqli_query($con, $query) or die(mysqli_error($con));?>
                    <option value="" selected hidden>Select The Taluka</option>
                    <?php while ($row = mysqli_fetch_array($data)){?>
                      <option value=<?php echo $row['taluka'] ?> ><?php echo $row['taluka'] ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name ="record" required = "true" pattern="^\d*(\.\d{0, 2})?$" placeholder="Updated Record">
                </div>
                <button type="submit" name="submit" value="2" class="btn btn-secondary btn-block">Update Record</button>
              </div>
            </form>
          </div>
        </div>

      <div class=" col-xs-12 col-md">
        <div class="card">
            <img class="card-img-top" style="height:300px;" src="images/admin10.jpg"/>
          <div class="card-header bg-secondary text-center">
              <h3 style="color: white;">Add New Record (2018)</h3>
          </div>
            <form action="includes/addrec.php" method="post">
              <div class="card-body">
                <?php
                $query="select taluka from location where location_no not in(select location_no from location natural join watercup where year=2018) and location_no!=1000000";
                    $data = mysqli_query($con, $query) or die(mysqli_error($con));
                    $flag=1;
                    if(mysqli_num_rows($data)==0)
                    $flag=0;
                    ?>
                <div class="form-group">
                  <select class="form-control" name="taluka" required <?php if ($flag==0) echo "disabled"; ?> >

                    <option value="" selected hidden><?php if ($flag==0) echo "No New Entries"; else echo  "Select The Taluka";?></option>
                    <?php while ($row = mysqli_fetch_array($data)){?>
                      <option value=<?php echo $row['taluka'] ?> ><?php echo $row['taluka'] ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <input type="text"  <?php if ($flag==0) echo "disabled"; ?> class="form-control" name ="record" pattern="^\d*(\.\d{0, 2})?$" required = "true" placeholder="Enter Record">
                </div>
                <button type="submit" name="submit" value="2" class="btn btn-secondary btn-block" <?php if ($flag==0) echo "disabled"; ?> >Add Record</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <P><br><br></P>
  </body>
</html>
