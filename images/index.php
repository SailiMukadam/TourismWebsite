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
<!DOCTYPE html>
<html>
<head>
<title>TOURISM BD</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
	<div id="header">
	<form method="post">																																																					<div class="login">
			<input type="text" class="input" value="Login" name="uname"/> 
			<input type="password" class="input" value="Password" name="pass"/>																																			
			<button type="submit" name="btn-signin">Sign In</button>
			<div class="links"><a href="#">Forgot password</a>||<a href="signup.php">Registration</a></div>
		</form>	
		<ul id="menu">
			<li><a href="index.php">Home </a></li>
			<li><a href="index2.html">About us</a></li>                                                         
			<li><a href="offers.php">Latest Offers</a></li>
			<li><a href="place.php">Places</a></li>                       
			<li><a href="bookings.php"> Reservation </a></li>
			
			</ul>
	</div>
	<div id="wrapper">
		<form method="post">																																																																																		
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
			<div class="search"><span>Search Places here...</span> 
			<textarea method="post" type"text" name="searchs" id="searchs" placeholder="Input The Place Name"></textarea>
			</br>
			<input type="submit" name="fin" id="fin"/>
			<?php
			if (isset($_POST['fin'])) 
			{
				include_once 'dbConfig.php';
				//$placename=$_POST['searchs'];
				$search_sql="SELECT * FROM places WHERE place_name=".$_POST['searchs']."";
				$query=$db->query($search_sql);
				if($query)
				{
					echo "Paisi";
				}
				else
				{
					echo "No Result Found";
				}
			}
			?>
			</div>

			<div class="bg">
				<div class="column1">
					<img src="images/title2.gif" alt="" width="258" height="21" /><br />
					<p>Lorem ipsum dolor sit amet, sectetu adip scing varius interdum incid unt quis, libero. Aenean mturpis. Maecenas hendrerit masa laoreet iaculipede mnisl ulamcorper. Tellus er sodales enim, in tincidunt mauris in odio. Massa ac laoreet iaculipede nisl ullamcorpermassa, ac consectetuer feipsum eget pede.  Proin nunc. Donec massa. Nulla pulvinar, nisl ac convallis nonummy, tellus eros sodales enim, in tincidunt mauris in odio.  massa ac laoreet iaculipede nisl ullamcorpermassa,consectetuer feipsum eget pede. Proin nunc. Donec massa. Nulla pulvinar, nisl ac convallis nonummy, tellus eros sodales enim, in tincidunt mauris in odi. Lorem ipsum dolor sit amet, consectetuer adipi scing elit.Mauris u tincidunt quis, libero. </p>
					<br />
				</br>
					<h1>Mostly Visited Places</h1><br />
					<div id="items">
						<div class="item">
							<a href="index2.html"><img src="images/pic1.jpg" alt="" /></a>
							<span><a href="index2.html">Cox's Bazar</a></span>
						</div>
						<div class="item">
							<a href="#"><img src="images/pic2.jpg" alt="" /></a>
							<span><a href="#">Sundarban</a></span>
						</div>
						<div class="item">
							<a href="#"><img src="images/pic3.jpg" alt="" /></a>
							<span><a href="#">Sitakundu Waterfall</a></span>
						</div>
						<div class="item">
							<a href="#"><img src="images/pic4.jpg" alt="" /></a>
							<span><a href="#">Jaflong,Sylhet</a></span>
						</div>
					</div>
						</div>
				
				<div class="column2">
					<h1>LATEST NEWS</h1>
					<div class="news">
						<span>24 november 2015</span><br />
						<p>Lorem ipsum dolor sit amet, sectetu adip scing varius interdum incid unt quis, libero. Aenean mturpis. Maecenas hendrerit masa laoreet iaculipede mnisl ulamcorper. Tellus er sodales enim, in tincidunt mauris in odio. Massa ac laoreet iaculipede nisl.</p>
						<a href="#" class="more">more info</a>
					</div>
					<div class="news">
						<span>26 november 2015</span><br />
						<img src="images/photo2.jpg" alt="" width="183" height="97" />
						<p>Proin nunc. Donec massa. Nulla pulvinar, nisl ac convallis nonummy, tellus eros sodales enim, in tincidunt mauris in odio.  massa ac laoreet iaculipede nisl ullamcorpermassa,consectetuer </p>
						<a href="#" class="more">more info</a>
					</div>
				</div>
			</div>
		</div>
		</form>
	</div>
	<form method="post">
		<textarea name="baal" type="text" id="baal" placeholder="Input Search Name"></textarea>
		</br>
		<
	</form>
	<div id="footer">																																								
		<ul>
			<li><a href="index.php">Home </a></li>
			<li><a href="index2.html">About us</a></li>                                                         
			<li><a href="offers.php">Latest Offers</a></li>
			<li><a href="place.php">Places</a></li>                       
			<li><a href="bookings.php"> Reservation </a></li>
			
		</ul>
		<p>&copy;.Final Project of Database.Design by <a href="index.php"><bolo>Team @Tourism BD</bold></a></p>
	</div>

</body>
</html>
