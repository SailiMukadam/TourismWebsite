<?php
session_start();
include 'dbconfig.php';

//creating variables to help checking if the information field of sign up form is empty
//variables that will hold the status of the signup process

$action = array(); //defined an array called action
$action="success"; //setting array action value, result will hold either success or error

//***Done Defining Variables for signup status***


if (isset($_POST['btn-signup'])) 
{
	//Preventing user from Injecting mySQL and get access to database
	
	$fullname= mysqli_real_escape_string($db,$_POST['fullname']);
	$uname= mysqli_real_escape_string($db,$_POST['uname']);
	$email= mysqli_real_escape_string($db,$_POST['email']);
	$pass= mysqli_real_escape_string($db,$_POST['pass']);
		
	//***Done Preventing Access***

	//checking if any required information field has left empty or not
	
	if (empty($fullname)) 
	{
		$action="error";
	}
	if (empty($uname)) 
	{
		$action="error";
	}
	if (empty($email)) 
	{
		$action="error";
	}
	if (empty($pass)) 
	{
		$action="error";
	}

	
	if ($action!="success")
	{
		# code...
		?>
		<script> alert('Please Fill Up All The Fields Properly');</script>
		<?php
	}
	//***Done Checking Field Informations***

	//***Checking if The Informations are overlapped or not***

	if ($action=="success") 
	{
		$chk="SELECT  user_name FROM users WHERE user_name='$uname'";
		$query=mysqli_query($db,$chk);
		$rc=mysqli_num_rows($query);

		if($rc>0)
		{
			?>
			<script> alert('User Name Already Exists!!!');</script>
			<?php
			$action="error";
		}
		$chk="SELECT  user_email FROM users WHERE user_email='$email'";
		$query=mysqli_query($db,$chk);
		$rc=mysqli_num_rows($query);
		if($rc>0)
		{
			?>
			<script> alert('Email Already Exists!!!');</script>
			<?php
			$action="error";
		}
	}
	//***Done Checking Overlapped Information

	//***Confirming No Errors & moving to SignUp the User***

	if ($action!="error") 
	{
		$pass=md5($pass);
		$add=$db->query("INSERT INTO users(name,user_name,user_email,user_pass) VALUES('$fullname','$uname','$email','$pass')");
	}
	

	//***Adding the User into the Database**
	if($action!="error")
	{
	if ($add) 
	{
		?>
			<script>alert('You have been successfully Registered');</script>

		<?php
	}
	else if($action!="success")
	{
		?>
			<script>alert('Error While Registering You');</script>
	
		<?php
	}
}

	//***Done With Adding & Error Checking***


}
?>
<!DOCTYPE HTML PUBLIC>
<html>
<head>
<title>TOURISM BD</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="style.css" />
<link href="style1.css" rel="stylesheet" type="text/css" media="screen" />
</head>

<body>
	<div id="header">																																																							<div class="login">
			<input type="text" class="input" value="Login" required /> 
			<input type="text" class="input" value="Password" required />																																			
			<div class="enter"><a href="#">Enter</a></div>
			<div class="links"><a href="#">Forgot password</a>||<a href="#">Registration</a></div>
		</div>
		<ul id="menu">
			<li><a href="index.html">Home </a></li>
			<li><a href="index2.html">About us</a></li>                                                         
			<li><a href="offers.php">Latest Offers</a></li>
			<li><a href="place.php">Places</a></li>                       
			<li><a href="bookings.php"> Reservation </a></li>
		</ul>
	</div>
	<div id="wrapper">																																																																																		
		<div id="sidebar">
			<div class="logo_block">
				<a href="#"><img src="images/i.jpg" alt="setalpm" width="198" height="156" /></a><br />
				<span class="slogan">Best offers for You in Bangladesh</span>
				<p class="text1">Illum secundum exerci erat plaga illum, enim, venio. Tamen causa ut diam torqueo sagaciter inhibeo si quae exerci lobortis.</p>
			</div>
			
</div>


<div id="content">
				
				<div class="column1">
					<h1>:: Register Here :: </h1>
				</div>
					
				<br />
				<br />
				<br />

<div id="reservform">
<form method="post">
<table align="center" width="40%" border="0px">
	                <tr>
						<td><input type="text" name="fullname" placeholder="Full Name" required /></td>
					</tr>
					<tr>
						<td><input type="text" name="uname" placeholder="User Name" required /></td>
					</tr>
					<tr>
						<td><input type="text" name="email" placeholder="E-mail" required /></td>
					</tr>
					<tr>
						<td><input type="PASSWORD" name="pass" placeholder="Password" required /></td>
					</tr>
					<tr>
						<td><button type="submit" name="btn-signup">Register Me</button>
						</td>
					</tr>
</table>
</form>
</div>
</div>

</div>

<div id="footer">																																								
		<ul>
			<li><a href="index.html">Home </a></li>
			<li><a href="index2.html">About us</a></li>                                                         
			<li><a href="offers.php">Latest Offers</a></li>
			<li><a href="place.php">Places</a></li>                       
			<li><a href="bookings.php"> Reservation </a></li>
			</ul>
		<p>&copy;.Final Project of Database.Design by <a href="index.php"><bolo>Team @Tourism BD</bold></a></p>
	</div>




</body>
</html>
