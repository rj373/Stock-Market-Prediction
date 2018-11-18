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
 <style>
 #container .container-item {   display: block;   margin: 5px 0;}

 </style>
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
		
		<section id="top" class="one">
		
						<center><div class="container">
							<center><img height="160" width="500" src="images/stock-market-logo.jpg"/></center>
							<hr/>
							<form name="quotes" role="form" method="post" action="get_stock.php">
							
								<div class="row half" >
									<div class="12u"><input  type="text" class="text" id="text"name="symbol" placeholder="Enter The Stock Symbol" /></div>
								</div>
								
								<div class="row half">
									<div class="12u">
										<a href="#" class="button submit">Get Stock Values</a>
									</div>
									
								</div>
							</form>
						</div></center>
		</section>
		<!--<div style="width:1400px;float:left;height:200px;">
		<div class="links" style="width:300px;float:left;height:200px;margin-left:150px;">
								<div>
								<article class="item">
										<a href="predict.php?stock=yhoo" class="image full"><img src="yahoo.png" width="50" height="160" alt="" /></a>
									</article></div>
									
									<div class="links" style="width:300px;height:200px;float:left;margin-left:100px;">
									<article class="item">
										<a href="predict.php?stock=ge" class="image full"><img src="img/General Electric.jpg" width="50" height="160" alt="" /></a>
									</article></div>
									
									<div class="links" style="width:300px;height:200px;float:left;margin-left:100px;">
									<article class="item">
										<a href="predict.php?stock=msft" class="image full"><img src="img/microsoft.jpg" width="50" height="160" alt="" /></a>
									</article></div>
								
								
								<div class="links" style="width:300px;height:200px;float:left;margin-left:140px;">
									<article class="item">
										<a href="predict.php?stock=aapl" class="image full"><img src="img/apple.png" width="50" height="160" alt="" /></a>
									</article></div>
									
									
									<div class="links" style="width:300px;height:200px;float:left;margin-left:500px;">
									<article class="item">
										<a href="predict.php?stock=fb" class="image full"><img src="img/fb.png" width="50" height="160" alt="" /></a>
									</article></div>
									
									
									
										</div>
										</div>-->
										<div>
											<div id="item1" class="container-item" style="width:800px;height:250;float:right">											
												<marquee behavior="scroll" direction="left" scrollamount="22">
												<img src="img/fb.jpg" width="500" height="250">
												<img src="img/apple.png"   width="500" height="250">
												<img src="img/gee.jpg" width="500" height="250">
												<img src="img/microsoft.jpg"   width="500" height="250">
												<img src="img/yahoo.png"   width="500" height="250">
												</marquee>											
											</div>
											
											<div id="item2" class="container-item" >
											<div class="dropdown">
												<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Select Stocks for Prediction
												<span class="caret"></span></button>
												<ul class="dropdown-menu">
												  <li><a href="predict.php?stock=fb">Facebook</a></li>
												  <li><a href="predict.php?stock=aapl">Apple</a></li>
												  <li><a href="predict.php?stock=ge">General Electric</a></li>
												  <li><a href="predict.php?stock=msft">Microsoft</a></li>
												  <li><a href="predict.php?stock=yhoo">Yahoo</a></li>
												</ul>
											  </div>
											</div>
										</div>
										


									

	</body>
</html>