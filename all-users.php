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

  <?php 
		//Use Curl to get my own users
		$ch = curl_init("http://www.janettelour.com/my-users.php");
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_exec($ch);
		curl_close($ch);
		
		//Use Curl to get teammate users
		$ch = curl_init("http://www.assignment-website.com/users.php");
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_exec($ch);
		curl_close($ch);
  ?>

  <!-- Footer Section -->
  <footer>
    <div class="copyright">CMPE 272 &copy;2019</div>
  </footer>
</div>
<!-- Main Container Ends -->
</body>
</html>