<?php require 'includes/common.php';
if (!isset($_SESSION['trainer_id']))
      header('location: index.php');?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <?php include 'includes/links.php' ?>
    <link rel="stylesheet" href="css/home.css">
  </head>
  <body style="background-image: url('images/admin11.jpeg'); background-repeat: no-repeat;  background-size: cover;">
    <?php include 'includes/headers.php'?>
    <p><br><br></p>
    <div class="container">
      <div class="row">
         <div class="col-md-12">
              <div class="card border-dark mb-3">
                  <div class="card-block">
                      <h2 class="card-header"><center>Change Password</center></h2>
                      <p class="card-text"></p>
                    <form action="includes/update.php" method="post">
                    <p><br></p>
                    <div class="form-group col-md-10 offset-md-1">
                      <input type="password" class="form-control" name ="oldpass" required = "true" placeholder="Old Password">
                    </div>
                    <div class="form-group col-md-10 offset-md-1">
                      <input type="password" class="form-control" name ="newpass" required = "true" placeholder="New Password">
                    </div>
                    <div class="form-group col-md-10 offset-md-1">
                      <input type="password" class="form-control" name ="repass" required = "true" placeholder="Retype New Password">
                    </div>
                    <button class="btn btn-primary  col-md-10 offset-md-1" name="submit" value="1" type="submit">Submit</button>
                    <p> <br></p>
                  </form>
                  </div>
              </div>
         </div>
         <div class="col-md-12">
              <div class="card border-dark mb-3">
                  <div class="card-block">
                      <h2 class="card-header"><center>Update Contact Information</center></h2>
                      <p class="card-text"></p>
                    <form action="includes/update.php" method="post">
                    <p><br></p>
                    <div class="form-group col-md-10 offset-md-1">
                      <input type="tel" class="form-control" name="phno" pattern="[789]{1}[0-9]{9}" required placeholder="New Phone Number">
                    </div>
                    <button class="btn btn-primary col-md-10 offset-md-1" name="submit" value="2" type="submit">Submit Update</button>
                    <p> <br></p>
                  </form>
                  </div>
              </div>
         </div>
       </div>


    </div>
