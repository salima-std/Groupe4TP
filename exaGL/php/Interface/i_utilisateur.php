<?php
	interface i_utilisateur
	{
		public function getNom();
		
		public function setNom($Nnom);
		
		public function getPostnom();
		
		public function setPosnom($Npostnom);
		
		public function getPrenom();
		
		public function setPrenom($Nprenom);
		
        public function getIdentifiant();
		
		public function setIdentifiant($Nidentifiant);
		
		public function getPassword();
		
		public function setPassword($Npassword);
		
		public function getAcces();
		
		public function setAcces($Nacces);

		public function getAgent_id();
		
		public function setAgent_id($Nagent_id);
		
		public function getMatricule();
		
		public function setMatricule($Nmatricule);
			

	}
?>