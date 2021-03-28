<?php
	
	require('connect.php');

	$MemberName       = $_POST['Name_m'];
	$MemberSur		  = $_POST['Surname_m'];
	$email		 	  = $_POST['email'];
	$MemberPass		  = $_POST['password'];

	$sql = "
	INSERT INTO `member` (`email`, `MemberName`, `MemberSur`, `MemberPass`)
	VALUES ('".$email."','".$MemberName."','".$MemberSur."','".$MemberPass."');
	";

	if($conn->query($sql)==TRUE){
        echo "<script>";
        	echo "alert(\"New created account successfully\");";
            echo "window.history.back()";
        echo "</script>";
	} else {
	    echo "<script>";
            echo "alert(\" Email ไม่ถูกต้อง\");"; 
            echo "window.history.back()";
        echo "</script>"; 
	}
	
    mysqli_close($conn); // ปิดฐานข้อมูล
    /*echo "<br><br>";
    echo "--- END ---";*/    

?>