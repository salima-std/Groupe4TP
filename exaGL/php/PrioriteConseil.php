<?php
	include('connexion.php');

	try {
		$st=$connect->prepare('UPDATE conseil_voyageur SET PRIORITE ="False"');
		$st->execute();    	
		$st->closeCursor();
	} catch (Exception $e) {
		die('Erreur: '.$e->getMessage());
	}
	
	try {
		$st=$connect->prepare('UPDATE conseil_voyageur SET PRIORITE ="True" WHERE ID_CONSEIL=:CODE');
	$st->execute(array('CODE' => $_GET['ID_CONSEIL']));
	header('Location: ../DeleteConseil');
	$st->closeCursor();
	} catch (Exception $e) {
		die('Erreur: '.$e->getMessage());
	}
	 
		
?>