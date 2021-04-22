<!DOCTYPE HTML>  
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lour Jewelry - Welcome</title>
  <link href="css/index.css" rel="stylesheet" type="text/css">
  <link href="css/admin.css" rel="stylesheet" type="text/css">
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <![endif]-->
</head>
<body>
<?php 
	//empty variables
	$email = $password= $error_message = $table = "";

	//Get email and password from form
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  $email = test_input($_POST["email"]);
	  $password = test_input($_POST["password"]);
	}

	//htmlspecialcharacters were added to the variables for security, in this function the
	//variables are cleaned from those characters.
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	//if email or password is incorrect, display message
    if(($email !== "" && $password !== "") && ($email !== "admin@lourjewelry.com" || $password !== "admin")){
		$error_message = "Invalid email or password";
	}
	//if email and password are correct, connect to the database to get the users
	//and display a table with the users to the admin.
	elseif($email=="admin@lourjewelry.com" && $password=="admin"){
		echo "<style type='text/css'>#wrapper{display:none;}</style>";
		
		$servername = "localhost";
		$username = "root";
		$password = "Gorda1";
		$dbname = "CMPE272-Website-SQL";

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);

		// Check connection
		if (!$conn) {
	   		die("Connection failed: " . mysqli_connect_error());
		}

		$sql = "SELECT id, email, password FROM users_table";
		$result = mysqli_query($conn, $sql);


		if (mysqli_num_rows($result) > 0) {
			$table = "<table style='width:100%'>
				  <tr>
					<th>ID</th>
					<th>Email</th>
					<th>Password</th>
				  </tr>";
			// output data of each row
			while($row = mysqli_fetch_assoc($result)) {
				$table .= "<tr>
						<td>".$row["id"]."</td>
						<td>".$row["email"]."</td>
						<td>".$row["password"]."</td>
					  </tr>";
			}
			
			$table .= "</table>";
		} 
		else {
			echo "0 results";
		}
        //close database connection  
        mysqli_close($conn);
	}

?>


<!-- Main Container -->
<div class="container"> 
  <!-- Header -->
  <header class="header">
	  <a href="user-signup.php" id="users">Users</a>
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
  <!-- form -->
  <div id="wrapper">
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" style="border:1px solid #ccc">
  		<div class="form-container">
			<h1>Sign In</h1>
			<p>Please fill in this form to sign in.</p>
			<hr>
			<label for="email"><b>Email</b></label>
			<input type="text" placeholder="Enter Email" name="email" required>
			<label for="psw"><b>Password</b></label>
			<input type="password" placeholder="Enter Password" name="password" required>
			<div class="clearfix">
			  <button type="submit" class="signinbtn">Sign In</button>
			</div>
 	    </div>
             <span id="error"> 
                <?php echo $error_message;?>
             </span>
         </form>
  </div>
  <?php echo $table; ?>
 <!-- Footer Section -->
  <footer>
    <div class="copyright">CMPE 272 &copy;2019</div>
  </footer>
</div>
<!-- Main Container Ends -->
</body>
</html>
  