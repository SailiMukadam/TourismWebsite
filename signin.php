<?php
	session_start();
	include ('dbconfig.php');

	$action = array();
	$action="success";
	
	if (isset($_POST['btn-enter'])) 
	{
		$username= mysql_real_escape_string($_POST['username']);
		$_SESSION["users"] = $username;
		$pass= mysql_real_escape_string($_POST['pass']);
	
		if ($action=="success") 
		{
			$chk="SELECT  user_name FROM users WHERE user_name='$username' AND user_pass FROM users WHERE useer_pass='$pass'";
			$query=mysql_query($chk);

			if(mysql_num_rows($query)>0)
			{
				?>
				<script> alert('User Name & Password Do Not Match');</script>
				<?php
			}
			else
			{
				if ($username=='amzad.ethan') 
				{
					header("Location:adminpanel.php");
				}
				else
				{
				header("Location:index.html");
				}
			}
		}
	}
?>