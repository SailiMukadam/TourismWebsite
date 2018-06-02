i<?php
//Include database configuration file
include('dbConfig.php');

if(isset($_POST["division_id"]) && !empty($_POST["division_id"]))
    {
    //Get all City data
    $query = $db->query("SELECT * FROM city WHERE division_id = ".$_POST['division_id']."");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display City list
    if($rowCount > 0)
    {
        echo '<option value="">Select City</option>';
        while($row = $query->fetch_assoc())
            { 
            echo '<option value="'.$row['city_id'].'">'.$row['city_name'].'</option>';
            }
        }
        else
        {
        echo '<option value="">City not available</option>';
        }
    }

if(isset($_POST["guide_div_id"]) && !empty($_POST["guide_div_id"]))
{
    $queryguide = $db->query("SELECT * FROM guide WHERE division_id = ".$_POST['guide_div_id']."");
        $rC = $queryguide->num_rows;
        if($rC > 0)
        {
        echo '<option value="">Select Guide</option>';
        while($rowg = $queryguide->fetch_assoc())
            { 
            echo '<option value="'.$rowg['guide_id'].'">'.$rowg['guide_name'].'</option>';
            }
        }
        else
        {
        echo '<option value="">Guide not available</option>';
        }
}
if(isset($_POST["city_id"]) && !empty($_POST["city_id"]))
{
    //Get all city data
    $query = $db->query("SELECT * FROM places WHERE city_id = ".$_POST['city_id']."");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display cities list
    if($rowCount > 0)
    {   
        echo '<option value="">Select Places</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['place_id'].'">'.$row['place_name'].'</option>';
        }
    }else{
        echo '<option value="">Place not available</option>';
    }
}

if(isset($_POST["hot_city_id"]) && !empty($_POST["hot_city_id"]))
{
    //Get all city data
    $query = $db->query("SELECT * FROM hotel WHERE city_id = ".$_POST['hot_city_id']."");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display cities list
    if($rowCount > 0){
        echo '<option value="">Select Hotel</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['hotel_id'].'">'.$row['hotel_name'].'</option>';
        }
    }else{
        echo '<option value="">Hotel not available</option>';
    }
}
if (isset($_POST["trans_city_id"]) && !empty($_POST["trans_city_id"])) 
{
    $query = $db->query("SELECT * FROM transport WHERE city_id = ".$_POST['trans_city_id']."");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display cities list
    if($rowCount > 0){
        echo '<option value="">Select Transport</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['trans_id'].'">'.$row['trans_name'].'</option>';
        }
    }else{
        echo '<option value="">Transport not available</option>';
    }
}
if(isset($_POST["hotel_id"]) && !empty($_POST["hotel_id"]))
{
    //Get all city data
    $query = $db->query("SELECT * FROM hotel WHERE city_id = ".$_POST['city_id']."");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display cities list
    if($rowCount > 0){
        echo '<option value="">Select Hotel</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['hotel_id'].'">'.$row['hotel_name'].'</option>';
        }
    }else{
        echo '<option value="">Hotel not available</option>';
    }
}
    
?>