<?php
    session_start();
    require('connect.php');
    $email      = $_REQUEST['email'];
    $escapedPW = mysqli_real_escape_string($conn,$_REQUEST['pwd']);

    //save this user and pass as cookie if remeber checked start
    if (isset($_REQUEST['remember']))
        $escapedRemember = mysqli_real_escape_string($conn,$_REQUEST['remember']);

        $cookie_time = 60 * 60 * 24 * 30; // 30 days
        $cookie_time_Onset=$cookie_time+ time();
    if (isset($escapedRemember)) {
        /*
         * Set Cookie from here for one hour
         * */
        setcookie("email", $email, $cookie_time_Onset);
        setcookie("pwd", $escapedPW, $cookie_time_Onset);  

    } else {

        $cookie_time_fromOffset=time() -$cookie_time;
        setcookie("email", '',$cookie_time_fromOffset );
        setcookie("pwd", '', $cookie_time_fromOffset);  
    }
      //save this user and pass as cookie if remember checked end

    $MemberPass = $_REQUEST['pwd']; 
    $sql = " SELECT * FROM `member`
    WHERE `email` = '".$email."'
    and `MemberPass` = '".$MemberPass."' 
    ";
    $result = mysqli_query($conn,$sql);

    $sql2 = "
    INSERT INTO `basket` (`email`)
    VALUES ('".$email."');
    ";

    if ($conn->query($sql2) === TRUE) {
        $last_id = $conn->insert_id;
    }


    if(mysqli_num_rows($result)!=1)
    {
        echo "<script>";
            echo "alert(\" Username หรือ Password ไม่ถูกต้อง\");"; 
            echo "window.history.back()";
        echo "</script>"; 
    } 
?>
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
    		<li><a href="#">logout</a></li>
  			</ul>
			</div> 
	  </nav>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
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

    <section class="ftco-booking">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-12">
    				<form action="flight.php" class="booking-form" method="post">
	        		<div class="row">
	        			<div class="col-md d-flex">
	        				<div class="form-group p-4 align-self-stretch d-flex align-items-end">
	        					<input type="hidden" name="BasketNo" value="<?php echo $last_id;?>"/>
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