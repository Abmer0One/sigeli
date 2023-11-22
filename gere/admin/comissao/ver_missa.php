<div class="modal-dialog modal-fullscreen">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title h4" id="exampleModalFullscreenLabel">Detalhes da Missa do dia <?php echo $d->current()->data_missa; ?></h4> 
                  
                  
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <?php 
                  $dadosTempo = pegarPeloIDComPDOtempoLiturgico($dLeituras->current()->tempo_liturgico);
                  $dTempoLiturgico = new ArrayIterator($dadosTempo);
                  while($dTempoLiturgico->valid()){
                  ?>
                <div class="modal-body">
                  <div class="col d-flex flex-column align-items-center text-center">

                    <div class="row d-flex flex-column align-items-center text-center">
                      <h2><?php echo $dTempoLiturgico->current()->descrisao_nome_tempo. " " .$dTempoLiturgico->current()->descrisao_tempo_liturgico. " " .$dTempoLiturgico->current()->descrisao_ano_tempo ; ?></h2>
                    </div>
                    <?php $dTempoLiturgico->next(); } ?>

                    <!-- CELEBRANTE -->
                    <?php 
                      $dadosCelebrante = pegarPeloIDComPDOescalaPadre($d->current()->padre_missa);
                      $dCelebrante = new ArrayIterator($dadosCelebrante);
                      while($dCelebrante->valid()){
                      ?>
                    <div class="row d-flex flex-column align-items-center text-center">
                      <h3>Celebrante: <?php echo $dCelebrante->current()->nome_padre_celebracao; ?></h3>
                    </div>
                     <?php $dCelebrante->next(); }?>
                  </div>

                  
                  <div class="dropdown-divider"></div>

                  <div class="row">
                    <div class="col-md-6">
                      <article class="my-5" id="scrollspy">
                        <div>
                          <div class="bd-example">
                            <nav id="navbar-example2" class="navbar navbar-light bg-light px-3">
                              <h3>Liturgia da Palavra</h3>
                              <ul class="nav nav-pills">
                                <li class="nav-item my-3">
                                  <a class="nav-link active my-3" href="#scrollspyHeading1">1ª Leitura</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link text-primary"  href="#scrollspyHeading2">Salmo</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link text-primary" href="#scrollspyHeading3">2ª Leitura</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link text-primary" href="#scrollspyHeading4">Evangelho</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link text-primary" href="#scrollspyHeading5">Oração Universal</a>
                                </li>
                              </ul>
                            </nav>
                          <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" class="scrollspy-example" tabindex="0">
                              <h4 id="scrollspyHeading1"><?php echo $dLeituras->current()->titulo_primeira_leitura; ?></h4>
                              <p><?php echo $dLeituras->current()->primeira_leitura. "<br />"; ?></p>
                              <h4 id="scrollspyHeading2"><?php echo $dLeituras->current()->titulo_salmo; ?></h4>
                              <p><?php echo $dLeituras->current()->salmo_responsorial. "<br />"; ?></p>
                              <h4 id="scrollspyHeading3"><?php echo $dLeituras->current()->titulo_segunda_leitura; ?></h4>
                              <p><?php echo $dLeituras->current()->segunda_leitura. "<br />"; ?></p>
                              <h4 id="scrollspyHeading4"><?php echo $dLeituras->current()->titulo_evangelho; ?></h4>
                              <p><?php echo $dLeituras->current()->evangelho. "<br />"; ?></p>
                              <h4 id="scrollspyHeading5"><?php echo $dLeituras->current()->titulo_preces; ?></h4>
                              <p><?php echo $dLeituras->current()->oracao_dos_fieis. "<br />"; ?></p>
                            </div>
                          </div>
                        </div>
                      </article>
                    </div>

                    <div class="col-md-4 mx-5">

                      <div class="row d-flex flex-row align-items-center text-center">
                        <h4>Equipas</h4>
                      </div>
                      
                      <!-- Listagem de Ministros de Eucaristia, Acólitos e Leitores -->
                      <div class="row my-5 d-flex flex-row align-items-stretch text-center">
                        <!-- Ministros ////// Acólitos /////// Leitores -->
                        <div class="list-group">
                          <?php 
                            $dadosMinistro = pegarPeloIDComPDOescalaMinistro($d->current()->ministros_missa);
                            $dMinistro = new ArrayIterator($dadosMinistro);
                            while($dMinistro->valid()){
                            ?>
                          <a href="#" class="list-group-item list-group-item-action">Ministros de Eucaristia</a>
                          
                          <a href="#" class="list-group-item list-group-item-action list-group-item-primary"><?php echo $dMinistro->current()->nome_ministro_eucaristia; ?></a>
                          <?php $dMinistro->next(); }?>
                        </div>
                      </div>

                      <div class="row my-5 d-flex flex-row align-items-stretch text-center">
                        <div class="list-group">
                          <?php /*
                          $dadosAcolitos = pegarPeloIDComPDOescalaMinistro($d->current()->ministros_missa);
                          $dAcolitos = new ArrayIterator($dadosAcolitos);
                          while($dAcolitos->valid()){
                          $dAcolitos->next(); }*/?>
                          <a href="#" class="list-group-item list-group-item-action">Equipa de Acólitos</a>
                          
                          <a href="#" class="list-group-item list-group-item-action list-group-item-primary"><?php echo $d->current()->acolitos_missa; ?></a>
                        </div>
                      </div>

                      <div class="row my-5 d-flex flex-row align-items-stretch text-center">
                        <div class="list-group">
                        <?php 
                        $dadosLeitores = pegarPeloIDComPDOescalaProclamadores($d->current()->leitores_missa);
                        $dLeitores = new ArrayIterator($dadosLeitores);
                        while($dLeitores->valid()){

                          //**************** MONITOR *********************
                            $dadosMonitor = pegarPeloIDComPDOmembro($dLeitores->current()->monitor);
                            $dMonitor = new ArrayIterator($dadosMonitor);
                            while($dMonitor->valid()){
                            ?>
                        <a href="#" class="list-group-item list-group-item-action">Equipa de Leitores</a>
                        
                        <a href="#" class="list-group-item list-group-item-action list-group-item-primary">Monitor: <?php echo $dMonitor->current()->nome_membro; ?></a>
                        <?php $dMonitor->next(); }?>

                          <?php 
                            //**************** 1ª LEITURA *********************
                            $dadosPrimeiraLeitura = pegarPeloIDComPDOmembro($dLeitores->current()->proclamador_primeira_leitura);
                            $dPrimeiraLeitura = new ArrayIterator($dadosPrimeiraLeitura);
                            while($dPrimeiraLeitura->valid()){
                            ?>
                            <a href="#" class="list-group-item list-group-item-action list-group-item-primary">
                              1ª Leitura: <?php echo $dPrimeiraLeitura->current()->nome_membro; ?>
                            </a>
                            <?php $dPrimeiraLeitura->next(); }?>


                            <?php 
                            //**************** SALMO *********************
                            $dadosSalmo = pegarPeloIDComPDOmembro($dLeitores->current()->proclamador_salmo_responsorial);
                            $dSalmo = new ArrayIterator($dadosSalmo);
                            while($dSalmo->valid()){
                            ?>
                            <a href="#" class="list-group-item list-group-item-action list-group-item-primary">
                              Salmo: <?php echo $dSalmo->current()->nome_membro; ?>
                            </a>
                            <?php $dSalmo->next(); }?>


                            <?php 
                            //**************** 2ª LEITURA *********************
                            $dadosSegundaLeitura = pegarPeloIDComPDOmembro($dLeitores->current()->proclamador_segunda_leitura);
                            $dSegundaLeitura = new ArrayIterator($dadosSegundaLeitura);
                            while($dSegundaLeitura->valid()){
                            ?>
                            <a href="#" class="list-group-item list-group-item-action list-group-item-primary">
                              2ª Leitura: <?php echo $dSegundaLeitura->current()->nome_membro; ?>
                            </a>
                            <?php $dSegundaLeitura->next(); }?>


                            <?php 
                            //**************** ORAÇÃO DOS FIEIS *********************
                            $dadosOracaoFieis = pegarPeloIDComPDOmembro($dLeitores->current()->proclamador_preces);
                            $dOracaoFieis = new ArrayIterator($dadosOracaoFieis);
                            while($dOracaoFieis->valid()){
                            ?>
                            <a href="#" class="list-group-item list-group-item-action list-group-item-primary">
                              Oração Universal: <?php echo $dOracaoFieis->current()->nome_membro; ?>
                            </a>
                            <?php $dOracaoFieis->next(); }?>

                        </div>
                          <?php $dLeitores->next(); }?>
                      </div>
                      
                      <!-- Listagem de Acolhimento e Animação -->
                      <div class="row my-5 d-flex flex-row justify-content-between flex-wrap">

                        <div>
                          <?php 
                          $dadosCoral = pegarPeloIDComPDOescalaAnimacao($d->current()->coral_missa);
                          $dCoral = new ArrayIterator($dadosCoral);
                          while($dCoral->valid()){
                            $dadosCoralNome = pegarPeloIDComPDOgrupo($dCoral->current()->grupo_coral_animador);
                            $dCoralNome = new ArrayIterator($dadosCoralNome);
                            while($dCoralNome->valid()){
                          ?>
                          <h4>
                            Animação: <?php echo $dCoralNome->current()->nome_grupo; ?>
                          </h4>
                          <?php $dCoralNome->next(); }?>
                          <?php $dCoral->next(); }?>
                        </div>
                      
                        <div>
                          <?php 
                          $dadosAcolhimento = pegarPeloIDComPDOescalaAcolhimento($d->current()->acolhimento_missa);
                          $dAcolhimento = new ArrayIterator($dadosAcolhimento);
                          while($dAcolhimento->valid()){
                            $dadosAcolhimentoNome = pegarPeloIDComPDOgrupo($dAcolhimento->current()->grupo_acolhimento);
                            $dAcolhimentoNome = new ArrayIterator($dadosAcolhimentoNome);
                            while($dAcolhimentoNome->valid()){
                          ?>
                          <h4>
                            Acolhimento: <?php echo $dAcolhimentoNome->current()->nome_grupo; ?>
                          </h4>
                          <?php $dAcolhimentoNome->next(); }?>
                          <?php $dAcolhimento->next(); }?>
                        </div>
                      </div>
                    </div>
                  </div>


                </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
              <?php
                  $dLeituras->next();
                }
                
              ?>