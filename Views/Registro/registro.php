<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-signin-client_id" content="244424218219-2n37goeklh3nvog50n0c2vm7066jegdq.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link href="<?=MEDIA();?>css/product.css" rel="stylesheet">
    <link href="<?=MEDIA();?>css/estilo.css" rel="stylesheet">
    <link rel="icon" href="<?=MEDIA();?>images/Icono-CUN.png">
    <title><?=$data['page_tag']?></title>
</head>
<body>
    <main class="form-signin w-100 m-auto">
        <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
            <div class="bg me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden w-100 rounded-4 shadow-4" style=" background-color: #0C2340">
                <div class="my-3 py-3">
                    <h2 class="display-5">Bienvenido</h2>
                    <img src="<?=$data["picture"]?>" class="image-User" style=" width:200px;
                                                                                            height:200px;
                                                                                            border-radius:150px;
                                                                                            border:3px solid #97da29;" />
                    <br>
                    <br>
                    <form id="formApi" name="formApi" accept-charset="utf-8">
                        <input type="text" id="NombreIngresoLaboral" name="NombreIngresoLaboral" class="form-control" name="nombre" value="<?=$data['nombres'] ?>" readonly />
                        <label for="exampleFormControlInput1" class="form-label">Nombre</label>
                        <br>
                        <br>
                        <input type="text" id="CorreoIngresoLaboral" name="CorreoIngresoLaboral" class="form-control" name="apellido" value="<?php echo $data['email']; ?>" readonly />
                        <label for="exampleFormControlInput1" class="form-label">Correo</label>
                        <br>
                        <br>
                        <input type="datetime" id="FechaIngresoLaboral" name="FechaIngresoLaboral" class="form-control" name="fecha" value="<?= date("Y-m-d h:i:s");?>" readonly />
                        <label for="FechaIngresoLaboral" class="form-label">Fecha</label>
                        <br>
                        <br>
                        <input type="hidden" id="HoraIngresoLaboral" name="HoraIngresoLaboral" class="form-control" name="fecha" value="<?= date("Y-m-d h:i:s");?>" readonly />
                        <input type="hidden" id="DocumentoIngresoLaboral" name="DocumentoIngresoLaboral" class="form-control"  value="<?= $data['documento']?>" readonly />
                        <input type="hidden" id="IpIngresoLaboral" name="IpIngresoLaboral" class="form-control" name="ip" value="<?=$_SERVER["REMOTE_ADDR"];?>" readonly />
                        <div>
                            <select name="ModalidadIngresoLaboral" id="ModalidadIngresoLaboral" class="form-select" aria-label="Default select example" onchange="Modalidad ()"  required>
                                <option value="">Selecciona</option>
                                <option value="presencial">Presencial</option>
                                <option value="trabajo en casa">Trabajo en casa</option>
                            </select>
                            <label class="form-label" for="form3Example3">¿Cuál es tu modalidad de trabajo?</label>
                        </div>
                        <br>
                        <div id="selctSede" style="display: none;">
                            <select name="SedeIngresoLaboral" id="SedeIngresoLaboral" class="form-select" aria-label="Default select example">
                                <option value="">Selecciona</option>
                                <option value="Sede A">Sede A</option>
                                <option value="Sede B">Sede B</option>
                                <option value="Sede C">Sede C</option>
                                <option value="Sede D">Sede D</option>
                                <option value="Sede E">Sede E</option>
                                <option value="Sede F">Sede F</option>
                                <option value="Sede G">Sede G</option>
                                <option value="Sede H">Sede H</option>
                                <option value="Sede I">Sede I</option>
                                <option value="Sede J">Sede J</option>
                                <option value="Sede JFK">Sede JFK</option>
                                <option value="Sede JFK">Regional</option>
                                <option value="Ninguna de las Anteriores">Ninguna de las anteriores</option>
                            </select>
                            <label class="form-label" for="form3Example3">¿En que sede te encuentras?</label>
                        </div>
                       <button type="button" onclick="sendToBD();" class="btn btn-success btn-block mb-4" id="btnActionForm" name="btnActionForm"  style=" background-color: #97da29">
                            <b>Enviar</b>
                        </button>
                    </form>
                </div>
            </div>
            <div class="imagen bg-light me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden  w-100 rounded-4 shadow-4">
                <div class="my-3 p-3">
                    <br>
                    <img src="<?=MEDIA();?>images/baner.png" class="w-100 rounded-4 shadow-4" alt="" />
                </div>
    </main>
    <footer class="container py-12">
        <div class="row">
            <div class="col-12 col-md text-center">
                <img src="" alt="" class="text-center">
                <small class="d-block mb-3 text-muted">&copy; CUN 2022</small>
            </div>
        </div>
    </footer>
    <script>
        var base_url = "<?=BASE_URL?>";
        
    function sendToApi(){
    let formApi=document.querySelector("#formApi");
    var today = new Date();
    let NombreIngresoLaboral = document.querySelector('#NombreIngresoLaboral').value;
    let CorreoIngresoLaboral = document.querySelector('#CorreoIngresoLaboral').value;
    let ModalidadIngresoLaboral = document.querySelector('#ModalidadIngresoLaboral').value;
    let SedeIngresoLaboral = "trabajo en casa";              
    let FechaIngresoLaboral = today.toLocaleDateString('en-US');
    let HoraIngresoLaboral = today.toLocaleTimeString('en-US');
    let IpIngresoLaboral = document.querySelector('#IpIngresoLaboral').value;
    let DocumentoIngresoLaboral = document.querySelector('#DocumentoIngresoLaboral');
    if(NombreIngresoLaboral==''||CorreoIngresoLaboral==''||ModalidadIngresoLaboral==''||FechaIngresoLaboral==''||HoraIngresoLaboral==''){
    Swal.fire({
        icon: 'error',
        title: '¡Oops...!',
        text: '¡Recuerda que todos los campos son obligatorios!', 
    });
        return false;
  }
    if(ModalidadIngresoLaboral=="presencial"){
        SedeIngresoLaboral = document.querySelector('#SedeIngresoLaboral').value;   
    }
    if(ModalidadIngresoLaboral=="presencial" && SedeIngresoLaboral==''){
        Swal.fire({
        icon: 'error',
        title: '¡Oops...!',
        text: '¡Recuerda que todos los campos son obligatorios, selecciona una sede!', 
    });
        return false;
    }
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Registro/sendAPI'; 
    let formData = new FormData(formApi);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            objData = objData.trim().replace("\"","");
            if(objData=="True")
            {  
                console.log("Insertado en la API con éxito");
            }else{
                console.log("Ya se ha insertado en la API con éxito");
            }
        }else if(request.status==403||request.status==500){
          console.log("Fallo el insertado en la API error 500");
        }
    }  
   
  }
  function sendToBD(){
    let formApi=document.querySelector("#formApi");
    var today = new Date();
    let NombreIngresoLaboral = document.querySelector('#NombreIngresoLaboral').value;
    let CorreoIngresoLaboral = document.querySelector('#CorreoIngresoLaboral').value;
    let ModalidadIngresoLaboral = document.querySelector('#ModalidadIngresoLaboral').value;
    let SedeIngresoLaboral = "trabajo en casa";              
    let FechaIngresoLaboral = today.toLocaleDateString('en-US');
    let HoraIngresoLaboral = today.toLocaleTimeString('en-US');
    let IpIngresoLaboral = document.querySelector('#IpIngresoLaboral').value;
    let DocumentoIngresoLaboral = document.querySelector('#DocumentoIngresoLaboral');
    if(NombreIngresoLaboral==''||CorreoIngresoLaboral==''||ModalidadIngresoLaboral==''||FechaIngresoLaboral==''||HoraIngresoLaboral==''){
    Swal.fire({
        icon: 'error',
        title: '¡Oops...!',
        text: '¡Recuerda que todos los campos son obligatorios!', 
    });
        return false;
  }
    if(ModalidadIngresoLaboral=="presencial"){
        SedeIngresoLaboral = document.querySelector('#SedeIngresoLaboral').value;   
    }
    if(ModalidadIngresoLaboral=="presencial" && SedeIngresoLaboral==''){
        Swal.fire({
        icon: 'error',
        title: '¡Oops...!',
        text: '¡Recuerda que todos los campos son obligatorios, selecciona una sede!', 
    });
        return false;
    }
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Registro/sendBD'; 
    let formData = new FormData(formApi);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            console.log(objData.msg);
            if(objData.status)
            {  
               
                    Swal.fire({
                    icon: 'success',
                    title: 'Registro exitoso',
                    text: objData.msg,
                    confirmButtonText: 'Ok'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      location.href=base_url+"/Login/logout";  
                    } 
                  }); 
                
               
            }else{
           
                Swal.fire({
                    icon: 'warning',
                    title: '¡Alerta!',
                    text: objData.msg,
                    confirmButtonText: 'Ok'
                    }).then((result) => {
                      if (result.isConfirmed) {
                        location.href=base_url+"/Login/logout";  
                      } 
                    });
            
             
            }
        }else{
           
                Swal.fire({
            icon: 'error',
            title: '¡Ops...!',
            text: objData.msg
            });
            
       
        }
    } 
    sendToApi();
    return;     
  }    
    </script>
    <script type="text/javascript" src="<?=MEDIA();?>js/validaFormulario.js"></script>
    
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
</body>

</html>