<?php
	ini_set('display_errors', 1);
	error_reporting(~0);
	
	$serverName = "localhost";
	$userName = "root";
	$userPassword = "12345678";
	$dbName = "plane";

	$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);

	$BasketNo = $_COOKIE['BasketNo'];
	for ($i = 1; $i<= 116; $i++){

		$chparam = "seatID".strval($i);

		if(isset($_POST["$chparam"]))
		{
					if($_POST["seatID$i"] != "" && 
					$_POST["PassengerName$i"] != "" &&
					$_POST["PassengerSurname$i"] != "" &&
					$_POST["phoneNum$i"] != "")
			{
				
				$sql = "INSERT INTO `passenger`(`basketno`, `FlightNo`, `phoneNum`, `PassengerName`, `PassengerSurname`, `FlightDate`, `seatID`) VALUES ('".$BasketNo."', '".$_POST["FlightNo$i"]."','".$_POST["phoneNum$i"]."', '".$_POST["PassengerName$i"]."','".$_POST["PassengerSurname$i"]."'
					,'".$_POST["FlightDate$i"]."', '".$_POST["seatID$i"]."')";
				echo $sql;
				//$query = mysqli_query($conn,$sql);

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
			}
		}
	
	}

	$sql1 = " SELECT * FROM basket";
    $result1 = $conn->query($sql1);
    if ($result1->num_rows > 0) {
      while($row1 = $result1->fetch_assoc()) {
        if($row1['BasketNo']==$BasketNo) {
   		  $email 	= $row1['email'];
   		  $Amount 	= $row1['Amount'];
   		  $price 	= ($row1['price'] + ($Amount*50));
        }
      }
    }
    $date = date("Y-m-d h:i:sa");
    $date = strtotime($date . ' + 2 day');
    $dueDate = date("Y-m-d h:i",$date);
	$sql2 = "INSERT INTO ref (`email`, `BasketNo`, `dueDate`, `fare`, paymentStatus, refStatus)
	VALUES ('".$email."', '".$BasketNo."', '".$dueDate."', '".$price."', 'No', 'keep')";

	if (mysqli_query($conn, $sql2)) {
	    $last_refNo = mysqli_insert_id($conn);
	    echo "New record created successfully. Last inserted ID is: " . $last_refNo;
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	setcookie("refNo", $last_refNo, time() + (86400 * 30), "/");
	mysqli_close($conn);
	echo "<script>";
        echo "window.location='bill.php'";
    echo "</script>";
?>








