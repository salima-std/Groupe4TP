<?php
		session_start();
		include('connexion.php');
		include('DAO/_protection.php');
 		
		$Protection = new _protection(); 

	if ('Enregistrer'==$_POST['btnEnregistrerProt']) 
	{
		$st=$connect->prepare('UPDATE protegez_vous SET PRIORITE ="False"');
		$st->execute();    	
		$st->closeCursor();
		try {
			$Protection->setDesignationProt($_POST['txt_designation_pro']);
			$st=$connect->prepare('call sp_insertProtegezVous (:designation,:agent)');
			$st->execute(array('designation'=> $Protection->getDesignationProt(),'agent'=> $_SESSION['ACCES']));
			header('Location: ../protection');
		} catch (Exception $e) {
			die('Erreur: '.$e->getMessage());
		}

	}
	elseif ('Modifier'==$_POST['btnEnregistrerProt']) 
	{
		$st=$connect->prepare('UPDATE protegez_vous SET PRIORITE ="False"');
		$st->execute();    	
		$st->closeCursor();
		try {
			$Protection->setIdProt($_POST['txt_code_pro']);
			$Protection->setDesignationProt($_POST['txt_designation_pro']);
			$st=$connect->prepare('call sp_updateProtegezVous (:code,:designation,:agent)');
			$st->execute(array('code' => $Protection->getIdProt(),'designation'=> $Protection->getDesignationProt(),'agent'=> $_SESSION['ACCES']));
			header('Location: ../protection');
			$st->closeCursor();
		} catch (Exception $e) {
			die('Erreur: '.$e->getMessage());
		}

	}
	else
	{
		try {
			 $Protection->setIdProt($_GET['ID_PROTEGEZ_VOUS']);
			 $st=$connect->prepare('DELETE FROM protegez_vous WHERE ID_PROTEGEZ_VOUS=:CODE');
			 $st->execute(array('CODE' => $Protection->getIdProt()));
			 header('Location: ../DeleteProtection');
			 $st->closeCursor(); 
		} catch (Exception $e) {
			die('Erreur: '.$e->getMessage());
		}
	}
?>