<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
	<?php 
// connect to db by mysqli
	$serverName = "localhost";
	$userName = "root";
	$userPassword = "44@44";
	$dbName = "mydatabase";
	$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
// end connect to db by mysqli

			// SELECT TO INSERT
			$customer = " SELECT * FROM customer ";
			$Q_customer = mysqli_query($conn,$customer);
			
			// END SELECT TO INSERT


	?>
		<?php 
		
		$CheckBox = $_POST['Ch_INSERT'];
        if(isset($_POST["SAVE"]))
		{
			if(empty($CheckBox) || $CheckBox == 0 ) {	
				echo "Please Select Checkbox after click Save!!!";	
			}else{
				foreach($_POST['Ch_INSERT'] as $i) 
				{
					$INSERT = "INSERT INTO user (UserID,
												UserName,
												Email)
							 VALUES
												('{$_POST['CustomerID'][$i]}',
					 							'{$_POST['Name'][$i]}',
					 							'{$_POST['Email'][$i]}')";
					$Q_INSERT = mysqli_query($conn,$INSERT);										
				}
			}
			if($Q_INSERT)
			{
				echo "<script> alert('SAVE DONE !!!') </script>";
			}
			    
        }
        ?>


<form action="#" name="Frm1" id="Frm1" method="post" enctype="multipart/form-data">
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="7" align="center">PHP MYSQLI INSERT BY CHECKBOX</td>
  </tr>
  <tr>
    <td>CustomerID</td>
    <td>Name</td>
    <td>Email</td>
    <td>CountryCode</td>
    <td>Budget</td>
    <td>Used</td>
    <td>Checkbox</td>
  </tr>
  <?php
  $i = 0; 
  while ($row = mysqli_fetch_array($Q_customer,MYSQLI_ASSOC)) 
  {
  
  ?>
  <tr align="center">
    <td>&nbsp;<input type="text" name="CustomerID[]" id="CustomerID" 
    value="<?php echo $row["CustomerID"]; ?>" />
    </td>
    <td>&nbsp;<input type="text" name="Name[]" id="Name" 
    value="<?php echo $row["Name"]; ?>" />
    </td>
    <td>&nbsp;<input type="text" name="Email[]" id="Email" 
    value="<?php echo $row["Email"]; ?>" />
    </td>
    <td>&nbsp;<input type="text" name="CountryCode[]" id="CountryCode" 
    value="<?php echo $row["CountryCode"]; ?>" />
    </td>
    <td>&nbsp;<input type="text" name="Budget[]" id="Budget" 
    value="<?php echo $row["Budget"]; ?>" />
    </td>
    <td>&nbsp;<input type="text" name="Used[]" id="Used" 
    value="<?php echo $row["Used"]; ?>" />
    </td>
    <td>&nbsp;<input type="checkbox" name="Ch_INSERT[]" id="Ch_INSERT" value="<?php echo $i++; ?>" /></td>   
  </tr>
  <?php } ?>
  <tr>
    <td colspan="7" align="center"><input type="submit" id="SAVE" name="SAVE[]" value="SAVE" /></td>
    
    </tr>
</table>
</form>
</body>
</html>

