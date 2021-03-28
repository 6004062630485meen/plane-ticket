<?php
	require('connect.php');
	$sql = "UPDATE ref 
	SET paymentStatus='Yes' 
	WHERE payDate!='0000-00-00' 
	AND paymentStatus='No'
	AND refStatus!='cancel'"
	;

	$objQuery = mysqli_query($conn,$sql);

	if ($objQuery) {
	    echo "<script>";
		    echo "alert(\" Record was Updated. \");";
		    echo "window.location='CheckPayment.php'";
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