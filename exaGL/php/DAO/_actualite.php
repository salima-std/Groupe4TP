<?php
	class _actualite  
	{
		private $_idAct;    
	    private $_designationAct;    
	    private $_lienAct;
		private $_dateAct;
		    
	    public function getIdAct()    
	    {        
	    	return $this->_idAct;    
	    }
	    public function setIdAct($NidAct)    
	    {
	     	$this->_idAct = $NidAct;
	    }
	    public function getDesignationAct()
	    {
	    	return $this->_designationAct;
	    }
	    public function setDesignationAct($NdesignationAct)
	    {
	    	$this->_designationAct=$NdesignationAct;
	    }
	    public function getLienAct()
	    {
	    	return $this->_lienAct;
	    }
	    public function setLienAct($NlienAct)
	    {
	    	$this->_lienAct=$NlienAct;
	    }
	    public function getDateAct()
	    {
	    	return $this->_dateAct;
	    }
	    public function setDateAct($NdateAct)
	    {
	    	$this->_dateAct=$NdateAct;
	    }
	}
?>