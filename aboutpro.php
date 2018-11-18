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
		<section id="about" class="three">
						<div class="container">

							
							<h2>About The Project</h2>
							<hr/>

							
<p align="justify"><font size="5" color="grey">Stock market analysis and prediction is one of the interesting areas in which past data could be used to anticipate and predict data and information about future. Technically speaking, this area is of high importance for professionals in the industry of finance and stock exchange as they can lead and direct future trends or manage crises over time. Using the stochastic processes called Markov Chains, we sought out to predict the immediate future stock prices for a few given companies. We found the moving averages for the data and the grouped them into ten different states of results. We then applied Markov Chain calculations to the data to create a 4x4 transitional probability matrix. Using this transition matrix we solved a system of equations and found 4 steady states that were variables that represented the probability that a stock price for a given day would fall into one of the ten states. When we use this information we can apply our actual data to these equations and predict the next stock prices for the near future. We were able to successfully predict the next few days of stock prices using this method.</font></p>


						</div>
		</section>
	</body>
</html>