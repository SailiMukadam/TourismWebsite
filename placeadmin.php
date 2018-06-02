<?php
	include_once 'dbConfig.php';
    session_start();
    if (!isset($_SESSION["admin"])) 
{
    header("Location:index.php");
}
if (isset($_POST['btn-signout'])) 
    {
        session_destroy();
        header("Location:index.php");
    }
?>
<!DOCTYPE HTML PUBLIC>
<html>
<head>
<title>TOURISM BD (Admin)</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<form method="post">
	<div id="header">
		<div class="login">
		<button type="submit" name="btn-signout">Sign Out</button>
		</div>
		<ul id="menu">
			<li><a href="index.html">Home </a></li>
			<li><a href="index2.html">About us</a></li>                                                         
			<li><a href="index2.html">Latest Offers</a></li>
			<li><a href="index2.html">Places</a></li>                       
			<li><a href="index2.html">Contact us</a></li>
			<li><a href="index2.html"> Admin Panel </a></li>
			</ul>
	</div>
</form>
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
			 	<div class="tree"><button>
			 		<a href="addplace.php">Add New Places</a></button></div>

				<h2 class="color"> Dhaka </h2><br />
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
<?php 
include ('dbconfig.php');
    $get = "select * from places";
    $run= mysqli_query($db,$get);
    
    
    while ($row = mysqli_fetch_array($run)) {
        $p_id=$row['place_id'];
        $p_name=$row['place_name'];
        $p_image=$row['img_file'];
        $p_info=$row['place_info'];
        if(!$row){
              echo 'no item';
        }  else {

           echo "<div class='coloum1'>
               <div class='item'>
               <img src='$p_image' width='210px' height='100px'/>
                       <div class='item'>                           
                       
$p_name
</div>
</div>

</div>
           ";
 }
    }
  

?>




		</div>
	</div>


	<div id="footer">																																								
		<ul>
			<li><a href="index.html">Home </a></li>
			<li><a href="index2.html">About us</a></li>                                                         
			<li><a href="index2.html">Latest Offers</a></li>
			<li><a href="index2.html">Places</a></li>                       
			<li><a href="index2.html">Contact us</a></li>
			<li><a href="index2.html"> & More</a></li>
		</ul>
		<p>&copy;.Final Project of Database.Design by <a href="index.php"><bolo>Team @Tourism BD</bold></a></p>
	</div>
</body>
</html>
