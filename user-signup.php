<!DOCTYPE HTML>  
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lour Jewelry - User</title>
  <link href="css/index.css" rel="stylesheet" type="text/css">
  <link href="css/user-signup.css" rel="stylesheet" type="text/css">
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <![endif]-->
</head>
<body>
<?php 
	//empty variables
	$first_name = $last_name = $email = $home_address = $home_phone = "";
	$cell_phone = $password= $signedup_message = $error_message = "";

	//Get fields from form
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  $first_name = test_input($_POST["first_name"]);
      $last_name = test_input($_POST["last_name"]);
	  $email = test_input($_POST["email"]);
	  $home_address = test_input($_POST["home_address"]);
	  $home_phone = test_input($_POST["home_phone"]);
	  $cell_phone = test_input($_POST["cell_phone"]);
	  $password = test_input($_POST["password"]);
	
		
		//sql info
		$servername = "localhost";
		$username = "root";
		$userpassword = "Gorda1";
		$dbname = "CMPE272-Website-SQL";

		// Create connection
		$conn = mysqli_connect($servername, $username, $userpassword, $dbname);

		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		//Create query
		$sql = "INSERT INTO users_table (first_name, last_name, email, home_address, home_phone, cell_phone, password) VALUES ('$first_name', '$last_name', '$email', '$home_address', '$home_phone', '$cell_phone', '$password')";
		$result = mysqli_query($conn, $sql);

		//If query can't insert data in db, print an error
		if (!($result) ) {
			$error_message = "An Error Occurred. Try Again.";
			die(mysqli_error($conn));
		}

		//if all fields are filled out and are posted to the db, display message 
		if(($result) & $first_name !== "" & $last_name !== "" & $email !== "" & $home_address !== "" & $home_phone !== "" & $cell_phone !== "" & $password !== ""){
			$signedup_message = "You Successfully Signed Up";
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
			<h1>Sign Up</h1>
			<p>Create a user account.</p>
			<hr>
			<label for="first_name"><b>First Name</b></label>
			<input type="text" placeholder="Enter First Name" name="first_name" required>
			<label for="last_name"><b>Last Name</b></label>
			<input type="text" placeholder="Enter Last Name" name="last_name" required>
			<label for="email"><b>Email</b></label>
			<input type="text" placeholder="Enter Email" name="email" required>
			<label for="home_address"><b>Home Address</b></label>
			<input type="text" placeholder="Enter Home Address" name="home_address" required>
			<label for="home_phone"><b>Home Phone</b></label>
			<input type="text" placeholder="Enter Home Phone" name="home_phone" required>
			<label for="cell_phone"><b>Cell Phone</b></label>
			<input type="text" placeholder="Enter Cell Phone" name="cell_phone" required>
			<label for="password"><b>Password</b></label>
			<input type="password" placeholder="Enter Password" name="password" required>
			<div class="clearfix">
			  <button type="submit" class="signupbtn">Sign Up</button>
			</div>
 	    </div>
             <span id="success"> 
                <?php echo $signedup_message;?>
             </span>
		     <span id="error"> 
                <?php echo $error_message;?>
             </span>
         </form>
  </div>
 <!-- Footer Section -->
  <footer>
    <div class="copyright">CMPE 272 &copy;2019</div>
  </footer>
</div>
<!-- Main Container Ends -->
</body>
</html>