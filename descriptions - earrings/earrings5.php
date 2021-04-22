<!DOCTYPE html>
<?php
	$info = array("LONG EARRINGS", "descriptions - earrings/earrings5.php", "earrings/earrings5.jpg", "99", "1");
	$cookie_name = "earrings5";

	if (!isset($_COOKIE[$cookie_name]))
		setcookie($cookie_name, json_encode($info), time() + 60 * 60 * 24, '/');
	else {
	        $data = json_decode($_COOKIE[$cookie_name], true);
	        $increment_visit = $data[4] + 1;
	        $info = $info = array("LONG EARRINGS", "descriptions - earrings/earrings5.php", "earrings/earrings5.jpg", "99", $increment_visit);
	        setcookie($cookie_name, json_encode($info), time() + 60 * 60 * 24, '/');
        }
?>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lour Jewelry - Long Earrings</title>
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
      <p>These cute eaarings are perfect for a casual occassion. They are long with silver flower details. The white flower and blue bead at the bottom make the earrings look stand out. Get them now.</p>
    </article>
    <aside class="right_article"><img src="../images/earrings/earrings5.jpg" alt="" width="2640" height="4032" class="placeholder"/> </aside>
  </section>
  <!-- Footer Section -->
  <footer>
    <div class="copyright">CMPE 272 &copy;2019</div>
  </footer>
</div>
</body>
</html>