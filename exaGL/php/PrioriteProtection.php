<?php
	include('connexion.php');

	try {
		$st=$connect->prepare('UPDATE protegez_vous SET PRIORITE ="False"');
		$st->execute();    	
		$st->closeCursor();
	} catch (Exception $e) {
		die('Erreur: '.$e->getMessage());
	}
	
	try {
		$st=$connect->prepare('UPDATE protegez_vous SET PRIORITE ="True" WHERE ID_PROTEGEZ_VOUS=:CODE');
	$st->execute(array('CODE' => $_GET['ID_PROTEGEZ_VOUS']));
	header('Location: ../DeleteProtection');
	$st->closeCursor();
	} catch (Exception $e) {
		die('Erreur: '.$e->getMessage());
	}
	 
		
?>