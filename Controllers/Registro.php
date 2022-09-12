<?php 
include('./Config/GoogleConf.php');
require_once('./Controllers/Login.php');
define('google_client',$google_client);

	class Registro extends Controllers{
        private  $log ;
  

		public function __construct()
		{
            parent::__construct();
            parent::loadModel();
            session_start();
            $this->log=new Login();
         
        }
      
		public function ingreso()
		{
           if($_GET){
            if (isset($_GET["code"])) {
             
                $token = google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
                if (!isset($token['error'])) {
                    google_client->setAccessToken($token['access_token']);
                    $_SESSION['access_token'] = $token['access_token'];
                    $google_service = new Google_Service_Oauth2(google_client);
                    $data = $google_service->userinfo->get();
            $explode = explode("@",$data['email']);
            if(str_contains($explode[0],".")){
                header('Location:'.BASE_URL.'/Error');
            }else{
                session_start();
                $_SESSION['user'] = $data['email'];  
                $data['page_id'] = 1;
                $data['page_tag'] = "Registra tu entrada - Ingresos";
                $data['page_title'] = "Registro";
                $data['page_name'] = "registro";
                $data['page_content'] = "Registro de entrada.";
                $array =  Registro::getBasicData($data['email']);
                $data['nombres'] = $array[0]["nombres"]." ".$array[0]["apellidos"];
                $data['documento'] = $array[0]["nro_documento"];  
                $this->views->getView($this,"registro",$data);
            }          
                }
            }
           }
           if(!isset($_SESSION['user'])){
            $this->log->login();
           }
			
		}
        public function sendBD(){
            $arrResponse = array("status" => true,"msg"=>"Tu ingreso ha sido guardado y procesado con éxito.");
            if($_POST){
                if(empty($_POST["NombreIngresoLaboral"])||empty($_POST["CorreoIngresoLaboral"])||empty($_POST["ModalidadIngresoLaboral"])||empty($_POST["FechaIngresoLaboral"])||empty($_POST["HoraIngresoLaboral"])||empty($_POST["IpIngresoLaboral"])){
                    $arrResponse = array("status" => false,"msg"=>"Todos los campos son obligatorios, por favor revísalos.");
                }else{       
                        $Explotacion = explode(" ", $_POST['FechaIngresoLaboral']);
                        $NombreIngresoLaboral = $_POST['NombreIngresoLaboral'];
                        $CorreoIngresoLaboral = $_POST['CorreoIngresoLaboral'];
                        $ModalidadIngresoLaboral = $_POST['ModalidadIngresoLaboral'];
                        $FechaIngresoLaboral = $Explotacion[0];
                        $HoraIngresoLaboral = $Explotacion[1];
                        $IpIngresoLaboral = $_POST['IpIngresoLaboral'];
                        if(!empty($_POST['SedeIngresoLaboral'])){
                            $SedeIngresoLaboral = $_POST['SedeIngresoLaboral'];
                        }else{
                            $SedeIngresoLaboral = "trabajo en casa";
                        }
                        $DocumentoIngresoLaboral = $_POST['DocumentoIngresoLaboral'];
                        try{
                            $request_insert = $this->model->insertIngreso($NombreIngresoLaboral,
                            $CorreoIngresoLaboral,$ModalidadIngresoLaboral,
                            $FechaIngresoLaboral,$HoraIngresoLaboral,
                            $IpIngresoLaboral,$SedeIngresoLaboral,
                            $DocumentoIngresoLaboral);  
                        }catch(Exception $e){
                            echo $e->getMessage();
                            die();
                        }
                        
                        if($request_insert=="exist"){
                            $arrResponse = array("status" => false,"msg"=>"Tu ingreso ya ha sido guardado y procesado con éxito.");
                        }  
                    }
                        echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE); 
                    }
            die();
        }
        public function sendAPI(){
          
            if($_POST){
                if(empty($_POST["NombreIngresoLaboral"])||empty($_POST["CorreoIngresoLaboral"])||empty($_POST["ModalidadIngresoLaboral"])||empty($_POST["FechaIngresoLaboral"])||empty($_POST["HoraIngresoLaboral"])||empty($_POST["IpIngresoLaboral"])){
                   die();
                }else{
                    
                        $Explotacion = explode(" ", $_POST['FechaIngresoLaboral']);
                        $NombreIngresoLaboral = $_POST['NombreIngresoLaboral'];
                        $CorreoIngresoLaboral = $_POST['CorreoIngresoLaboral'];
                        $ModalidadIngresoLaboral = $_POST['ModalidadIngresoLaboral'];
                        $FechaIngresoLaboral = $Explotacion[0];
                        $HoraIngresoLaboral = $Explotacion[1];
                        $IpIngresoLaboral = $_POST['IpIngresoLaboral'];
                        if(!empty($_POST['SedeIngresoLaboral'])){
                            $SedeIngresoLaboral = $_POST['SedeIngresoLaboral'];
                        }else{
                            $SedeIngresoLaboral = "trabajo en casa";
                        }
                        $DocumentoIngresoLaboral = $_POST['DocumentoIngresoLaboral'];
                        $data = array("NombreIngresoLaboral"=> $NombreIngresoLaboral, 
                        "CorreoIngresoLaboral"=> $CorreoIngresoLaboral, 
                        "ModalidadIngresoLaboral"=> $ModalidadIngresoLaboral, 
                        "FechaIngresoLaboral"=> $FechaIngresoLaboral, 
                        "HoraIngresoLaboral"=> $HoraIngresoLaboral, 
                        "IpIngresoLaboral"=> $IpIngresoLaboral, 
                        "SedeIngresoLaboral"=> $SedeIngresoLaboral,
                        "DocumentoIngresoLaboral" => $DocumentoIngresoLaboral);
                        $data_string = json_encode($data);
                        $ch=curl_init("https://cundigital.azurewebsites.net/api/IngresoLaboral/PostIngresoLaboral");
                        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
                        curl_setopt($ch, CURLOPT_HEADER, false);
                        curl_setopt($ch, CURLOPT_HTTPHEADER,
                        array('Content-Type:application/json','Content-Length: ' . strlen($data_string)));
                        $result = curl_exec($ch);
                        curl_close($ch);  
                        }
                    }
            die();
        }
        
       public function getBasicData($correo){
        $informacion = array( 
        "idCliente"=>"APP_CUN",
        "token"=>"0c5159dd2f9878f6cc501b95f419f69e9edab3cc140a815e607f54e035728ad595c888a92dda1ac79ae06534520fdccc761d4b1876eff3e626a31943486e78fa",
        "correoElectronico"=> $correo
            );
        $data_string = json_encode($informacion);
                    $ch=curl_init("http://190.184.202.251:8090/carnet_cun/index.php");
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
                    curl_setopt($ch, CURLOPT_HEADER, false);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                    curl_setopt($ch, CURLOPT_HTTPHEADER,
                    array('Content-Type:application/json','Content-Length: ' . strlen($data_string)));   
                    $result = curl_exec($ch);
                    curl_close($ch);
                    $DatosArray = json_decode($result, true);
                    // print_r( $DatosArray);
                    // echo $DatosArray[0]["nombres"];
                    return $DatosArray;
       }

	}
 ?>