<?php
session_start();

if (isset($_SESSION['admin_session'])!="") {
    header("Location: admin_profile.php");
}
require_once 'connect_db.php';


if (isset($_POST['btn-login'])) {
//3.1.1 Assigning posted values to variables.

    $username = trim($_POST['login_admin']);
    $username = strip_tags($username);
    $username = htmlspecialchars($username);


    $pass = trim($_POST['login_password']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);


    try {
//3.1.2 Checking the values are existing in the database or not
        $password_in = hash('sha256', $pass);
        $query = "SELECT id_admin , nome_completo , user_admin , email , password  FROM `Admin` WHERE user_admin='$username' AND  password = '$password_in'";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        $row = mysqli_fetch_array($result);
        $count = mysqli_num_rows($result);

//3.1.2 If the posted values are equal to the database values, then session will be created for the user.

        if ($count == 1 && $row['password'] == $password_in) {
            $_SESSION['admin_session'] = $row['id_admin'];
            header("Location: admin_profile.php");

        } else {
            echo "<script language='javascript'>\n alert('Utilizador e password invalidos');\n </script>";
        }
    } catch (mysqli_sql_exception $e) {
        echo $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>TelcoSMS | Bem-Vindo</title>

    <!-- core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body class="homepage">

<header id="header">
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xs-4">
                    <div class="top-number"><p><i class="fa fa-phone-square"></i>+244 918 000 000</p></div>
                </div>
                <div class="col-sm-6 col-xs-8">
                    <div class="social">
                        <ul class="social-share">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-skype"></i></a></li>
                        </ul>
                        <div class="search">
                            <form role="form">
                                <input type="text" class="search-form" autocomplete="off" placeholder="Search">
                                <i class="fa fa-search"></i>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/.container-->
    </div><!--/.top-bar-->

    <nav class="navbar navbar-inverse" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="admin.php">
                    <img src="../telcosmswp/images/telcopagelogo.png" alt="logo"></a>
            </div>

            <div class="collapse navbar-collapse navbar-right">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="admin.php">TelcoSms</a></li>
                    <li><a data-toggle="modal" data-target="#admin-modal">Log In Admin</a></li>
                </ul>
            </div>
        </div><!--/.container-->
    </nav><!--/nav-->

</header><!--/header-->

<!-- BEGIN # MODAL LOGIN -->
<div class="modal fade" id="admin-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
     style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" align="center">
                <img class="img-circle" id="img_logo" src="images/loginlogo.png">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
            </div>

            <!-- Begin # DIV Form -->
            <div id="div-forms">
                <!-- Begin # Login Form -->
                <form id="login-form" method="post">

                    <div class="modal-body">

                        <div id="div-login-msg">

                            <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                            <span id="text-login-msg">Bem-vindo Admin</span>
                        </div>
                        <input name="login_admin" id="login_admin" class="form-control" type="text"
                               placeholder="admin login" required>
                        <input name="login_password" id="login_password" class="form-control" type="password"
                               placeholder="Password"
                               required>
                    </div>
                    <div class="modal-footer">
                        <div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block" name="btn-login"
                                    id="btn-login">Login
                            </button>
                        </div>
                        <div>
                            <button id="login_lost_btn" type="button" class="btn btn-link">Recuperar Password?</button>
                        </div>
                    </div>
                </form>
                <!-- End # Login Form -->

                <!-- Begin | Lost Password Form -->
                <form id="lost-form" action="recover_password.php" style="display:none;">
                    <div class="modal-body">
                        <div id="div-lost-msg">
                            <div id="icon-lost-msg" class="glyphicon glyphicon-chevron-right"></div>
                            <span id="text-lost-msg">Type your e-mail.</span>
                        </div>
                        <input id="lost_email" class="form-control" type="text"
                               placeholder="E-Mail to recover your pass" required>
                    </div>
                    <div class="modal-footer">
                        <div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Send</button>
                        </div>
                        <div>
                            <button id="lost_login_btn" type="button" class="btn btn-link">Log In</button>
                        </div>
                    </div>
                </form>
                <!-- End | Lost Password Form -->

            </div>
            <!-- End # DIV Form -->

        </div>
    </div>
</div>
<!-- END # MODAL LOGIN -->


<section id="main-slider" class="no-margin">
    <div class="carousel slide">
        <ol class="carousel-indicators">
            <li data-target="#main-slider" data-slide-to="0" class="active"></li>
            <li data-target="#main-slider" data-slide-to="1"></li>
            <li data-target="#main-slider" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">

            <div class="item active" style="background-image: url(images/slider/bg1.jpg)">
                <div class="container">
                    <div class="row slide-margin">
                        <div class="col-sm-6">
                            <div class="carousel-content">
                                <h1 class="animation animated-item-1">A sua visita é importante para nós!</h1>
                                <h2 class="animation animated-item-2">A TelcoSMS é um portal para mensagens de texto.
                                    Flexibilidade, fácilidade de utilização e integração, são os pontos fortes desta
                                    solução!</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item-->

            <div class="item" style="background-image: url(images/slider/bg2x.jpg)">
                <div class="container">
                    <div class="row slide-margin">
                        <div class="col-sm-6">
                            <div class="carousel-content">
                                <h1 class="animation animated-item-1">Oportunidade de Negocio!</h1>
                                <h2 class="animation animated-item-2">Nunca foi mais fácil contactar os seus clientes,
                                    experimente já a utilização da TelcoSMS através da aplicação web disponibilizada
                                    neste portal, basta que para tal faças um registo. É grátis!</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item-->

            <div class="item" style="background-image: url(images/slider/bg3x.jpg)">
                <div class="container">
                    <div class="row slide-margin">
                        <div class="col-sm-6">
                            <div class="carousel-content">
                                <h1 class="animation animated-item-1">Inovação</h1>
                                <h2 class="animation animated-item-2">Uma integração, Múltiplos destinos.Escalável e
                                    Flexibilidade de implementação,Protecção de investimento e Redução de Custos</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item-->
        </div><!--/.carousel-inner-->
    </div><!--/.carousel-->
    <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
        <i class="fa fa-chevron-left"></i>
    </a>
    <a class="next hidden-xs" href="#main-slider" data-slide="next">
        <i class="fa fa-chevron-right"></i>
    </a>
</section><!--/#main-slider-->
<p></p>
<p></p>
<p></p>
<p></p>
<div class="container">
    <div class="center wow fadeInDown">
        <h2>Serviços</h2>
        <p class="lead">A TelcoSms <br> ofereçe os seguintes serviços de acordo as suas necessidades</p>
    </div>

    <div class="row">
        <div class="features">
            <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                <div class="feature-wrap">
                    <i class="fa fa-bullhorn"></i>
                    <h2>BULK SMS</h2>
                    <h3><p align="justify"> Nunca foi mais fácil interagir com os seus parceiros de negócio,a
                            TelcoSMS apresenta-lhe o serviço que veio para solucionar o seu problema de comunicação.
                            Através da nossa aplicação de envio de mensagens é possível carregar-se uma lista de
                            contactos e enviar a mensagem desejada para os seus cientes,fornecedores,etc.
                    </h3>
                    <h2><a href="#" data-toggle="modal" data-target="#login-modal">saiba mais</a></h2>
                </div>
            </div><!--/.col-md-4-->

            <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                <div class="feature-wrap">
                    <i class="fa fa-comments"></i>
                    <h2> SMS Corporativa</h2>
                    <h3><p align="justify">
                            Através de aplicações de envio de mensagens (existentes nos ERP, CRMs, etc…), as empresas
                            poderão de forma
                            fácil e rápida integrar-se a nossa Gateway de mensagens (TelcoRush SMS Gateway)
                            e enviarem mensagens para os seus clientes ou colaboradores de todas as redes móveis
                            nacionais
                            e internacionais.</h3>
                    <h2><a href="#" data-toggle="modal" data-target="#login-modal">saiba mais</a></h2>
                </div>
            </div><!--/.col-md-4-->

            <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                <div class="feature-wrap">
                    <i class="fa fa-cloud-download"></i>
                    <h2>Email to SmS - SE2S</h2>
                    <h3><p align="justify"> O serviço E2S (E-mail para SMS) permite o envio de mensagem apartir da
                            aplicação de correio eletrónico corporativo</h3>
                    <h2><a href="#" data-toggle="modal" data-target="#login-modal">saiba mais</a></h2>
                </div>
            </div><!--/.col-md-4-->
        </div><!--/.services-->
    </div><!--/.row-->
</div><!--/.container-->
</section><!--/#feature-->


<section id="partner">
    <div class="container">
        <div class="center wow fadeInDown">
            <h2>Nossos Clientes</h2>
            <p class="lead">Os nossos principais clientes <br> Satisfação e qualidade são as nossas palavras de ordem
            </p>
        </div>

        <div class="partners">
            <ul>
                <li><a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms"
                                     data-wow-delay="300ms" src="images/partners/partner1.png"></a></li>
                <li><a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms"
                                     data-wow-delay="600ms" src="images/partners/partner2.png"></a></li>
                <li><a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms"
                                     data-wow-delay="900ms" src="images/partners/partner3.png"></a></li>
                <li><a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms"
                                     data-wow-delay="1200ms" src="images/partners/partner4.png"></a></li>
                <li><a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms"
                                     data-wow-delay="1500ms" src="images/partners/partner5.png"></a></li>
            </ul>
        </div>
    </div><!--/.container-->
</section><!--/#partner-->

<section id="conatcat-info">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="media contact-info wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                    <div class="pull-left">
                        <i class="fa fa-phone"></i>
                    </div>
                    <div class="media-body">
                        <h2>Tem alguma questão ou necessita de suporte?</h2>
                        <p>Não hesite em contactar-nos suporte 24/24 horas +244 918 000 000</p>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/.container-->
</section><!--/#conatcat-info-->


<footer id="footer" class="midnight-blue">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                © 2016 <a target="_blank" href="http://kawakuticode.com/">kawakuticode</a>. All Rights Reserved.
            </div>
            <div class="col-sm-6">
                <ul class="pull-right">
                    <li><a href="#">TelcoSMS</a></li>
                    <li><a href="help-support.php">Ajuda e Suporte</a></li>
                    <li><a href="contact-us.php">Contactos</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer><!--/#footer-->


<script src="js/jquery.js"></script>
<script src="login.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/jquery.isotope.min.js"></script>
<script src="js/main.js"></script>
<script src="js/wow.min.js"></script>


</body>
</html>