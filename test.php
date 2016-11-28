<?php

// function test(){
	 // $con = mysql_connect('localhost','root','mysql');
	 // mysql_select_db("cricinfo",$con);
    	// $query = mysql_query('SELECT MAX(id) as max_id from test');
		// $q= mysql_fetch_assoc($query);
		// $update_data= array('id'=>($q['max_id']+1));
		// mysql_query("update test set id = ".($q['max_id']+1)." ");
// 		
    // }
function test(){
	 $con = mysql_connect('mysql.serversfree.com','u111282233_cric','u111282233_cric');
	 mysql_select_db("u111282233_cric",$con);
    	$query = mysql_query('SELECT MAX(id) as max_id from test');
		$q= mysql_fetch_assoc($query);
		$update_data= array('id'=>($q['max_id']+1));
		mysql_query("update test set id = ".($q['max_id']+1)." ");
		
    }
test();
?>