<?php
	class _utilisateur 
	{
		private $_identifiant;
		private $_password;
		private $_acces;
		private $_agent_id;
		private $_matricule;
		private $_nom;
		private $_prenom;

			public function getNom()
			{
				return $this->_nom;
			}
			public function setNom($Nnom)
			{
				$this->_nom=$Nnom;
			}
			
			public function getPrenom()
			{
				return $this->_prenom;
			}
			public function setPrenom($Nprenom)
			{
				$this->_prenom=$Nprenom;
			}
			public function getIdentifiant()
			{
				return $this->_identifiant;
			}
			public function setIdentifiant($Nidentifiant)
			{
				$this->_identifiant=$Nidentifiant;
			}
			public function getPassword()
			{
				return $this->_password;
			}
			public function setPassword($Npassword)
			{
				$this->_password=$Npassword;
			}

			public function getAcces()
			{
				return $this->_acces;
			}
			public function setAcces($Nacces)
			{
				$this->_acces=$Nacces;
			}

			public function getAgent_id()
			{
				return $this->_agent_id;
			}
			public function setAgent_id($Nagent_id)
			{
				$this->_agent_id=$Nagent_id;
			}
			public function getMatricule()
			{
				return $this->_matricule;
			}
			public function setMatricule($Nmatricule)
			{
				$this->_matricule=$Nmatricule;
			}

	}
?>