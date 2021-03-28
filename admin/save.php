<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	require('connect.php');

	$AdminID 			  = $_COOKIE['AdminID'];
	$update_ID   		  = $_REQUEST['refNo'];
	$refNo   		  	  = $update_ID;
	$refStatus		  	  = $_REQUEST['refStatus'];

	$sql = "
	UPDATE ref
	SET refStatus = '".$refStatus."', AdminID = '".$AdminID."'
	WHERE refNo = '".$refNo."' ";


	$objQuery = mysqli_query($conn,$sql);

	if ($objQuery) {
	    echo "<script>";
		    echo "alert(\" Record was Updated. \");";
		    echo "window.location='CheckReceipt.php'";
		echo "</script>";
	} else {
	    echo "<script>";
            echo "alert(\" Error : Update \");"; 
            echo "window.location='CheckReceipt.php'";
        echo "</script>";
	}
    mysqli_close($conn); // ปิดฐานข้อมูล
    /*echo "<br><br>";
    echo "--- END ---";*/
?>