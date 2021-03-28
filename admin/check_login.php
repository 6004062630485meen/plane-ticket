<?php
    session_start();
    require('connect.php');
    $AdminID=$_REQUEST["username"];
    $escapedPW = mysqli_real_escape_string($conn,$_REQUEST['pwd']);

    //save this user and pass as cookie if remeber checked start
    if (isset($_REQUEST['remember']))
        $escapedRemember = mysqli_real_escape_string($conn,$_REQUEST['remember']);

        $cookie_time = 60 * 60 * 24 * 30; // 30 days
        $cookie_time_Onset=$cookie_time+ time();
    if (isset($escapedRemember)) {
        /*
         * Set Cookie from here for one hour
         * */
        setcookie("username", $AdminID, $cookie_time_Onset);
        setcookie("pwd", $escapedPW, $cookie_time_Onset);  

    } else {

        $cookie_time_fromOffset=time() -$cookie_time;
        setcookie("username", '',$cookie_time_fromOffset );
        setcookie("pwd", '', $cookie_time_fromOffset);  
    }
      //save this user and pass as cookie if remember checked end


    
    $AdminID = $_POST['username'];
    setcookie("AdminID", $AdminID, time() + (86400 * 30), "/");
    $AdminPass = $_POST['pwd'];
	$sql = " SELECT * FROM admin
    WHERE AdminID = '".$AdminID."'
    and AdminPass = '".$AdminPass."' 
    ";    
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)==1)
	{
        echo "<script>";
            echo "window.location='home_admin.php'";
        echo "</script>";
	    
    }
	else{
        echo "<script>";
            echo "alert(\" Username หรือ Password ไม่ถูกต้อง\");"; 
            echo "window.history.back()";
        echo "</script>";
        
        
    }
    mysqli_close($conn); // ปิดฐานข้อมูล
    /*echo "<br><br>";
    echo "--- END ---";*/     
?>