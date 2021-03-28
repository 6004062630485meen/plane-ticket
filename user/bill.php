<!DOCTYPE html>
<?php
  require('connect.php');
  $BasketNo = $_COOKIE['BasketNo'];
  $sql = " SELECT * FROM basket";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      if($row['BasketNo']==$BasketNo) {
        $email        = $row['email'];
        $DepartName   = $row['DepartID'];
        $ArriveName   = $row['ArriveID'];
        $ReturnWay    = $row['ReturnWay'];
        $Oneway       = $row['Oneway'];
        $DepartDate   = $row['DepartDate'];
        $ReturnDate   = $row['ReturnDate'];
        $Amount       = $row['Amount'];
        $DepFlightNo  = $row['DepFlightNo'];
        $ReFlightNo   = $row['ReFlightNo'];
        $DepAroundNo  = $row['DepAroundNo'];
        $ReAroundNo   = $row['ReAroundNo'];
        $price        = $row['price'];
      }
    }
  }

  $refNo = $_COOKIE['refNo'];
  $sql = " SELECT * FROM ref";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      if($row['refNo']==$refNo) {
        $BookingDate   = $row['BookingDate'];
        $fare         = $row['fare'];
      }
    }
  }

  $sql = "SELECT * FROM `member`";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      if($row['email']==$email) {
        $MemberName   = $row['MemberName'];
        $MemberSur    = $row['MemberSur'];
      }
    }
  }
?>
<html>
  <head>
    <meta charset="utf-8" name='viewport' content='width=device-width, initial-scale=1'>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <title>AirAsia.com</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<nav class="navbar navbar-expand-sm justify-content-center bg-dark navbar-dark fixed-top">
   <!-- Brand/logo -->
  <a class="navbar-brand">
    <img src="1024px-AirAsia_New_Logo.png" alt="logo" style="width:70px;">
  </a>
</nav> 
  </head>
  <style>
  .booking {
    font-size: 40px;
    font-weight: bold;
    color: red;
    font-family: cursive;
  }
  .flight {
    font-size: 40px;
    font-weight: bold;
    color: red;
    font-family: cursive;
  }
  .details {
    clear:both;
    border: 1px solid gainsboro;
    padding: 30px;
    margin: 40px;
    float:top;
    width:95%;
    font-family: "Apple Chancery", cursive;/*"Lucida Sans Unicode", sans-serif;*/
  }
  .detailsflight {
    clear:both;
    padding: 30px;
    margin: 40px;
    float:top;
    width:95%;
    font-family: "Apple Chancery", cursive;
  }
  input {
    border-radius: 3px;
    padding-top: 1px;
    transition: none;
    -webkit-transition: none;
    padding: 0 15px;
    box-shadow: none;
    font-size: 15px;
    line-height: 16px;
    border: 1px solid #dedede;
    font-weight: normal;
    color: #484848;
    width: 20%;
    outline: none;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
  }

  input[type="submit"] {
    height: 70px;
    font-size: 21px;
    border-radius: 12px;
  }

  .inputRow {
    padding: 6px 0;
    margin-bottom: 8px;
    overflow: auto;
  }

  .inputRow.submit {
    margin-top: 10px;
  }

  .inputRow .submit {
    color: #fff;
    background: #ff0000;
    border-color: #ff0000;
    font-weight: bold;
    cursor: pointer;
  }

  .inputRow .submit:hover {
    background: #D14743;
  }
  </style>
  <body>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Booking Details -->
    <div class="details">
      <div class="booking"><h2>Booking Details</h2></div>
      <table border="0">
      <tr>
        <th width="200"> <div align="left"><h4>Booking Date</h4></div></th>
        <th width="50"> <div align="center"><br></div></th>
        <th width="50"> <div align="center"><h4>:</h4></div></th>
        <?php $d1=strtotime($BookingDate);?>
        <th width="200"> <div align="left"><h4><?php echo date("D", $d1) . " " . date("d", $d1) . " " . date("M", $d1) . " " . date("Y", $d1);?></h4></div></th>
      </tr>
      <tr>
        <th width="200"> <div align="left"><h4>Name</h4></div></th>
        <th width="50"> <div align="center"><br></div></th>
        <th width="50"> <div align="center"><h4>:</h4></div></th>
        <th width="200"> <div align="left"><h4><?php echo $MemberName . " " . $MemberSur;?></h4></div></th>
      </tr>
      <tr>
        <th width="200"> <div align="left"><h4>Email</h4></div></th>
        <th width="50"> <div align="center"><br></div></th>
        <th width="50"> <div align="center"><h4>:</h4></div></th>
        <th width="200"> <div align="left"><h4><?php echo $email;?></h4></div></th>
      </tr>
      <tr>
        <th width="200"> <div align="left"><h4>Amount</h4></div></th>
        <th width="50"> <div align="center"><br></div></th>
        <th width="50"> <div align="center"><h4>:</h4></div></th>
        <th width="200"> <div align="left"><h4 style="font-family:Lucida Fax,serif;font-weight:bold;color:black;"><?php echo number_format($fare,2);?> THB</h4></div></th>
      </tr>
      </table>
    </div>

    <!-- Flight Details -->
    <div class="detailsflight">
      <div class="flight"><h2>Flight Details</h2></div>

      <!-- Depart -->
      <div class="Depart">
      <h2><small>Depart</small></h2>
<?php
$sql0 = "SELECT * FROM `passenger` ORDER BY `seatID`";
$result0 = $conn->query($sql0);
  if ($result0->num_rows > 0) {
    while($row0 = $result0->fetch_assoc()) {
      if( $row0['basketno']==$BasketNo && $DepFlightNo == $row0["FlightNo"] ){
      $sql1 = 'SELECT * FROM flight';
      $result1 = $conn->query($sql1);
      if ($result1->num_rows > 0) {
        while($row1 = $result1->fetch_assoc()) {
          $sql2 = 'SELECT * FROM around';
          $result2 = $conn->query($sql2);
          if ($result2->num_rows > 0) {
            while($row2 = $result2->fetch_assoc()) {
              if( ( $DepFlightNo == $row1["FlightNo"] && $DepAroundNo  == $row2["AroundNo"]) ) {
?>

      <div class="details">
        <div align="left"><h3><?php echo $row0['PassengerName']. " " . $row0['PassengerSurname'];?></h3></div>
      <table border="0">
      <tr>
        <th width="100"> <div align="left"><h3><small>Flight No.</small></h3></div></th>
        <th width="50"> <div align="center"></div></th>
        <th width="100"> <div align="left"><h3><?php echo "FD ". $row0["FlightNo"];?></h3></div></th>
        <th width="50"> <div align="center"></div></th>
        <th width="120"> <div align="left"><h3><small>Depart</small></h3>
<?php
  $sql3 = "SELECT * FROM `airport`";
  $result3 = $conn->query($sql3);
  if ($result3->num_rows > 0) {
    while($row3 = $result3->fetch_assoc()) {
      if($row3['AirportName']==$DepartName) {
        $AirportName       = $row3['AirportName'];
        $AirportAddress    = $row3['AirportAddress'];
      }
    }
  }
?>
        <th width="350"> <div align="left"><h3><?php echo $AirportAddress . " - " . $AirportName;?></h3></div></th>
        <th width="30"> <div align="center"></div></th>
        <th width="100"> <div align="left"><h3><small>Departure Date</small></h3>
        <?php $d=strtotime($DepartDate);?>
        <th width="150"> <div align="left"><h3><?php echo date("d", $d) . " " . date("M", $d) . " " . date("y", $d);?></h3></div></th>
      </tr>
      <tr>
        <th width="100"> <div align="left"><h3><small>Seat No.</small></h3></div></th>
        <th width="50"> <div align="center"></div></th>
        <th width="100"> <div align="left"><h3><?php echo $row0['seatID'];?></h3></div></th>
        <th width="50"></div></th>
        <th width="120"> <div align="left"><h3><small>Arrive</small></h3>
<?php
  $sql3 = "SELECT * FROM `airport`";
  $result3 = $conn->query($sql3);
  if ($result3->num_rows > 0) {
    while($row3 = $result3->fetch_assoc()) {
      if($row3['AirportName']==$ArriveName) {
        $AirportName       = $row3['AirportName'];
        $AirportAddress    = $row3['AirportAddress'];
      }
    }
  }
?>
        <th width="350"> <div align="left"><h3><?php echo $AirportAddress . " - " . $AirportName;?></h3></div></th>
        <th width="30"> <div align="center"></div></th>
        <th width="100"> <div align="left"><h3><small>Time</small></h3>
        <?php $t=strtotime($row2['DepartTime']);?>
        <th width="150"> <div align="left"><h3><?php echo date("h:i", $t);?></h3></div></th>
      </tr>
      </table>
      </div>
<?php
              }
            }
          }
             
        }
      }
      }
    }
  }
?>
      </div>

<?php
  if ($ReturnWay == 'Yes') {
?>
      <!--Return -->
      <div class="Return">
      <h2><small>Return</small></h2>
<?php
$sql0 = "SELECT * FROM `passenger` ORDER BY `seatID`";
$result0 = $conn->query($sql0);
  if ($result0->num_rows > 0) {
    while($row0 = $result0->fetch_assoc()) {
      if( $row0['basketno']==$BasketNo && $ReFlightNo == $row0["FlightNo"] ){
      $sql1 = 'SELECT * FROM flight';
      $result1 = $conn->query($sql1);
      if ($result1->num_rows > 0) {
        while($row1 = $result1->fetch_assoc()) {
          $sql2 = 'SELECT * FROM around';
          $result2 = $conn->query($sql2);
          if ($result2->num_rows > 0) {
            while($row2 = $result2->fetch_assoc()) {
              if( $ReAroundNo == $row2["AroundNo"] && $ReFlightNo == $row1["FlightNo"] ) {
?>

      <div class="details">
        <div align="left"><h3><?php echo $row0['PassengerName']. " " . $row0['PassengerSurname'];?></h3></div>
      <table border="0">
      <tr>
        <th width="100"> <div align="left"><h3><small>Flight No.</small></h3></div></th>
        <th width="50"> <div align="center"></div></th>
        <th width="100"> <div align="left"><h3><?php echo "FD ". $row0["FlightNo"];?></h3></div></th>
        <th width="50"> <div align="center"></div></th>
        <th width="120"> <div align="left"><h3><small>Depart</small></h3>
<?php
  $sql3 = "SELECT * FROM `airport`";
  $result3 = $conn->query($sql3);
  if ($result3->num_rows > 0) {
    while($row3 = $result3->fetch_assoc()) {
      if($row3['AirportName']==$ArriveName) {
        $AirportName       = $row3['AirportName'];
        $AirportAddress    = $row3['AirportAddress'];
      }
    }
  }
?>
        <th width="350"> <div align="left"><h3><?php echo $AirportAddress . " - " . $AirportName;?></h3></div></th>
        <th width="30"> <div align="center"></div></th>
        <th width="100"> <div align="left"><h3><small>Departure Date</small></h3>
        <?php $d=strtotime($ReturnDate);?>
        <th width="150"> <div align="left"><h3><?php echo date("d", $d) . " " . date("M", $d) . " " . date("y", $d);?></h3></div></th>
      </tr>
      <tr>
        <th width="100"> <div align="left"><h3><small>Seat No.</small></h3></div></th>
        <th width="50"> <div align="center"></div></th>
        <th width="100"> <div align="left"><h3><?php echo $row0['seatID'];?></h3></div></th>
        <th width="50"></div></th>
        <th width="120"> <div align="left"><h3><small>Arrive</small></h3>
<?php
  $sql3 = "SELECT * FROM `airport`";
  $result3 = $conn->query($sql3);
  if ($result3->num_rows > 0) {
    while($row3 = $result3->fetch_assoc()) {
      if($row3['AirportName']==$DepartName) {
        $AirportName       = $row3['AirportName'];
        $AirportAddress    = $row3['AirportAddress'];
      }
    }
  }
?>
        <th width="350"> <div align="left"><h3><?php echo $AirportAddress . " - " . $AirportName;?></h3></div></th>
        <th width="30"> <div align="center"></div></th>
        <th width="100"> <div align="left"><h3><small>Time</small></h3>
        <?php $t=strtotime($row2['DepartTime']);?>
        <th width="150"> <div align="left"><h3><?php echo date("h:i", $t);?></h3></div></th>
      </tr>
      </table>
      </div>
<?php
              }
            }
          }
             
        }
      }
      }
    }
  }
?>
      </div>
<?php
  }
?>
    </div>

    <!-- Barcode -->
    <div align="center">
      <?php $d2 = strtotime($BookingDate . ' + 2 day');?>
      <h4>Please make the payment by <big style="font-weight:bold;color:red;"><?php echo date("d M Y \, D h:i A", $d2);?></big> or This counter service reference number will no longer be valid after that.</h4>
      <img src="barcode.png" alt="Barcode" style="width:350px;height:250px;">
    </div>
    
    <!-- Submit -->
    <div class="inputRow submit" align="center">
      <form method="post" action="paid.php?refNo=<?php echo $refNo;?>">
      <input type="submit" value="submit" class="submit">
      </form>
    </div>

<?php
  mysqli_close($conn); // ปิดฐานข้อมูล
?>
  </body>
</html>