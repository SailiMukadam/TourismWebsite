<?php
	include_once 'dbconfig.php';
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
<script src="jquery-1.11.3.min.js"></script>
<script type="text/javascript">
    $(document).ready(function()
    {
        $('#slctDiv').on('change',function()
        {
            var divisionID = $(this).val();
                if(divisionID)
                {
                    $.ajax(
                    {
                        type:'POST',
                        url:'ajaxData.php',
                        data:'division_id='+divisionID,
                        success:function(html)
                        {
                            $('#slctCit').html(html);
                            $('#slctHot').html('<option value="">Select City first</option>'); 
                            $('#slctTrans').html('<option value="">Select City first</option>');
                        }
                    });
                    $.ajax
                    ({
                        type:'POST',
                        url:'ajaxData.php',
                        data:'guide_div_id='+divisionID,
                        success:function(html)
                        {
                            $('#slctGuide').html(html);
                        }
                    }); 
                }
                else
                {
                    $('#slctCit').html('<option value="">Select Division first</option>');
                    $('#slctHot').html('<option value="">Select City first</option>'); 
                    $('#slctGuide').html('<option value="">Select Division first</option>');
                    $('#slctTrans').html('<option value="">Select City first</option>');
            }
        });
    
        $('#slctCit').on('change',function()
        {
            var cityID = $('#slctCit').val();
            if(cityID)
            {
                $.ajax(
                {
                type:'POST',
                url:'ajaxData.php',
                data:'hot_city_id='+cityID,
                success:function(html)
                    {
                        $('#slctHot').html(html);
                    }
                });
                $.ajax(
                    {
                        type:'POST',
                        url:'ajaxData.php',
                        data:'trans_city_id='+cityID,
                        success:function(html)
                        {
                            $('#slctTrans').html(html);
                        }
                    }); 
            }
            else
            {
                $('#slctHot').html('<option value="">Select City</option>'); 
                $('#slctTrans').html('<option value="">Select Guide first</option>');
            }
        });
        
    });
</script>
<title>TOURISM BD</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="style.css" />
<link href="style1.css" rel="stylesheet" type="text/css" media="screen" />
</head>

<body>
<form method="post">
	<div id="header">																																																							<div class="login">
			<button type="submit" name="btn-signout">Sign Out</button>
		</div>
		<ul id="menu">
			<li><a href="index.php">Home </a></li>
			<li><a href="index2.html">About us</a></li>                                                         
			<li><a href="offers.php">Latest Offers</a></li>
			<li><a href="place.php">Places</a></li>                       
			<li><a href="bookings.php"> Reservation </a></li>
			<li><a href="adminpanel.php"> Admin panel </a></li>
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
			
</div>


<div id="content">
			<div class="search"><span>Search here...</span> <input type="text" placeholder="type your words here" /></div>


			<div class="bg">
				<div class="column1">
					<div class="tree"><a href="#">Places</a>  &raquo; Add-NewPlaces</div>
					<h1> Add New Tourist Places :</h1>
					</div>
				<br />
				<br />
				<br />

<div id="reservform">
<form method="post">
<table align="center" width="60%" border="0">
<input type="text" name="place_name" id="place_name" placeholder="enter place name" required />
<?php
    //Get all division data
    $query = $db->query("SELECT * FROM division ORDER BY division_name ASC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    ?>
<p>Select Division</p>
<select name="slctDiv" id="slctDiv">
        <option value="">Select Division</option>
            <?php
                if($rowCount > 0)
                    {
                        while($row = $query->fetch_assoc())
                            { 
                                echo '<option value="'.$row['division_id'].'">'.$row['division_name'].'</option>';
                            }
                    }
                else
                    {
                        echo '<option value="">Division not available</option>';
                    }
            ?>
    </select> 
    <p>Select City</p>                      
    <select name="slctCit" id="slctCit">
        <option value="">Select Division First</option>
    </select>
    </br>
	<p>Select Hotel</p>           
    <select name="slctHot" id="slctHot">
        <option value="">Select City First</option>
    </select>
    </br>
<p>Select Guide</p>
    <select name="slctGuide" id="slctGuide">
        <option value="">Select Division First</option>
    </select>
    </br>
    <p>Select Transport</p>
    <select name="slctTrans" id="slctTrans">
        <option value="">Select City First</option>
    </select>
    </br>
    <?php
    //Get all division data
    $qy = $db->query("SELECT * FROM package ORDER BY package_name ASC");
    
    //Count total number of rows
    $rCount = $qy->num_rows;
    ?>
    <p>Select Package</p>
    <select name="slctPckg" id="slctPckg">
        <option value="">Select Package</option>
        <?php
        $sql="";
        if($rCount > 0)
        {
            while($row = $qy->fetch_assoc())
            { 
                echo '<option value="'.$row['package_id'].'">'.$row['package_name'].'</option>';
            }
        }
        else
        {
            echo '<option value="">Package not available</option>';
        }
        ?>
    </select>
    </br>
    <p>Upload Image</p>
    <input type="text" name="image"/>
    
    </br>
    <p>Write Information</p>
    <span><textarea type="text" name="info" id="info" rows="10" cols="40" placeholder="Write Information Here" required></textarea></span>
    </br>
    <input type="submit" name="save" value="Add">
     <?php
    	if (isset($_POST['save']))
    	{
    		include_once 'dbConfig.php';
    		$placename=$_POST['place_name'];
    		$divid=$_POST['slctDiv'];
    		$cityid=$_POST['slctCit'];
    		$writeinfo=$_POST['info'];
    		$hotelid=$_POST['slctHot'];
    		$guideid=$_POST['slctGuide'];
    		$transid=$_POST['slctTrans'];
            $pckgid=$_POST['slctPckg'];
            $pic=$_POST['image'];
    		$sql ="INSERT INTO places(place_name,division_id,city_id,place_info,hotel_id,guide_id,trans_id,package_id,img_file) VALUES('$placename','$divid','$cityid','$writeinfo','$hotelid','$guideid','$transid','$pckgid','$pic')";
    		$result=$db->query($sql);
            if ($result) 
            {
                ?>
                    <script> alert('Inserted Successfully');</script>
                <?php
            }
    	}
    ?>


</table>
</form>
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
			<li><a href="adminpanel.php"> Admin panel </a></li>
		</ul>
		<p>&copy;.Final Project of Database.Design by <a href="index.php"><bolo>Team @Tourism BD</bold></a></p>
	</div>



</body>
</html>