<?php
	include('connexion.php');
	include('DAO/_agent.php');   

	$Agent =new _agent();
	
	if ('Eregistrer'==$_POST['btnEnregistrerAg']) 
	{
		try {
			$Agent->setNomAg($_POST['txt_nom_ag']);
			$Agent->setPostnomAg($_POST['txt_postnom_ag']);
			$Agent->setPrenomAg($_POST['txt_prenom_ag']);
			$Agent->setSexeAg($_POST['txt_sexe_ag']);
			$Agent->setEtat_civilAg($_POST['txt_etat_civil_ag']);
			$Agent->setFonctionAg($_POST['txt_fonction_ag']);
			$Agent->setTelephoneAg($_POST['txt_telephone_ag']);
			$Agent->setAdresseAg($_POST['txt_adresse_ag']);
			$st=$connect->prepare('call sp_insertAgent (:nom,:postnom,:prenom,:sexe,:etat_civil,:fonction,:telephone,:adresse)');
			$st->execute(array(
				'nom' => $Agent->getNomAg(),
				'postnom' => $Agent->getPostnomAg(),
				'prenom' => $Agent->getPrenomAg(),
				'sexe' => $Agent->getSexeAg(),
				'etat_civil' => $Agent->getEtat_civilAg(),
				'fonction' => $Agent->getFonctionAg(), 
				'telephone' => $Agent->getTelephoneAg(),
				'adresse' => $Agent->getAdresseAg()
			));
			header('Location: ../agent');
			$st->closeCursor();
		} catch (Exception $e) {
			die('Erreur: '.$e->getMessage());
		}

	}
	elseif ('Modifier'==$_POST['btnEnregistrerAg']) 
	{
		try {
			$Agent->setIdAg($_POST['txt_matricule_ag']);
			$Agent->setNomAg($_POST['txt_nom_ag']);
			$Agent->setPostnomAg($_POST['txt_postnom_ag']);
			$Agent->setPrenomAg($_POST['txt_prenom_ag']);
			$Agent->setSexeAg($_POST['txt_sexe_ag']);
			$Agent->setEtat_civilAg($_POST['txt_etat_civil_ag']);
			$Agent->setFonctionAg($_POST['txt_fonction_ag']);
			$Agent->setTelephoneAg($_POST['txt_telephone_ag']);
			$Agent->setAdresseAg($_POST['txt_adresse_ag']);
			$st=$connect->prepare('call sp_updateAgent (:CODE,:nom,:postnom,:prenom,:sexe,:etat_civil,:fonction,:telephone,:adresse)');
			$st->execute(array(
				'CODE' => $Agent->getIdAg(),
				'nom' => $Agent->getNomAg(),
				'postnom' => $Agent->getPostnomAg(),
				'prenom' => $Agent->getPrenomAg(),
				'sexe' => $Agent->getSexeAg(),
				'etat_civil' => $Agent->getEtat_civilAg(),
				'fonction' => $Agent->getFonctionAg(), 
				'telephone' => $Agent->getTelephoneAg(),
				'adresse' => $Agent->getAdresseAg()
			));
			header('Location: ../agent');
			$st->closeCursor();
		} catch (Exception $e) {
			die('Erreur: '.$e->getMessage());
		}

	}
	else
	{
		try {
			 $Agent->setIdAg($_GET['ID_AGENT']);
			 $st=$connect->prepare('DELETE FROM agent WHERE ID_AGENT=:CODE');
			 $st->execute(array('CODE' => $Agent->getIdAg()));
			 header('Location: ../DeleteAgent'); 
		} catch (Exception $e) {
			die('Erreur: '.$e->getMessage());
		}
	}

?>