
<?php
	session_start();
	include_once 'dbConfig.php';

	$action = array();
	$action="success";
	if (isset($_POST['btn-signin'])) 
	{
		$uname= mysqli_real_escape_string($db,$_POST['uname']);
		
		$pass= mysqli_real_escape_string($db,$_POST['pass']);

		if (empty($uname)) 
		{
			$action="error";
		}
		if (empty($pass)) 
		{
			$action="error";
		}
		if ($action!="success")
		{
			?>
			<script> alert('Please Fill Up All The Fields Properly');</script>
			<?php
		}
		if ($action=="success") 
		{
			$chk="SELECT  user_name FROM users WHERE user_name='$uname' AND user_pass FROM users WHERE user_pass='$pass'";
			$query=$db->query($chk);
			$rc=mysqli_num_rows($query);
			if($rc>0)
			{
				?>
				<script> alert('User Name & Password Do Not Match');</script>
				<?php
			}
			else
			{
				if ($uname=='amzad.ethan') 
				{
					$_SESSION["admin"]=$uname;
					header("Location:adminpanel.php");
				}
				else
				{
				$_SESSION["customer"]=$uname;	
				header("Location:bookings.php");
				}
			}
		}
	}
?>
<!DOCTYPE HTML PUBLIC>
<html>
<head>
<title>TOURISM BD</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
	<div id="header">
		<form method="post">																																																							<div class="login">
			<input type="text" class="input" value="Login" name="uname"/> 
			<input type="password" class="input" value="Password" name="pass"/>																																			
			<button type="submit" name="btn-signin">Sign In</button>
			<div class="links"><a href="#">Forgot password</a>||<a href="signup.php">Registration</a></div>
		</div>
		<ul id="menu">
			<li><a href="index.php">Home </a></li>
			<li><a href="#">About us</a></li>                                                         
			<li><a href="offers.php">Latest Offers</a></li>
			<li><a href="place.php">Places</a></li>                       
			<li><a href="bookings.php"> Reservation </a></li>
			</ul>
		</form>
	</div>
		<div id="wrapper">																																																																																		
			<div id="sidebar">
				<div class="logo_block">
				<a href="#"><img src="images/i.jpg" alt="setalpm" width="198" height="156" /></a><br />
				<span class="slogan">Best offers for You in Bangladesh</span>
				<p class="text1">Illum secundum exerci erat plaga illum, enim, venio. Tamen causa ut diam torqueo sagaciter inhibeo si quae exerci lobortis.</p>
			</div>
			<img src="images/title1.gif" alt="" width="126" height="21" /><br />
			<ul id="navigation">
				<li class="color"><a href="#">Division-wise places</a>
					<ul><li><a href="#">Dhaka</a></li>
						<li><a href="#">Chittagong</a></li>
						<li><a href="#">Sylhet</a></li>
						<li><a href="#">Khulna</a></li>
						<li><a href="#">Rajshahi</a></li>
						<li><a href="#">Rangpur</a></li>
						<li><a href="#">Barisal</a></li>
					</ul>
				</li><br />
				
				<br />
				<br />
				<br />
				<br />
				<br />
				<li class="color"><a href="#">City-wise Places</a>
					<ul><li><a href="#">Dhaka</a></li>
						<li><a href="#">Chittagong</a></li>
						<li><a href="#">Cox's Bazar</a></li>
						<li><a href="#">Sylhet</a></li>
						<li><a href="#">Sreemangal</a></li>
						<li><a href="#">Rangamati</a></li>
					</ul>				
				</li>


				
			</ul>
		</div>

		<div id="content">
			<div class="search"><span>Search</span> <input type="text" /></div>
       		<div class="column1">
			 	<div class="tree"><a href="#">Home</a>  &raquo; Places</div>
				<h2 class="color" id="dhk"> Dhaka </h2><br />
					<div id="items">
						<div class="item">
							<a href="index2.html"><img src="images/pic1.jpg" alt="" /></a>
							<span><a href="index2.html">Ahsan Manjil</a></span>
						</div>
						<div class="item">
							<a href="#"><img src="images/pic2.jpg" alt="" /></a>
							<span><a href="#">Sonargaon</a></span>
						</div>
						<div class="item">
							<a href="#"><img src="images/pic2.jpg" alt="" /></a>
							<span><a href="#">Nawab Palace,Tangail</a></span>
						</div>
						
					</div>
			 </div>

			 <div class="column2">
			 	<h2 class="color"> Barisal </h2><br />
					<div id="items">
						<div class="item">
							<a href="index2.html"><img src="images/pic1.jpg" alt="" /></a>
							<span><a href="index2.html">Cox's Bazar</a></span>
						</div>																
					</div>
			 </div>
			 <div class="column1">
			 	<h2 class="color"> Chittagong </h2><br />
					<div id="items">
						<div class="item">
							<a href="index2.html"><img src="images/pic1.jpg" alt="" /></a>
							<span><a href="index2.html">Cox's Bazar</a></span>
						</div>
						<div class="item">
							<a href="#"><img src="images/pic2.jpg" alt="" /></a>
							<span><a href="#">Fays Lake</a></span>
						</div>
						<div class="item">
							<a href="#"><img src="images/pic2.jpg" alt="" /></a>
							<span><a href="#">Rangamati</a></span>
						</div>
						
					</div>
			 </div>
			  <div class="column2">
			 	<h2 class="color"> Khulna </h2><br />
					<div id="items">
						<div class="item">
							<a href="index2.html"><img src="images/pic1.jpg" alt="" /></a>
							<span><a href="index2.html">Cox's Bazar</a></span>
						</div>																
					</div>
			 </div>
			 <div class="column1">
			 	<h2 class="color"> Sylhet </h2><br />
					<div id="items">
						<div class="item">
							<a href="index2.html"><img src="images/pic1.jpg" alt="" /></a>
							<span><a href="index2.html">Cox's Bazar</a></span>
						</div>
						<div class="item">
							<a href="#"><img src="images/pic2.jpg" alt="" /></a>
							<span><a href="#">Fays Lake</a></span>
						</div>
												
					</div>
			 </div>
		  	 <div class="column2">
			 	<h2 class="color"> Rajshahi </h2><br />
					<div id="items">
						<div class="item">
							<a href="index2.html"><img src="images/pic1.jpg" alt="" /></a>
							<span><a href="index2.html">Mahasthangarh</a></span>
						</div>																
					</div>
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
