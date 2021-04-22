<!DOCTYPE html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lour Jewelry - Last 5 Visited Products</title>
  <link href="../css/index.css" rel="stylesheet" type="text/css">
  <link href="../css/jewelry.css" rel="stylesheet" type="text/css">
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
  <div class=gallery>
    <div class=thumbnail>
	<h4>Last 5 Visited Products</h4>
    </div>
  </div> 	
  <section> 
    <div id="galleries-container">
	  <div class="gallery">
		<?php
			$counter = 0;
		  
			foreach($_COOKIE as $x => $val) {
				$counter = $counter + 1;
				/*$data = json_decode($val, true);	
				
				foreach($data as $x => $val) {
					echo "$x = $val<br>";
				} */                
			}
		  
			if($counter > 5){
				$counter = $counter - 5;
			}else{
				$counter = 0;
			}

			foreach($_COOKIE as $x => $val) {
				if($counter == 0) {
					$data = json_decode($val, true);		
					echo '<a href="../'. $data[1] .'">
							<div class="thumbnail">
								<img src="../images/' . $data[2] . '" alt="" width="1668" height="2500" class="cards"/>
								<h4>'.$data[0].'</h4>
								<p class="tag">&#36;'.$data[3].'</p>
							</div>
						</a>';
				} else {
					$counter = $counter - 1;
				}                

			}
		?>
    </div>
  </div>
  </section>
  <!-- Footer Section -->
  <footer>
    <div class="copyright">CMPE 272 &copy;2019</div>
  </footer>
</div>
</body>
</html>
