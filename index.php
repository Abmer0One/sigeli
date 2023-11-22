<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SIGEPA</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Funçoes relacionadas a Base de dados -->
  <?php include_once 'gere/conexao.php'; ?>
  <?php include_once 'gere/funcoes/funcaoBase.php'; ?>

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
<?php
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
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container-fluid">

      <div class="row justify-content-center">
        <div class="col-xl-9 d-flex align-items-center justify-content-lg-between">
          <h1 class="logo me-auto me-lg-0"><a href="index.php">SIGEPA</a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

          <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
              <li><a class="nav-link scrollto active" href="#hero">Inicio</a></li>
              <li><a class="nav-link scrollto" href="#about">Sobre</a></li>
              <li><a class="nav-link scrollto" href="#services">Grupos</a></li>
              <li><a class="nav-link scrollto " href="#missas">Missas</a></li>
              <li><a class="nav-link scrollto" href="#contact">Contactos</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
          </nav><!-- .navbar -->

          <a href="gere/index.php" class="get-started-btn scrollto">Login</a>
        </div>
      </div>
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-8">
          <h1 class="logo me-auto me-lg-0">SIGEPA</h1>
          <h2>A Liturgia da paz mais perto de si...</h2>
          <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox play-btn mb-4"></a>
        </div>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2>Sobre nós</h2>
          <p>SIGEPA, uma aplicação do Centro de Nossa Senhora da Paz, afim de disponibilizar informações do mesmo online. De acordo com o seu Historial, a origem do Centro Nossa Senhora da Paz no Bairro Golfe 2, aponta para o dia 30 de Outubro de 1992 devido a iniciativa dos primeiros habitantes desta zona que deslocavam-se ao Centro de Santa Teresinha para participar das missas dominicais.</p>
        </div>

        <div class="row content">
          <div class="col-lg-6">
            <p>
              Dom Eugênio CARDEAL Dal Corso, vem a discurso por ser o padre que na altura apoiou a iniciativa dos poucos cristãos, ter celebrado a primeira Missa com estes fiéis e neste local às 7 H 00 do dia 24 de Novembro de 1992 e no dia 23 de Fevereiro de 1993 pelas 9H00 realizados os sete primeiros matrimónios em forma de Casamento Comunitário.
            </p>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
              Para mais informações contacte a Coordenação do Centro.
            </p>
            <a href="#contact" class="btn-learn-more">Contactos do Centro</a>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Grupos</h2>
          <p>Aqui estão os Grupos pertencentes ao nosso Centro. Deseja fazer parte de um grupo? </p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="icon-box">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4><a href="">Acólitos</a></h4>
              <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4><a href="">Acolhimento</a></h4>
              <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4><a href="">Corais</a></h4>
              <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-world"></i></div>
              <h4><a href="">Leitores</a></h4>
              <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-slideshow"></i></div>
              <h4><a href="">Ministros de Eucaristia</a></h4>
              <p>Quis consequatur saepe eligendi voluptatem consequatur dolor consequuntur</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-arch"></i></div>
              <h4><a href="">Padres</a></h4>
              <p>Modi nostrum vel laborum. Porro fugit error sit minus sapiente sit aspernatur</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->  

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container">

        <div class="text-center title">
          <h3>Centro de Nossa Senhora da Paz </h3>
          <p>Uma equipa com um único proposito.</p>
        </div>

        <div class="row counters position-relative">

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="<?php echo $listarGrupos->rowCount(); ?>" data-purecounter-duration="1" class="purecounter"></span>
            <p>Comissões</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="<?php echo $listarGrupos->rowCount(); ?>" data-purecounter-duration="1" class="purecounter"></span>
            <p>Grupos</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="<?php echo $listarMembro->rowCount(); ?>" data-purecounter-duration="1" class="purecounter"></span>
            <p>Membros</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="<?php echo $listarActividade->rowCount(); ?>" data-purecounter-duration="1" class="purecounter"></span>
            <p>Actividades</p>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Pricing Section ======= -->
    <section id="missas" class="missas">
          <div class="container">

            <div class="section-title">
              <h2>Missas</h2>
              <p>A missa é o cumprimento do mandamento de Cristo de fazer o que Ele mesmo fez na Última Ceia e é o sacramento em que se recebe o Corpo e o Sangue de Cristo sob a matéria do pão e do vinho, atualizando, de acordo com a Igreja Católica Romana o supremo sacrifício de Cristo na cruz (o Mistério Pascal) e tornando assim presente a salvação, renovando a Santa Ceia ou comemorando um banquete festivo em memória da salvação efetuada por Cristo.</p>
            </div>

            <div class="row">

              <?php 
              $dados = listarPDOmissa(); 
              $d = new ArrayIterator($dados);

              while($d->valid()){
                $hora_da_missa = new DateTime($d->current()->hora_missa);
                //if ($d->current()->dia_missa == "Sabado") {
                  ?>

              <div class="col-lg-4 col-md-6 mt-4 mt-md-0">
                <div class="box recommended">
                  <h3><?php echo $d->current()->dia_missa." ".$hora_da_missa->format('H:i'); ?></h3>
                  <h4>Tempo Comum</h4>
                  <ul>
                    <?php 
                      $dadosLeituras = pegarPeloIDComPDOleituras($d->current()->leituras_missa); 
                      $dLeituras = new ArrayIterator($dadosLeituras);

                      while($dLeituras->valid()){
                      ?>
                    <li>1ª Leitura: <?php echo $dLeituras->current()->titulo_primeira_leitura. "<br />"; ?></li>
                    <li>2ª Leitura: <?php echo $dLeituras->current()->titulo_segunda_leitura. "<br />"; ?></li>
                    <li>Salmo Responsorial: <?php echo $dLeituras->current()->titulo_salmo. "<br />"; ?></li>
                    <li class="na">Evangelho: <?php echo $dLeituras->current()->titulo_evangelho. "<br />"; ?></li>
                   
                    <?php 
                      $dadosPadre = pegarPeloIDComPDOescalaPadre($d->current()->padre_missa); 
                      $dPadre = new ArrayIterator($dadosPadre);?>
                      <?php while($dPadre->valid()){?>
                    <li class="na">Padre: <?php echo $dPadre->current()->nome_padre_celebracao. "<br />"; ?></li>
                    <?php $dPadre->next(); }?>
                  </ul>

                  <?php
                      $dLeituras->next();
                    }
                  ?>
                  <div class="btn-wrap">
                    <a href="#" class="btn-buy" data-bs-toggle="modal" data-bs-target="#exampleModalDefault">Ver +</a>
                  </div>
                  
                </div>
              </div>
              <?php $d->next(); }?>
            </div>
          </div>
        </section><!-- End Pricing Section -->


        <div class="modal fade" id="exampleModalDefault" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          

          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                ...
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>

    <!-- ======= Faq Section ======= -->
    <section id="faq" class="faq">
      <div class="container-fluid">

        <div class="row">

          <?php 
              $dadosInformacaoSemanal = listarPDOinformacaoSemanal(); 
              $dInformacaoSemanal = new ArrayIterator($dadosInformacaoSemanal);

              while($dInformacaoSemanal->valid()){
                ?>
          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

            <div class="content">
              <h3>Informação <strong>Semanal</strong></h3>
              <p>
                A cada dia aprenda algo novo nem que for uma coisa pequena pois, é do pequeno que se faz o grande.
              </p>
            </div>

            <div class="accordion-list">
              <ul>
                <li>
                  <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-1">O que o Papa escreveu para nós esta semana? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                    <h3><?php echo $dInformacaoSemanal->current()->titulo_info_papa. "<br />"; ?></h3>
                    <p>
                      <?php echo $dInformacaoSemanal->current()->informacao_papa. "<br />"; ?>
                    </p>
                  </div>
                </li>

                <li>
                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed">O que temos para ti sobre a liturgia esta semana? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                    <h3><?php echo $dInformacaoSemanal->current()->titulo_info_liturgia. "<br />"; ?></h3>
                    <p>
                      <?php echo $dInformacaoSemanal->current()->informacao_liturgia. "<br />"; ?>
                    </p>
                  </div>
                </li>

                <li>
                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed">O que mais temos para ti? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                    <h3><?php echo $dInformacaoSemanal->current()->titulo_info_outro. "<br />"; ?></h3>
                    <p>
                      <?php echo $dInformacaoSemanal->current()->informacao_outro. "<br />"; ?>
                    </p>
                  </div>
                </li>

              </ul>
            </div>

          </div>

          <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img" style='background-image: url("assets/img/faq.jpg");'>&nbsp;</div>
        
        <?php $dInformacaoSemanal->next(); }?>       
        </div>

      </div>
    </section><!-- End Faq Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contactos</h2>
          <p>Entre em contacto com a Coordenação do Centro para mais informações, ou deixe algumas sugestões afim de melhorias...</p>
        </div>
      </div>

      <div>
        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
      </div>

      <div class="container">

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="ri-map-pin-line"></i>
                <h4>Localização:</h4>
                <p>Luanda, Golf2, Rua da Igreja de Nossa Senhora da Paz</p>
              </div>

              <div class="email">
                <i class="ri-mail-line"></i>
                <h4>Email:</h4>
                <p>secretaria@liturgiadapaz.com</p>
              </div>

              <div class="phone">
                <i class="ri-phone-line"></i>
                <h4>Telefone:</h4>
                <p>+244 941 222 333 / +244 914 222 333</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Seu Nome" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Seu Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Assunto" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Mensagem" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Processando...</div>
                <div class="error-message"></div>
                <div class="sent-message">A sua mensagem foi enviada. Obrigado!</div>
              </div>
              <div class="text-center"><button type="submit">Enviar Mensagem</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3>SIGELI</h3>
      <p>Fazer o bem? ou se dar bem?</p>
      <div class="social-links">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
      <div class="copyright">
        &copy; Copyright <strong><span>SIGELI</span></strong>. Todos Direitos Reservados
      </div>
      <div class="credits">
        Criado por <a href="https://mambosnews.com/">AA</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>