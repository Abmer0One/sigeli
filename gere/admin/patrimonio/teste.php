<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dev.DENTEC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/set.css">
    <link rel="stylesheet" href="assets/css/relatorio.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="icon" href="imagem/ICONE AKIRA.jpg">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <div class="relatorio" style="display: none;">
        <div class="relatorio_logo">
            <img src="img/-.jpg" />
        </div>
        <div class="relatorio_cabecalho">
            <table>
                <tr>
                                    <td><h4>RELATÓRO  DE 11 DE Maio DE 2023</h4></td>
                </tr>
                <tr>
                    <td><p>Actividades para se fazer (Aniceto Bernardo Catongo)</p></td>
                </tr>
            </table>
        </div>
        <div class="relatorio_body">
        
            <table >
                                                    
                                                                                                
                                                                                                
                                                                                                
                                                                                                
                                                                                                
                                        <tr style="border: none!important;">
                                            <td style="border: none!important;"><p>Dar uma revisada no sistema</p></td>
                                        </tr>
                                                                                                
                                        <tr style="border: none!important;">
                                            <td style="border: none!important;"><p>replicar para cada area</p></td>
                                        </tr>
                                                                                                
                                        <tr style="border: none!important;">
                                            <td style="border: none!important;"><p>apresentar ele</p></td>
                                        </tr>
                                                                        
                
            </table>
        </div>
        <div class="relatorio_cabecalho">
            <table>
                <tr>
                    <td style="border: none!important;"><h6>Actividades feitas</h6></td>
                </tr>
            </table>
        </div>
        <div class="relatorio_actividades_realizadas">
            <ul>
                                                    <li>TESTE ======> feito</li>
                                                                                                <li>fazer adicionar a pasta de forma dinamica ======> feito</li>
                                                                                                <li>adicionar o nome do menu tambm ======> feito</li>
                                                                                                <li>meter um select para a pasta ======> feito</li>
                                                                                                <li>testar para ver se vai criar a pasta ======> feito</li>
                                                                                                                                                                                                                                                
                </ul>
        </div>
        <div class="relatorio_cabecalho">
            <table>
                <tr>
                                        <td style="border: none!important;"><h5>LUANDA AOS 11 DE Maio DE 2023 </h5></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="conteudo">
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- main wrapper start -->
    <div class="horizontal-main-wrapper">
        <!-- main header area start -->
        <div class="mainheader-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <div class="logo">
                            <!-- <a href="index.php"><img src="assets/images/icon/logo2.png" alt="logo"></a> -->
                            <h2>dev.DENTEC</h2>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-9 clearfix text-right">
                        <div class="d-md-inline-block d-block mr-md-4">
                            <ul class="notification-area">
                                <li id="full-view"><i class="ti-fullscreen"></i></li>
                                <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                                <li class="dropdown">
                                    <i class="ti-bell dropdown-toggle lendo_notificacao" data-toggle="dropdown">
                                        <span>
                                            0                                        </span>
                                    </i>
                                    <div class="dropdown-menu bell-notify-box notify-box">
                                            <span class="notify-title">Notificações<a href="#"></a></span>
                                        <div class="nofity-list">
                                                                                    </div>
                                    </div>
                                </li>
                                <script type="text/javascript">
                                    var lendo_notificacao = document.querySelector(".lendo_notificacao");
                                    lendo_notificacao.addEventListener("click", ()=>{
                                        var lida = new XMLHttpRequest();
                                        lida.open("POST","config/verificate/verificar_notificacao_lida.php?notificacao=0",true);
                                            lida.onload = ()=>{
                                                if(lida.readyState === XMLHttpRequest.DONE){
                                                    if(lida.status === 200){
                                                        var response_lida = lida.responseText;
                                                        console.log(response_lida);
                                                    }
                                                }
                                            }
                                        lida.send();
                                    });
                                </script>
                                <li class="settings-btn">
                                    <i class="ti-settings"></i>
                                </li>
                            </ul>
                        </div>
                        <div class="clearfix d-md-inline-block d-block">
                            <div class="user-profile m-0">
                                                                <img class="avatar user-thumb" src="arquivos/padrao.png" alt="avatar">
                                <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Aniceto Bernardo Catongo <i class="fa fa-angle-down"></i></h4>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="config/out/sair.php">Sair</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main header area end -->
        <!-- header area start -->
        <div class="header-area header-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-9  d-none d-lg-block">
                        <div class="horizontal-menu">
                            <nav>
                                <ul id="nav_menu">
                                    <li class="mega-menu">
                                        <a href="javascript:void(0)"><i class="ti-layers-alt"></i> <span>Director geral</span></a>
                                    </li>
                                    <li class="mega-menu">
                                        <a href="javascript:void(0)"><i class="ti-bell"></i> <span>Notificar</span></a>
                                        <ul class="submenu">
                                            <li>
                                                <div class="form-row align-items-center" style="padding: 10px;">
                                                    <div>
                                                    <span class="badge badge-success sucesso6"></span>
                                                    <span class="badge badge-danger erro6"></span>
                                                    <span class="badge badge-warning alerta6"></span>
                                                        <input type="text" class="form-control notificacao" id="inlineFormInputName" placeholder="Notificação">
                                                    </div>
                                                    <div>
                                                        <small>Selecione o colega</small>
                                                        <select class="custom-select dev_notificado">
                                                                                                                                    <option value="">Nenhum colega está desponível</option>
                                                                                                                                
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-row align-items-center" style="padding: 10px;">
                                                    <div>
                                                        <button type="submit" class="btn btn-primary notificar"><i class="ti-plus"></i></button>
                                                    </div>
                                                </div>
                                                <script type="text/javascript">
                                                    var dev_notificado = document.querySelector(".dev_notificado");
                                                    var notificacao = document.querySelector(".notificacao");
                                                    var notificar = document.querySelector(".notificar");
                                                    notificar.addEventListener("click", ()=>{
                                                        var notificando = new XMLHttpRequest();
                                                        notificando.open("POST","config/add/adicionar_notificacao.php?notificacao="+notificacao.value+"&dev="+dev_notificado.value,true);
                                                            notificando.onload = ()=>{
                                                                if(notificando.readyState === XMLHttpRequest.DONE){
                                                                    if(notificando.status === 200){
                                                                        var response_notificando = notificando.responseText;
                                                                        if(response_notificando == "200"){
                                                                            notificacao.value = "";
                                                                            document.querySelector(".sucesso6").innerText = "Notificação enviada com sucesso!";
                                                                            document.querySelector(".erro6").innerText = "";
                                                                            document.querySelector(".alerta6").innerText = "";
                                                                        }else if(response_notificando == "404"){
                                                                            document.querySelector(".sucesso6").innerText = "";
                                                                            document.querySelector(".erro6").innerText = "";
                                                                            document.querySelector(".alerta6").innerText = "Tens de preencher todos campos solicitados!";
                                                                        }else if(response_notificando == "500"){
                                                                            document.querySelector(".sucesso6").innerText = "";
                                                                            document.querySelector(".erro6").innerText = "Falha ao enviar notificação";
                                                                            document.querySelector(".alerta6").innerText = "";
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        notificando.send();
                                                    });
                                                </script>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="mega-menu">
                                        <a href="javascript:void(0)" style="color: #007BFF;" ><i class="fa fa-code"></i> <span>Akira (sistema de gestão escolar)</span></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- nav and search button -->
                    <!-- mobile_menu -->
                    <div class="col-12 d-block d-lg-none">
                        <div id="mobile_menu"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header area end -->
        <!-- page title area end -->
            <div class="main-content-inner">
                <!-- aqui -->
                <div class="col-6" style="float: left;">
                    <div class="card">
                        <div class="card-body">
                            <form action="#" style="margin-top: 3%;"  class="actualizar_menu1" method="POST" enctype="multipart/form-data">
                            <span class="badge badge-success sucesso8"></span>
                            <span class="badge badge-danger erro8"></span>
                            <span class="badge badge-warning alerta8"></span>    
                            <div class="input-group">
                                <p class="nova_pasta" style="position: absolute; margin-top: -99999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999%; z-index: -1111111111111111111111111111111111111111111111111111; display: none;"></p>
                                    <div class="input-group mb-3">
                                            <input type="text" value="" requerid="" class="form-control directorio_novo" placeholder="Nome do directório">
                                        </div>
                                        <script type="text/javascript">
                                            var directorio_novo = document.querySelector('.directorio_novo');
                                            var baixo;
                                            var cima;
                                            var outro;
                                            directorio_novo.onkeyup = ()=>{
                                                var codigo_multiplo = event.keyCode;
                                                cima = codigo_multiplo;
                                                outro = codigo_multiplo;
                                                //console.log(codigo_multiplo);
                                            }
                                            directorio_novo.onkeydown = ()=>{
                                                var codigo_multiplo = event.keyCode;
                                                baixo = codigo_multiplo;
                                                //console.log(codigo_multiplo);
                                            }
                                            setInterval(()=>{
                                                if(((baixo == 18) && (cima == 16)) || (outro == 111) || (outro == 191)){
                                                    document.querySelector('.nova_pasta').innerText = "u";
                                                }
                                            }, 50);
                                        </script>
                                <div class="custom-file">
                                    <input type="file" name="arquivo" class="custom-file-input input_arquivo1" id="inputGroupFile04">
                                    <label class="custom-file-label mostrar_arquivo1" for="inputGroupFile04">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary btn_actualizar_menu1" type="button">Actualizar arquivo</button>
                                </div>
                            </div>
                            </form>
                            <script type="text/javascript">
                                var btn_actualizar_menu1 = document.querySelector(".btn_actualizar_menu1");
                                var actualizar_menu1 = document.querySelector(".actualizar_menu1");
                                actualizar_menu1.onsubmit = (prevent)=>{
                                    prevent.preventDefault();
                                }
                                setInterval(()=>{
                                    var input_arquivo1 = document.querySelector(".input_arquivo1");
                                    var mostrar_arquivo1 = document.querySelector(".mostrar_arquivo1");                                            
                                    if(input_arquivo1.value == ""){
                                        mostrar_arquivo1.innerText = "Escolher arquivo";
                                        document.querySelector(".btn_actualizar_menu1").disabled = true;
                                    }else{
                                        mostrar_arquivo1.innerText = input_arquivo1.value;
                                        document.querySelector(".btn_actualizar_menu1").disabled = false;
                                    }
                                }, 50);
                                btn_actualizar_menu1.addEventListener("click", ()=>{
                                    var array;
                                    var nova_pasta = document.querySelector(".nova_pasta");
                                    var caminho = document.querySelector('.directorio_novo').value;
                                    if(nova_pasta.innerText != ""){
                                        array = "u";
                                    }else{
                                        array = "y";
                                    }
                                    var actualizando_menu = new XMLHttpRequest();
                                    actualizando_menu.open("POST","config/update/actualizar_arquivo.php?pasta="+caminho+"&array="+array,true);
                                        actualizando_menu.onload = ()=>{
                                            if(actualizando_menu.readyState === XMLHttpRequest.DONE){
                                                if(actualizando_menu.status === 200){
                                                    var response_actualizando_menu = actualizando_menu.responseText;
                                                    if(response_actualizando_menu == "200"){
                                                        document.querySelector(".sucesso8").innerText = "Menu actualizado com sucesso!";
                                                        document.querySelector(".erro8").innerText = "";
                                                        document.querySelector(".alerta8").innerText = "";
                                                        document.querySelector(".input_arquivo1").value = "";
                                                        document.querySelector('.directorio_novo').value = "";
                                                        nova_pasta.innerText = "";
                                                    }else if(response_actualizando_menu == "500"){
                                                        document.querySelector(".sucesso8").innerText = "";
                                                        document.querySelector(".erro8").innerText = "Falha ao actualizar o menu.";
                                                        document.querySelector(".alerta8").innerText = "";
                                                    }else if(response_actualizando_menu == "O formato do arquivo não é válido."){
                                                        document.querySelector(".sucesso8").innerText = "";
                                                        document.querySelector(".erro8").innerText = "";
                                                        document.querySelector(".alerta8").innerText = "O formato do arquivo não é válido.";
                                                    }else if(response_actualizando_menu == "Tens de adicionar o ficheiro actualizado."){
                                                        document.querySelector(".sucesso8").innerText = "";
                                                        document.querySelector(".erro8").innerText = "";
                                                        document.querySelector(".alerta8").innerText = "Tens de adicionar o ficheiro actualizado.";
                                                    }
                                                }
                                            }
                                        }
                                        var dados_form = new FormData(actualizar_menu1);
                                    actualizando_menu.send(dados_form);
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class="col-6" style="float: right; border-left: 1px dotted #d8e3e7;">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Actualizações recentes de <small>Aniceto Bernardo Catongo</small></h4>
                                                                                                                                                                                                    <span class="badge badge-success sucesso9"></span>
                                        <span class="badge badge-danger erro9"></span>
                                        <span class="badge badge-warning alerta9"></span>
                                        <div class="input-group mb-3">
                                                <input type="text" value="" requerid="" style="display: none;" class="form-control menu5" placeholder="Adicionar menu">
                                                <script type="text/javascript">
                                                    document.querySelector(".t5").onkeypress = (e)=>{
                                                        var chr = String.fromCharCode(e.which);
                                                        if ("1234567890qwertyuioplkjhgfdsazxcvbnmQWERTYUIOPLKJHGFDSAZXCVBNMáàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ ".indexOf(chr) < 0)
                                                        return false;
                                                    };
                                                </script>
                                                <div class="input-group-append">
                                                    <button style="display: none;" class="btn btn-primary btn5" type="button"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </div>
                                            <p class="mb-1"><small class="time"> <i class="ti-time"></i> 11 de Maio 2023 .14:41</small> Actualizou o arquivo <span style="color: #007BFF;">mais_um_teste.php</span> <button class="btn btn-outline-secondary documentar5" type="button">Documentar</button></p>
                                            <script type="text/javascript">
                                                var documentar5 = document.querySelector(".documentar5");
                                                documentar5.addEventListener("click", ()=>{
                                                    document.querySelector(".menu5").style.display = "block";
                                                    document.querySelector(".btn5").style.display = "block";
                                                });
                                                document.querySelector(".btn5").addEventListener("click", ()=>{
                                                    var documentando5 = new XMLHttpRequest();
                                                    documentando5.open("POST","config/add/adicionar_documentacao.php?dados=5&menu="+document.querySelector(".menu5").value,true);
                                                        documentando5.onload = ()=>{
                                                            if(documentando5.readyState === XMLHttpRequest.DONE){
                                                                if(documentando5.status === 200){
                                                                    var response_documentando5 = documentando5.responseText;
                                                                    if(response_documentando5 == "200"){
                                                                        document.querySelector(".sucesso9").innerText = "Documentação solicitada com sucesso!";
                                                                        document.querySelector(".erro9").innerText = "";
                                                                        document.querySelector(".alerta9").innerText = "";
                                                                        document.querySelector(".menu5").value = "";
                                                                    }else if(response_documentando5 == "500"){
                                                                        document.querySelector(".sucesso9").innerText = "";
                                                                        document.querySelector(".erro9").innerText = "Falha ao solicitar a documentação.";
                                                                        document.querySelector(".alerta9").innerText = "";
                                                                    }else if(response_documentando5 == "404"){
                                                                        document.querySelector(".sucesso9").innerText = "";
                                                                        document.querySelector(".erro9").innerText = "";
                                                                        document.querySelector(".alerta9").innerText = "Falha ao identificar a actualização";
                                                                    }else if(response_documentando5 == "Falha ao identificar a actualização"){
                                                                        document.querySelector(".sucesso9").innerText = "";
                                                                        document.querySelector(".erro9").innerText = "";
                                                                        document.querySelector(".alerta9").innerText = "Falha ao identificar a actualização";
                                                                    }
                                                                    console.log(response_documentando5);
                                                                }
                                                            }
                                                        }
                                                    documentando5.send();
                                                });
                                            </script>
                                                                                                                                                                                                                <span class="badge badge-success sucesso9"></span>
                                        <span class="badge badge-danger erro9"></span>
                                        <span class="badge badge-warning alerta9"></span>
                                        <div class="input-group mb-3">
                                                <input type="text" value="" requerid="" style="display: none;" class="form-control menu4" placeholder="Adicionar menu">
                                                <script type="text/javascript">
                                                    document.querySelector(".t5").onkeypress = (e)=>{
                                                        var chr = String.fromCharCode(e.which);
                                                        if ("1234567890qwertyuioplkjhgfdsazxcvbnmQWERTYUIOPLKJHGFDSAZXCVBNMáàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ ".indexOf(chr) < 0)
                                                        return false;
                                                    };
                                                </script>
                                                <div class="input-group-append">
                                                    <button style="display: none;" class="btn btn-primary btn4" type="button"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </div>
                                            <p class="mb-1"><small class="time"> <i class="ti-time"></i> 11 de Maio 2023 .12:54</small> Actualizou o arquivo <span style="color: #007BFF;">boletm.php</span> <button class="btn btn-outline-secondary documentar4" type="button">Documentar</button></p>
                                            <script type="text/javascript">
                                                var documentar4 = document.querySelector(".documentar4");
                                                documentar4.addEventListener("click", ()=>{
                                                    document.querySelector(".menu4").style.display = "block";
                                                    document.querySelector(".btn4").style.display = "block";
                                                });
                                                document.querySelector(".btn4").addEventListener("click", ()=>{
                                                    var documentando4 = new XMLHttpRequest();
                                                    documentando4.open("POST","config/add/adicionar_documentacao.php?dados=4&menu="+document.querySelector(".menu4").value,true);
                                                        documentando4.onload = ()=>{
                                                            if(documentando4.readyState === XMLHttpRequest.DONE){
                                                                if(documentando4.status === 200){
                                                                    var response_documentando4 = documentando4.responseText;
                                                                    if(response_documentando4 == "200"){
                                                                        document.querySelector(".sucesso9").innerText = "Documentação solicitada com sucesso!";
                                                                        document.querySelector(".erro9").innerText = "";
                                                                        document.querySelector(".alerta9").innerText = "";
                                                                        document.querySelector(".menu4").value = "";
                                                                    }else if(response_documentando4 == "500"){
                                                                        document.querySelector(".sucesso9").innerText = "";
                                                                        document.querySelector(".erro9").innerText = "Falha ao solicitar a documentação.";
                                                                        document.querySelector(".alerta9").innerText = "";
                                                                    }else if(response_documentando4 == "404"){
                                                                        document.querySelector(".sucesso9").innerText = "";
                                                                        document.querySelector(".erro9").innerText = "";
                                                                        document.querySelector(".alerta9").innerText = "Falha ao identificar a actualização";
                                                                    }else if(response_documentando4 == "Falha ao identificar a actualização"){
                                                                        document.querySelector(".sucesso9").innerText = "";
                                                                        document.querySelector(".erro9").innerText = "";
                                                                        document.querySelector(".alerta9").innerText = "Falha ao identificar a actualização";
                                                                    }
                                                                    console.log(response_documentando4);
                                                                }
                                                            }
                                                        }
                                                    documentando4.send();
                                                });
                                            </script>
                                                                                                                                                                                                                <span class="badge badge-success sucesso9"></span>
                                        <span class="badge badge-danger erro9"></span>
                                        <span class="badge badge-warning alerta9"></span>
                                        <div class="input-group mb-3">
                                                <input type="text" value="" requerid="" style="display: none;" class="form-control menu3" placeholder="Adicionar menu">
                                                <script type="text/javascript">
                                                    document.querySelector(".t5").onkeypress = (e)=>{
                                                        var chr = String.fromCharCode(e.which);
                                                        if ("1234567890qwertyuioplkjhgfdsazxcvbnmQWERTYUIOPLKJHGFDSAZXCVBNMáàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ ".indexOf(chr) < 0)
                                                        return false;
                                                    };
                                                </script>
                                                <div class="input-group-append">
                                                    <button style="display: none;" class="btn btn-primary btn3" type="button"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </div>
                                            <p class="mb-1"><small class="time"> <i class="ti-time"></i> 11 de Maio 2023 .14:47</small> Actualizou o arquivo <span style="color: #007BFF;">arredondae.php</span> <button class="btn btn-outline-secondary documentar3" type="button">Documentar</button></p>
                                            <script type="text/javascript">
                                                var documentar3 = document.querySelector(".documentar3");
                                                documentar3.addEventListener("click", ()=>{
                                                    document.querySelector(".menu3").style.display = "block";
                                                    document.querySelector(".btn3").style.display = "block";
                                                });
                                                document.querySelector(".btn3").addEventListener("click", ()=>{
                                                    var documentando3 = new XMLHttpRequest();
                                                    documentando3.open("POST","config/add/adicionar_documentacao.php?dados=3&menu="+document.querySelector(".menu3").value,true);
                                                        documentando3.onload = ()=>{
                                                            if(documentando3.readyState === XMLHttpRequest.DONE){
                                                                if(documentando3.status === 200){
                                                                    var response_documentando3 = documentando3.responseText;
                                                                    if(response_documentando3 == "200"){
                                                                        document.querySelector(".sucesso9").innerText = "Documentação solicitada com sucesso!";
                                                                        document.querySelector(".erro9").innerText = "";
                                                                        document.querySelector(".alerta9").innerText = "";
                                                                        document.querySelector(".menu3").value = "";
                                                                    }else if(response_documentando3 == "500"){
                                                                        document.querySelector(".sucesso9").innerText = "";
                                                                        document.querySelector(".erro9").innerText = "Falha ao solicitar a documentação.";
                                                                        document.querySelector(".alerta9").innerText = "";
                                                                    }else if(response_documentando3 == "404"){
                                                                        document.querySelector(".sucesso9").innerText = "";
                                                                        document.querySelector(".erro9").innerText = "";
                                                                        document.querySelector(".alerta9").innerText = "Falha ao identificar a actualização";
                                                                    }else if(response_documentando3 == "Falha ao identificar a actualização"){
                                                                        document.querySelector(".sucesso9").innerText = "";
                                                                        document.querySelector(".erro9").innerText = "";
                                                                        document.querySelector(".alerta9").innerText = "Falha ao identificar a actualização";
                                                                    }
                                                                    console.log(response_documentando3);
                                                                }
                                                            }
                                                        }
                                                    documentando3.send();
                                                });
                                            </script>
                                                                                                                                                                                                                <span class="badge badge-success sucesso9"></span>
                                        <span class="badge badge-danger erro9"></span>
                                        <span class="badge badge-warning alerta9"></span>
                                        <div class="input-group mb-3">
                                                <input type="text" value="" requerid="" style="display: none;" class="form-control menu2" placeholder="Adicionar menu">
                                                <script type="text/javascript">
                                                    document.querySelector(".t5").onkeypress = (e)=>{
                                                        var chr = String.fromCharCode(e.which);
                                                        if ("1234567890qwertyuioplkjhgfdsazxcvbnmQWERTYUIOPLKJHGFDSAZXCVBNMáàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ ".indexOf(chr) < 0)
                                                        return false;
                                                    };
                                                </script>
                                                <div class="input-group-append">
                                                    <button style="display: none;" class="btn btn-primary btn2" type="button"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </div>
                                            <p class="mb-1"><small class="time"> <i class="ti-time"></i> 11 de Maio 2023 .14:49</small> Actualizou o arquivo <span style="color: #007BFF;">c.php</span> <button class="btn btn-outline-secondary documentar2" type="button">Documentar</button></p>
                                            <script type="text/javascript">
                                                var documentar2 = document.querySelector(".documentar2");
                                                documentar2.addEventListener("click", ()=>{
                                                    document.querySelector(".menu2").style.display = "block";
                                                    document.querySelector(".btn2").style.display = "block";
                                                });
                                                document.querySelector(".btn2").addEventListener("click", ()=>{
                                                    var documentando2 = new XMLHttpRequest();
                                                    documentando2.open("POST","config/add/adicionar_documentacao.php?dados=2&menu="+document.querySelector(".menu2").value,true);
                                                        documentando2.onload = ()=>{
                                                            if(documentando2.readyState === XMLHttpRequest.DONE){
                                                                if(documentando2.status === 200){
                                                                    var response_documentando2 = documentando2.responseText;
                                                                    if(response_documentando2 == "200"){
                                                                        document.querySelector(".sucesso9").innerText = "Documentação solicitada com sucesso!";
                                                                        document.querySelector(".erro9").innerText = "";
                                                                        document.querySelector(".alerta9").innerText = "";
                                                                        document.querySelector(".menu2").value = "";
                                                                    }else if(response_documentando2 == "500"){
                                                                        document.querySelector(".sucesso9").innerText = "";
                                                                        document.querySelector(".erro9").innerText = "Falha ao solicitar a documentação.";
                                                                        document.querySelector(".alerta9").innerText = "";
                                                                    }else if(response_documentando2 == "404"){
                                                                        document.querySelector(".sucesso9").innerText = "";
                                                                        document.querySelector(".erro9").innerText = "";
                                                                        document.querySelector(".alerta9").innerText = "Falha ao identificar a actualização";
                                                                    }else if(response_documentando2 == "Falha ao identificar a actualização"){
                                                                        document.querySelector(".sucesso9").innerText = "";
                                                                        document.querySelector(".erro9").innerText = "";
                                                                        document.querySelector(".alerta9").innerText = "Falha ao identificar a actualização";
                                                                    }
                                                                    console.log(response_documentando2);
                                                                }
                                                            }
                                                        }
                                                    documentando2.send();
                                                });
                                            </script>
                                                                                                                                                                                                                <span class="badge badge-success sucesso9"></span>
                                        <span class="badge badge-danger erro9"></span>
                                        <span class="badge badge-warning alerta9"></span>
                                        <div class="input-group mb-3">
                                                <input type="text" value="" requerid="" style="display: none;" class="form-control menu1" placeholder="Adicionar menu">
                                                <script type="text/javascript">
                                                    document.querySelector(".t5").onkeypress = (e)=>{
                                                        var chr = String.fromCharCode(e.which);
                                                        if ("1234567890qwertyuioplkjhgfdsazxcvbnmQWERTYUIOPLKJHGFDSAZXCVBNMáàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ ".indexOf(chr) < 0)
                                                        return false;
                                                    };
                                                </script>
                                                <div class="input-group-append">
                                                    <button style="display: none;" class="btn btn-primary btn1" type="button"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </div>
                                            <p class="mb-1"><small class="time"> <i class="ti-time"></i> 11 de Maio 2023 .13:23</small> Actualizou o arquivo <span style="color: #007BFF;">menu.php</span> <button class="btn btn-outline-secondary documentar1" type="button">Documentar</button></p>
                                            <script type="text/javascript">
                                                var documentar1 = document.querySelector(".documentar1");
                                                documentar1.addEventListener("click", ()=>{
                                                    document.querySelector(".menu1").style.display = "block";
                                                    document.querySelector(".btn1").style.display = "block";
                                                });
                                                document.querySelector(".btn1").addEventListener("click", ()=>{
                                                    var documentando1 = new XMLHttpRequest();
                                                    documentando1.open("POST","config/add/adicionar_documentacao.php?dados=1&menu="+document.querySelector(".menu1").value,true);
                                                        documentando1.onload = ()=>{
                                                            if(documentando1.readyState === XMLHttpRequest.DONE){
                                                                if(documentando1.status === 200){
                                                                    var response_documentando1 = documentando1.responseText;
                                                                    if(response_documentando1 == "200"){
                                                                        document.querySelector(".sucesso9").innerText = "Documentação solicitada com sucesso!";
                                                                        document.querySelector(".erro9").innerText = "";
                                                                        document.querySelector(".alerta9").innerText = "";
                                                                        document.querySelector(".menu1").value = "";
                                                                    }else if(response_documentando1 == "500"){
                                                                        document.querySelector(".sucesso9").innerText = "";
                                                                        document.querySelector(".erro9").innerText = "Falha ao solicitar a documentação.";
                                                                        document.querySelector(".alerta9").innerText = "";
                                                                    }else if(response_documentando1 == "404"){
                                                                        document.querySelector(".sucesso9").innerText = "";
                                                                        document.querySelector(".erro9").innerText = "";
                                                                        document.querySelector(".alerta9").innerText = "Falha ao identificar a actualização";
                                                                    }else if(response_documentando1 == "Falha ao identificar a actualização"){
                                                                        document.querySelector(".sucesso9").innerText = "";
                                                                        document.querySelector(".erro9").innerText = "";
                                                                        document.querySelector(".alerta9").innerText = "Falha ao identificar a actualização";
                                                                    }
                                                                    console.log(response_documentando1);
                                                                }
                                                            }
                                                        }
                                                    documentando1.send();
                                                });
                                            </script>
                                                                </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>© Copyright 2023. Todos os direitos reservados. Desenvolvido pela <a href="#" target="__blunk" >Dentec</a>.</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    <!-- offset area start -->
    <div class="offset-area">
        <div class="offset-close"><i class="ti-close"></i></div>
        <ul class="nav offset-menu-tab">
            <li><a class="active" data-toggle="tab" href="#activity">Actividades</a></li>
            <li><a data-toggle="tab" href="#settings">Definições</a></li>
        </ul>
        <div class="offset-content tab-content">
            <div id="activity" class="tab-pane fade in show active">
                <div class="recent-activity">
                        <span class="badge badge-success sucesso4"></span>
                        <span class="badge badge-danger erro4"></span>
                        <span class="badge badge-warning alert4"></span>
                                                            <div class="timeline-task">
                                            <div class="icon bg2">
                                                <i class="fa fa-check"></i>
                                            </div>
                                            <div class="tm-title">
                                                <h4>TESTE</h4>
                                            </div>
                                        </div>
                                                                                                <div class="timeline-task">
                                            <div class="icon bg2">
                                                <i class="fa fa-check"></i>
                                            </div>
                                            <div class="tm-title">
                                                <h4>fazer adicionar a pasta de forma dinamica</h4>
                                            </div>
                                        </div>
                                                                                                <div class="timeline-task">
                                            <div class="icon bg2">
                                                <i class="fa fa-check"></i>
                                            </div>
                                            <div class="tm-title">
                                                <h4>adicionar o nome do menu tambm</h4>
                                            </div>
                                        </div>
                                                                                                <div class="timeline-task">
                                            <div class="icon bg2">
                                                <i class="fa fa-check"></i>
                                            </div>
                                            <div class="tm-title">
                                                <h4>meter um select para a pasta</h4>
                                            </div>
                                        </div>
                                                                                                <div class="timeline-task">
                                            <div class="icon bg2">
                                                <i class="fa fa-check"></i>
                                            </div>
                                            <div class="tm-title">
                                                <h4>testar para ver se vai criar a pasta</h4>
                                            </div>
                                        </div>
                                                                                                <div class="timeline-task">
                                            <div class="icon bg1 feito6" style="cursor: pointer;">
                                                <i class="fa fa-tasks"></i>
                                            </div>
                                            <div class="tm-title">
                                                <h4>Dar uma revisada no sistema</h4>
                                            </div>
                                        </div>
                        <script type="text/javascript">
                            var feito6 = document.querySelector(".feito6");
                            feito6.addEventListener("click", ()=>{
                                var guardar6 = new XMLHttpRequest();
                                guardar6.open("POST","config/add/adicionar_tarefa_feita.php?tarefa=6",true);
                                    guardar6.onload = ()=>{
                                        if(guardar6.readyState === XMLHttpRequest.DONE){
                                            if(guardar6.status === 200){
                                                var response_guardar6 = guardar6.responseText;
                                                if(response_guardar6 == "200"){
                                                    window.location.href = "";
                                                }else if(response_guardar6 == "404"){
                                                    document.querySelector(".sucesso2").innerText = "";
                                                    document.querySelector(".erro2").innerText = "";
                                                    document.querySelector(".alerta2").innerText = "Falha ao identificar a tarefa";
                                                }else if(response_guardar6 == "500"){
                                                    document.querySelector(".sucesso2").innerText = "";
                                                    document.querySelector(".erro2").innerText = "Falha ao adicionar a tarefa";
                                                    document.querySelector(".alerta2").innerText = "";
                                                }
                                            }
                                        }
                                    }
                                guardar6.send();
                            });
                        </script>
                                                                                                <div class="timeline-task">
                                            <div class="icon bg1 feito7" style="cursor: pointer;">
                                                <i class="fa fa-tasks"></i>
                                            </div>
                                            <div class="tm-title">
                                                <h4>replicar para cada area</h4>
                                            </div>
                                        </div>
                        <script type="text/javascript">
                            var feito7 = document.querySelector(".feito7");
                            feito7.addEventListener("click", ()=>{
                                var guardar7 = new XMLHttpRequest();
                                guardar7.open("POST","config/add/adicionar_tarefa_feita.php?tarefa=7",true);
                                    guardar7.onload = ()=>{
                                        if(guardar7.readyState === XMLHttpRequest.DONE){
                                            if(guardar7.status === 200){
                                                var response_guardar7 = guardar7.responseText;
                                                if(response_guardar7 == "200"){
                                                    window.location.href = "";
                                                }else if(response_guardar7 == "404"){
                                                    document.querySelector(".sucesso2").innerText = "";
                                                    document.querySelector(".erro2").innerText = "";
                                                    document.querySelector(".alerta2").innerText = "Falha ao identificar a tarefa";
                                                }else if(response_guardar7 == "500"){
                                                    document.querySelector(".sucesso2").innerText = "";
                                                    document.querySelector(".erro2").innerText = "Falha ao adicionar a tarefa";
                                                    document.querySelector(".alerta2").innerText = "";
                                                }
                                            }
                                        }
                                    }
                                guardar7.send();
                            });
                        </script>
                                                                                                <div class="timeline-task">
                                            <div class="icon bg1 feito8" style="cursor: pointer;">
                                                <i class="fa fa-tasks"></i>
                                            </div>
                                            <div class="tm-title">
                                                <h4>apresentar ele</h4>
                                            </div>
                                        </div>
                        <script type="text/javascript">
                            var feito8 = document.querySelector(".feito8");
                            feito8.addEventListener("click", ()=>{
                                var guardar8 = new XMLHttpRequest();
                                guardar8.open("POST","config/add/adicionar_tarefa_feita.php?tarefa=8",true);
                                    guardar8.onload = ()=>{
                                        if(guardar8.readyState === XMLHttpRequest.DONE){
                                            if(guardar8.status === 200){
                                                var response_guardar8 = guardar8.responseText;
                                                if(response_guardar8 == "200"){
                                                    window.location.href = "";
                                                }else if(response_guardar8 == "404"){
                                                    document.querySelector(".sucesso2").innerText = "";
                                                    document.querySelector(".erro2").innerText = "";
                                                    document.querySelector(".alerta2").innerText = "Falha ao identificar a tarefa";
                                                }else if(response_guardar8 == "500"){
                                                    document.querySelector(".sucesso2").innerText = "";
                                                    document.querySelector(".erro2").innerText = "Falha ao adicionar a tarefa";
                                                    document.querySelector(".alerta2").innerText = "";
                                                }
                                            }
                                        }
                                    }
                                guardar8.send();
                            });
                        </script>
                                                                            <div>
                        <button type="submit" class="btn btn-primary gerar_relatorio">Gerar relatório</button>
                    </div>
                </div>
            </div>
            <div id="settings" class="tab-pane fade">
                <div class="offset-settings">
                    <div class="settings-list">
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Notificações</h5>
                                <div class="s-swtich">
                                                                                    <input class="x1" type="checkbox" id="switch1" />
                                                    <label for="switch1">Toggle</label>
                                                <script type="text/javascript">
                                                    var x1 = document.querySelector(".x1");
                                                    x1.addEventListener("click", ()=>{
                                                        var nao_notifica = new XMLHttpRequest();
                                                        nao_notifica.open("POST","config/status/notificacao.php?valores=Noficação",true);
                                                            nao_notifica.onload = ()=>{
                                                                if(nao_notifica.readyState === XMLHttpRequest.DONE){
                                                                    if(nao_notifica.status === 200){
                                                                        var response_nao_notifica = nao_notifica.responseText;
                                                                        if(response_nao_notifica == "200"){
                                                                            // x1.checked = true;
                                                                        }else if(response_nao_notifica == "404"){
                                                                            x1.checked = false;
                                                                        }else if(response_nao_notifica == "500"){
                                                                            x1.checked = false;
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        nao_notifica.send();
                                                    });
                                                </script>
                                                                            </div>
                                
                            </div>
                        </div>
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Desponibilidade</h5>
                                                                            <div class="s-swtich">
                                                <input type="checkbox" class="x2" id="switch2" />
                                                <label for="switch2">Toggle</label>
                                            </div>
                                            <script type="text/javascript">
                                                var x2 = document.querySelector(".x2");
                                                x2.addEventListener("click", ()=>{
                                                    var nao_notifica2 = new XMLHttpRequest();
                                                    nao_notifica2.open("POST","config/status/notificacao.php?valores=Desponivel para receber tarefas",true);
                                                        nao_notifica2.onload = ()=>{
                                                            if(nao_notifica2.readyState === XMLHttpRequest.DONE){
                                                                if(nao_notifica2.status === 200){
                                                                    var response_nao_notifica = nao_notifica2.responseText;
                                                                    if(response_nao_notifica == "200"){
                                                                        // x2.checked = true;
                                                                    }else if(response_nao_notifica == "404"){
                                                                        x2.checked = false;
                                                                    }else if(response_nao_notifica == "500"){
                                                                        x2.checked = false;
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    nao_notifica2.send();
                                                });
                                            </script>
                                                                        
                            </div>
                        </div>
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Reuniões</h5>
                                                                            <div class="s-swtich">
                                                <input type="checkbox" class="x3" id="switch3" />
                                                <label for="switch3">Toggle</label>
                                            </div>
                                            <script type="text/javascript">
                                                var x3 = document.querySelector(".x3");
                                                x3.addEventListener("click", ()=>{
                                                    var nao_notifica3 = new XMLHttpRequest();
                                                    nao_notifica3.open("POST","config/status/notificacao.php?valores=Desponivel para reunião",true);
                                                        nao_notifica3.onload = ()=>{
                                                            if(nao_notifica3.readyState === XMLHttpRequest.DONE){
                                                                if(nao_notifica3.status === 200){
                                                                    var response_nao_notifica = nao_notifica3.responseText;
                                                                    if(response_nao_notifica == "200"){
                                                                        // x3.checked = true;
                                                                    }else if(response_nao_notifica == "404"){
                                                                        x3.checked = false;
                                                                    }else if(response_nao_notifica == "500"){
                                                                        x3.checked = false;
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    nao_notifica3.send();
                                                });
                                            </script>
                                                                        
                            </div>
                        </div>
                        <div class="s-settings">
                        <span class="badge badge-success sucesso3"></span>
                                <span class="badge badge-danger erro3"></span>
                                <span class="badge badge-warning alerta3"></span>
                            <div class="s-sw-title">
                                <input class="form-control nova_tarefa" type="text" placeholder="Adicionar tarefa" id="example-url-input">
                            </div>
                            <script type="text/javascript">
                                var nova_tarefa = document.querySelector(".nova_tarefa");
                                nova_tarefa.addEventListener("keyup", ()=>{
                                    var codigo = event.keyCode;
                                    if(codigo == 13){
                                        var adicionar_tarefa = new XMLHttpRequest();
                                        adicionar_tarefa.open("POST","config/add/adicionar_tarefa.php?tarefa="+nova_tarefa.value,true);
                                            adicionar_tarefa.onload = ()=>{
                                                if(adicionar_tarefa.readyState === XMLHttpRequest.DONE){
                                                    if(adicionar_tarefa.status === 200){
                                                        var response_adicionar_tarefa = adicionar_tarefa.responseText;
                                                        if(response_adicionar_tarefa == "200"){
                                                            document.querySelector(".sucesso3").innerText = "Tarefa adicionada com sucesso!";
                                                            document.querySelector(".erro3").innerText = "";
                                                            document.querySelector(".alerta3").innerText = "";
                                                            nova_tarefa.value = "";
                                                        }else if(response_adicionar_tarefa == "500"){
                                                            document.querySelector(".sucesso3").innerText = "";
                                                            document.querySelector(".erro3").innerText = "Falha ao adicionar a tarefa.";
                                                            document.querySelector(".alerta3").innerText = "";
                                                        }else if(response_adicionar_tarefa == "404"){
                                                            document.querySelector(".sucesso3").innerText = "";
                                                            document.querySelector(".erro3").innerText = "";
                                                            document.querySelector(".alerta3").innerText = "Tens de adicionar uma tarefa!";
                                                        }
                                                    }
                                                }
                                            }
                                        adicionar_tarefa.send();
                                    }
                                });
                            </script>
                        </div>
                        <div class="s-settings">
                            <h5>Mudar a senha</h5>
                            <span class="badge badge-success sucesso2"></span>
                            <span class="badge badge-danger erro2"></span>
                            <span class="badge badge-warning alerta2"></span>
                            <div class="s-sw-title">
                                <input class="form-control senha_antiga" type="password" placeholder="Senha antiga" id="example-url-input">
                            </div>
                        </div>
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <input class="form-control senha_nova" disabled type="text" placeholder="Nova senha" id="example-url-input">
                            </div>
                            <div class="s-sw-title">
                                <input class="form-control confirmar_senha" disabled type="text" placeholder="Confirmar nova senha" id="example-url-input">
                            </div>
                            <div class="s-sw-title">
                                <button class="btn btn-primary alterar_senha" style="float: right;" type="submit">Alterar</button>
                            </div>
                        </div>
                        <script type="text/javascript">
                            var senha_antiga = document.querySelector(".senha_antiga");
                            var senha_nova = document.querySelector(".senha_nova");
                            var confirmar_senha = document.querySelector(".confirmar_senha");
                            var alterar_senha = document.querySelector(".alterar_senha");
                            senha_antiga.addEventListener("keyup", ()=>{
                                var verificar_senha = new XMLHttpRequest();
                                verificar_senha.open("POST","config/verificate/verificar_senha.php?senha="+senha_antiga.value,true);
                                    verificar_senha.onload = ()=>{
                                        if(verificar_senha.readyState === XMLHttpRequest.DONE){
                                            if(verificar_senha.status === 200){
                                                var response_verificar_senha = verificar_senha.responseText;
                                                if(response_verificar_senha == "200"){
                                                    senha_nova.disabled = false;
                                                    confirmar_senha.disabled = false;
                                                    senha_antiga.disabled = true;
                                                }else if(response_verificar_senha == "404"){
                                                    senha_nova.disabled = true;
                                                    confirmar_senha.disabled = true;
                                                    senha_antiga.disabled = false;
                                                }else if(response_verificar_senha == "500"){
                                                    senha_nova.disabled = true;
                                                    confirmar_senha.disabled = true;
                                                    senha_antiga.disabled = false;
                                                }
                                            }
                                        }
                                    }
                                verificar_senha.send();
                            });
                            alterar_senha.addEventListener("click", ()=>{
                                if(senha_nova.value == confirmar_senha.value){
                                    document.querySelector(".sucesso2").innerText = "";
                                    document.querySelector(".erro2").innerText = "";
                                    document.querySelector(".alerta2").innerText = "";
                                    var senha_nova1 = new XMLHttpRequest();
                                    senha_nova1.open("POST","config/update/update_senha.php?senha="+senha_nova.value,true);
                                        senha_nova1.onload = ()=>{
                                            if(senha_nova1.readyState === XMLHttpRequest.DONE){
                                                if(senha_nova1.status === 200){
                                                    var response_senha_nova = senha_nova1.responseText;
                                                    if(response_senha_nova == "200"){
                                                        document.querySelector(".sucesso2").innerText = "Senha alterada com sucesso!";
                                                        document.querySelector(".erro2").innerText = "";
                                                        document.querySelector(".alerta2").innerText = "";
                                                        senha_nova.value = "";
                                                        confirmar_senha.value = "";
                                                        senha_antiga.value = "";
                                                        senha_antiga.disabled = false;
                                                    }else if(response_senha_nova == "404"){
                                                        document.querySelector(".sucesso2").innerText = "";
                                                        document.querySelector(".erro2").innerText = "";
                                                        document.querySelector(".alerta2").innerText = "Tens de adicionar uma nova senha";
                                                    }else if(response_senha_nova == "500"){
                                                        document.querySelector(".sucesso2").innerText = "";
                                                        document.querySelector(".erro2").innerText = "Falha ao alterar a senha";
                                                        document.querySelector(".alerta2").innerText = "";
                                                    }
                                                }
                                            }
                                        }
                                    senha_nova1.send();
                                }else{
                                    document.querySelector(".sucesso2").innerText = "";
                                    document.querySelector(".erro2").innerText = "";
                                    document.querySelector(".alerta2").innerText = "A senha não correspondem";
                                }
                            });
                        </script>
                        <div class="s-settings">
                            <small>Alterar foto</small>
                                <span class="badge badge-success sucesso1"></span>
                                <span class="badge badge-danger erro1"></span>
                                <span class="badge badge-warning alerta1"></span>
                            <img src="img/a.jpg" class="pre_visualizar" />
                            <br/>
                            <form class="adicionar_foto" action="#" method="POST" enctype="multipart/form-data">
                                <div class="s-sw-title">
                                    <input class="form-control foto" name="foto" type="file" id="example-url-input">
                                </div>
                                <button class="btn btn-primary mudar_foto" style="float: right;" type="submit">Alterar</button>
                            </form>
                            <script type="text/javascript">
                                setInterval(()=>{
                                    var pre_visualizar = document.querySelector(".pre_visualizar");
                                    var foto = document.querySelector(".foto");
                                    if(foto.value == ""){
                                        pre_visualizar.style.display = "none";
                                    }else{
                                        pre_visualizar.style.display = "block";
                                    }
                                }, 50);
                                function readImage() {
                                    if (this.files && this.files[0]) {
                                    var file = new FileReader();
                                    file.onload = function(e) {
                                        document.querySelector(".pre_visualizar").src = e.target.result;
                                    };       
                                    file.readAsDataURL(this.files[0]);
                                    }
                                }   
                                document.querySelector(".foto").addEventListener("change", readImage, true);
                            </script>
                            <script type="text/javascript">
                                var adicionar_foto = document.querySelector(".adicionar_foto");
                                var foto = document.querySelector(".foto");
                                var mudar_foto = document.querySelector(".mudar_foto");
                                adicionar_foto.onsubmit = (prevent)=>{
                                    prevent.preventDefault();
                                }
                                mudar_foto.addEventListener("click", ()=>{
                                    var adicionar = new XMLHttpRequest();
                                    adicionar.open("POST","config/add/adicionar_foto.php",true);
                                        adicionar.onload = ()=>{
                                            if(adicionar.readyState === XMLHttpRequest.DONE){
                                                if(adicionar.status === 200){
                                                    var response_adicionar = adicionar.responseText;
                                                    if(response_adicionar == "200"){
                                                        document.querySelector(".sucesso1").innerText = "Foto alterada com sucesso!";
                                                        document.querySelector(".erro1").innerText = "";
                                                        document.querySelector(".alerta1").innerText = "";
                                                        foto.value = "";
                                                    }else if(response_adicionar == "500"){
                                                        document.querySelector(".sucesso1").innerText = "";
                                                        document.querySelector(".erro1").innerText = "Falha ao alterar a foto de perfil";
                                                        document.querySelector(".alerta1").innerText = "";
                                                    }else if(response_adicionar == "O formato da imagem não é válido"){
                                                        document.querySelector(".sucesso1").innerText = "";
                                                        document.querySelector(".erro1").innerText = "";
                                                        document.querySelector(".alerta1").innerText = "O formato da imagem não é válido";
                                                    }else if(response_adicionar == "Tens de adicionar uma foto"){
                                                        document.querySelector(".sucesso1").innerText = "";
                                                        document.querySelector(".erro1").innerText = "";
                                                        document.querySelector(".alerta1").innerText = "Tens de adicionar uma foto";
                                                    }
                                                }
                                            }
                                        }
                                        var dados_foto = new FormData(adicionar_foto);
                                    adicionar.send(dados_foto);
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- offset area end -->
    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
        zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
        ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
    </div>
    <script type="text/javascript">
        var conteudo = document.querySelector(".conteudo");
        var relatorio = document.querySelector(".relatorio");
        var gerar_relatorio = document.querySelector(".gerar_relatorio");
        var offset_area = document.querySelector(".offset-area");
        gerar_relatorio.addEventListener("click", ()=>{
            conteudo.style.display = "none";
            relatorio.style.display = "block";
            offset_area.classList.remove('show_hide');
            window.print();
        });
    </script>
</body>

</html>
