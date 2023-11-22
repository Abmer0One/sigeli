<?php
      /*session_start();

      if(!isset($_SESSION['username']) && !isset($_SESSION['senha'])) echo "<script>window.location.href='../../index.php'</script>";*/
      include_once 'menu.php';

      $pdoGrupos = conectarPDO();
      $listarGrupos = $pdoGrupos->query('SELECT * FROM grupo');
      $listarGrupos->execute();

      $pdoCoordenadores = conectarPDO();
      $listarCoordenadores = $pdoCoordenadores->query('SELECT * FROM coordenador');
      $listarCoordenadores->execute();
      
      $pdoMembro = conectarPDO();
      $listarMembro = $pdoMembro->query('SELECT * FROM membro');
      $listarMembro->execute();

      $pdoActividade = conectarPDO();
      $listarActividade = $pdoActividade->query('SELECT * FROM actividade');
      $listarActividade->execute();
    ?>

    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h3 class="card-title text-uppercase text-muted mb-0"><?php  echo $listarGrupos->rowCount(); ?></h3>
                      <span class="h3 font-weight-bold mb-0">Grupos</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle">
                        <i class="fa fa-users"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h3 class="card-title text-uppercase text-muted mb-0"><?php  echo $listarCoordenadores->rowCount(); ?></h3>
                      <span class="h4 font-weight-bold mb-0">Coordenadores</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                        <i class="fa fa-user-plus"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h3 class="card-title text-uppercase text-muted mb-0"><?php  echo $listarMembro->rowCount(); ?></h3>
                      <span class="h3 font-weight-bold mb-0">Membros</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="fa fa-user"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h3 class="card-title text-uppercase text-muted mb-0"><?php  echo $listarActividade->rowCount(); ?></h3>
                      <span class="h3 font-weight-bold mb-0">Actividades</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                        <i class="ni ni-album-2"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  <?php 
    $dados = listarPDOescalaActividade(); 
    $d = new ArrayIterator($dados);
  ?>

    <!-- Page content Activity -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-8">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Actividades por realizar</h3>
                </div>
                <div class="col text-right">
                  <a href="#!" class="btn btn-sm btn-primary">Ver Tudo</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Data - Hora</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Local</th>
                    <th scope="col">Responsavel</th>
                    <th scope="col">Participantes</th>
                  </tr>
                </thead>
                 <?php while($d->valid()){?>
                <tbody>
                  <tr>
                    <th scope="row"><?php echo $d->current()->data_actividade. "<br />"; ?></th>
                    <td><?php echo $d->current()->tipo_de_actividade. "<br />"; ?></td>
                    <td><?php echo $d->current()->local_actividade. "<br />"; ?></td>
                    <td><?php echo $d->current()->responsavel_actividade. "<br />"; ?></td>
                    <td><?php echo $d->current()->participantes_actividade. "<br />"; ?></td>
                  </tr>
                  <?php
                    $d->next();
                  }?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-xl-4">
          <div class="card">
            <?php 
              $dados = listarPDOleituras(); 
              $d = new ArrayIterator($dados);?>
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Leituras do dia</h3>
                </div>
                <div class="col text-right">
                  <a href="#!" class="btn btn-sm btn-primary">Ver Tudo</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <?php while($d->valid()){?>
                  <tr>
                    <th scope="col">Leituras</th>
                    <th scope="col">Livros</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1ª Leitura</th>
                    <td><?php echo $d->current()->titulo_primeira_leitura. "<br />"; ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Salmo Responsorial</th>
                    <td><?php echo $d->current()->titulo_salmo. "<br />"; ?></td>
                  </tr>
                  <tr>
                    <th scope="row">2ª Leitura</th>
                    <td><?php echo $d->current()->titulo_segunda_leitura. "<br />"; ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Evangelho</th>
                    <td><?php echo $d->current()->titulo_evangelho. "<br />"; ?></td>
                  </tr>
                  <?php
                    $d->next();
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>


      <!-- Footer -->
      <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">
            <div class="copyright text-center  text-lg-left  text-muted">
              &copy; 2021 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Mambos News</a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>