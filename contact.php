<?php include("header.php");?>
<?php require_once("db_connection.php");?>
<?php require_once("functions.php");?>
<?php require_once("validation_functions.php");?>

<!-- Header -->
<html>	
 <head>
	<title>Stock Market Prediction</title>
		<meta charset="utf-8"><title>Stock Market Prediction</title>
 <meta http-equiv="content-type" content="text/html; charset=utf-8" />
 <meta name="keywords" content="jquery, yql, yahoo, finance api, stock market, currency, stock quotes, javascript, ajax, prediction, markov, hidden markov, share market prediction" />
 <meta name="description" content="Retreive Stock Market Quotes by using jQuery and Yahoo!'s YQL And predicting future stock prices based on Markov's Chain Model" />
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <!-- <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600" rel="stylesheet" type="text/css" /> -->
 <!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
 <script src="js/jquery.min.js"></script>
 <script src="js/skel.min.js"></script>
 <script src="js/skel-panels.min.js"></script>
 <script src="js/init.js"></script>
 <noscript>
<link rel="stylesheet" href="css/skel-noscript.css" />
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/style-wide.css" />
<link rel="stylesheet" href="css/style-narrow.css" />
<link rel="stylesheet" href="css/style-narrower.css" />
<link rel="stylesheet" href="css/style-normal.css" />
<link rel="stylesheet" href="css/style-mobile.css" />
 </noscript>
 <!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
 <!--[if lte IE 8]><link rel="stylesheet" href="css/ie8.css" /><![endif]-->
		<meta name="viewport" content="width=device-width, initial-scale=1">		
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</head>
	<body>
	
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class ="navbar-header">
				<a href ="index.php" class="navbar-brand"><b>Stock Market Prediction</b></a>
			</div>
			
			<div>
				<ul class="nav navbar-nav">
					<li><a href="index.php" ><span class="icon icon-home">&nbsp&nbsp Home</span></a></li>					
					<li><a href="yf.php"><span class="icon icon-th">&nbsp&nbsp Yahoo News</span></a></li>
					<li><a href="aboutpro.php" ><span class="icon icon-user">&nbsp&nbsp About The Project</span></a></li>
					<li><a href="ot.php" ><span class="icon icon-user">&nbsp&nbsp Our Team</span></a></li>
					<li><a href="contacct.php"><span class="icon icon-envelope">&nbsp&nbsp Contact</span></a></li>
				</ul>
			</div>
		</div>
		</nav>
       

      <div id="main">
			
				<!-- Intro -->
					<section id="top" class="one">
						<div class="container">
						
							<?php
							  if(isset($_POST['name'])){
							    
							    // Validations.
							    $required_fields = array("name", "email","message");
							    validate_presences($required_fields);

							    $fields_with_max_lengths = array("name" => 32, "email" => 64, "message" => 1024);
							    validate_max_lengths($fields_with_max_lengths);

							    
							    if(empty($errors)){
							      //Perform update.
							      	
							      $name = mysql_prep($_POST["name"]);
							      $email = mysql_prep($_POST["email"]);
							      
							      $message = mysql_prep($_POST["message"]);
							      
							      
							      

							      $query = "INSERT INTO messages ";
							      $query .= "(name, email, message) ";
							      $query .= "VALUES ('{$name}', '{$email}', '{$message}')";
							      
							      $result = mysqli_query($connection, $query);
							      // Test if there was a query error.
							      if($result && mysqli_affected_rows($connection) >= 0){
							        //Success
							        echo "<h2>Your Message has been sincerely recieved by Us!! Thank You...</h2";
							        
							      } else {
							        //Failure
							        echo "<h2>Due to some error, your request cannot be processed by us!! Please try again later...<h2>";
							      }

							    }
							  } else{
							    redirect_to("index.php");
							  }

							?>

							<h3>
								<?php echo form_errors($errors);?>
							</h3>
						</div>
					</section>
			</div>

	</body>
</html>


