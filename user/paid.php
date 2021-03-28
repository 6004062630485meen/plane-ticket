<?php
  require('connect.php');

  //update ref -> paymentStatus.
  $refNo = $_COOKIE['refNo'];
  $date = date("Y-m-d");
  $sql = "UPDATE `ref` SET `payDate`='".$date."', `paymentStatus`='Yes' WHERE `refNo`='".$refNo."' ";
  $objQuery = mysqli_query($conn,$sql);
  if ($objQuery) {
    echo "<script>";
        echo "window.location='searchflight.php'";
    echo "</script>";
  } else {
    echo "<script>";
        echo "alert(\" Error : Update \");"; 
        echo "window.history.back()";
    echo "</script>";
  }
  mysqli_close($conn); // ปิดฐานข้อมูล
  /*echo "<br><br>";
  echo "--- END ---";*/
?>