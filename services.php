<?php
session_start();

if (isset($_SESSION['user_session']) != "") {
    header("Location: services_logged.php");
}
require_once 'connect_db.php';


if (isset($_POST['btn-login'])) {
//3.1.1 Assigning posted values to variables.

    $username = trim($_POST['login_username']);
    $username = strip_tags($username);
    $username = htmlspecialchars($username);


    $pass = trim($_POST['login_password']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);

    try {
//3.1.2 Checking the values are existing in the database or not
        $password_in = hash('sha256', $pass);
        $query = "SELECT id_cliente , username , password  FROM `Cliente` WHERE username='$username' AND  password = '$password_in'";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        $row = mysqli_fetch_array($result);
        $count = mysqli_num_rows($result);

//3.1.2 If the posted values are equal to the database values, then session will be created for the user.

        if ($count == 1 && $row['password'] == $password_in) {
            $_SESSION['user_session'] = $row['id_cliente'];
            header("Location: profile.php");

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
    <title>Serviços | TelcoSms</title>

    <!-- core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
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

<body>

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
                <a class="navbar-brand" href="index.php">
                    <img src="../telcosmswp/images/telcopagelogo.png" alt="logo"></a>
            </div>

            <div class="collapse navbar-collapse navbar-right">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">TelcoSms</a></li>

                    <li class="active"><a href="services.php">Serviços</a></li>
                    <li><a href="tableprices.php">Pacotes</a></li>
                    <li><a href="about-us.php">Quem Somos</a></li>
                    <li><a href="contact-us.php">Contactos</a></li>
                    <li><a href="help-support.php">Ajuda e Suporte</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#login-modal">Log In</a></li>
                </ul>
            </div>
        </div><!--/.container-->
    </nav><!--/nav-->

</header><!--/header-->
<!-- login -->
<!-- BEGIN # MODAL LOGIN -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
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
                            <span id="text-login-msg">Utilizador e Password.</span>
                        </div>
                        <input name="login_username" id="login_username" class="form-control" type="text"
                               placeholder="utilizador" required>
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
                            <button id="login_register_btn" type="button" class="btn btn-link">Registro</button>
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
                            <button id="lost_register_btn" type="button" class="btn btn-link">Registro</button>
                        </div>
                    </div>
                </form>
                <!-- End | Lost Password Form -->

                <!-- Begin | Register Form -->
                <form id="register-form" method="post" action="register.php" style="display:none;">
                    <br class="modal-body">
                    <div id="div-register-msg">
                        <div id="icon-register-msg" class="glyphicon glyphicon-chevron-right"></div>
                        <span id="text-register-msg">Criar conta</span>
                    </div>
                    <input name="register_name" class="form-control" type="text" placeholder="Nome" required>
                    <input name="register_apelido" class="form-control" type="text" placeholder="Apelido" required>
                    <input name="register_username" class="form-control" type="text" placeholder="username" required>
                    <input name="register_password" class="form-control" type="password" placeholder="password"
                           required>
                    <input name="register_telefone" class="form-control" type="number" placeholder="telefone" required>
                    <input name="register_email" class="form-control" type="email" placeholder="E-Mail" required>


                    <div class="modal-footer">
                        <div>
                            <button type="submit" name="register_btn" class="btn btn-primary btn-lg btn-block">Criar
                            </button>

                            <button id="register_login_btn" type="button" class="btn btn-link">Log In</button>
                            <button id="register_lost_btn" type="button" class="btn btn-link">Recuperar Password?
                            </button>
                        </div>
                    </div>
                </form>
                <!-- End | Register Form -->

            </div>
            <!-- End # DIV Form -->

        </div>
    </div>
</div>
<!-- END # MODAL LOGIN -->

<section id="feature">
    <div class="container">
        <div class="center wow fadeInDown">
            <h2>SERVIÇOS TELCOSMS </h2>
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
                                Através de aplicações de envio de mensagens (existentes nos ERP, CRMs, etc…), as
                                empresas poderão de forma
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


<div class="get-started center wow fadeInDown">
    <h2>Subscreva os nossos serviços</h2>
    <p class="lead">Escolha o serviço que melhor se adequa as suas necessidades</p>
    <div class="request">
        <h4><a href="tableprices.php">Pacotes TelcoSMS</a></h4>
    </div>
</div><!--/.get-started-->

<div class="clients-area center wow fadeInDown">
    <h2>Opiniões dos nossos clientes</h2>
    <p class="lead">Os nossos clientes têm algo a dizer <br> sobre os nossos serviços</p>
</div>

<div class="row">
    <div class="col-md-4 wow fadeInDown">
        <div class="clients-comments text-center">
            <img src="images/client1.png" class="img-circle" alt="">
            <h3><p align="justify">O serviço BULKSMS foi realmente dentro das expectativas,
                    acho que podemos ter orgulho no resultado.
                    Não posso deixar de vos dizer que foi um enorme prazer trabalhar em equipa convosco.</h3>
            <h4><span>-Kirchof Baptista /</span> Director Kero do Kilamba</h4>
        </div>
    </div>
    <div class="col-md-4 wow fadeInDown">
        <div class="clients-comments text-center">
            <img src="images/client2.png" class="img-circle" alt="">
            <h3><p align="justify">Foi excelente conhecer e trabalhar com a Telco Sms.
                    O empenhamento, a disponibilidade, as competências profissionais demonstradas,
                    contribuiram para o sucesso do nosso negocio.
            </h3>
            <h4><span>-Feleciano Gaspar /</span> Shoprite Manager</h4>
        </div>
    </div>
    <div class="col-md-4 wow fadeInDown">
        <div class="clients-comments text-center">
            <img src="images/client3.png" class="img-circle" alt="">
            <h3><p align="justify">O serviço SE2S foi realmente dentro das expectativas,
                    acho que podemos ter orgulho no resultado.
                    Não posso deixar de vos dizer que foi um enorme prazer trabalhar em equipa convosco.</h3>
            <h4><span>-Russelius Ernestius /</span> Marketing Director Kawakuticode</h4>
        </div>
    </div>
</div>

</div><!--/.container-->
</section><!--/#feature-->

<footer id="footer" class="midnight-blue">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                © 2016 <a target="_blank" href="http://kawakuticode.com/">kawakuticode</a>. All Rights Reserved.
            </div>
            <div class="col-sm-6">
                <ul class="pull-right">
                    <li><a href="#">TelcoSms</a></li>
                    <li><a href="help-support.php">Ajuda e Suporte</a></li>
                    <li><a href="contact-us.php">Contactos</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer><!--/#footer-->


<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/jquery.isotope.min.js"></script>
<script src="js/main.js"></script>
<script src="js/wow.min.js"></script>
</body>
</html>