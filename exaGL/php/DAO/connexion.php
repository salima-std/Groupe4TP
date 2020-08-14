<?php
	class _connexion
	{
		private $connect;

		public function getConnect()
		{
			return $this->connect;
		}
		public function setConnect()
		{
			try
			{
				$this->connect = new PDO("mysql:host=localhost;dbname=bd_genie_logiciel","root","sa");
				
			}
			catch (Exception $e)
			{
				die('Erreur : ' .$e->getMessage());
			}
			
		}
	}
	
	
    
    
?>