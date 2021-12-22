<?php
/* 
Written by: Ryan Armstrong & Viviannie De La Fuente
Tested by: Viviannie De La Fuente
Debugged by: Viviannie De La Fuente 
*/
require_once "navigation.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Send Notification</title>
	<style type="text/css">
	@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap');
	.bs{
		position: absolute;
		left: 120px;
		/* z-index: -1; */
	}
		table {
			font-family: 'Noto Sans JP', sans-serif;
			width: 100%;
			color: black;
			font-size: 16px;
			text-align: left;
			line-height: 0.35in;
		}
		
		th {
			font-family: 'Noto Sans JP', sans-serif;
			font-size: 18px;
			color: black;
			padding: 20px;
			text-align: left;
		}
		tr{
			padding: 20px;
			text-align: left;
		}
		.btn{
			position:relative;
			width: 75%;
			background-color: #545474;
			border: none;
			color: #fff;
			padding: 5px;
			text-decoration: none;
			display: inline-block;
			font-size: 12px;
			text-transform: uppercase;
			top: 0.5px;
			border-radius: 11px;
			z-index:1;
		}
		.btn:hover {
			background: #42425D;
			cursor: pointer;
		}

		.btn:focus {
			outline: none;
		}
	</style>
</head>	
<body>
<div class="bs">
<table>
	<tr>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Gender</th>
		<th>Send Notification</th>
	</tr>
	
<?php

// Include config file
require_once "config.php";

$sql = "SELECT id, firstName, lastName, gender, email FROM general_user_information";
$result = $mysqli-> query($sql);

if ($result-> num_rows > 0) {
	while ($row = $result-> fetch_assoc()) {
	//echo "<tr><td>". $row["id"] ."</td><td>". $row["firstName"] ."</td><td>". $row["lastName"] ."</td><td>". $row["email"] ."</td><td>". $row["Insert a button"] ."</td></tr>";
	echo '<tr>';
	echo '<td>'.$row['firstName'].'</td>';
	echo '<td>'.$row['lastName'].'</td>';
	echo '<td>'.$row['gender'].'</td>';
	echo "<td> <a href=\"send-email.php?email=$row[email]\"><input type='submit' value='Send Notification' class='btn'></a>";
	echo '</tr>';
	}
	echo "</table>";
}
else {
	echo "0 result";
}

$mysqli->close();


?>	
	
</table>
</div>
</body>
</html>
			


