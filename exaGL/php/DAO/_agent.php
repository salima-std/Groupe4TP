<?php
	class _agent  
	{
	    private $_idAg;  
	    private $_nomAg;    
	    private $_postnomAg;
	    private $_prenomAg;   
	    private $_sexeAg;
	    private $_etat_civilAg;
	    private $_fonctionAg;
	    private $_telephoneAg;
	    private $_adresseAg;
	    private $_dateAg;

	    public function getIdAg()    
	    {        
	    	return $this->_idAg;    
	    }
	    public function setIdAg($NidAg) 
	    {
	    	$this->_idAg = $NidAg;	    	       
	    }
	     public function getNomAg()
	     {
	     	return $this->_nomAg;
	     }
	     public function setNomAg($NnomAg)
	     {
	     	$this->_nomAg = $NnomAg;
	     }

	     public function getPostnomAg()
	     {
	     	return $this->_postnomAg;
	     }
	     public function setPostnomAg($NpostnomAg)
	     {
	     	$this->_postnomAg = $NpostnomAg;
	     }
	      public function getPrenomAg()
	     {
	     	return $this->_prenomAg;
	     }
	     public function setPrenomAg($NprenomAg)
	     {
	     	$this->_prenomAg = $NprenomAg;
	     }
	      public function getSexeAg()
	     {
	     	return $this->_sexeAg;
	     }
	     public function setSexeAg($NsexeAg)
	     {
	     	$this->_sexeAg = $NsexeAg;
	     }
	     public function getEtat_civilAg()
	     {
	     	return $this->_etat_civilAg;
	     }
	     public function setEtat_civilAg($Netat_civilAg)
	     {
	     	$this->_etat_civilAg = $Netat_civilAg;
	     }
	       public function getFonctionAg()
	     {
	     	return $this->_fonctionAg;
	     }
	     public function setFonctionAg($NfonctionAg)
	     {
	     	$this->_fonctionAg = $NfonctionAg;
	     }
	      public function getTelephoneAg()
	     {
	     	return $this->_telephoneAg;
	     }
	     public function setTelephoneAg($NtelephoneAg)
	     {
	     	$this->_telephoneAg = $NtelephoneAg;
	     }
	      public function getAdresseAg()
	     {
	     	return $this->_adresseAg;
	     }
	     public function setAdresseAg($NadresseAg)
	     {
	     	$this->_adresseAg = $NadresseAg;

	     }
	      public function getDateAg()
	     {
	     	return $this->_dateAg;
	     }
	     public function setDateAg($NdateAg)
	     {
	     	$this->_dateAg = $NdateAg;

	     }

	 }
	 ?>



