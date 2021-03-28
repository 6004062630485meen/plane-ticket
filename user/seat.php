<!DOCTYPE HTML>
<?php
	require('connect.php');
	$BasketNo = $_COOKIE['BasketNo'];
    $sql = " SELECT * FROM basket";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        if($row['BasketNo']==$BasketNo) {
          $DepartName   = $row['DepartID'];
          $ArriveName   = $row['ArriveID'];
          $ReturnWay  	= $row['ReturnWay'];
          $Oneway     	= $row['Oneway'];
          $DepartDate 	= $row['DepartDate'];
          $ReturnDate 	= $row['ReturnDate'];
          $Amount     	= $row['Amount'];
          $DepFlightNo	= $row['DepFlightNo'];
   		  $ReFlightNo 	= $row['ReFlightNo'];
   		  $price 		= $row['price'];
        }
      }
    } 
?>
<html>
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>AirAsia.com</title>
		<link rel="stylesheet" type="text/css" href="css1/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css1/bootstrap-responsive.css">
</head>
<body>



<?php
if ($Oneway == 'Yes') {
?>

<div class="alert alert-danger" role="alert">
  PLEASE CHOOSE YOUR SEAT!
</div>
<div class="Depart">
<div class="alert alert-success" role="alert">
								
								<?php

								//echo"<input type='text' class='span3' name=FlightDate value='$DepartDate' readonly/>";

								echo "DEPART DATE&nbsp&nbsp;";
								echo "<input type='text' class='span2' name='DepartDate' value='". $DepartDate ."' readonly/>";
								echo "&nbsp&nbspFLIGHT&nbsp&nbsp";
								echo "<input type='text' class='span2' name='DepFlightNo' value='". $DepFlightNo ."' readonly/>";
								echo "&nbsp&nbspAMOUNT&nbsp&nbsp";
								echo "<input type='text' class='span2' name='amo' value='". $Amount ."' readonly/>";

								
								?>
						
</div>


<?php
	
 	$seats = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

	$sql = 	"select * from passenger where FlightDate = '" . $DepartDate . "' and FlightNo = '".$DepFlightNo."'"; //ต้องมีflignoที่ตรงกัน 
	
	$objQuery = mysqli_query($conn,$sql) or die ("Error Query [".$sql."]");
	
?>


<?php
$k = 1;
while($objResult = mysqli_fetch_array($objQuery))
{
?>
  <tr>
    <td><div align="center"><?php echo $k;?></div></td>
    <td><?php echo $objResult["email"];?></td>
    <td><?php echo $objResult["FlightNo"];?></td>
    <td><?php echo $objResult["seatID"];?></td>
    <td><?php echo $objResult["FlightDate"];?></td>
    <?php 
		$pnr = $objResult['seatID'];  
	
		$seats[$pnr-1] = 1;
?>
  </tr>

<?php
$k++;
}
					 
?>

		<br /><br /><br />
		<div class="container">
			<div class="row well">
				<div class="span10">
					<form action="book.php" method="POST" onsubmit="return validateCheckBox();">
					<input type="hidden" name="BasketNo" value="<?php echo $_POST['BasketNo'];?>"/>
    				<input type="hidden" name="DepartDate" value="<?php echo $DepartDate;?>"/>
    				<input type="hidden" name="ReturnDate" value="<?php echo $ReturnDate;?>"/>
    				<input type="hidden" name="Amount" class="form-control" value="<?php echo $_POST['Amount'];?>"/>
    				<input type="hidden" name="way" value="<?php echo $_POST['way'];?>"/>
    				<input type="hidden" name="price" value="<?php echo $price;?>"/>
    				<input type="hidden" name="DepFlightNo" value="<?php echo $DepFlightNo;?>"/>
    				<input type="hidden" name="ReFlightNo" value="<?php echo $ReFlightNo;?>"/>
						<ul class="thumbnails">
						<?php
						if ( $k < 1 )
							{
								for($i=1; $i<115; $i++)
								{
									
									echo "<li class='span1'>";
										echo "<a href='#' class='thumbnail' title='Available'>";

											echo "<img src='img1/available.png' alt='Available Seat'/>";
											echo "<label class='checkbox'>";
											echo "<input type='checkbox' name='ch".$i."'/>Seat".$i;
										
										echo "</label>";
									echo "</a>";
								echo "</li>";

									if($i==3||$i==9||$i==15||$i==21||$i==27||$i==33||$i==39||$i==45||$i==51||$i==57||$i==63||$i==69||$i==75||$i==81||$i==87||$i==93||$i==99||$i==105||$i==111){
										echo "<li class='span1'>";
										//echo "<a href='#' class='thumbnail' title='Available'>";

											//echo "<img src='img1/occupied.png' alt='Available Seat'/>";
									
										
										echo "</label>";
									echo "</a>";
								echo "</li>";
								
									}					
								}
							}

							else
							{

								for($i=1; $i<115; $i++)
								{
									$j = $i - 1;
									if($seats[$j] == 1)
									{
										echo "<li class='span1'>";
											echo "<a href='#' class='thumbnail' title='Booked'>";
												echo "<img src='img1/occupied.png' alt='Booked Seat'/>";
												echo "<label class='checkbox'>";
													echo "<input type='checkbox' name='ch".$i."' disabled/>Seat".$i;
												echo "</label>";
											echo "</a>";
										echo "</li>";
										if($i==3||$i==9||$i==15||$i==21||$i==27||$i==33||$i==39||$i==45||$i==51||$i==57||$i==63||$i==69||$i==75||$i==81||$i==87||$i==93||$i==99||$i==105||$i==111){
										echo "<li class='span1'>";
										//echo "<a href='#' class='thumbnail' title='Available'>";

											//echo "<img src='img1/occupied.png' alt='Available Seat'/>";
									
										
										echo "</label>";
									echo "</a>";
								echo "</li>";
								
									}

									}
									else
									{
										echo "<li class='span1'>";
											echo "<a href='#' class='thumbnail' title='Available'>";
												echo "<img src='img1/available.png' alt='Available Seat'/>";
												echo "<label class='checkbox'>";
													echo "<input type='checkbox' name='ch".$i."'/>Seat".$i;
												echo "</label>";
											echo "</a>";
										echo "</li>";
											if($i==3||$i==9||$i==15||$i==21||$i==27||$i==33||$i==39||$i==45||$i==51||$i==57||$i==63||$i==69||$i==75||$i==81||$i==87||$i==93||$i==99||$i==105||$i==111){
										echo "<li class='span1'>";
										//echo "<a href='#' class='thumbnail' title='Available'>";

											//echo "<img src='img1/occupied.png' alt='Available Seat'/>";
									
										
										echo "</label>";
									echo "</a>";
								echo "</li>";
								
									}

									}
								}									
								
							}
						?>
						</ul>
						<center>
							
							<br><br>
							<button type="submit" class="btn btn-info">
								<i class="icon-ok icon-white"></i> Submit
							</button>
							<button type="reset" class="btn">
								<i class="icon-refresh icon-black"></i> Clear
							</button>
							<a href="./index.php" class="btn btn-danger"><i class="icon-arrow-left icon-white"></i> Back </a>
						</center>
					</form>
				</div>
			</div>
		</div>

		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script>window.jQuery || document.write('<script src="js1/jquery-latest.min.js">\x3C/script>')</script>
		<script type="text/javascript" src="js1/bootstrap.js"></script>
		<script type="text/javascript">

			
			function validateCheckBox()
			{
				var count=0;			
				var c = document.getElementsByTagName('input');
				for (var i = 0; i < c.length; i++)
				{
					if (c[i].type == 'checkbox')
					{
						
						if (c[i].checked) 
						{
							count++;

							
						}
					}			
					
				}
				if(count == 0)
				{
						alert('Please select at least 1 ticket.');
						return false;
				}
				if(count != $Amount)
				{
						alert('Please checked for Amount');
						return false;
				}
				else{
						return true;
				}
			}

		</script>
</div>

<?php
}
?>




<?php

if ($ReturnWay == 'Yes') {
?>

	<div class="Depart">

<div class="alert alert-danger" role="alert">
  Please choose your seat!
</div>
<div class="Depart">
<div class="alert alert-success" role="alert">
								<?php

								//echo"<input type='text' class='span3' name=FlightDate value='$DepartDate' readonly/>";

								echo "DEPART DATE&nbsp&nbsp;";
								echo "<input type='text' class='span2' name='DepartDate' value='". $DepartDate ."' readonly/>";
								echo "&nbsp&nbspFLIGHT&nbsp&nbsp";
								echo "<input type='text' class='span2' name='DepFlightNo' value='". $DepFlightNo ."' readonly/>";
								echo "&nbsp&nbspAMOUNT&nbsp&nbsp";
								echo "<input type='text' class='span2' name='amo' value='". $Amount ."' readonly/>";
								
						
								?>
</div>

<?php
	
 	$seats = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

	$sql = 	"select * from passenger where FlightDate = '" . $DepartDate . "' and FlightNo = '".$DepFlightNo."'"; //ต้องมีflignoที่ตรงกัน 
	$objQuery = mysqli_query($conn,$sql) or die ("Error Query [".$sql."]");
	
?>

<?php
$k = 1;
while($objResult = mysqli_fetch_array($objQuery))
{
?>
  <tr>
    <td><div align="center"><?php echo $k;?></div></td>
    <td><?php echo $objResult["email"];?></td>
    <td><?php echo $objResult["FlightNo"];?></td>
    <td><?php echo $objResult["seatID"];?></td>
    <td><?php echo $objResult["FlightDate"];?></td>
    <?php 
		$pnr = $objResult['seatID'];  
	
		$seats[$pnr-1] = 1;
?>
  </tr>

<?php
$k++;
}

//echo "$k"-1;					 
?>
		<br /><br /><br />
		<div class="container">
			<div class="row well">
				<div class="span10">
					<form action="book.php" method="POST" onsubmit="return validateCheckBox();">
					<input type="hidden" name="BasketNo" value="<?php echo $_POST['BasketNo'];?>"/>
    				<input type="hidden" name="DepartDate" value="<?php echo $DepartDate;?>"/>
    				<input type="hidden" name="ReturnDate" value="<?php echo $ReturnDate;?>"/>
    				<input type="hidden" name="Amount" class="form-control" value="<?php echo $_POST['Amount'];?>"/>
    				<input type="hidden" name="way" value="<?php echo $_POST['way'];?>"/>
    				<input type="hidden" name="price" value="<?php echo $price;?>"/>
    				<input type="hidden" name="DepFlightNo" value="<?php echo $DepFlightNo;?>"/>
    				<input type="hidden" name="ReFlightNo" value="<?php echo $ReFlightNo;?>"/>
						<ul class="thumbnails">
						<?php
						if ( $k < 1 )
							{
								for($i=1; $i<115; $i++)
								{
									
									echo "<li class='span1'>";
										echo "<a href='#' class='thumbnail' title='Available'>";
											echo "<img src='img1/available.png' alt='Available Seat'/>";
											echo "<label class='checkbox'>";
												echo "<input type='checkbox' name='ch".$i."'/>Seat".$i;
											echo "</label>";
										echo "</a>";
									echo "</li>";		
									if($i==3||$i==9||$i==15||$i==21||$i==27||$i==33||$i==39||$i==45||$i==51||$i==57||$i==63||$i==69||$i==75||$i==81||$i==87||$i==93||$i==99||$i==105||$i==111){
										echo "<li class='span1'>";
										//echo "<a href='#' class='thumbnail' title='Available'>";

											//echo "<img src='img1/occupied.png' alt='Available Seat'/>";
									
										
										echo "</label>";
									echo "</a>";
								echo "</li>";
								
									}						
								}
							}

							else
							{

								for($i=1; $i<115; $i++)
								{
									$j = $i - 1;
									if($seats[$j] == 1)
									{
										echo "<li class='span1'>";
											echo "<a href='#' class='thumbnail' title='Booked'>";
												echo "<img src='img1/occupied.png' alt='Booked Seat'/>";
												echo "<label class='checkbox'>";
													echo "<input type='checkbox' name='ch".$i."' disabled/>Seat".$i;
												echo "</label>";
											echo "</a>";
										echo "</li>";
										if($i==3||$i==9||$i==15||$i==21||$i==27||$i==33||$i==39||$i==45||$i==51||$i==57||$i==63||$i==69||$i==75||$i==81||$i==87||$i==93||$i==99||$i==105||$i==111){
										echo "<li class='span1'>";
										//echo "<a href='#' class='thumbnail' title='Available'>";

											//echo "<img src='img1/occupied.png' alt='Available Seat'/>";
									
										
										echo "</label>";
									echo "</a>";
								echo "</li>";
								
									}
									}
									else
									{
										echo "<li class='span1'>";
											echo "<a href='#' class='thumbnail' title='Available'>";
												echo "<img src='img1/available.png' alt='Available Seat'/>";
												echo "<label class='checkbox'>";
													echo "<input type='checkbox' name='ch".$i."'/>Seat".$i;
												echo "</label>";
											echo "</a>";
										echo "</li>";

										if($i==3||$i==9||$i==15||$i==21||$i==27||$i==33||$i==39||$i==45||$i==51||$i==57||$i==63||$i==69||$i==75||$i==81||$i==87||$i==93||$i==99||$i==105||$i==111){
										echo "<li class='span1'>";
										//echo "<a href='#' class='thumbnail' title='Available'>";

											//echo "<img src='img1/occupied.png' alt='Available Seat'/>";
									
										
										echo "</label>";
									echo "</a>";
								echo "</li>";
								
										}
									}
								}									
								
							}
						?>
						
					
				</div>
			</div>
		</div>

		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script>window.jQuery || document.write('<script src="js1/jquery-latest.min.js">\x3C/script>')</script>
		<script type="text/javascript" src="js1/bootstrap.js"></script>
		<script type="text/javascript">
			
			/*function validateCheckBox()
			{
				
				var count1=0;
				var c1 = document.getElementsByTagName('input');
				for (var i = 0; i < c.length; i++)
				{
					if (c1[i].type == 'checkbox')
					{
						
						if (c1[i].checked) 
						{
							count1++;
							
						}
					}			
					
				}*/
			
		</script>
  </div>

  <div class="Return">

<div class="alert alert-danger" role="alert">
  Please choose your seat!
</div>
<div class="Depart">
<div class="alert alert-success" role="alert">
								<?php

								//echo"<input type='text' class='span3' name=FlightDate value='$DepartDate' readonly/>";

								echo "DEPART DATE&nbsp&nbsp;";
								echo "<input type='text' class='span2' name='ReturnDate' value='". $ReturnDate ."' readonly/>";
								echo "&nbsp&nbspFLIGHT&nbsp&nbsp";
								echo "<input type='text' class='span2' name='ReFlightNo' value='". $ReFlightNo ."' readonly/>";
								echo "&nbsp&nbspAMOUNT&nbsp&nbsp";
								echo "<input type='text' class='span2' name='amo' value='". $Amount ."' readonly/>";
								
						
								?>
</div>

    <?php
	
 	$seats = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

	$sql = 	"select * from passenger where FlightDate = '" . $ReturnDate . "' and FlightNo = '".$ReFlightNo."'"; //ต้องมีflignoที่ตรงกัน 

	$objQuery = mysqli_query($conn,$sql) or die ("Error Query [".$sql."]");
	
?>


<?php
$k = 1;
while($objResult = mysqli_fetch_array($objQuery))
{
?>
  <tr>
    <td><div align="center"><?php echo $k;?></div></td>
    <td><?php echo $objResult["email"];?></td>
    <td><?php echo $objResult["FlightNo"];?></td>
    <td><?php echo $objResult["seatID"];?></td>
    <td><?php echo $objResult["FlightDate"];?></td>
    <?php 
		$pnr = $objResult['seatID'];  
	
		$seats[$pnr-1] = 1;
?>
  </tr>

<?php
$k++;
}

//echo "$k"-1;					 
?>


		<br /><br /><br />
		<div class="container">
			<div class="row well">
				<div class="span10">
					
						<ul class="thumbnails">
						<?php
						if ( $k < 1 )
							{
								for($i=1; $i<115; $i++)
								{
									
									echo "<li class='span1'>";
										echo "<a href='#' class='thumbnail' title='Available'>";
											echo "<img src='img1/available.png' alt='Available Seat'/>";
											echo "<label class='checkbox'>";
												echo "<input type='checkbox' name='rh".$i."'/>Seat".$i;
											echo "</label>";
										echo "</a>";
									echo "</li>";

									if($i==3||$i==9||$i==15||$i==21||$i==27||$i==33||$i==39||$i==45||$i==51||$i==57||$i==63||$i==69||$i==75||$i==81||$i==87||$i==93||$i==99||$i==105||$i==111){
										echo "<li class='span1'>";
										//echo "<a href='#' class='thumbnail' title='Available'>";

											//echo "<img src='img1/occupied.png' alt='Available Seat'/>";
									
										
										echo "</label>";
									echo "</a>";
								echo "</li>";
								
									}								
								}
							}

							else
							{

								for($i=1; $i<115; $i++)
								{
									$j = $i - 1;
									if($seats[$j] == 1)
									{
										echo "<li class='span1'>";
											echo "<a href='#' class='thumbnail' title='Booked'>";

												echo "<img src='img1/occupied.png' alt='Booked Seat'/>";
												echo "<label class='checkbox'>";
													echo "<input type='checkbox' name='rh".$i."' disabled/>Seat".$i;
												

												echo "</label>";
											echo "</a>";
										echo "</li>";

										if($i==3||$i==9||$i==15||$i==21||$i==27||$i==33||$i==39||$i==45||$i==51||$i==57||$i==63||$i==69||$i==75||$i==81||$i==87||$i==93||$i==99||$i==105||$i==111){
										echo "<li class='span1'>";
										//echo "<a href='#' class='thumbnail' title='Available'>";

											//echo "<img src='img1/occupied.png' alt='Available Seat'/>";
									
										
										echo "</label>";
									echo "</a>";
								echo "</li>";
								
									}
									}
									else
									{
										echo "<li class='span1'>";
											echo "<a href='#' class='thumbnail' title='Available'>";
												echo "<img src='img1/available.png' alt='Available Seat'/>";
												echo "<label class='checkbox'>";
													echo "<input type='checkbox' name='rh".$i."'/>Seat".$i;
												echo "</label>";
											echo "</a>";
										echo "</li>";

										if($i==3||$i==9||$i==15||$i==21||$i==27||$i==33||$i==39||$i==45||$i==51||$i==57||$i==63||$i==69||$i==75||$i==81||$i==87||$i==93||$i==99||$i==105||$i==111){
										echo "<li class='span1'>";
										//echo "<a href='#' class='thumbnail' title='Available'>";

											//echo "<img src='img1/occupied.png' alt='Available Seat'/>";
									
										
										echo "</label>";
									echo "</a>";
								echo "</li>";
								
									}
									}
								}									
							}
						?>
						</ul>
						<center>
							
							<br><br>
							<button type="submit" class="btn btn-info">
								Submit
							</button>
							<button type="reset" class="btn">
								 Clear
							</button>
							<a href="./book.php" class="btn btn-danger"><i class="icon-arrow-left icon-white"></i> Back </a>
						</center>
					</form>
				</div>
			</div>
		</div>

		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script>window.jQuery || document.write('<script src="js1/jquery-latest.min.js">\x3C/script>')</script>
		<script type="text/javascript" src="js1/bootstrap.js"></script>
		<script type="text/javascript">
			/*function validateCheckBox()
			{
				
				var count=0;
				var c = document.getElementsByTagName('input');
				for (var i = 0; i < c.length; i++)
				{
					if (c[i].type == 'checkbox')
					{
						
						if (c[i].checked) 
						{
							count++;
							
						}
					}			
					
				}
				if(count == 0)
				{
						alert('Please select at least 1 ticket.');
						return false;
				}
				if(count+count1 != $Amont*2 )
				{
						alert('Please checked for Amont ');
						return false;
				}
				else{
						return true;
				}
			}*/

		</script>
  </div>
<?php
}
?>
</body>
</html>