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
<link href="style1.css" rel="stylesheet" type="text/css" media="screen" />
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
			<li><a href="index.html">Home </a></li>
			<li><a href="index2.html">About us</a></li>                                                         
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
			
</div>
<div id="content">
			<div class="search"><span>Search here...</span> <input type="text" placeholder="type your words here" /></div>

			<div class="bg">
				
<div class="coloumn1">
	<div class="tree"><a href="#">Home</a>  &raquo; LatestOffers</div>
	<div>
<h1> Pricing</h1>
		 </div>
		 <div class="plans">
       	           <div class="col-md-3">
						  <div class="pricing-table-grid">
								<div class="plans_head">
									<h3>ORDINARY</h3>
								    <h4 class="m_4"><small class="m_2">Tk.</small>3000<small  class="m_3">/5Days</small></h4>
								    <p> An Offer for your Friends & Families. </p>
								</div>
								<ul>
									<li><span>Hotel Booking & Services.</span></li>
									<li><span>Transport service</span></li>
									<li><span>Customer Services</span></li>
									<li><span>Guide Service</span></li>
									<li><span>Customer Services</span></li>
							    </ul>
								<!---->
							    <a class=" button" href="bookings.php">Booking</a>
							   
		         </div>
		     </div>
             <div class="col-md-3">
					<div class="pricing-table-grid">
								<div class="plans_head">
									<h3>SPECIAL</h3>
								    <h4 class="m_4"><small class="m_2">Tk.</small>1500<small small class="m_3">/Day</small></h4>
								    <p>An Offer For the Large group of travelers</p>
								</div>
								
									<ul>
									<li><span>Full Access to hotel services</span></li>
									<li><span>24 hour Transport services</span></li>
									<li><span>24 hour Customer Services</span></li>
									<li><span>Full Update to your venue</span></li>
									<li><span>24 Hour Guide Service</span></li>
									<li><span>Gifts from our agency</span></li>
							    </ul>
							   
							   <a class=" button" href="bookings.php">Booking</a>
				      </div>
		     </div>	
	         <div class="col-md-3">
				<div class="pricing-table-grid">
								<div class="plans_head">
									<h3>LUXURY</h3>
								    <h4 class="m_4"><small class="m_2">Tk.</small>2000<small small class="m_3">/Day</small></h4>
								    <p>A Limited Offer for foriegn & travel loving peoples.</p>
								</div>
								<ul>
									<li><span>Luxury Hotels room + 24 hour services.</span></li>
									<li><span>24 hour Transport service with hotel guards</span></li>
									<li><span>24 hour Customer Services</span></li>
									<li><span>24 hour Guide Service</span></li>
									<li><span>24 hour Customer Services</span></li>
									<li><span>10% Discount if stays More than 3 Days.</span></li>

							    </ul>
				<a class=" button" href="bookings.php">Booking</a>				
				</div>
		    </div>
			

		    <div class="clearfix"> </div>								
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