<?php
	session_start();
	include('connexion.php');
	include('DAO/_actualite.php');
 
	$Actualite = new _actualite();
	 
    	
    if ('Eregistrer'==$_POST['bntEnregistrerAct']) {
    	    $st=$connect->prepare('UPDATE actualite SET PRIORITE ="False"');
		    $st->execute();    	
		    $st->closeCursor();
		try{
			$Actualite->setDesignationAct($_POST['txt_desig_act']);
			$Actualite->setLienAct($_POST['txt_lien_act']);	
			$statement=$connect->prepare('call sp_insertActualite(:designation,:lien,:agent)');
			$statement->execute(array(
				'designation' => $Actualite->getDesignationAct(), 
				'lien' => $Actualite->getLienAct(),
				'agent' => $_SESSION['ACCES']
			));
			header('Location: ../actualite');
			$st->closeCursor();
		}catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	elseif ('Modifier'==$_POST['bntModifierAct']) 
	{
		$st=$connect->prepare('UPDATE actualite SET PRIORITE ="False"');
		$st->execute();    	
		$st->closeCursor();
		try{
			$Actualite->setIdAct($_POST['txt_code_act1']);
			$Actualite->setDesignationAct($_POST['txt_desig_act1']);
			$Actualite->setLienAct($_POST['txt_lien_act1']);
		    $statement=$connect->prepare('CALL sp_updateActualite (:code,:designation,:lien,:agent)');
		    $statement->execute(array(
		    	'code' => $Actualite->getIdAct(),
		    	'designation' => $Actualite->getDesignationAct(), 
				'lien' => $Actualite->getLienAct(),
				'agent' => $_SESSION['ACCES']
		    ));
			header('Location: ../actualite');
			$st->closeCursor();
		}catch(Exception $e)
		{
		    echo $e->getMessage();
		}
	}
	else
	{
		try {
			$Actualite->setIdAct($_GET['ID_ACTUALITE']);
			$st=$connect->prepare('DELETE FROM actualite WHERE ID_ACTUALITE=:CODE');
			$st->execute(array('CODE' => $Actualite->getIdAct()));
			header('Location: ../DeleteActualite');
			$st->closeCursor(); 
		} catch (Exception $e) {
			die('Erreur: '.$e->getMessage());
		}
		
	}

        
?>