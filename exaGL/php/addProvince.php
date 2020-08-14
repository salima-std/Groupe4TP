<?php
	 session_start();
	 include('connexion.php');
	 include('DAO/_province.php');
 		
	$Province =new _province();

	try {
			$Province->setDesigantionProv($_POST['txt_designation_prov']);
			$Province->setNbr_cas($_POST['txt_nbrConf_prov']);
			$Province->setNombre_dece($_POST['txt_nbrDece_prov']);
			$Province->setNombre_gueri($_POST['txt_nbrGueri_prov']);
			$st=$connect->prepare('call sp_updateProvince (:DESIGNATION_PROVINCE,:NOMBRE_CAS,:NOMBRE_MORT,:NOMBRE_GUERISON,:AGENT_ID)');
			$st->execute(array(
			'DESIGNATION_PROVINCE' => $Province->getDesigantionProv(),
			'NOMBRE_CAS' => $Province->getNbr_cas(),
			'NOMBRE_MORT' => $Province->getNombre_dece(),
			'NOMBRE_GUERISON' => $Province->getNombre_gueri(),
			'AGENT_ID' => $_SESSION['ACCES']
			));
			header('Location: ../province');
			$st->closeCursor();  
		} catch (Exception $e) {
			die('Erreur: '.$e->getMessage());
		}
	
?>