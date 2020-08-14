<?php
	 
	class _repQuest  
	{
		private $_idRQ;
		private $_questionRQ;
		private $_reponseRQ;
		private $_dateRQ;

		public function getIdRQ()
		{
			return $this->_idRQ;
		}
		public function setIdRQ($NidRQ)
		{
			$this->_idRQ=$NidRQ;
		}
		public function getQuestionRQ()
		{
			return $this->_questionRQ;
		}
		public function setQuestionRQ($NquestionRQ)
		{
			$this->_questionRQ=$NquestionRQ;
		}
		public function getReponseRQ()
		{
			return $this->_reponseRQ;
		}
		public function setReponseRQ($NreponseRQ)
		{
			$this->_reponseRQ=$NreponseRQ;
		}
		public function getDateRQ()
		{
			return $this->_dateRQ;
		}
		public function setDateRQ($NdateRQ)
		{
			$this->_dateRQ=$NdateRQ;
		}
	}

?>