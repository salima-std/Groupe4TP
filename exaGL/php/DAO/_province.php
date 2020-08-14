<?php
 
class _province 
{
	private $_idProv;
	private $_desigantionProv;
	private $_nbr_cas;
	private $_nombre_gueri;
	private $_nombre_dece;
	private $_date_prov;

	public function getIdProv()
	{
		return $this->_idProv;
	}
	public function setIdProv($NidProv)
	{
		$this->_id_prov=$Nid_prov;
	}

	public function getDesigantionProv()
	{
		return $this->_desigantionProv;
	}
	public function setDesigantionProv($NdesigantionProv)
	{
		$this->_desigantionProv=$NdesigantionProv;
	}

	public function getNbr_cas()
	{
		return $this->_nbr_cas;
	}
	public function setNbr_cas($Nnombre_cas)
	{
		$this->_nbr_cas=$Nnombre_cas;
	}
	public function getNombre_gueri()
	{
		return $this->_nombre_gueri;
	}
	public function setNombre_gueri($Nnombre_gueri)
	{
		$this->_nombre_gueri=$Nnombre_gueri;
	}
	public function getNombre_dece()
	{
		return $this->_nombre_dece;
	}
	public function setNombre_dece($Nnombre_dece)
	{
		$this->_nombre_dece=$Nnombre_dece;
	}
	public function getDate_prov()
	{
		return $this->_date_prov;
	}
	public function setDate_prov($Ndate_prov)
	{
		$this->_date_prov=$Ndate_prov;
	}


}
?>


