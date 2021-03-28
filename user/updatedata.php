<?php
    require('connect.php');

    $update_ID = $_REQUEST['email'];
    $email     = $update_ID;
    $MemberName   = $_REQUEST['MemberName'];
    $MemberSur    = $_REQUEST['MemberSur'];
    $MemberPass    = $_REQUEST['MemberPass'];
    

    $sql = "
    UPDATE member
    SET MemberName = '".$MemberName."', 
    MemberSur = '".$MemberSur."', 
    MemberPass = '".$MemberPass."' 
    WHERE email = '".$email."'
    ";

    $objQuery = mysqli_query($conn,$sql);

    if ($objQuery) {
        echo "Record ".$update_ID." was Updated.";
    } else {
        echo "Error : Update";
    }
    
    mysqli_close($conn); // ปิดฐานข้อมูล*/
    /*echo "<br><br>";
    echo "--- END ---"; */
?>