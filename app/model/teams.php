<?php

	$host="10.72.6.127";
	$dbname="dca93be0a714e4a88acefe3c501c6e2c1";
	$port="5432";
	$username="uca93be0a714e4a88acefe3c501c6e2c1";
	$password="15ba6eeb709e4ff7b70bbde1fc1e6010";
	
	try
	{		
		include("../libraries/adodb/adodb-exceptions.inc.php");
		include("../libraries/adodb/adodb.inc.php"); 
		
		
		// Set error reporting level to max
		error_reporting(E_ALL);
		
		$db= ADONewConnection('postgres');
		$db->PConnect("$host", "$username", "$password", "$dbname");
		

		$group =  $_REQUEST['group'];
		$sql = "SELECT * FROM public.teams where gp='" . $group . "'";

		//$rs = &$db->Execute($sql);

		$data = array();

		$data = $db->GetArray($sql);

		$out = [];
/*
		foreach($data as $element) {
		        $out[$element['gp']][] = ['logo' => $element['logo'], 'name' => $element['name'], 'points' => $element['points'], 'symbol' => $element['symbol']];
		}

		/*

		if (!$rs) {
			throw new Exception('Query did not execute');
		}
		else {
		  while (!$rs->EOF) {
			print $rs->fields[0]. " : " . $rs->fields[1]. " : " . $rs->fields[2]; 
			$rs->MoveNext();  //  Moves to the next row
		  }  
		} 

		*/

		echo json_encode($data);
		

	} catch(exception $e)
	{
		echo 'Caught Exceptoin..';
		die($e->getMessage());
	}
?>