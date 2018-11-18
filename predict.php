<?php include("header.php");?>
<?php require_once("db_connection.php");?>
<?php require_once("functions.php");?>

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
        
        
        

      <div id="main" style="align:left;position:relative;border:px solid red; line-height:16px;width:100%">
			
				<!-- Intro -->
					<section id="top" class="three">
						<div class="container" style="align:left;position:relative;border:0px solid red; line-height:16px;width:100%">
						<header><h3>Opening Price Prediction For <?php echo $_GET["stock"];?> : -</h3></header>
						<?php
	
							if (isset($_GET["stock"])) {
								$stock = $_GET["stock"];
								predict_for_opening_price($stock);
							}

						?>

						</div>
					</section>
					<section id="closing" class="three">
						<div class="container" style="align:left;position:relative;border:0px solid red; line-height:16px;width:100%">
						<header><h3>Closing Price Prediction For <?php echo $_GET["stock"];?> : -</h3></header>
						<?php
	
							if (isset($_GET["stock"])) {
								$stock = $_GET["stock"];
								predict_for_closing_price($stock);
							}

						?>

						</div>
					</section>
		</div>

	</body>
</html>
