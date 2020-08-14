<?php
	include('connexion.php');

	try {
		$st=$connect->prepare('UPDATE actualite SET PRIORITE ="False"');
	$st->execute();    	
	$st->closeCursor();
	} catch (Exception $e) {
		die('Erreur: '.$e->getMessage());
	}
	
	try {
		$st=$connect->prepare('UPDATE actualite SET PRIORITE ="True" WHERE ID_ACTUALITE=:CODE');
	$st->execute(array('CODE' => $_GET['ID_ACTUALITE']));
	header('Location: ../DeleteActualite');
	$st->closeCursor();
	} catch (Exception $e) {
		die('Erreur: '.$e->getMessage());
	}
	 
		
?>