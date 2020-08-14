<?php
	
	include('connexion.php'); 
	include('DAO/_utilisateur.php');   

		$Utilisateur = new _utilisateur();

	if ('Enregistrer'==$_POST['btnEnregistrerUser']) 
	{
		try {
			$Utilisateur->setIdentifiant($_POST['txt_identifiant_us']);
			$Utilisateur->setPassword($_POST['txt_password_us']);
			$Utilisateur->setAcces($_POST['txt_acces_us']);
			$Utilisateur->setAgent_id($_POST['txt_matricule_us']);
			$st=$connect->prepare('call sp_insertUtilisateur (:IDENTIFIANT,:MOT_DE_PASSE,:ACCES,:AGENT_ID)');
			$st->execute(array(
				'IDENTIFIANT'=>$Utilisateur->getIdentifiant(),
				'MOT_DE_PASSE'=>$Utilisateur->getPassword(),
				'ACCES'=>$Utilisateur->getAcces(),
				'AGENT_ID'=>$Utilisateur->getAgent_id()
			));
			header('Location: ../utilisateur');
			$st->closeCursor();	
		} catch (Exception $e) {
			die('Erreur: '.$e->getMessage());
		}

	}
	else
	{
		try {
			$Utilisateur->setAgent_id($_GET['ID_AGENT']);
			 $st=$connect->prepare('DELETE FROM utilisateur WHERE AGENT_ID=:CODE');
			 $st->execute(array('CODE' => $Utilisateur->getAgent_id()));
			 header('Location: ../DeleteUtilisateur');
			 $st->closeCursor(); 
		} catch (Exception $e) {
			die('Erreur: '.$e->getMessage());
		}
	}

?>