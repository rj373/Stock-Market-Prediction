<?php
include("includes/connect.php");



function createURL($ticker)
{
	$currentMonth=date("n");
	
	$currentMonth=$currentMonth-1;
	
	$currentDay=date("j");
	
	$currentYear=date("Y");
	return "http://real-chart.finance.yahoo.com/table.csv?s=$ticker&d=$currentMonth&e=$currentDay&f=$currentYear&g=d&a=3&b=10&c=2015&ignore=.csv";
	
	
}


function getCSVFile($url, $outputFile)
{
	$content=file_get_contents($url);
	$content=str_replace("Date,Open,High,Low,Close,Volume,Adj Close","",$content);
	$content=trim($content);
	file_put_contents($outputFile,$content);
}

function fileToDatabase($txtFile, $tableName)
{
	$file=fopen($txtFile,"r");
	while(!feof($file))
	{
		$line=fgets($file);
		$pieces=explode(",",$line);
		
		$date=$pieces[0];
		$open=$pieces[1];
		$high=$pieces[2];
		$low=$pieces[3];
		$close=$pieces[4];
		
		
		$sql = "SELECT * FROM $tableName";
		$result = mysql_query($sql);
		
		if(!$result){
		
			$sql2 = "CREATE TABLE $tableName (date DATE,open decimal(7,4) DEFAULT NULL,open_mov_av decimal(10,7) DEFAULT NULL,open_diff decimal(11,9) DEFAULT NULL,close decimal(7,4) DEFAULT NULL,close_mov_av decimal(10,7) DEFAULT NULL,close_diff decimal(11,9) DEFAULT NULL,high decimal(7,4) DEFAULT NULL,low decimal(7,4) DEFAULT NULL)";
			mysql_query($sql2);
		}
		
		$sql3 = "INSERT INTO $tableName(date,open,high,low,close) values
		('$date','$open','$high','$low','$close')";
		mysql_query($sql3);
		
		mysql_query("ALTER TABLE fb ADD `id` INT(2) NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST");
	
	$highest_id = mysql_query("SELECT MAX(id) AS id FROM fb");
	$row = mysql_fetch_row($highest_id);
    $highest_id = $row[0];
    $highest_id = $row[0];
	
	echo ("Highest ID is ".$highest_id);	
	$result = mysql_query("SELECT open as open FROM fb where id = $highest_id");
	$row = mysql_fetch_row($result);
    $open1 = $row[0];
	echo ("<br>open is ".$open1);
	echo("<br>");
	
	echo ("Highest ID is ".($highest_id-1));	
	$result = mysql_query("SELECT open as open FROM fb where id = $highest_id-1");
	$row = mysql_fetch_row($result);
    $open2 = $row[0];
	echo ("<br>open is ".$open2 );echo("<br>");
	
	echo ("Highest ID is ".($highest_id-2));	
	$result = mysql_query("SELECT open as open FROM fb where id = $highest_id-2");
	$row = mysql_fetch_row($result);
    $open3 = $row[0];
	echo ("<br>open is ".$open3 );echo("<br>");
    
	$open4=$open1+$open2+$open3;
	$openav=$open4/3;
	echo($openav);
	
	
	$result = mysql_query("SELECT * FROM fb where id = $highest_id");
	$row=mysql_fetch_array($result);
	$open=$row['open'];
	
	$opendiff = $open - $openav;
	
	mysql_query("update `fb` SET `open_mov_av`=$openav,`open_diff`=$opendiff WHERE id=$highest_id");
	mysql_query("update `fb` SET `open_mov_av`=NULL,`open_diff`=NULL WHERE id=1");
	mysql_query("update `fb` SET `open_mov_av`=NULL,`open_diff`=NULL WHERE id=2");

	
	$highest_id = mysql_query("SELECT MAX(id) AS id FROM fb");
	$row = mysql_fetch_row($highest_id);
    $highest_id = $row[0];
	
	echo ("Highest ID is ".$highest_id);	
	$result = mysql_query("SELECT close as close FROM fb where id = $highest_id");
	$row = mysql_fetch_row($result);
    $close1 = $row[0];
	echo ("<br>close is ".$close1);
	echo("<br>");
	
	echo ("Highest ID is ".($highest_id-1));	
	$result = mysql_query("SELECT close as close FROM fb where id = $highest_id-1");
	$row = mysql_fetch_row($result);
    $close2 = $row[0];
	echo ("<br>close is ".$close2 );echo("<br>");
	
	echo ("Highest ID is ".($highest_id-2));	
	$result = mysql_query("SELECT close as close FROM fb where id = $highest_id-2");
	$row = mysql_fetch_row($result);
    $close3 = $row[0];
	echo ("<br>close is ".$close3 );echo("<br>");
    
	$close4=$close1+$close2+$close3;
	$closeav=$close4/3;
	echo($closeav);
	
	
	$result = mysql_query("SELECT * FROM fb where id = $highest_id");
	$row=mysql_fetch_array($result);
	$close=$row['close'];
	
	$closediff = $close - $closeav;
	
	mysql_query("update `fb` SET `close_mov_av`=$closeav,`close_diff`=$closediff WHERE id=$highest_id");
	mysql_query("update `fb` SET `close_mov_av`=NULL,`close_diff`=NULL WHERE id=1");
	mysql_query("update `fb` SET `close_mov_av`=NULL,`close_diff`=NULL WHERE id=2");
		
		mysql_query("ALTER TABLE msft ADD `id` INT(2) NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST");
	
	$highest_id = mysql_query("SELECT MAX(id) AS id FROM msft");
	$row = mysql_fetch_row($highest_id);
    $highest_id = $row[0];
    $highest_id = $row[0];
	
	echo ("Highest ID is ".$highest_id);	
	$result = mysql_query("SELECT open as open FROM msft where id = $highest_id");
	$row = mysql_fetch_row($result);
    $open1 = $row[0];
	echo ("<br>open is ".$open1);
	echo("<br>");
	
	echo ("Highest ID is ".($highest_id-1));	
	$result = mysql_query("SELECT open as open FROM msft where id = $highest_id-1");
	$row = mysql_fetch_row($result);
    $open2 = $row[0];
	echo ("<br>open is ".$open2 );echo("<br>");
	
	echo ("Highest ID is ".($highest_id-2));	
	$result = mysql_query("SELECT open as open FROM msft where id = $highest_id-2");
	$row = mysql_fetch_row($result);
    $open3 = $row[0];
	echo ("<br>open is ".$open3 );echo("<br>");
    
	$open4=$open1+$open2+$open3;
	$openav=$open4/3;
	echo($openav);
	
	
	$result = mysql_query("SELECT * FROM msft where id = $highest_id");
	$row=mysql_fetch_array($result);
	$open=$row['open'];
	
	$opendiff = $open - $openav;
	
	mysql_query("update `msft` SET `open_mov_av`=$openav,`open_diff`=$opendiff WHERE id=$highest_id");
	mysql_query("update `msft` SET `open_mov_av`=NULL,`open_diff`=NULL WHERE id=1");
	mysql_query("update `msft` SET `open_mov_av`=NULL,`open_diff`=NULL WHERE id=2");

	
	$highest_id = mysql_query("SELECT MAX(id) AS id FROM msft");
	$row = mysql_fetch_row($highest_id);
    $highest_id = $row[0];
	
	echo ("Highest ID is ".$highest_id);	
	$result = mysql_query("SELECT close as close FROM msft where id = $highest_id");
	$row = mysql_fetch_row($result);
    $close1 = $row[0];
	echo ("<br>close is ".$close1);
	echo("<br>");
	
	echo ("Highest ID is ".($highest_id-1));	
	$result = mysql_query("SELECT close as close FROM msft where id = $highest_id-1");
	$row = mysql_fetch_row($result);
    $close2 = $row[0];
	echo ("<br>close is ".$close2 );echo("<br>");
	
	echo ("Highest ID is ".($highest_id-2));	
	$result = mysql_query("SELECT close as close FROM msft where id = $highest_id-2");
	$row = mysql_fetch_row($result);
    $close3 = $row[0];
	echo ("<br>close is ".$close3 );echo("<br>");
    
	$close4=$close1+$close2+$close3;
	$closeav=$close4/3;
	echo($closeav);
	
	
	$result = mysql_query("SELECT * FROM msft where id = $highest_id");
	$row=mysql_fetch_array($result);
	$close=$row['close'];
	
	$closediff = $close - $closeav;
	
	mysql_query("update `msft` SET `close_mov_av`=$closeav,`close_diff`=$closediff WHERE id=$highest_id");
	mysql_query("update `msft` SET `close_mov_av`=NULL,`close_diff`=NULL WHERE id=1");
	mysql_query("update `msft` SET `close_mov_av`=NULL,`close_diff`=NULL WHERE id=2");
		
		mysql_query("ALTER TABLE ge ADD `id` INT(2) NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST");
	
	$highest_id = mysql_query("SELECT MAX(id) AS id FROM ge");
	$row = mysql_fetch_row($highest_id);
    $highest_id = $row[0];
    $highest_id = $row[0];
	
	echo ("Highest ID is ".$highest_id);	
	$result = mysql_query("SELECT open as open FROM ge where id = $highest_id");
	$row = mysql_fetch_row($result);
    $open1 = $row[0];
	echo ("<br>open is ".$open1);
	echo("<br>");
	
	echo ("Highest ID is ".($highest_id-1));	
	$result = mysql_query("SELECT open as open FROM ge where id = $highest_id-1");
	$row = mysql_fetch_row($result);
    $open2 = $row[0];
	echo ("<br>open is ".$open2 );echo("<br>");
	
	echo ("Highest ID is ".($highest_id-2));	
	$result = mysql_query("SELECT open as open FROM ge where id = $highest_id-2");
	$row = mysql_fetch_row($result);
    $open3 = $row[0];
	echo ("<br>open is ".$open3 );echo("<br>");
    
	$open4=$open1+$open2+$open3;
	$openav=$open4/3;
	echo($openav);
	
	
	$result = mysql_query("SELECT * FROM ge where id = $highest_id");
	$row=mysql_fetch_array($result);
	$open=$row['open'];
	
	$opendiff = $open - $openav;
	
	mysql_query("update `ge` SET `open_mov_av`=$openav,`open_diff`=$opendiff WHERE id=$highest_id");
	mysql_query("update `ge` SET `open_mov_av`=NULL,`open_diff`=NULL WHERE id=1");
	mysql_query("update `ge` SET `open_mov_av`=NULL,`open_diff`=NULL WHERE id=2");

	
	$highest_id = mysql_query("SELECT MAX(id) AS id FROM ge");
	$row = mysql_fetch_row($highest_id);
    $highest_id = $row[0];
	
	echo ("Highest ID is ".$highest_id);	
	$result = mysql_query("SELECT close as close FROM ge where id = $highest_id");
	$row = mysql_fetch_row($result);
    $close1 = $row[0];
	echo ("<br>close is ".$close1);
	echo("<br>");
	
	echo ("Highest ID is ".($highest_id-1));	
	$result = mysql_query("SELECT close as close FROM ge where id = $highest_id-1");
	$row = mysql_fetch_row($result);
    $close2 = $row[0];
	echo ("<br>close is ".$close2 );echo("<br>");
	
	echo ("Highest ID is ".($highest_id-2));	
	$result = mysql_query("SELECT close as close FROM ge where id = $highest_id-2");
	$row = mysql_fetch_row($result);
    $close3 = $row[0];
	echo ("<br>close is ".$close3 );echo("<br>");
    
	$close4=$close1+$close2+$close3;
	$closeav=$close4/3;
	echo($closeav);
	
	
	$result = mysql_query("SELECT * FROM ge where id = $highest_id");
	$row=mysql_fetch_array($result);
	$close=$row['close'];
	
	$closediff = $close - $closeav;
	
	mysql_query("update `ge` SET `close_mov_av`=$closeav,`close_diff`=$closediff WHERE id=$highest_id");
	mysql_query("update `ge` SET `close_mov_av`=NULL,`close_diff`=NULL WHERE id=1");
	mysql_query("update `ge` SET `close_mov_av`=NULL,`close_diff`=NULL WHERE id=2");
	
	mysql_query("ALTER TABLE yhoo ADD `id` INT(2) NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST");
	
	$highest_id = mysql_query("SELECT MAX(id) AS id FROM yhoo");
	$row = mysql_fetch_row($highest_id);
    $highest_id = $row[0];
    $highest_id = $row[0];
	
	echo ("Highest ID is ".$highest_id);	
	$result = mysql_query("SELECT open as open FROM yhoo where id = $highest_id");
	$row = mysql_fetch_row($result);
    $open1 = $row[0];
	echo ("<br>open is ".$open1);
	echo("<br>");
	
	echo ("Highest ID is ".($highest_id-1));	
	$result = mysql_query("SELECT open as open FROM yhoo where id = $highest_id-1");
	$row = mysql_fetch_row($result);
    $open2 = $row[0];
	echo ("<br>open is ".$open2 );echo("<br>");
	
	echo ("Highest ID is ".($highest_id-2));	
	$result = mysql_query("SELECT open as open FROM yhoo where id = $highest_id-2");
	$row = mysql_fetch_row($result);
    $open3 = $row[0];
	echo ("<br>open is ".$open3 );echo("<br>");
    
	$open4=$open1+$open2+$open3;
	$openav=$open4/3;
	echo($openav);
	
	
	$result = mysql_query("SELECT * FROM yhoo where id = $highest_id");
	$row=mysql_fetch_array($result);
	$open=$row['open'];
	
	$opendiff = $open - $openav;
	
	mysql_query("update `yhoo` SET `open_mov_av`=$openav,`open_diff`=$opendiff WHERE id=$highest_id");
	mysql_query("update `yhoo` SET `open_mov_av`=NULL,`open_diff`=NULL WHERE id=1");
	mysql_query("update `yhoo` SET `open_mov_av`=NULL,`open_diff`=NULL WHERE id=2");

	
	$highest_id = mysql_query("SELECT MAX(id) AS id FROM yhoo");
	$row = mysql_fetch_row($highest_id);
    $highest_id = $row[0];
	
	echo ("Highest ID is ".$highest_id);	
	$result = mysql_query("SELECT close as close FROM yhoo where id = $highest_id");
	$row = mysql_fetch_row($result);
    $close1 = $row[0];
	echo ("<br>close is ".$close1);
	echo("<br>");
	
	echo ("Highest ID is ".($highest_id-1));	
	$result = mysql_query("SELECT close as close FROM yhoo where id = $highest_id-1");
	$row = mysql_fetch_row($result);
    $close2 = $row[0];
	echo ("<br>close is ".$close2 );echo("<br>");
	
	echo ("Highest ID is ".($highest_id-2));	
	$result = mysql_query("SELECT close as close FROM yhoo where id = $highest_id-2");
	$row = mysql_fetch_row($result);
    $close3 = $row[0];
	echo ("<br>close is ".$close3 );echo("<br>");
    
	$close4=$close1+$close2+$close3;
	$closeav=$close4/3;
	echo($closeav);
	
	
	$result = mysql_query("SELECT * FROM yhoo where id = $highest_id");
	$row=mysql_fetch_array($result);
	$close=$row['close'];
	
	$closediff = $close - $closeav;
	
	mysql_query("update `yhoo` SET `close_mov_av`=$closeav,`close_diff`=$closediff WHERE id=$highest_id");
	mysql_query("update `yhoo` SET `close_mov_av`=NULL,`close_diff`=NULL WHERE id=1");
	mysql_query("update `yhoo` SET `close_mov_av`=NULL,`close_diff`=NULL WHERE id=2");

		mysql_query("ALTER TABLE aapl ADD `id` INT(2) NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST");
	
	$highest_id = mysql_query("SELECT MAX(id) AS id FROM aapl");
	$row = mysql_fetch_row($highest_id);
    $highest_id = $row[0];
	
	echo ("Highest ID is ".$highest_id);	
	$result = mysql_query("SELECT open as open FROM aapl where id = $highest_id");
	$row = mysql_fetch_row($result);
    $open1 = $row[0];
	echo ("<br>open is ".$open1);
	echo("<br>");
	
	echo ("Highest ID is ".($highest_id-1));	
	$result = mysql_query("SELECT open as open FROM aapl where id = $highest_id-1");
	$row = mysql_fetch_row($result);
    $open2 = $row[0];
	echo ("<br>open is ".$open2 );echo("<br>");
	
	echo ("Highest ID is ".($highest_id-2));	
	$result = mysql_query("SELECT open as open FROM aapl where id = $highest_id-2");
	$row = mysql_fetch_row($result);
    $open3 = $row[0];
	echo ("<br>open is ".$open3 );echo("<br>");
    
	$open4=$open1+$open2+$open3;
	$openav=$open4/3;
	echo($openav);
	
	
	$result = mysql_query("SELECT * FROM aapl where id = $highest_id");
	$row=mysql_fetch_array($result);
	$open=$row['open'];
	
	$opendiff = $open - $openav;
	
	mysql_query("update `aapl` SET `open_mov_av`=$openav,`open_diff`=$opendiff WHERE id=$highest_id");
	mysql_query("update `aapl` SET `open_mov_av`=NULL,`open_diff`=NULL WHERE id=1");
	mysql_query("update `aapl` SET `open_mov_av`=NULL,`open_diff`=NULL WHERE id=2");

	
	$highest_id = mysql_query("SELECT MAX(id) AS id FROM aapl");
	$row = mysql_fetch_row($highest_id);
    $highest_id = $row[0];
	
	echo ("Highest ID is ".$highest_id);	
	$result = mysql_query("SELECT close as close FROM aapl where id = $highest_id");
	$row = mysql_fetch_row($result);
    $close1 = $row[0];
	echo ("<br>close is ".$close1);
	echo("<br>");
	
	echo ("Highest ID is ".($highest_id-1));	
	$result = mysql_query("SELECT close as close FROM aapl where id = $highest_id-1");
	$row = mysql_fetch_row($result);
    $close2 = $row[0];
	echo ("<br>close is ".$close2 );echo("<br>");
	
	echo ("Highest ID is ".($highest_id-2));	
	$result = mysql_query("SELECT close as close FROM aapl where id = $highest_id-2");
	$row = mysql_fetch_row($result);
    $close3 = $row[0];
	echo ("<br>close is ".$close3 );echo("<br>");
    
	$close4=$close1+$close2+$close3;
	$closeav=$close4/3;
	echo($closeav);
	
	
	$result = mysql_query("SELECT * FROM aapl where id = $highest_id");
	$row=mysql_fetch_array($result);
	$close=$row['close'];
	
	$closediff = $close - $closeav;
	
	mysql_query("update `aapl` SET `close_mov_av`=$closeav,`close_diff`=$closediff WHERE id=$highest_id");
	mysql_query("update `aapl` SET `close_mov_av`=NULL,`close_diff`=NULL WHERE id=1");
	mysql_query("update `aapl` SET `close_mov_av`=NULL,`close_diff`=NULL WHERE id=2");
		ini_set('max_execution_time', 2500);
		
	}
	fclose($file); 
}
function main(){
	echo "main ";
	$mainTickerFile = fopen("tickerMaster.txt","r");
	while(!feof($mainTickerFile)){
		$companyTicker = fgets($mainTickerFile);
		$companyTicker = trim($companyTicker);
		
		$fileURL = createURL($companyTicker);
		$companyTxtFile = "txtFiles/".$companyTicker.".txt";
		getCSVFile($fileURL,$companyTxtFile);
		fileToDatabase($companyTxtFile,$companyTicker);
	}	
}
main();
?>



