<?php
	session_start();
	include('connexion.php');

	try {
		$st=$connect->prepare('UPDATE q_r SET PRIORITE ="False"');
		$st->execute();    	
		$st->closeCursor();
	} catch (Exception $e) {
		die('Erreur: '.$e->getMessage());
	}
	
	try {
		$st=$connect->prepare('UPDATE q_r SET PRIORITE ="True" WHERE ID_Q_R=:CODE');
	$st->execute(array('CODE' => $_GET['ID_Q_R']));
	header('Location: ../DeleteRepQuest');
	$st->closeCursor();
	} catch (Exception $e) {
		die('Erreur: '.$e->getMessage());
	}
	 
		
?>