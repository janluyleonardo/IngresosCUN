<?php 

	class Login extends Controllers{
		public function __construct()
		{
			parent::__construct();
		}

		public function login()
		{
			$data['page_id'] = 1;
			$data['page_tag'] = "Iniciar sesión - Ingresos";
			$data['page_title'] = "Login";
			$data['page_name'] = "login";
			$data['page_content'] = "Inicio de sesión para el sistema.";
			$this->views->getView($this,"login",$data);
		}
		
		public function Logout(){
			session_start();
			session_unset();
			session_destroy();
			header('location:'.BASE_URL);
			die();
		}
		

	}
 ?>