<?php

	   include('cron_function.php');  
	 mysqlConnect();
	$str ="SELECT * FROM cric_cron_update";
	$query = mysql_query($str);
	$data  = mysql_fetch_assoc($query);
	pr($data);
