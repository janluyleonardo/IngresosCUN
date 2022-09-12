<?php include('Config/GoogleConf.php');?>
<!doctype html>
<html lang="en">

<head>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title><?=$data['page_tag']?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Corporación Unificada Nacional de Educación Superior - CUN">
  


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>

  <link rel="icon" href="<?=media();?>images/Icono-CUN.png">

  <link href="<?=media();?>css/estilo.css" rel="stylesheet">



</head>

<body class="background">
  <section class="vh-100 background">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

              <main class="form-signin w-100 m-auto">
                <h4 style="text-align: center;"> Registro de asistencia administrativo<br /></h4>
                <img class="mb-4" src="<?=media();?>images/Logo.png" alt="" width="172" height="61">

                <div class="">
                  <?php
                  if (!empty($_SESSION['user'])) {
                    header('location:'.BASE_URL.'/Registro/ingreso');
                  } else {
                    echo '<a href="' . $google_client->createAuthUrl() . '" class="btnIngreso">
                      Ingresar</a>';
                  }
                  ?>
                </div>

                <!-- <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button> -->
                <p class="mt-5 mb-3 text-muted">&copy; CUN - 2022</p>

              </main>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>

</html>