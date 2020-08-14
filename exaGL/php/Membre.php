<?php

    include('interface/i_actualite.php');

    class Membre implements i_actualite
    {
        public function enregistrer()
        {

            
        }
        
            private $pseudo;
            private $email;
            private $signature;
            private $actif;
            public function getPseudo()
            {
                return $this->pseudo;
            }
            public function setPseudo($nouveauPseudo)
            {
                if (!empty($nouveauPseudo) AND strlen($nouveauPseudo) < 50)
                    {
                    // Ok, on change son pseudo
                        $this->pseudo = $nouveauPseudo;
                    }
            } 
    }



#include_once('factory/f_actualite.php');
#	$variable=new v_actualite();
#	$variable.setIdAct("123");
#	echo $variable.getIdAct();
    /*
    include('connexion.php');
	$sql="select * from province";
    $stmt=$connect->query($sql) ;
	
    while ($rs = $stmt->fetch()) 
    	{ 
    		#echo $rs['DESIGNATION_PROVINCE'] . '<br />'; 
    	} 
    	$stmt->closeCursor();

    	 
    	*/

	/*
	include('connexion.php');
    $result;
    $query="select * from province";
    $statement=$connect->prepare($query);
    $statement->execute();
    $resultSet=$statement->fetchAll();
    foreach($resultSet as $row)
    { 
      echo $row['DESIGNATION_PROVINCE'];



    }
    */
?>