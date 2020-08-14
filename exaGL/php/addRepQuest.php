<?php
	session_start();
	include('connexion.php');
	include('DAO/_repQuest.php');
 		
		$RepQuest = new _repQuest();  

	if ('Enregistrer'==$_POST['btnEnregistrerQR']) 
	{
		$st=$connect->prepare('UPDATE q_r SET PRIORITE ="False"');
		$st->execute();    	
		$st->closeCursor();
		try {
			$RepQuest->setQuestionRQ($_POST['txt_question_rq']);
			$RepQuest->setReponseRQ($_POST['txt_reponse_rq']);
			$st=$connect->prepare('call sp_insertQR (:QUESTION,:REPONSE,:AGENT_ID)');
			$st->execute(array('QUESTION'=> $RepQuest->getQuestionRQ(),'REPONSE'=> $RepQuest->getReponseRQ(),'AGENT_ID'=>$_SESSION['ACCES']));
			header('Location: ../repQuest');
			$st->closeCursor();		
		} catch (Exception $e) {
			die('Ereur: '.$e->getMessage());
		}

	}
	elseif ('Modifier'==$_POST['btnEnregistrerQR']) 
	{
		$st=$connect->prepare('UPDATE q_r SET PRIORITE ="False"');
		$st->execute();    	
		$st->closeCursor();
		try {
			$RepQuest->setIdRQ($_POST['txt_code_rq']);
			$RepQuest->setQuestionRQ($_POST['txt_question_rq']);
			$RepQuest->setReponseRQ($_POST['txt_reponse_rq']);
			$st=$connect->prepare('call sp_updateQR (:CODE,:QUESTION,:REPONSE,:AGENT_ID)');
			$st->execute(array('CODE'=> $RepQuest->getIdRQ(),'QUESTION'=> $RepQuest->getQuestionRQ(),'REPONSE'=> $RepQuest->getReponseRQ(),'AGENT_ID'=>$_SESSION['ACCES']));
			header('Location: ../repQuest');
			$st->closeCursor();		
		} catch (Exception $e) {
			die('Ereur: '.$e->getMessage());
		}

	}
	else
	{
		try {
			$RepQuest->setIdRQ($_GET['ID_Q_R']);
			 $st=$connect->prepare('DELETE FROM q_r WHERE ID_Q_R=:CODE');
			 $st->execute(array('CODE' => $RepQuest->getIdRQ()));
			 header('Location: ../DeleteRepQuest');
			 $st->closeCursor(); 
		} catch (Exception $e) {
			die('Erreur: '.$e->getMessage());
		}
	}

?>