<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Airasia.com</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">

    <!--select and search -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.jquery.min.js"></script>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">AIRASIA X</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
	          
	        </ul>
	      </div>

	      <div class="dropdown">
  			<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Profile
  			<span class="caret"></span></button>
  			<ul class="dropdown-menu">
    		<li><a href="contact.php">Account</a></li>
    		<li><a href="logout.php">Logout</a></li>
  			</ul>
			</div> 
	  </nav>

    <!-- END nav -->

    <section class="home-slider owl-carousel">
      <div class="slider-item" style="background-image:url(images/1.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-12 ftco-animate text-center">
          	<div class="text mb-5 pb-3">
	            <h1 class="mb-3">Welcome To Airasia Airline</h1>
	            <h2>Airline &amp; Happiness</h2>
            </div>
          </div>
        </div>
        </div>
      </div>

       <div class="slider-item" style="background-image:url(images/3.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-12 ftco-animate text-center">
          	<div class="text mb-5 pb-3">
	            <h1 class="mb-3">Enjoy A Luxury Experience</h1>
	            <h2>Join With Us</h2>
            </div>
          </div>
        </div>
        </div>
      </div>

      <div class="slider-item" style="background-image:url(images/6.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-12 ftco-animate text-center">
          	<div class="text mb-5 pb-3">
	            <h1 class="mb-3">Bon Voyage</h1>
	            <h2>Good luck</h2>
            </div>
          </div>
        </div>
        </div>
      </div>

       <div class="slider-item" style="background-image:url(images/4.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-12 ftco-animate text-center">
          	<div class="text mb-5 pb-3">
	            <h1 class="mb-3">Enjoy A High Class</h1>
	            <h2>Choose Airasia </h2>
            </div>
          </div>
        </div>
        </div>
      </div>
    </section>

    <!-- search flight -->
    <section class="ftco-booking">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-12">
    				<form action="checksearch.php" class="booking-form" method="post">
	        		<div class="row">
	        			<div class="col-md d-flex">
	        				<div class="form-group p-4 align-self-stretch d-flex align-items-end">
	        					<div class="wrap">
			      					<label for="#">Origin</label>
			      					<div class="form-field">
			        					<div class="select-wrap">
			                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
			                    <?php
								    require('connect.php');
								    $sql = '
								    SELECT  AirportName
								    FROM airport;
								    ';
								    $objQuery = mysqli_query($conn,$sql) or die ("Error Query [".$sql."]");
								?>
			                    <select name="DepartID" class="chosen">
					                <?php
					                while($objResult = mysqli_fetch_array($objQuery))
					                {
					                ?>
					                <option value=<?php echo $objResult["AirportName"];?>><?php echo $objResult["AirportName"];?></option>
					                <?php
					                }
					                ?>
				                </select>
			                  </div>
				              </div>
				            </div>
		              </div>
	        			</div>
	        			<div class="col-md d-flex">
	        				<div class="form-group p-4 align-self-stretch d-flex align-items-end">
	        					<div class="wrap">
			      					<label for="#">Destination</label>
			      					<div class="form-field">
			        					<div class="select-wrap">
			                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
			                    <?php
								    require('connect.php');
								    $sql = '
								    SELECT  AirportName
								    FROM airport;
								    ';
								    $objQuery = mysqli_query($conn,$sql) or die ("Error Query [".$sql."]");
								?>
			                    <select name="ArriveID" class="chosen">
					                <?php
					                while($objResult = mysqli_fetch_array($objQuery))
					                {
					                ?>
					                <option value=<?php echo $objResult["AirportName"];?>><?php echo $objResult["AirportName"];?></option>
				                <?php
				                }
				                ?>
				                </select>
			                  </div>
				              </div>
				            </div>
		              </div>
	        			</div>
	        			<div class="col-md-3 d-flex">
	        				<div class="form-group p-4 align-self-stretch d-flex align-items-end">
	        					<div class="wrap">
				    					<label class="container">Return
											<input type="radio" checked="checked" name="way" value="2" onclick="JavaScript:fncShow1();">
											<span class="checkmark"></span>
										</label>
										<label class="container">One way
											<input type="radio" name="way" value="1" onclick="JavaScript:fncHide1();">
											<span class="checkmark"></span>
										</label>
			    				</div>
			    				</div>
	        			</div>
	        			<div class="col-md-3 d-flex">
	        				<div class="form-group p-4 align-self-stretch d-flex align-items-end">
	        					<div class="wrap">
				    					<label for="#">Dapart Date</label>
				    					<input type="date" name="DepartDate" placeholder="Check-in date">
			    					</div>
			    				</div>
	        			</div>
	        			<div class="col-md-3 d-flex">
	        				<div class="form-group p-4 align-self-stretch d-flex align-items-end">
	        					<div id="ReturnDateAll" class="wrap">
				    					<label for="#">Return Date</label>
				    					<input type="date" name="ReturnDate" placeholder="Check-out date">
			    				</div>
			    				</div>
	        			</div>
	        			<div class="col-md d-flex">
	        				<div class="form-group p-4 align-self-stretch d-flex align-items-end">
	        					<div class="wrap">
			      					<label for="#">Customer</label>
			      					<div class="form-field">
			        					<div class="select-wrap">
			                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
			                    <select name="Amount" id="" class="form-control">
			                      <option value="1">1 Adult</option>
			                      <option value="2">2 Adult</option>
			                      <option value="3">3 Adult</option>
			                      <option value="4">4 Adult</option>
			                      <option value="5">5 Adult</option>
			                    </select>
			                  </div>
				              </div>
				            </div>
		              </div>
	        			</div>
	        			<div class="col-md d-flex">
	        				<div class="form-group d-flex align-self-stretch">
			              <input type="submit" value="Check Availability" class="btn btn-primary py-3 px-4 align-self-stretch">
			            </div>
	        			</div>
	        		</div>
	        	</form>
	    		</div>
    		</div>
    	</div>
    </section>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script type="text/javascript">
      $(".chosen").chosen();
  </script>
  <script language="JavaScript">
	function fncShow1()
	{
	document.getElementById('ReturnDateAll').style.display = '';
	}

	function fncHide1()
	{
	document.getElementById('ReturnDateAll').style.display = 'none';
	}
  </script>
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    

<?php
    mysqli_close($conn); // ปิดฐานข้อมูล
    /*echo "<br><br>";
    echo "--- END ---";*/
?>
  </body>
</html>