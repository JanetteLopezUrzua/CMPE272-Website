<!DOCTYPE HTML>  
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lour Jewelry - User</title>
  <link href="css/index.css" rel="stylesheet" type="text/css">
  <link href="css/user-search.css" rel="stylesheet" type="text/css">
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <![endif]-->
</head>
<body>
<?php 
	//empty variables
	$search_input = $search_type = $table = $noresults = "";

	//Get fields from form
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$search_input = test_input($_POST["search_input"]);
		$search_type = test_input($_POST["search_type"]);
		
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
		$sql = "SELECT ID, first_name, last_name, email, home_address, home_phone, cell_phone FROM users_table WHERE $search_type = '$search_input'";
		$result = mysqli_query($conn, $sql);

		//Get rows
		if (mysqli_num_rows($result) > 0) {
			$table = "<table style='width:100%; margin-bottom:25px;'>
				  <tr>
					<th>ID</th>
					<th>first_name</th>
					<th>last_name</th>
					<th>email</th>
					<th>home_address</th>
					<th>home_phone</th>
					<th>cell_phone</th>
				  </tr>";
			// output data of each row
			while($row = mysqli_fetch_assoc($result)) {
				$table .= "<tr>
						<td>".$row["ID"]."</td>
						<td>".$row["first_name"]."</td>
						<td>".$row["last_name"]."</td>
						<td>".$row["email"]."</td>
						<td>".$row["home_address"]."</td>
						<td>".$row["home_phone"]."</td>
						<td>".$row["cell_phone"]."</td>
					  </tr>";
			}

			$table .= "</table>";
		} 
		else {
			$noresults = "<span style='display:block; margin-bottom:25px;'>0 results</span>";
		}
		//close database connection  
		mysqli_close($conn);
	}

	//htmlspecialcharacters were added to the variables for security, in this function the
	//variables are cleaned from those characters.
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
?>
	
<!-- Main Container -->
<div class="container"> 
  <!-- Header -->
  <header class="header">
	  <a href="user-signup.php" id="users">User</a>
	  <a href="admin.php" id="admin">Admin</a>
	  <h4 class="logo"><a href="index.html">Lour Jewelry</a></h4>
  </header>
  <!-- Navigation Bar -->
  <nav>
    <ul>
	  <li><a href="index.html">Home</a></li> 
	  <li><a href="about.html">About</a></li> 
	  <li><a href="earrings.html">Jewelry</a></li> 
          <li><a href="news.html">News</a></li> 
	  <li><a href="contacts.php">Contact Us</a></li> 
	</ul>
  </nav>
  <!-- 2 more links -->
  <nav>
    <ul>
	  <li><a href="user-signup.php" class="secondLinks">Sign Up</a></li> 
	  <li><a href="user-search.php" class="secondLinks">Search User</a></li> 
          <li><a href="all-users.php" class="secondLinks">Show All Users</a></li>
	</ul>
  </nav>
  <!-- form -->
  <div id="wrapper">
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" style="border:1px solid #ccc">
	    <div class="form-container">
			<h1>Search for a User</h1>
			<input type="text" placeholder="Search..." name="search_input" required>
			<p>Search By:</p>
			<div class="custom-select" style="width:200px;">
			  <select name="search_type" class="search_type">
				<option value="first_name" name="first_name">First Name</option>
				<option value="last_name" name="last_name">Last Name</option>
				<option value="email" name="email">Email</option>
				<option value="home_phone" name="home_phone">Home Phone</option>
				<option value="cell_phone" name="cell_phone">Cell Phone</option>
			  </select>
			</div>
		  <div class="clearfix">
			  <button type="submit" class="searchbtn">Search</button>
		  </div>
		</div>
	</form>
  </div>
  <?php echo $table; ?>
  <?php echo $noresults; ?>
 <!-- Footer Section -->
  <footer>
    <div class="copyright">CMPE 272 &copy;2019</div>
  </footer>
</div>
<!-- Main Container Ends -->
</body>
</html>