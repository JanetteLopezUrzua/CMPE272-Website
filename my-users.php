<!DOCTYPE HTML>  
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
<body>
<?php 
	//empty variables
	$table = $noresults = "";

		
		//sql info
		$servername = "localhost";
		$username = "root";
		$password = "Gorda1";
		$dbname = "CMPE272-Website-SQL";

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		//get query
		$sql = "SELECT first_name, last_name, email FROM users_table";
		$result = mysqli_query($conn, $sql);

		//Get rows
		if (mysqli_num_rows($result) > 0) {
			$table = "<table style='width:100%; margin-top:25px; margin-bottom:25px;'>
				  <tr>
					<th>first_name</th>
					<th>last_name</th>
					<th>email</th>
				  </tr>";
			// output data of each row
			while($row = mysqli_fetch_assoc($result)) {
				$table .= "<tr>
						<td>".$row["first_name"]."</td>
						<td>".$row["last_name"]."</td>
						<td>".$row["email"]."</td>
					  </tr>";
			}

			$table .= "</table>";
		} 
		else {
			$noresults = "<span style='display:block; margin-bottom:25px;'>0 results</span>";
		}
		//close database connection  
		mysqli_close($conn);
?>
	
<?php echo $table; ?>
<?php echo $noresults; ?>
</body>
</html>