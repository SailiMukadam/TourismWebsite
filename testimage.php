<html>

<head>
<title>
Image Showing
</title>
</head>

<body>
<?php
mysql_connect("localhost","root","");
mysql_select_db("image");

$res=mysql_query("select * from table1"); 
echo "<table>";

while($row=mysql_fetch_array($res)){
echo "<tr>";
echo "<td>"; ?> <img src="<?php echo $row["images"] ?>" height="100" width="100" > <?php echo "</td>";
echo "<td>"; echo $row["name"]; echo "</td>";	
echo "</tr>";
}
echo "</table>";
?>
</body>
</html>