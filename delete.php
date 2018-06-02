<?php
include_once 'dbconfig.php';

$delete_id=$_GET["del"];

$query="delete from users where id=$delete_id";
$result=mysqli_query($db,$query);
if($result){
	echo"<script>alert('User has been deleted')</script>";
	header ('Location:adminpanel.php');
    
}
?>
<?php
include('dbconfig.php');
$delete_id=$_GET["dlt"];

$query="delete from bookings where booking_id=$delete_id";
$result=mysqli_query($db,$query);
if($result){
	echo"<script>alert('User has been deleted')</script>";
	header ('Location:adminpanel.php');

?>