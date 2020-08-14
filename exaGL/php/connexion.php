<?php
	try
	{
		$connect = new PDO("mysql:host=localhost;dbname=bd_genie_logiciel","root","sa");
    	
	}
	catch (Exception $e)
	{
		die('Erreur : ' .$e->getMessage());
	}
	
    
    
?>