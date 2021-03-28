<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Passenger</title>
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
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container">
        <a class="navbar-brand" href="index.php">Airasia X</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
           
          </ul>
        </div>
        <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Profile
        <span class="caret"></span></button>
        <ul class="dropdown-menu">
        <li><a href="contact.php">Account</a></li>
        <li><a href="logout.php">logout</a></li>
        </ul>
      </div> 
      </div>
    </nav>
    <!-- END nav -->

    <div class="hero-wrap" style="background-image: url('images/7.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
          <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
            <div class="text">
              <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.php">Home</a></span> <span>passenger info</span></p>
              <h1 class="mb-4 bread">Passenger Information</h1>
            </div>
          </div>
        </div>
      </div>
    </div>




    <section class="ftco-section contact-section">
      <div class="container">
        <div class="row d-flex mb-5 contact-info">
          <div class="col-md-12 mb-4">
            <form action="updatedata.php" class="Update form">
            <h2 class="h3">Passenger information</h2>
          </div><h4 class="h4">Passenger 1</h2>
          <div class="w-100"></div>

          <div class="col-md-4 d-flex">
            <div class="info bg-white p-4">
              <p><span>email:</span> <td><input class = "form-control" type="text" name="email" placeholder="Email"></td></p>
            </div>
          </div>
          <div class="col-md-4 d-flex">
            <div class="info bg-white p-4">
              <p><span>Name:</span> <td><input class = "form-control" type="text" name="PassengerName" placeholder="Name"></td></p>
            </div>
          </div>
          <div class="col-md-4 d-flex">
            <div class="info bg-white p-4">
              <p><span>Surname:</span> <td><input class = "form-control" type="text" name="PassengerSurname" placeholder="Surname"></td></p>
            </div>
          </div>
          <div class="col-md-4 d-flex">
            <div class="info bg-white p-4">
              <p><span>Phone number</span> <td><input class = "form-control" type="text" name="phoneNum" placeholder="PhoneNumber"></td></p>
            </div>
          </div>
          	<fieldset class="form-group">
 		
 	<div class="info bg-white p-4">
      <legend class="col-form-label col-sm-2 pt-0">Sex</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
          <label class="form-check-label" for="gridRadios1">
            Men 
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
          <label class="form-check-label" for="gridRadios2">
            Women 
          </label>
        </div>
      </div>
    </div>
  </fieldset>
  						<div class="col-md-4 d-flex">
	        				<div class="form-group p-4 align-self-stretch d-flex align-items-end">
	        					<div class="wrap">
				    					<label for="#">Birth Date</label>
				    					<input type="text" class="form-control checkin_date" placeholder="dd/mm/yyyy">
			    					</div>
			    				</div>
	        			</div>
	        			</div>
           <div class="col-md d-flex">
          <div class="form-group d-flex align-self-stretch">
                <input type="submit" value="Submit" class="btn btn-primary py-3 px-4 align-self-stretch">
          </div>
           </div>
       </form>
        </div>

         

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


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
    
  </body>
</html>