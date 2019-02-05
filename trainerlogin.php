<?php require 'includes/common.php';
    if (isset($_SESSION['trainer_id']))
      header('location: trainerhome.php');
      ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <?php include 'includes/links.php' ?>
    <link rel="stylesheet" href="css/trainerLogin.css">
    <title>Volunteer For Us</title>
  </head>
  <body style="background-image: url('images/TrainerLoginbg.jpg'); background-repeat: no-repeat;  background-size: cover;">
    <?php include 'includes/headers.php'?>

   <p><br><br></p>

      <div class="container">
          <div class="row">
              <div class="col-md-6">
                  <div class="card  border-dark mb-3" >
                    <img class="card-img-top" style="height:300px;" src="images/RTrainerCrad.jpg"/>
                      <div class="card-block">
                        <h2 class="card-header"><center>Get Involved</center></h2>
                          <div class="card-body">
                            <div class="text-center" style="margin-bottom: 11%;">
                              <div class="fas fa-tint fa-4x"></div>
                              <h3>Join us in this Initiative.</h3>
                            </div>
                            <a href="#" style="text-decoration: none;"><span class="fas fa-handshake fa-3x" style="float: left; padding-left: 20%; padding-right: 5%;"></span><h3 style="float: left;">Volunteer today!</h3></a>
                                              <p> <br><br></p>
                                              <p> <br><br></p>
                          </div>
                      </div>
                    </div>
                  </div>

                 <div class="col-md-6">
                  <div class="card border-dark mb-3">
                      <img class="card-img-top" style="height:300px;" src="images/RTrainerCard.jpg"/>
                      <div class="card-block">
                          <h2 class="card-header"><center>Trainer Login</center></h2>
                          <p class="card-text"></p>
                      <form  action="includes/signin.php" method="post">
                        <p> <br><br></p>
                         <div class="form-group col-md-10 offset-md-1" >
                            <div class="inputwithIcon">
                          <input type="text" class="form-control" name="name" placeholder="Enter First Name" pattern="^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$" required>
                             <i class="fas fa-user fa-lg fa-fw"></i>
                             </div>
                        </div>

                        <div class="form-group col-md-10 offset-md-1" >
                           <div class="inputwithIcon">
                         <input type="text" class="form-control" name="phno" placeholder="Phone Number" pattern="[789]{1}[0-9]{9}" required>
                            <i class="fas fa-phone fa-lg fa-fw"></i>
                            </div>
                        </div>
                        <div class="form-group col-md-10 offset-md-1" >
                            <div class="inputwithIcon ">
                          <input type="password" class="form-control" name="password" placeholder="Password" required>
                                <i class="fas fa-lock fa-lg fa-fw"></i>
                        </div>
                             </div>
                        <button class="btn btn-primary col-md-10 offset-md-1" type="submit">Submit</button>
                                              <p> <br></p>

                      </form>
                      </div>
                  </div>
             </div>
           </div>
      </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  </div>

</body>
</html>
