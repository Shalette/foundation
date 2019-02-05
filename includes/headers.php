<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
<a class="navbar-brand" href="index.php">Paani Foundation</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav">

<?php if ((isset($_SESSION['trainer_id'])) && ($_SESSION['trainer_id']!="user1000000")){ ?>
  <li class="nav-item">
    <a class="nav-link" href="trainerhome.php">Home<span class="sr-only">(current)</span></a>
  </li>
<li class="nav-item">
  <a class="nav-link" href="form.php">Add Farmer <span class="sr-only">(current)</span></a>
</li>
<?php }
else if ((isset($_SESSION['trainer_id'])) && ($_SESSION['trainer_id']=="user1000000")) { ?>
  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Admin Actions
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="location.php">Add New Location</a>
          <a class="dropdown-item" href="wcadd.php">Add WC Record 2018</a>
          <a class="dropdown-item" href="trainer.php">Assign Trainer</a>
          <a class="dropdown-item" href="trainerdisplay.php">View Trainers</a>
        </div>
      </li>
<?php
}
else {?>
<li class="nav-item">
  <a class="nav-link" href="register.php">Register <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item">
  <a class="nav-link" href="trainerlogin.php">Trainer Login <span class="sr-only">(current)</span></a>
</li>
<?php } ?>
<li class="nav-item">
<a class="nav-link" href="about.php">About Us<span class="sr-only">(current)</span></a>
</li>
<li class="nav-item">
<a class="nav-link" href="impact.php">Impact Stories<span class="sr-only">(current)</span></a>
</li>
<li class="nav-item">
<a class="nav-link" href="watercup.php"> Water Cup<span class="sr-only">(current)</span></a>
</li>
<?php if (isset($_SESSION['trainer_id'])){ ?>
  <li class="nav-item">
    <a class="nav-link" href="settings.php">Settings<span class="sr-only">(current)</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="includes/logout.php">Logout <span class="sr-only">(current)</span></a>
  </li>
<?php } ?>
</ul>
</div>
</nav>
