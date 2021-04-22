<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lour Jewelry - Welcome</title>
  <link href="css/index.css" rel="stylesheet" type="text/css">
  <link href="css/contacts.css" rel="stylesheet" type="text/css">
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <![endif]-->
</head>
<body>
<!-- Main Container -->
<div class="container"> 
  <!-- Header -->
  <header class="header">
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
   <!-- Contacts Section -->
  <section id="contacts">
	<?php
        if(!($myfile = fopen("contacts_info.txt","r"))){
            print( "<html><head><title>Error</title></head><body>Could not open contacts file</body></html>" );
            die();
        }
	  
		$i = 1;
		while(!feof($myfile)) {
            echo '<img src="images/contacts/contact'.$i.'.jpg" alt="">';
			echo '<p>';
            echo fgets($myfile) . "<br>";
			echo fgets($myfile) . "<br>";
            echo '</p>';
			$i = $i + 1;
		}

		fclose($myfile);
	?>  
  </section>
  <!-- Footer Section -->
  <footer>
    <div class="copyright">CMPE 272 &copy;2019</div>
  </footer>
</div>
<!-- Main Container Ends -->
</body>
</html>
