<?php
    interface i_agent 
        {
            public function getIdAg();   
            
            public function setIdAg($NidAg); 
            
            public function getNomAg();
            
            public function setNomAg($NnomAg);
           
            public function getPostnomAg();
            
            public function setPostnomAg($NpostnomAg);
            
            public function getPrenomAg();
            
            public function setPrenomAg($NprenomAg);
            
            public function getSexeAg();
            
            public function setSexeAg($NsexeAg);
            
            public function getEtat_civilAg();
            
            public function setEtat_civilAg($Netat_civilAg);
            
            public function getFonctionAg();
            
            public function setFonctionAg($NfonctionAg);
            
            public function getTelephoneAg();
            
            public function setTelephoneAg($NtelephoneAg);
            
            public function getAdresseAg();
            
            public function setAdresseAg($NadresseAg);
            
            public function getDateAg();
            
            public function setDateAg($NdateAg);
            
        }
	 ?>