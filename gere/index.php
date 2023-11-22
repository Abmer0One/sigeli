<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login SIGEPA</title>

  <!-- Required de conexões e funções -->
  <?php require "conexao.php"; ?>
  <?php include_once 'funcoes/funcaoBase.php'; ?>


  <!-- Favicon -->
  <link rel="icon" href="assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css">
</head>

<body class="bg-default">
  <!-- Navbar -->
  <nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand" href="index.php">
        <img src="../assets/img/nsp.png" style="border:1; width: 40%; height: 200px;" vspace="-10" hspace="350" >
      </a>
  </nav>
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-primary py-8 py-lg-8 pt-lg-9">
      <div class="container">
        <div class="header-body text-center mb-2">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-8 col-md-8 px-5">
              <h1 class="text-white"></h1>
              <p class="text-lead text-white"></p>
            </div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="header-body text-center mb-2">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <h1 class="text-white">Bem Vindo!</h1>
              <p class="text-lead text-white">Insira o nome de usuário e a Senha para a entrar no SIGEPA</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Separador -->
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>


    </div>

    <?php 
            if(isset($_POST['autenticar'])){
                $username = $_POST['username'];
                $senha = $_POST['senha'];
                if($username == ''){?>
                    <div class="alert alert-danger alert align-center mh-3">Por Favor digite o login.</div>
            <?php }else if($senha == ''){?>
                    <div class="alert alert-danger alert align-center">Por Favor digite a Senha.</div>
          <?php }else{
                      $sql = "SELECT * FROM usuario WHERE username = '$username' AND senha = '$senha'";
                      $result = mysqli_query($conexao, $sql);
                      if(mysqli_num_rows($result) > 0){
                          while($res_1 = mysqli_fetch_assoc($result)){
                          $estado = $res_1['estado'];
                          $username = $res_1['username'];
                          $senha = $res_1['senha'];
                          $nivel = $res_1['nivel'];
                          $usuario_id = $res_1['usuario_id'];
                          $nivel_id = $res_1['tipo_nivel'];
                          
                          
                          if($estado == 'inativo'){?>
                              <div class="alert alert-danger alert align-center">Usuario Inativo.</div>
                    <?php }else{
                              session_start();
                              $_SESSION['username'] = $username;
                              $_SESSION['senha'] = $senha;
                              $_SESSION['nivel'] = $nivel;
                              $_SESSION['usuario_id'] = $usuario_id;
                              $_SESSION['tipo_nivel'] = $nivel_id;
                              
                              if($nivel == 'admin'){
                                  echo "<script>window.location.href='admin/index.php'</script>";
                                  $_SESSION['nome']= $username;
                                  echo $_SESSION['nome'];
                              }else if($nivel == 'Coordenador'){
                                  echo "<script>window.location.href='admin/coordenador/index.php'</script>";
                                  $_SESSION['nome']= $username;
                                  $_SESSION['userr']= $usuario_id;
                                  
                                  echo $_SESSION['nome'];
                                  echo $_SESSION['userr'];
                              }else if($nivel == 'Comissao'){
                                  echo "<script>window.location.href='admin/comissao/index.php'</script>";
                                  $_SESSION['nome']= $username;
                                  $_SESSION['userr']= $usuario_id;
                                  
                                  echo $_SESSION['nome'];
                                  echo $_SESSION['userr'];
                              }else if($nivel == 'Grupo'){
                                  echo "<script>window.location.href='admin/grupo/index.php'</script>";
                                  $_SESSION['nome']= $username;
                                  $_SESSION['userr']= $usuario_id;
                                  
                                  echo $_SESSION['nome'];
                                  echo $_SESSION['userr'];
                              }else if($nivel == 'patrimonio'){
                                  echo "<script>window.location.href='admin/patrimonio/index.php'</script>";
                                  $_SESSION['nome']= $username;
                                  $_SESSION['userr']= $usuario_id;
                                  
                                  echo $_SESSION['nome'];
                                  echo $_SESSION['userr'];
                              }else if($nivel == 'caritas'){
                                  echo "<script>window.location.href='admin/caritas/index.php'</script>";
                                  $_SESSION['nome']= $username;
                                  $_SESSION['userr']= $usuario_id;
                                  
                                  echo $_SESSION['nome'];
                                  echo $_SESSION['userr'];
                              }else if($nivel == 'cliente'){
                                  echo "<script>window.location.href='examples/index.php'</script>";
                                  $_SESSION['nomeT']= $username;
                                  echo $_SESSION['nomeT'];
                              }
                          }
                          }
                      }else{?>
                          <div class="alert alert-danger alert align-center">Dados Incorrectos.</div>
             <?php    }
                  }
            }
          ?>


    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary border-0 mb-0">
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-2">
                <small>ENTRAR</small>
              </div>
              <div class="panel panel-primary"> 

            <div class="panel-body bg-transparente"> 
              <form id="login-form" method="post" action="" enctype="multipart/form-data">
                <div class="form-group mb-2 "> 
                  <div class="form-group col-md-12">
                        <input type="text" class="form-control" name="username" placeholder="Usuario">
                    </div>
                    <div class="form-group col-md-12">
                        <input type="password" class="form-control" name="senha" placeholder="Senha">
                    </div>
                  <div>
                    <input type="submit" class="btn btn-primary mx-3 mb-2" id="autenticar" name="autenticar" value="Autenticar">
                  </div>
                </div> 
              </form>
             
            </div> 
          </div>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-6">
              <a href="#" class="text-light"><small>Esqueceu a palavra passe?</small></a>
            </div>
            <div class="col-6 text-right">
              <a href="register.html" class="text-light"><small>Crie uma nova conta</small></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <footer class="py-5" id="footer-main">
    <div class="container">
      <div class="row align-items-center justify-content-xl-between">
        <div class="col-xl-6">
          <div class="copyright text-center text-xl-left text-muted">
            &copy; 2021 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Mambos News</a>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="assets/js/argon.js?v=1.2.0"></script>
</body>

</html>