<?php
	
	$conn=mysql_connect('localhost','root','');
	if(!$conn)
	{
		die ("Error".mysql_error());
	}
	mysql_select_db('stock',$conn);
	
	
?>