<!DOCTYPE html>
<html lang="en">
<head>
  <title>CheckPayment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <style>
  #t1 {
    padding-top: 35px;
  }
  h2 {
    font-size: 35px;
    font-weight: bold;
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

<div id="t1" class="w3-container">
  <h2><div align="center">ตรวจสอบสถานะการชำระเงิน</div></h2><br>
<?php
  require('connect.php');

  $sql = '
    SELECT * 
    FROM ref
    WHERE refStatus!="cancel";
    ';

  $objQuery = mysqli_query($conn,$sql) or die ("Error Query [".$sql."]");
?>
<table class="w3-table-all, w3-table-all w3-card-4">
  <thead>
    <tr class="w3-red">
      <th width="80"> <div align="center">No.</div></th>
      <th width="150"> <div align="center">ผู้จอง</div></th>
      <th width="30"> <div align="center">BasketNo.</div></th>
      <th width="100"> <div align="center">วันจอง</div></th>
      <th width="100"> <div align="center">วันครบกำหนด</div></th>
      <th width="100"> <div align="center">วันที่ชำระเงิน</div></th>
      <th width="150"> <div align="center">ค่าโดยสาร</div></th>
      <th width="80"> <div align="center">Status</div></th>
      <th width="50"> <div align="center">Edit </div></th>
    </tr>
  </thead>
<?php
$i = 1;
while($objResult = mysqli_fetch_array($objQuery))
{
?>
  <tr>
    <td><div align="center"><?php echo $objResult["refNo"];?></div></td>
    <td><div align="center"><?php echo $objResult["email"];?></div></td>
    <td><div align="center"><?php echo $objResult["BasketNo"];?></td>
    <td><div align="center"><?php echo $date = date('Y-m-d', strtotime($objResult["BookingDate"]));?></div></td>
    <td><div align="center"><?php echo $date = date('Y-m-d', strtotime($objResult["dueDate"]));?></div></td>
    <td><div align="center"><?php echo ($objResult["payDate"]=="0000-00-00") ? "Not paid" : $objResult["payDate"];?></div></td>
    <td><div align="center"><?php echo number_format($objResult["fare"],2);?> THB</div></td>
    <td><div align="center"><?php echo $objResult["paymentStatus"];?></div></td>
    <td><div align="center"><a href="editpaid.php?refNo=<?php echo $objResult["refNo"];?>">Edit</a></div></td>
  </tr>
<?php
$i++;
}
?>
</table>
<?php
  mysqli_close($conn); // ปิดฐานข้อมูล
  /*echo "<br><br>";
  echo "--- END ---";*/
?>
</div>

</body>
</html>