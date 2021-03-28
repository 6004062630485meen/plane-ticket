

<!DOCTYPE HTML>
<?php
session_start();
	require('connect.php');
	$PassengerName    	 = $_REQUEST['user_name'];
	$PassengerSurname	 = $_REQUEST['suruser_name'];
	$email   			 = $_REQUEST['email'];
	$phoneNum	 		 = $_REQUEST['mobile'];
	$BasketNo 		     = $_POST['BasketNo'];
	$DepartDate 		 = $_POST['DepartDate'];
 	$ReturnDate 		 = $_POST['ReturnDate'];
    $DepFlightNo		 = $_POST['DepFlightNo'];
    $ReFlightNo 		 = $_POST['ReFlightNo'];
    $Amount 			 = $_POST['Amount'];
    $price 				 = $_POST['price'];
    echo $DepFlightNo . "<br>";
    echo $ReFlightNo ;
?>
<HTML>

	<HEAD>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Boot the ticket</title>
		<link rel="stylesheet" type="text/css" href="css1/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css1/bootstrap-responsive.css">
	</HEAD>

	<BODY>

		<br>
		<div class="container">
	        <div class="page-header">
	            <h1>Book the tickets</h1>
	        </div>			
			<?php

					// check for a successful form post
					if (isset($_GET['s'])) 
					{
						echo "<div class=\"alert alert-success\">".$_GET['s']." You will be automatically redirected after 5 seconds.</div>";
//						echo "You will be automatically redirected after 5 seconds.";
						header("refresh: 5; index.php");

					}

					// check for a form error
					elseif (isset($_GET['e'])) echo "<div class=\"alert alert-error\">".$_GET['e']."</div>";

			?> 


			<form name="contactForm" action="inputdataA.php" method="POST" class="form-horizontal">
				<input type="hidden" name="BasketNo" value="<?php echo $_POST['BasketNo'];?>"/>
    			<input type="hidden" name="DepartDate" value="<?php echo $_POST['DepartDate'];?>"/>
    			<input type="hidden" name="ReturnDate" value="<?php echo $_POST['ReturnDate'];?>"/>
    			<input type="hidden" name="Amount" class="form-control" value="<?php echo $_POST['Amount'];?>"/>
   				<input type="hidden" name="way" value="<?php echo $_POST['way'];?>"/>
				<input type="hidden" name="price" value="<?php echo $price;?>"/>
     			<input type="hidden" name="DepFlightNo" value="<?php echo $DepFlightNo;?>"/>
    			<input type="hidden" name="ReFlightNo" value="<?php echo $ReFlightNo;?>"/>

  
	     
				<div class='control-group'>
					
					<div class='controls'>

					<?php 


						for($i=1; $i<116; $i++)
						{

							$chparam = "ch" . strval($i);
							if(isset($_POST[$chparam]))
							{
							

							?>
								</div>
	           					
								<div class="alert alert-secondary" role="alert">
 DEPART
</div>			
								
								<label class='control-label' for='input1'>Seat Numbers depart&nbsp;</label>
							
								<?php
								echo"<input type='text' class='span3' name=seatID".$i." value=".$i." readonly/><br><br>";
								
								?>

								<label class='control-label' for='input1'>departDate&nbsp;</label>
							
								<?php
								
								echo"<input type='text' class='span3' name=FlightDate".$i." value='$DepartDate' readonly/><br><br>";
								?>

								<label class='control-label' for='input1'>Flight&nbsp;</label>
							
								<?php
								
								echo"<input type='text' class='span3' name=FlightNo".$i." value='$DepFlightNo' readonly/><br><br>";
								?>


								<div class="control-group">
								<label class="control-label" for="input1">Contact Number&nbsp;</label>
	                		
	                			
	                			<?php	
								echo"<input type='text' name=phoneNum".$i." pattern='.{10}'' title='Please enter 10 digit no. class='span3' placeholder='Type your mobile number' maxlength='10'><br>";
								?>

								
	           					</div>

	           					<div class="control-group">
	           					<label class="control-label" for="input1">Type your name&nbsp;</label>
	                			

	           					<?php							
								echo "<input type='text' name=PassengerName".$i." id='input1' placeholder='Type your name' class='span3' pattern='[A-z ]{3,}'title='Please enter a valid name.'<br>";
								?>

								</div>
	           					

	           					<div class="control-group">
								<label class="control-label" for="input1">Type your surname&nbsp;</label>
	                			
	                			<?php	

								echo "<input type='text' name=PassengerSurname".$i." id='input1' placeholder='Type your name' class='span3' pattern='[A-z ]{3,}'title='Please enter a valid name.' required ><br>";
								?>
								</div>
	           					
								
	           					<div class="control-group">					
<!--
						<div class="control-group">
	                	<label class="control-label" for="input3">Contact Number</label>
	                	<div class="controls">
	                    <input type="text" name="phoneNum" pattern=".{10}" title="Please enter 10 digit no." class="span3" placeholder="Type your mobile number" maxlength="10" required/>
	                	</div>
	           			</div>

	           			<div class="control-group">
	                <label class="control-label" for="input1">Name</label>
	                <div class="controls">
	                    <input type="text" name="PassengerName" id="input1" placeholder="Type your name" class="span3" pattern="[A-z ]{3,}" title="Please enter a valid name." required>
	                </div>
	            </div>

	            <div class="control-group">
	                <label class="control-label" for="input1">SurName</label>
	                <div class="controls">
	                    <input type="text" name="PassengerSurname" id="input1" placeholder="Type your name" class="span3" pattern="[A-z ]{3,}" title="Please enter a valid name." required>
	                </div>
	            </div>

	             <div class="control-group">
	                <label class="control-label" for="input5">Email ID</label>
	                <div class="controls">
	                    <input type="text" class="span3" placeholder="Type your email id" name="email" pattern="^[a-zA-Z0-9-\_.]+@[a-zA-Z0-9-\_.]+\.[a-zA-Z0-9.]{2,5}$" title="Please enter a valid email id." required/>
	                </div>
	            </div>
-->

							<?php 
							}

						}

					?>

	                </div>
	            	</div>


	            	<div class='control-group'>
					<div class='controls'>
					<?php 

						for($i=1; $i<116; $i++)
						{

							$rhparam = "rh" . strval($i);
							if(isset($_POST[$rhparam]))
							{

								?>
																</div>
	           					
								<div class="alert alert-secondary" role="alert">
 RETURN
</div>
								<label class='control-label' for='input1'>Seat Numbers Return&nbsp;</label>
							
								<?php
								echo"<input type='text' class='span3' name=seatID".$i." value=".$i." readonly/><br><br>";
								
								?>

								<label class='control-label' for='input1'>departDate&nbsp;</label>
							
								<?php
								
								echo"<input type='text' class='span3' name=FlightDate".$i." value='$ReturnDate' readonly/><br><br>";
								?>

								<label class='control-label' for='input1'>Flight&nbsp;</label>
							
								<?php
								
								echo"<input type='text' class='span3' name=FlightNo".$i." value='$ReFlightNo' readonly/><br><br>";
								
								?>


								<div class="control-group">
								<label class="control-label" for="input1">Contact Number&nbsp;</label>
	                		
	                			
	                			<?php	
								echo"<input type='text' name=phoneNum".$i." pattern='.{10}'' title='Please enter 10 digit no. class='span3' placeholder='Type your mobile number' maxlength='10'><br>";
								?>

								
	           					</div>

	           					<div class="control-group">
	           					<label class="control-label" for="input1">Type your name&nbsp;</label>
	                			

	           					<?php							
								echo "<input type='text' name=PassengerName".$i." id='input1' placeholder='Type your name' class='span3' pattern='[A-z ]{3,}'title='Please enter a valid name.'<br>";
								?>

								</div>
	           					

	           					<div class="control-group">
								<label class="control-label" for="input1">Type your surname&nbsp;</label>
	                			
	                			<?php	

								echo "<input type='text' name=PassengerSurname".$i." id='input1' placeholder='Type your name' class='span3' pattern='[A-z ]{3,}'title='Please enter a valid name.' required ><br>";
								?>
								</div>
								<div class="control-group">
<!--
						<div class="control-group">
	                	<label class="control-label" for="input3">Contact Number</label>
	                	<div class="controls">
	                    <input type="text" name="phoneNum" pattern=".{10}" title="Please enter 10 digit no." class="span3" placeholder="Type your mobile number" maxlength="10" required/>
	                	</div>
	           			</div>

	           			<div class="control-group">
	                <label class="control-label" for="input1">Name</label>
	                <div class="controls">
	                    <input type="text" name="PassengerName" id="input1" placeholder="Type your name" class="span3" pattern="[A-z ]{3,}" title="Please enter a valid name." required>
	                </div>
	            </div>

	            <div class="control-group">
	                <label class="control-label" for="input1">SurName</label>
	                <div class="controls">
	                    <input type="text" name="PassengerSurname" id="input1" placeholder="Type your name" class="span3" pattern="[A-z ]{3,}" title="Please enter a valid name." required>
	                </div>
	            </div>

	             <div class="control-group">
	                <label class="control-label" for="input5">Email ID</label>
	                <div class="controls">
	                    <input type="text" class="span3" placeholder="Type your email id" name="email" pattern="^[a-zA-Z0-9-\_.]+@[a-zA-Z0-9-\_.]+\.[a-zA-Z0-9.]{2,5}$" title="Please enter a valid email id." required/>
	                </div>
	            </div>
	-->           
							<?php 
							}

						}

					?>	 

					     

					<?php

						
						/*
							echo "<div class='control-group'>";
							echo "<label class='control-label' for='input1'>Date of Journey DE</label>";
								echo "<div class='controls'>";
									echo "<input type='text' name='journey_date' id='input1' class='span3' value='".$DepartDate."'' readonly/>";
								
								echo "</div>";
							echo "</div>";
						*/

					?>
		

	            <div class="form-actions">
	                <input type="hidden" name="save" value="contact">
					<button type="submit" class="btn btn-info">
						 Book
					</button>
					<button type="reset" class="btn">
						 Clear
					</button>
	            </div>

			</form>
		</div>

		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script>window.jQuery || document.write('<script src="js1/jquery-latest.min.js">\x3C/script>')</script>
		<script type="text/javascript" src="js1/bootstrap.js"></script>
	</BODY>
</HTML>