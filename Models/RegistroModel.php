<?php 
       
	class RegistroModel extends Mysql
	{
		private $NombreIngresoLaboral;
		private $CorreoIngresoLaboral;
		private $ModalidadIngresoLaboral;
		private $FechaIngresoLaboral;
		private $HoraIngresoLaboral;
		private $IpIngresoLaboral;
	    private $SedeIngresoLaboral;
		private $DocumentoIngresoLaboral;
		public function __construct()
		{
			parent::__construct();
		}	
		public function insertIngreso(string $NombreIngresoLaboral,string $CorreoIngresoLaboral,string $ModalidadIngresoLaboral,string $FechaIngresoLaboral, string $HoraIngresoLaboral, string $IpIngresoLaboral,string $SedeIngresoLaboral,string $DocumentoIngresoLaboral ){
			$hoy = date("Y/m/d");
			$this->NombreIngresoLaboral = $NombreIngresoLaboral;
			$this->CorreoIngresoLaboral = $CorreoIngresoLaboral;
			$this->ModalidadIngresoLaboral = $ModalidadIngresoLaboral;
			$this->FechaIngresoLaboral = $FechaIngresoLaboral;
			$this->HoraIngresoLaboral = $HoraIngresoLaboral;
			$this->IpIngresoLaboral = $IpIngresoLaboral;
			$this->SedeIngresoLaboral = $SedeIngresoLaboral;
			$this->DocumentoIngresoLaboral = $DocumentoIngresoLaboral;
			$sql = "SELECT ID FROM ".DB_NAME.".registro WHERE CorreoIngresoLaboral='{$this->CorreoIngresoLaboral}'
			AND FechaIngresoLaboral = '{$hoy}'";
			$request=$this->select($sql);
			$return = "exist";
			if(empty($request)){
				$query_insert = "INSERT INTO ".DB_NAME.".registro (NombreIngresoLaboral,CorreoIngresoLaboral,
				ModalidadIngresoLaboral,FechaIngresoLaboral,
				HoraIngresoLaboral,IpIngresoLaboral,
				SedeIngresoLaboral,DocumentoIngresoLaboral)
				VALUES(?,?,?,?,?,?,?,?)";
				$arrData = array($this->NombreIngresoLaboral,
				$this->CorreoIngresoLaboral,
				$this->ModalidadIngresoLaboral,
				$this->FechaIngresoLaboral,
				$this->HoraIngresoLaboral,
				$this->IpIngresoLaboral,
				$this->SedeIngresoLaboral,
				$this->DocumentoIngresoLaboral
				);
				$request_insert=$this->insert($query_insert,$arrData);
				$return = $request_insert;
			}
			
			return $return;
		}
	}
 ?>