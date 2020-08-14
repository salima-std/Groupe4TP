<?php
	 
	class _conseil 
	{
		private $_idCons;
		private $_designationCons;
		private $_lienCons;
		private $_dateCons;

		public function getIdCons()
		{
			return $this->_idCons;
		}
		public function setIdCons($NidCons)
		{
			$this->_idCons=$NidCons;
		}
		public function getDesignationCons()
		{
			return $this->_designationCons;
		}
		public function setDesignationCons($NdesignationCons)
		{
			$this->_designationCons=$NdesignationCons;
		}
		public function getLienCons()
		{
			return $this->_lienCons;
		}
		public function setLienCons($NlienCon)
		{
			$this->_lienCons=$NlienCon;
		}
		public function getDateCons()
		{
			return $this->_dateCons;
		}
		public function setDateCons($NdateCons)
		{
			$this->_dateCons=$NdateCons;
		}
	}

?>