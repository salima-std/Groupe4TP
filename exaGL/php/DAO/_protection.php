<?php
	 
	class _protection  
	{
		
		private $_idProt;
		private $_designationProt;
		private $_dateProt;

		public function getIdProt()
		{
			return $this->_idProt;
		}
		public function setIdProt($NidProt)
		{
			$this->_idProt=$NidProt;
		}
		public function getDesignationProt()
		{
			return $this->_designationProt;
		}
		public function setDesignationProt($NdesignationProt)
		{
			$this->_designationProt=$NdesignationProt;
		}
		public function getDateProt()
		{
			return $this->_dateProt;
		}
		public function setDateProt($NdateProt)
		{
			$this->_dateProt=$NdateProt;
		}
	}


?>