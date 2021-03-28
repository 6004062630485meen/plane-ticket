<?php
  require('connect.php');

  //echo $_COOKIE["email"] . "<br>";
  //echo htmlspecialchars($_COOKIE["email"]) . "<br>";
  if ($_POST['DepartID'] == $_POST['ArriveID']) {
    echo "<script>";
              echo "alert(\"Destination ไม่ถูกต้อง\");"; 
              echo "window.history.back()";
    echo "</script>";
  }

  //check Depart Date.
  $DepartDate = strtotime($_POST['DepartDate']);
  $current = strtotime(date("Y-m-d"));
  $datediff = $DepartDate - $current;
  $difference1 = floor($datediff/(60*60*24));
  
  if ($_POST['way'] == '2') {
    //check Return Date.
    $ReturnDate = strtotime($_POST['ReturnDate']);
    $datediff = $ReturnDate - $current;
    $difference2 = floor($datediff/(60*60*24));
    if($difference1<0) {
      echo "<script>";
              echo "alert(\" Depart Date ไม่ถูกต้อง\");"; 
              echo "window.history.back()";
      echo "</script>";
    } else if (($difference2 < 0) || ($difference1 > $difference2) ) {
      echo "<script>";
              echo "alert(\" Return Date ไม่ถูกต้อง\");"; 
              echo "window.history.back()";
      echo "</script>";
    }
  } else if ($_POST['way'] == '1') {
    if($difference1<0) {
      echo "<script>";
              echo "alert(\" Depart Date ไม่ถูกต้อง\");"; 
              echo "window.history.back()";
      echo "</script>";
    }
  }

//add record in basket table.
  $email = $_COOKIE["email"];
  $sql2 = "INSERT INTO `basket` (`email`) VALUES ('".$email."'); ";
  if ($conn->query($sql2) === TRUE) {
        $last_id = $conn->insert_id;
  }
  setcookie("BasketNo", $last_id, time() + (86400 * 30), "/");

  //update basket -> DepartID,ArriveID,ReturnWay,Oneway,DepartDate,ReturnDate,Amount.
  $ReturnWay=(($_POST['way'] == 2) ? 'Yes' : 'No');
  $Oneway=(($_POST['way'] == 1) ? 'Yes' : 'No');
  $DepartDate = $_POST['DepartDate'];
  $ReturnDate = $_POST['ReturnDate'];
  $sql = "UPDATE `basket` SET `DepartID`='".$_POST['DepartID']."',`ArriveID`='".$_POST['ArriveID']."',`ReturnWay`='".$ReturnWay."',`Oneway`='".$Oneway."',`DepartDate`='".$DepartDate."',`ReturnDate`='".$ReturnDate."',`Amount`='".$_POST['Amount']."' WHERE `BasketNo`='".$last_id."' ";
  $objQuery = mysqli_query($conn,$sql);
  if ($objQuery) {
    echo "<script>";
        echo "window.location='flight.php'";
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