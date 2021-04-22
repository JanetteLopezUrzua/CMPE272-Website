<!DOCTYPE html>
<?php
	$info = array("TEAR SHAPE ENGAGEMENT RING", "descriptions - rings/rings10.php", "rings/rings10.jpg", "4000", "1");
	$cookie_name = "rings10";

	if (!isset($_COOKIE[$cookie_name]))
		setcookie($cookie_name, json_encode($info), time() + 60 * 60 * 24, '/');
	else {
	        $data = json_decode($_COOKIE[$cookie_name], true);
	        $increment_visit = $data[4] + 1;
	        $info = array("TEAR SHAPE ENGAGEMENT RING", "descriptions - rings/rings10.php", "rings/rings10.jpg", "4000", $increment_visit);
	        setcookie($cookie_name, json_encode($info), time() + 60 * 60 * 24, '/');
        }
?>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lour Jewelry - Tear Shape Engagement Ring</title>
  <link href="../css/index.css" rel="stylesheet" type="text/css">
  <link href="../css/descriptions.css" rel="stylesheet" type="text/css">
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <![endif]-->
</head>
<body>
<!-- Main Container -->
<div class="container"> 
  <!-- Header -->
  <header class="header">
	  <a id="users" href="../user-signup.php">User</a>
	  <a id="admin" href="../admin.php">Admin</a>
	  <h4 class="logo"><a href="../index.html">Lour Jewelry</a></h4>
  </header>
  <!-- Navigation Bar -->
  <nav>
    <ul>
	  <li><a href="../index.html">Home</a></li> 
	  <li><a href="../about.html">About</a></li> 
	  <li><a href="../earrings.html">Jewelry</a></li> 
          <li><a href="../news.html">News</a></li> 
	  <li><a href="../contacts.php">Contact Us</a></li> 
	</ul>
  </nav>
  <section>
    <h2 class="noDisplay">Main Content</h2>
    <article class="left_article">
      <h3><?php echo $info[0] ?></h3>
	  <p id="price">&#36;<?php echo $info[3] ?></p>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
    </article>
    <aside class="right_article"><img src="../images/rings/rings10.jpg" alt="" width="3455" height="5176" class="placeholder"/> </aside>
  </section>
  <!-- Footer Section -->
  <footer>
    <div class="copyright">CMPE 272 &copy;2019</div>
  </footer>
</div>
</body>
</html>