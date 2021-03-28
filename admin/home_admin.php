<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
  div.gallery {
    margin: 5px;
    float: left;
    width: 300px;
  }

  div.gallery img {
    width: 100%;
    height: 200px;
  }

  div.desc {
    padding: 15px 5px 50px 10px;
    text-align: left;
  }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">
        <img src="Air_Asia-logo.png" alt="logo" style="height:30px;width:120px;">
      </a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="home_admin.php">Home</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-menu-hamburger"></span></a>
        <ul class="dropdown-menu">
          <li><a href="CheckReceipt.php">Check receipt</a></li>
          <li><a href="CheckPayment.php">Check payment</a></li>
        </ul>
      </li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">
  <h3>LATEST NEWS</h3>
  <hr>
  <div class="gallery">
    <img src="IMG_0241.jpg" alt="Cinque Terre" width="600" height="400">
    <div class="desc"><h5><small>Bangkok Sep 4, 2019</small><br>AirAsia Launches Future Of Long-Haul Fleet</h5></div>
  </div>

  <div class="gallery">
    <img src="No+Image+thumbnail.png" alt="Forest" width="600" height="400">
    <div class="desc"><h5><small>Sepang Aug 30, 2019</small><br>Travel Advisory: Departure Levy</h5></div>
  </div>

  <div class="gallery">
    <img src="Airbus+AirAsia-1.jpg" alt="Northern Lights" width="600" height="400">
    <div class="desc"><h5><small>Sepang Aug 30, 2019</small><br>AirAsia inks major deals with Airbus</h5></div>
  </div>
  <div class="gallery">
    <img src="Photo+1+PJ.jpg" alt="Mountains" width="600" height="400">
    <div class="desc"><h5><small>Kuala Lumpur Aug 21, 2019</small><br>AirAsia Foundation launches upcycled GOOD/jahat/ collection with Projek Jahat</h5></div>
  </div>
  <div class="gallery">
    <img src="airasiax+logo.jpg" alt="Mountains" width="600" height="400">
    <div class="desc"><h5><small>Sepang Aug 22, 2019</small><br>AirAsia X Delivers Strong Operating Cashflow</h5></div>
  </div>
  <div class="gallery">
    <img src="AirAsia_Belitung.jpg" alt="Mountains" width="600" height="400">
    <div class="desc"><h5><small>Sepang Aug 19, 2019</small><br>AirAsia connects Kuala Lumpur to the hidden island paradise of Belitung</h5></div>
  </div>
</div>
<div class="container">
  <h4><small>At AirAsia, we adhere to stringent regulatory requirements, placing high emphasis on transparency and practicing good corporate governance. Our vision is to provide a consistent communication platform to our stakeholders globally. Catch the latest updates and insights on AirAsia and the Group’s IR initiatives.</small></h4>
  <h4 style="text-align:center;"><small>© 2017 AirAsia Berhad</small></h4>
</div>

</body>
</html>