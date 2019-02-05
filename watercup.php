<?php require 'includes/common.php'; ?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
<?php include 'includes/links.php' ?>
      <link rel="stylesheet" href="css/watercup.css">
    </head>
      <body style="background-image: url('images/watercup.jpg')">
        <?php include 'includes/headers.php'?>
          <div class="container">
          <div class="row">
              <div class="col-4-lg ml-5">
                  <div class="card" style="width:18rem; height: 40rem;">
                  <img class="card-img-top" src="images/paa.jpg" >
                      <div class="card-body">
                   <div class="text-center">  <h5 class="card-title" ><strong>Water Cup 2016</strong> </h5></div>
                          <p class="card-text">
                                          <li>    3 &nbsp; : &nbsp;Districts<br></li>
                                             <li> 3	&nbsp;  : &nbsp;Talukas  <br></li>
                                           <li>116  &nbsp;&nbsp;  : &nbsp;Villages <br></li>
                                        <li> 850    &nbsp;&nbsp;  : &nbsp;People trained <br></li>
                                     <li>  10,000   &nbsp;&nbsp;  : &nbsp;The average number of people who did Shramdaan daily <br></li>
                                        <li> 1,368  &nbsp;&nbsp;  : &nbsp;Crore litres of water storage capacity built <br></li>
                                        <li> Winner &nbsp;&nbsp;  : &nbsp;Velu village</li> </p>

                      </div>
                  </div>
               </div>

               <div class="col-4-lg ml-4">
                    <div class="card" style="width:18rem; height: 40rem;">
                  <img class="card-img-top" src="images/paa1.jpg"  >
                      <div class="card-body">
                          <div class="text-center">     <h5 class="card-title" > <strong>Water Cup 2017</strong></h5></div>
                          <p class="card-text">
                                            <li>    13	 : Districts<br></li>
                                            <li>    30	 : Talukas<br></li>
                                            <li>   1,321 : Villages<br></li>
                                        <li>       6,000 : People trained<br></li>
                                         <li>     65,000 : The average number of people who did Shramdaan daily<br></li>
                                            <li>   8,261 : Crore litres of water storage capacity built<br></li>
                                        <li>      Winner : Kakaddara village</li>  </p>
               </div>
                   </div>
              </div>

               <div class="col-4-lg ml-4">
                   <div class="card" style="width:18rem; height: 40rem;">
                        <img  class="card-img-top" src="images/paa2.jpg"  >
                      <div class="card-body">
                   <div class="text-center">      <h5 class="card-title" ><strong>Water Cup 2018 (Ongoing)</strong></h5></div>
                          <p class="card-text"><li> 24	  : Districts<br></li>
                                              <li>   75	  : Talukas<br></li>
                                              <li>  4,025 :	Villages<br></li>
                                             <li> 20,000+ : People trained<br></li>
                                            <li> 1,50,000 :	The average number of people who did Shramdaan daily<br></li>
                                            <li>  22,269  : Crore litres of water storage capacity built<br></li>
                                           <li>   Winner  : Not Yet Decided</li></p>
               </div>

              </div>
          </div>
              </div>
              <p><br><br></p>

              <?php $query = "SELECT location_no, year, region, district, taluka, max(amount) from watercup natural join location group by year;";
              $data = mysqli_query($con, $query) or die(mysqli_error($con));
              $num = mysqli_num_rows($data);
              if($num == 0)
                echo '<div class=jumbotron"><h4>Oops! Looks like something went wrong.</h4></div>';
              else{ ?>

                <table class="table table-light">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Year</th>
                <th scope="col">Region</th>
                <th scope="col">District</th>
                <th scope="col">Taluka</th>
                <th scope="col">Water Conserved (in Crore Litres)</th>
              </tr>
            </thead>
            <tbody>
              <?php
          while($row=mysqli_fetch_array($data))
          {
            ?>
            <tr><td> <?php echo $row['year']; if($row['year']=='2018') echo " (Leading)"?></td> <td><?php echo $row['region'];?></td> <td><?php echo $row['district'];?></td><td><?php echo $row['taluka'];?></td>
              <td><?php echo $row['max(amount)'];?></td></tr>
            <?php
          }
          }
          ?>
        </tbody>
          </table>
          </div>

        <script>
          $(document).ready(function() {
              $('.col-4-lg').hover(
              function(){
                  $(this).animate({

                      marginTop: "-=1%",

                  },200);
              },

               function(){
                  $(this).animate({

                      marginTop: "0%",

                  },200);


               }
                  );
                    });
          </script>
    </body>
</html>
