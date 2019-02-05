<?php
function info($con, $error){
  $_SESSION['x']="<div></div>";
  switch ($error){
    case 1:
    $_SESSION['x']='<div class="jumbotron text-center"><h3>Registration Successful. You will be contacted shortly.<h3></div>';
    break;

    case 2:
    $_SESSION['x']='<div class="jumbotron text-center"><h3>Incorrect Data Entered. Check our registered locations to know more.<h3>
    <a style="color:white;" class="btn btn-md btn-danger" href="display.php">Registered Villages</a></div>';
    break;

    case 3:
    $_SESSION['x']='<div class="jumbotron text-center"><h3>Already Registered.<h3>
    <a style="color:white;" class="btn btn-md btn-danger" href="index.php">Return to Index</a></div>';
    break;

    case 4:
    $_SESSION['x']='<div class="jumbotron text-center"><h3>Incorrect User Name or Password.<h3>
    <a style="color:white;" class="btn btn-md btn-danger" href="trainerlogin.php">Retry</a></div>';
    break;

    case 5:
    $_SESSION['x']='<div class="jumbotron text-center"><h3>User does not exist. Contact the Administrator to Join.<h3>
    <a style="color:white;" class="btn btn-md btn-danger" href="index.php">Return to Index</a></div>';
    break;

    case 6:
    $_SESSION['x']='<div class="jumbotron text-center"><h3>Incorrect Password.<h3>
    <a style="color:white;" class="btn btn-md btn-danger" href="settings.php">Try Again</a></div>';
    break;

    case 7:
    $_SESSION['x']='<div class="jumbotron text-center"><h3>Passwords do not Match.<h3>
    <a style="color:white;" class="btn btn-md btn-danger" href="settings.php">Try Again</a></div>';
    break;

    case 8:
    $_SESSION['x']='<div class="jumbotron text-center"><h3>Password Changed Successfully!<h3>
    <a style="color:white;" class="btn btn-md btn-danger" href="index.php">Return to Index</a></div>';
    break;

    case 9:
    $_SESSION['x']='<div class="jumbotron text-center"><h3>Trainer Changed Successfully!<h3>
    <a style="color:white;" class="btn btn-md btn-danger" href="trainer.php">Continue</a></div>';
    break;

    case 10:
    $_SESSION['x']='<div class="jumbotron text-center"><h3>Trainer Added Successfully!<h3>
    <a style="color:white;" class="btn btn-md btn-danger" href="trainer.php">Continue</a></div>';
    break;

    case 11:
    $_SESSION['x']='<div class="jumbotron text-center"><h3>Trainer Already Assigned.<h3>
    <a style="color:white;" class="btn btn-md btn-danger" href="trainer.php">Continue</a></div>';
    break;

    case 12:
    $_SESSION['x']='<div class="jumbotron text-center"><h3>Information Successfully Updated!<h3>
    <a style="color:white;" class="btn btn-md btn-danger" href="trainer.php">Continue</a></div>';
    break;

    case 13:
    $_SESSION['x']='<div class="jumbotron text-center"><h3>Trainer Already Assigned.<h3>
    <a style="color:white;" class="btn btn-md btn-danger" href="settings.php">Try Again</a></div>';
    break;

    case 14:
    $_SESSION['x']='<div class="jumbotron text-center"><h3>Location Successfully Added.<h3>
    <a style="color:white;" class="btn btn-md btn-danger" href="location.php">Continue</a></div>';
    break;

    case 15:
    $_SESSION['x']='<div class="jumbotron text-center"><h3>Location Already Exists.<h3>
    <a style="color:white;" class="btn btn-md btn-danger" href="location.php">Continue</a></div>';
    break;

    case 15:
    $_SESSION['x']='<div class="jumbotron text-center"><h3>Location Does Not Exist.<h3>
    <a style="color:white;" class="btn btn-md btn-danger" href="location.php">Try Again</a></div>';
    break;

    case 16:
    $_SESSION['x']='<div class="jumbotron text-center"><h3>Record Successfully Updated!<h3>
    <a style="color:white;" class="btn btn-md btn-danger" href="wcadd.php">Continue</a></div>';
    break;

    case 17:
    $_SESSION['x']='<div class="jumbotron text-center"><h3>Record Successfully Inserted!<h3>
    <a style="color:white;" class="btn btn-md btn-danger" href="wcadd.php">Continue</a></div>';
    break;

    default:
    $_SESSION['x']='<div class="jumbotron text-center"><h3>Nothing To See Here!<h3>
    <a style="color:white;" class="btn btn-md btn-danger" href="index.php">Return to Index</a></div>';
    break;
  }
      header('location: ../submission.php');
}
  ?>
