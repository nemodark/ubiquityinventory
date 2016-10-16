<?php
include "../connection/connection.php";
$query = mysql_query("SELECT * FROM badgeinv");
while($fetch = mysql_fetch_array($query))
{
		$output[] = array ($fetch[0],$fetch[1],$fetch[2]);
}
echo json_encode($output);
?>