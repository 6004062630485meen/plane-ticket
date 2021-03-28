<?php
    session_start();
    require('connect.php');
    $email      = $_REQUEST['email'];
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
        setcookie("email", $email, $cookie_time_Onset);
        setcookie("pwd", $escapedPW, $cookie_time_Onset);  

    } else {

        $cookie_time_fromOffset=time() -$cookie_time;
        setcookie("email", '',$cookie_time_fromOffset );
        setcookie("pwd", '', $cookie_time_fromOffset);  
    }
      //save this user and pass as cookie if remember checked end

    $MemberPass = $_REQUEST['pwd'];
    setcookie("email", $email, time() + (86400 * 30), "/");
    $sql = " SELECT * FROM `member`
    WHERE `email` = '".$email."'
    and `MemberPass` = '".$MemberPass."' 
    ";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)==1)
    {
        echo "<script>";
            echo "window.location='searchflight.php'";
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