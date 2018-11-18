<?php include("header.php");?>
<?php include("stock_function.php");?>
<?php include("functions.php");?>
<?php include("stock_data.php");?>

<!-- Header -->
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
		<div><nav class="navbar navbar-default">
		<div class="container-fluid">
			
			<div class ="top,navbar-header">
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
		</div>
        
      
     
<?php
	global $yahoo_finance_tags;
	if ( isset($_POST["symbol"]) && !(trim($_POST["symbol"]) === "" )) {
	 	$symbol = $_POST["symbol"];
		// Getting Facebook Data
		$stock_data = get_stock_data_from_yahoo_finance_pv($symbol, $e);
		
	 }else{
	 	redirect_to("index.php");
	 }

?>
<!-- Main -->
			<div id="main">
			
				<!-- Intro -->
					<section id="top" class="one">
						<div class="container">
						<header><h2>Current Stock Quotes For <?php echo $stock_data["n"];?></h2></header>
						<?php 
							if ($stock_data != -1) {
	    				?>
	    				<table>
	    					<?php 
		    					foreach ($stock_data as $key => $value) {
		    						$string = "<tr>";
		    						$string .="<td>" . $yahoo_finance_tags[$key] . ":-</td>";
		    						$string .= "<td>" . $value . "</td>";
		    						$string .= "<tr>";
		    						echo $string;
		    					}
	    					?>
	    				</table>

	    				<?php		
							} else{
							    echo "<h2>No stock data is available. The detail of the error is: {$e}</h2>";
							}
						?>
							

						</div>
					</section>
			</div>

	</body>
</html>