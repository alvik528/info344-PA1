<?php
	class Player
	{
		private $name;
		private $gp;
		private $fgp;
		private $tpp;
		private $ftp;
		private $ppg;
		
		function Player($nm, $gp1, $fgp1, $tpp1, $ftp1, $ppg1) {
			$this->name = $nm;
			$this->gp = $gp1;
			$this->fgp = $fgp1;
			$this->tpp = $tpp1;
			$this->ftp = $ftp1;
			$this->ppg = $ppg1;
		}
		public function GetName() 
		{
			return $this->name;
		}

		public function GetGP() 
		{
			return $this->gp;
		}

		public function GetFGP() 
		{
			return $this->fgp;
		}

		public function GetTPP() 
		{
			return $this->tpp;
		}

		public function GetFTP() 
		{
			return $this->ftp;
		}
		public function GetPPG() 
		{
			return $this->ppg;
		}
	}

?>