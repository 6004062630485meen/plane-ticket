<!DOCTYPE html>
<html lang="en">
<head>
  <title>CheckReceipt</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <style>
  #t1 {
    padding-top: 150px;
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
      <li class=""><a href="home_admin.php">Home</a></li>
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

<div id="t1" class="w3-container" align="center">
<?php
    $update_ID  = $_REQUEST['refNo'];
    $refNo   = $update_ID;
?>
<form action="save.php?refNo=<?php echo $refNo; ?>" method="post" name="refNo">
<table class="w3-table-all, w3-table-all w3-card-4" style="width:50%;">
  <thead>
    <tr>
      <td width="120"><div align="right">No  : </div></td>
            <td><input type="text" class="form-control" name="refNo" value="<?php echo $refNo; ?>" disabled></td>
    </tr>
    <tr><td width="120"><div align="right">Status  : </div></td>
            <td><div class="icon"><span class="ion-ios-arrow-down"></span></div>
                          <select name="refStatus"  id="" class="form-control">
                            <option value="keep">keep</option>
                            <option value="cancel">cancel</option>
                            <option value="confirm">confirm</option>
                          </select>
            </td>
        </tr>
  </thead>
</table>
<br>
      <div class="col-md d-flex">
      <div class="form-group d-flex align-self-stretch">
        <button type="submit" class="btn btn-default btn-md active" style="margin-left:auto;margin-right:auto;display:block;margin-top:5%;margin-bottom:0%" onclick="return confirm('คุณต้องการอัปเดตข้อมูล')">Update Data</button>
      </div>
    </div>
</form>
</div>
<?php
  mysqli_close($conn); // ปิดฐานข้อมูล
  /*echo "<br><br>";
  echo "--- END ---";*/
?>
</body>
</html>