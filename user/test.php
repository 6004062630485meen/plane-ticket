

<?php 
	require('connect.php');
	$text = $_POST['text'];
	$seatID  = $_REQUEST['ch'];
	$PassengerName    = $_REQUEST['user_name'];
	$PassengerSurname	 = $_REQUEST['suruser_name'];
	$email   = $_REQUEST['email'];
	$phoneNum	 = $_REQUEST['mobile'];
	$BasketNo 		= $_POST['BasketNo'];
	$DepartDate 	= $_POST['DepartDate'];
 	$ReturnDate 	= $_POST['ReturnDate'];
    $DepFlightNo	= $_POST['DepFlightNo'];
    $ReFlightNo 	= $_POST['ReFlightNo'];
    $Amount 		= $_POST['Amount'];
    $price 			= $_POST['price'];

 
  if (isset($text)) {
   
    $sql = "";
    for ($i = 1; $i <= count($text); $i++) {
    	
      if ($text[$i] != "") $sql .= "INSERT INTO passenger (email, phoneNum) VALUES ('$email', '$text[$i]'); ";
    };
    echo $sql; //ผลลัพท์ sql เอาไป query
  }
?>