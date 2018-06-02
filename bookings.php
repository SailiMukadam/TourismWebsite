<?php
session_start();
	include_once 'dbConfig.php';
    if (!isset($_SESSION["customer"])) 
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
                    $('#slctPlace').html('<option value="">Select City First</option');
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
                data:'city_id='+cityID,
                success:function(html)
                    {
                        $('#slctPlace').html(html);     
                    }
                });
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
                $('#slctPlace').html('<option value="">Select City First</option');
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
					<h1> Place your Bookings :</h1>
					</div>
				<br />
				<br />
				<br />

<div id="reservform">
<form method="post">
<table align="center" width="40%" border="0">
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
    <p>Select Place</p>
    <select name="slctPlace" id="slctPlace">
    	<option value="">Select City First</option>
    </select> 
    </br>
<p>Select Hotel</p>           
    <select name="slctHot" id="slctHot">
        <option value="">Select City First</option>
    </select>
    </br>
    <p>Select Transport</p>
    <select name="slctTrans" id="slctTrans">
        <option value="">Select City First</option>
    </select>
    </br>
<p>Select Guide</p>
    <select name="slctGuide" id="slctGuide">
        <option value="">Select Division First</option>
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
    <p>Enter Contact No.</p>
    <input type="text" name="contactno" placeholder="Enter your contact no." required />
	 </br>
<p>Enter Number of People</p>
<input type="int" name="peopleno" placeholder="Total No. of peoples" required />
 </br>
 <p>Enter Reservation Date</p>
<input type="DATE" name="reserveddate"/>
 </br>
<input type="submit" name="booking" value="Reserve">
     <?php
    	if (isset($_POST['booking']))
    	{
    		include_once 'dbConfig.php';
            $us=$_SESSION["customer"];
    		$cont=$_POST['contactno'];
    		$placeid=$_POST['slctPlace'];
    		$hotelid=$_POST['slctHot'];
    		$guideid=$_POST['slctGuide'];
    		$transid=$_POST['slctTrans'];
            $pckgid=$_POST['slctPckg'];
            $guestno=$_POST['peopleno'];
            $rd=$_POST['reserveddate'];
    		$sql ="INSERT INTO bookings(user_name,contact_info,place_id,hotel_id,trans_id,guide_id,guest_numb,reserve_date,package_id) VALUES('$us','$cont','$placeid','$hotelid','$transid','$guideid','$guestno','$rd','$pckgid')";
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
		</ul>
		<p>&copy;.Final Project of Database.Design by <a href="index.php"><bolo>Team @Tourism BD</bold></a></p>
	</div>



</body>
</html>