<!DOCTYPE html>
<?php
  require('connect.php');
  $BasketNo = $_COOKIE['BasketNo'];
  $sql = " SELECT BasketNo, DepartID, ArriveID, ReturnWay, Oneway, DepartDate, ReturnDate, Amount FROM basket";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      if($row['BasketNo']==$BasketNo) {
        $DepartName   = $row['DepartID'];
        $ArriveName   = $row['ArriveID'];
        $ReturnWay  = $row['ReturnWay'];
        $Oneway     = $row['Oneway'];
        $DepartDate = $row['DepartDate'];
        $ReturnDate = $row['ReturnDate'];
        $Amount     = $row['Amount'];
      }
    }
  }
  //find $difference1 and $difference2.
  $departdate = strtotime($DepartDate);
  $current = strtotime(date("Y-m-d"));
  $datediff = $departdate - $current;
  $difference1 = floor($datediff/(60*60*24));
  $returndate = strtotime($ReturnDate);
  $datediff = $returndate - $current;
  $difference2 = floor($datediff/(60*60*24));

  //update flightNo and aroundNo.
  session_start();
  if(isset($_POST["add_depflight"])) {
    $sql = "UPDATE basket 
    SET DepFlightNo='".$_REQUEST["FlightNo"]."', DepAroundNo='".$_REQUEST["AroundNo"]."'
    WHERE BasketNo='".$BasketNo."' ";
    $objQuery = mysqli_query($conn,$sql);
    if ($objQuery) {
      echo "<script>";
          echo "window.history.back()'";
      echo "</script>";
    } else {
      echo "<script>";
          echo "alert(\" Error : Update \");"; 
          echo "window.history.back()";
      echo "</script>";
    }
  } else if (isset($_POST["add_reflight"])) {
    $sql = "UPDATE basket 
    SET ReFlightNo='".$_REQUEST["FlightNo"]."', ReAroundNo='".$_REQUEST["AroundNo"]."'
    WHERE BasketNo='".$BasketNo."' ";
    $objQuery = mysqli_query($conn,$sql);
    if ($objQuery) {
      echo "<script>";
          echo "window.history.back()'";
      echo "</script>";
    } else {
      echo "<script>";
          echo "alert(\" Error : Update \");"; 
          echo "window.history.back()";
      echo "</script>";
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
  .head1 {
    padding-left: 40px;
    padding-top: 50px;
    font-size: 40px;
    font-weight: bold;
  }
  .head2 {
    padding-left: 40px;
    padding-top: 100px;
    font-size: 40px;
    font-weight: bold;
  }
  .dep {
    clear:both;
    border: 1px solid gainsboro;
    padding: 30px;
    margin: 40px;
    float:top;
    width:95%;
  }
  .date {
    text-align: center;
    color: red;
  }
  .button {
  display: inline-block;
  border-radius: 12px;
  background-color: #555555;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 30px;
  width: 300px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
  }
  </style>
  <body>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div class="Depart">
    <h1 class="head1">Depart  <small><?php echo $DepartName . " - " . $ArriveName . "<br>";?></small></h1>
    <?php $d1=strtotime($DepartDate);?>
    <h2 class="date"><?php echo date("l", $d1) . ", " . date("d", $d1) . " " . date("M", $d1) . "<br>";?></h2>
    
    
<?php

  $sql = "SELECT AirportID, AirportName FROM airport";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
         if($DepartName == $row["AirportName"]) {
            $DepartID = $row["AirportID"];
         }
         if($ArriveName == $row["AirportName"]) {
            $ArriveID = $row['AirportID'];
         }
         
        }
    }

  $i = 0;
  $t=strtotime("+6 Hours");
  $t=date("h:i:sa", $t);
?>
<?php
  $sql = 'SELECT * FROM flight';
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      if($DepartID == $row["DepartID"] && $ArriveID == $row["ArriveID"]){
        $sql2 = 'SELECT * FROM around';
        $result2 = $conn->query($sql2);
        if ($result2->num_rows > 0) {
          while($row2 = $result2->fetch_assoc()) {
            if( ($difference1==0 && $row["AroundNo"] == $row2["AroundNo"] && strtotime($t) < strtotime($row2["DepartTime"])) || ($difference1>0 && $row["AroundNo"] == $row2["AroundNo"]) ) {
?>
    <div class="dep">
      <form method="post" action="flight.php?action=add&FlightNo=<?php echo $row['FlightNo'];?>">
      <table border="0">
      <tr>
        <th width="120"> <div align="center"><h2><?php echo $row2["DepartTime"];?></h2></div></th>
        <th width="50"> <div align="center"><i class='fas fa-plane' style='color:red'></i></div></th>
        <th width="200"> <div align="center"><hr></div></th>
        <th width="50"> <div align="center"><i class='fas fa-map-marker-alt' style='color:red'></i></div></th>
        <th width="120"> <div align="center"><h2><?php echo $row2["ArriveTime"];?></h2></div></th>
        <th width="150"></th>
        <th width="600"> <div align="center"><a href="update.php?FlightNo=<?php echo $row["FlightNo"];?>"><button class="button" name="add_depflight" style="vertical-align:middle"><?php echo number_format($row["price"],2);?> THB</button></a></div></th>
      </tr>
      <tr>
        <td><div class="date" align="center"><?php echo $row2["period"] . "h " . "00m ";?><i class="fa fa-info-circle" style='color:red'></i></div></td>
        <td></td>
        <td></td>
        <td></td>
        <td><div class="date" align="center">Direct</div></td>
        <td></td>
        <td></td>
      </tr>
      </table>


      <input type="hidden" name="AroundNo" value="<?php echo $row['AroundNo'];?>"/>
      </form>
    </div>
<?php
            $i = 1;
            }
          }
        }
      }
         
    }
  }
  if ($i == 0) {
?>
    <div class="dep">
    <h3>No flights :(</h3>
    <p>We don’t have any flights on this date. Try selecting another date.</p>
    <p>Who knows? You might just find a great deal.</p>
    </div>
<?php
  }
?>
</div>

<?php
  if ($ReturnWay == 'Yes') {
?>
<div class="Return">
    <h1 class="head2">Return  <small><?php echo $ArriveName . " - " . $DepartName . "<br>";?></small></h1>
    <?php $d2=strtotime($ReturnDate);?>
    <h2 class="date"><?php echo date("l", $d2) . ", " . date("d", $d2) . " " . date("M", $d2) . "<br>";?></h2>
    
    
<?php
  $i = 0;
  $t=strtotime("+10 Hours");
  $t=date("h:i:sa", $t);


  $sql = 'SELECT * FROM flight';
  $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        if($DepartID == $row["ArriveID"] && $ArriveID == $row["DepartID"]) {
          $sql2 = 'SELECT * FROM around';
          $result2 = $conn->query($sql2);
          if ($result2->num_rows > 0) {
            while($row2 = $result2->fetch_assoc()) {
            if( ($row["AroundNo"] == $row2["AroundNo"] && $difference2>0) || ($row["AroundNo"] == $row2["AroundNo"] && $difference2==0 && strtotime($t) < strtotime($row2["DepartTime"])) ) {
?>
    <div class="dep">
      <form method="post" action="flight.php?action=add&FlightNo=<?php echo $row['FlightNo'];?>">
      <table border="0">
      <tr>
        <th width="120"> <div align="center"><h2><?php echo $row2["DepartTime"];?></h2></div></th>
        <th width="50"> <div align="center"><i class='fas fa-plane' style='color:red'></i></div></th>
        <th width="200"> <div align="center"><hr></div></th>
        <th width="50"> <div align="center"><i class='fas fa-map-marker-alt' style='color:red'></i></div></th>
        <th width="120"> <div align="center"><h2><?php echo $row2["ArriveTime"];?></h2></div></th>
        <th width="150"></th>
        <th width="600"> <div align="center"><a href="update.php?FlightNo=<?php echo $row["FlightNo"];?>"><button class="button" name="add_reflight" style="vertical-align:middle"><?php echo number_format($row["price"],2);?> THB</button></a></div></th>
      </tr>
      <tr>
        <td><div class="date" align="center"><?php echo $row2["period"] . "h " . "00m ";?><i class="fa fa-info-circle" style='color:red'></i></div></td>
        <td></td>
        <td></td>
        <td></td>
        <td><div class="date" align="center">Direct</div></td>
        <td></td>
        <td></td>
      </tr>
      </table>

      

      <input type="hidden" name="AroundNo" value="<?php echo $row['AroundNo'];?>"/>
      </form>
    </div>
<?php
             $i = 1;
            }
          }
        }
      }
         
    }
  }
  if ($i == 0) {
?>
    <div class="dep">
    <h3>No flights :(</h3>
    <p>We don’t have any flights on this date. Try selecting another date.</p>
    <p>Who knows? You might just find a great deal.</p>
    </div>
<?php
  }
}
?>
</div>
<br><br><br><br><br>
<style>
  body {margin:0;}
  ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #23272b;
  position: fixed;
  bottom: 0;
  width: 100%;
  height: 12%;
  }

  li {
    float: left;
  }

  li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
  }
  .continue {
  position: relative;
  background-color: #FF0000;
  border: none;
  font-size: 28px;
  color: #FFFFFF;
  padding: 20px;
  width: 320px;
  text-align: center;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  text-decoration: none;
  overflow: hidden;
  cursor: pointer;
  border-radius: 12px;
}

.continue:after {
  content: "";
  background: #f1f1f1;
  display: block;
  position: absolute;
  padding-top: 300%;
  padding-left: 350%;
  margin-left: -20px !important;
  margin-top: -120%;
  opacity: 0;
  transition: all 0.5s
}

.continue:active:after {
  padding: 0;
  margin: 0;
  opacity: 1;
  transition: 0s
}
</style>
<?php
  $total = 0;
  $sql = 'SELECT * FROM basket';
  $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        if($BasketNo == $row["BasketNo"]) {
          $sql2 = 'SELECT * FROM flight';
          $result2 = $conn->query($sql2);
          if ($result2->num_rows > 0) {
            while($row2 = $result2->fetch_assoc()) {
            if( ($row["DepFlightNo"] == $row2["FlightNo"]) || ($row["ReFlightNo"] == $row2["FlightNo"]) ) {
              $total+=($row2["price"]*$row["Amount"]);}
            }
          }
        }
      }
    }
  //update price.
  $sql = "UPDATE `basket` SET `price`='".$total."' WHERE `BasketNo`='".$BasketNo."'";
  $objQuery = mysqli_query($conn,$sql);

    if ($objQuery) {
      /*echo "<script>";
         echo "alert(\" Update price successfully\");"; 
      echo "</script>";*/
    } else {
      echo "<script>";
          echo "alert(\" Error : Update price \");"; 
      echo "</script>";
    }
?>
    <form action="seat.php" method="post">
    <ul>
      <br>
      <li><div width="120"  align="center" style='color:white'><h2>&nbsp&nbspTotal&nbsp</h2></div></li>
      <li><div width="120"  align="center" style='color:white'><h2>THB&nbsp&nbsp&nbsp</h2></div></li>
      <li><div width="120"  align="center" style='color:white'><h2><?php echo number_format($total,2)  . "&nbsp&nbsp&nbsp";?></h2></div></li>
      <li><div width="120" align="center"><h2><i class="fa fa-cart-arrow-down" style='color:white'></i></h2></div></li>
      <li style="float:right"><div width="120" align="center"><button style="height:70px;" class="continue">Continue</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div></li>
    </ul>
    </form>
    
<?php
  mysqli_close($conn); // ปิดฐานข้อมูล
?>
  </body>
</html>