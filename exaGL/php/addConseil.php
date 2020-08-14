<?php
		session_start();
		include('connexion.php');
		include('DAO/_conseil.php');
 		
		$Conseil = new _conseil();

	if ('Enregistrer'==$_POST['btnEnregistrerCons']) 
	{
		$st=$connect->prepare('UPDATE conseil_voyageur SET PRIORITE ="False"');
		$st->execute();    	
		$st->closeCursor();
		try {
			$Conseil->setDesignationCons($_POST['txt_designation_cons']);
			$Conseil->setLienCons($_POST['txt_lien_cons']);
			$st=$connect->prepare('call sp_insertConseil (:designation,:lien,:agent)');
			$st->execute(array(
				'designation' => $Conseil->getDesignationCons(),
				'lien' => $Conseil->getLienCons(),
				'agent' => $_SESSION['ACCES']
			));
			header('Location: ../conseil');
			$st->closeCursor();
		} catch (Exception $e) {
			die('Erreur: '.$e->getMessage());
		}

	}
	elseif ('Modifier'==$_POST['btnEnregistrerCons']) 
	{
		$st=$connect->prepare('UPDATE conseil_voyageur SET PRIORITE ="False"');
		$st->execute();    	
		$st->closeCursor();
		try {
			$Conseil->setIdCons($_POST['txt_code_cons']);
			$Conseil->setDesignationCons($_POST['txt_designation_cons']);
			$Conseil->setLienCons($_POST['txt_lien_cons']);
			$agent=202001;
			$st=$connect->prepare('call sp_updateConseil (:code,:designation,:lien,:agent)');
			$st->execute(array(
				'code' => $Conseil->getIdCons(),
				'designation' => $Conseil->getDesignationCons(),
				'lien' => $Conseil->getLienCons(),
				'agent' => $_SESSION['ACCES']
			));
			header('Location: ../conseil');
			$st->closeCursor();
		} catch (Exception $e) {
			die('Erreur: '.$e->getMessage());
		}

	}
	else
	{
		try {
			 $Conseil->setIdCons($_GET['ID_CONSEIL']);
			 $st=$connect->prepare('DELETE FROM conseil_voyageur WHERE ID_CONSEIL=:CODE');
			 $st->execute(array('CODE' => $Conseil->getIdCons()));
			 header('Location: ../DeleteConseil'); 
		} catch (Exception $e) {
			die('Erreur: '.$e->getMessage());
		}
	}
?>