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
	<h4>5 Most Visited Products</h4>
    </div>
  </div> 
  <section> 
    <div id="galleries-container">
	  <div class="gallery">
		<?php
			$most_visited = array();
			$max_views = 0;
			$max_name = "";
			$counter = 0;
		  
			while($counter < 5) {
			foreach($_COOKIE as $x => $val) {
				$data = json_decode($val, true);
				if(($data[4] > $max_views) && (!in_array($data[0], $most_visited))){
					$max_views = $data[4];
					$max_name = $data[0];
				}		
			}
				
			$counter = $counter + 1;
			array_push($most_visited, $max_name);
				$max_views = 0;
				$max_name = "";    
			}

			foreach($_COOKIE as $x => $val) {
				foreach($most_visited as $y){
					$data = json_decode($val, true);
								if($data[0] == $y)		
					echo '<a href="../'. $data[1] .'">
							<div class="thumbnail">
								<img src="../images/' . $data[2] . '" alt="" width="1668" height="2500" class="cards"/>
								<h4>'.$data[0].'</h4>
								<p class="tag">&#36;'.$data[3].'</p>
							</div>
						</a>';
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
