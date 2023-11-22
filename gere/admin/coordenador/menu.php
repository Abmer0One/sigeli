<!DOCTYPE html>
<html>

<head>
  <?php session_start(); 
    if(!isset($_SESSION['username']) && !isset($_SESSION['senha'])) echo "<script>window.location.href='../../../index.php'</script>";
  ?>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Gerencia Sigeli</title>

  <!-- Funçoes relacionadas a Base de dados -->
  <?php include_once '../../conexao.php'; ?>
  <?php include_once '../../funcoes/funcaoBase.php'; ?>

  <!-- Favicon -->
  <link rel="icon" href="../../assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="../../assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="../../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->

<link rel="stylesheet" href="../../assets/js/jquery.min.js" />
<link rel="stylesheet" href="../../assets/js/webcam.min.js" />
<link rel="stylesheet" href="../../assets/css/bootstrap/bootstrap.min.css" />




  <!-- Argon CSS -->
  <link rel="stylesheet" href="../../assets/css/argon.css?v=1.2.0" type="text/css">
</head>

<body>

  <?php 
    if (isset($_GET['ac'])) {
      if ($_GET['ac'] == 'sair') {
        logOut('nome');
      }
    }
   ?>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
  
        
          <img src="../../assets/img/brand/coordenacao_centro.jpg" width="150" height="100"alt="...">
       
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="inicio.php">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Inicio</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="equipas.php">
                <i class="ni ni-planet text-orange"></i>
                <span class="nav-link-text">Catequese</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="listar_comissoes.php">
                <i class="ni ni-planet text-orange"></i>
                <span class="nav-link-text">Comissões</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="listar_grupos.php">
                <i class="ni ni-planet text-orange"></i>
                <span class="nav-link-text">Grupos</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="listar_coordenadores.php">
                <i class="ni ni-planet text-orange"></i>
                <span class="nav-link-text">Coordenadores</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="listar_membros.php">
                <i class="ni ni-planet text-orange"></i>
                <span class="nav-link-text">Membros</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="missas.php">
                <i class="ni ni-pin-3 text-primary"></i>
                <span class="nav-link-text">Missas</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="escalas.php">
                <i class="ni ni-align-center text-dark"></i>
                <span class="nav-link-text">Escalas</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="actividades.php">
                <i class="ni ni-album-2 text-default"></i>
                <span class="nav-link-text">Actividades</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="listar_patrimonio.php">
                <i class="ni ni-settings-gear-65 text-dark"></i>
                <span class="nav-link-text">Patrimonio</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="listar_reserva.php">
                <i class="ni ni-settings-gear-65 text-dark"></i>
                <span class="nav-link-text">Reserva</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="listar_emprestimo.php">
                <i class="ni ni-settings-gear-65 text-dark"></i>
                <span class="nav-link-text">Emprestimo</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="listar_materiais.php">
                <i class="ni ni-settings-gear-65 text-dark"></i>
                <span class="nav-link-text">Doação</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="listar_doadores.php">
                <i class="ni ni-settings-gear-65 text-dark"></i>
                <span class="nav-link-text">Doadores</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="listar_necessitados.php">
                <i class="ni ni-settings-gear-65 text-dark"></i>
                <span class="nav-link-text">Necessitados</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="definicoes.php">
                <i class="ni ni-settings-gear-65 text-dark"></i>
                <span class="nav-link-text">Definições</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <!-- Search form 
          <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Pesquisar..." type="text">
              </div>
            </div>
            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </form>
        -->


          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>

            <!-- Barra de pesquisa -->
            <li class="nav-item d-sm-none">
              <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                <i class="ni ni-zoom-split-in"></i>
              </a>
            </li>

            <!-- Menu Dropdown Notificações -->
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-bell-55"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">
                <!-- Dropdown header -->
                <div class="px-3 py-3">
                  <h6 class="text-sm text-muted m-0">Tens <strong class="text-primary">13</strong> notificações.</h6>
                </div>
                <!-- List Group  Notifications-->
                <div class="list-group list-group-flush">
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar Image-->
                        <img alt="Image placeholder" src="assets/img/theme/team-1.jpg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">Administrador</h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>2 hrs atrás</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">Já publicou as leituras?</p>
                      </div>
                    </div>
                  </a>
                </div>
                <!-- View all -->
                <a href="#!" class="dropdown-item text-center text-primary font-weight-bold py-3">View all</a>
              </div>
            </li>

            <!-- Menu Dropdown Circular -->
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-ungroup"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-dark bg-default  dropdown-menu-right ">
                <div class="row shortcuts px-4">
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-red">
                      <i class="ni ni-calendar-grid-58"></i>
                    </span>
                    <small>Calendar</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-orange">
                      <i class="ni ni-email-83"></i>
                    </span>
                    <small>Email</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-info">
                      <i class="ni ni-credit-card"></i>
                    </span>
                    <small>Payments</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-green">
                      <i class="ni ni-books"></i>
                    </span>
                    <small>Reports</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-purple">
                      <i class="ni ni-pin-3"></i>
                    </span>
                    <small>Maps</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-yellow">
                      <i class="ni ni-basket"></i>
                    </span>
                    <small>Shop</small>
                  </a>
                </div>
              </div>
            </li>
            <!-- Menu Dropdown Circular End -->
          </ul>

          <!-- Menu Dropdown Administrador -->
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="../../assets/img/theme/team-4.jpg">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold"><?php echo $_SESSION['nome']; ?></span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Bem Vindo Liturgo!</h6>
                </div>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>Meu perfil</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-settings-gear-65"></i>
                  <span>Configurações</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-calendar-grid-58"></i>
                  <span>Actividades</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-support-16"></i>
                  <span>Suporte</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="?ac=sair" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Sair</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>


    <script src="../../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="../../assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="../../assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="../../assets/js/argon.js?v=1.2.0"></script>
  <link rel="stylesheet" href="../assets/js/webcam.min.js" />
</body>

</html>