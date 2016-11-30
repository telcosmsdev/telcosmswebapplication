<?php
session_start();

if (isset($_SESSION['user_session'])!="") {
    header("Location: packet_logged.php");
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
    <title>Pacotes | TelcoSms</title>

    <!-- core pricing.html -->
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
                    <li><a href="services.php">Serviços</a></li>
                    <li class="active"><a href="tableprices.php">Pacotes</a></li>
                    <li><a href="about-us.php">Quem Somos</a></li>
                    <li><a href="contact-us.php">Contactos</a></li>
                    <li><a href="help-support.html">Ajuda e Suporte</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#login-modal">Log In</a></li>
                </ul>
            </div>
        </div><!--/.container-->
    </nav><!--/nav-->

</header><!--/header-->

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
                <form id="login-form" action="login.php" method="post">
                    <div class="modal-body">
                        <div id="div-login-msg">
                            <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                            <span id="text-login-msg">Utilizador e Password.</span>
                        </div>
                        <input name="login_username" class="form-control" type="text" placeholder="utilizador" required>
                        <input name="login_password" class="form-control" type="password" placeholder="Password"
                               required>
                    </div>
                    <div class="modal-footer">
                        <div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
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
                               placeholder="E-Mail (type ERROR for error effect)" required>
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
                    <input name="register_password" class="form-control" type="password" placeholder="password" required>
                    <input name="register_telefone" class="form-control" type="number" placeholder="telefone" required>
                    <input name="register_email" class="form-control" type="email" placeholder="E-Mail" required>


                    <div class="modal-footer">
                        <div>
                            <button type="submit" name="register_btn" class="btn btn-primary btn-lg btn-block">Criar
                            </button>

                            <button id="register_login_btn" type="button" class="btn btn-link">Log In</button>
                            <button id="register_lost_btn" type="button" class="btn btn-link">Recuperar Password?</button>
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

<section class="pricing-page">
    <div class="container">
        <div class="center wow fadeInDown">
            <h2>DETALHES DOS PACOTES BASIC</h2>
            <p class="lead">Temos pacotes para todas necessidades e as melhores ofertas do mercado</p>
        </div>
        <div class="pricing-area text-center">
            <div class="row">
                <div class="col-sm-5 col-sm-offset-1 plan price-one wow fadeInDown">
                    <ul>
                        <li class="heading-one">
                            <h1>Basic</h1>
                            <span>600.000 Kzs</span>
                        </li>
                        <li>100.000 SMS</li>
                        <li>6kzs por SMS</li>
                        <li>Interface de Envio</li>
                        <li>24/7 Suporte Tecnico</li>
                        <li>Sem Acesso a Base De Dados</li>
                        <li class="plan-action">
                            <a href="#" data-toggle="modal" data-target="#login-modal" class="btn btn-primary">Pagar</a>
                        </li>
                    </ul>
                </div>

                <div class="col-sm-5 plan price-six wow fadeInDown">
                    <img src="images/ribon_one.png">
                    <ul>
                        <li class="heading-six">
                            <h1>Basic+</h1>
                            <span>900.000 Kzs</span>
                        </li>
                        <li>100.000 SMS</li>
                        <li>9kzs por SMS</li>
                        <li>Interface de Envio</li>
                        <li>24/7 Suporte Tecnico</li>
                        <li>Acesso a Base De Dados</li>
                        <li class="plan-action">
                            <a href="#" data-toggle="modal" data-target="#login-modal" class="btn btn-primary">Pagar</a>
                        </li>
                    </ul>
                </div>
            </div><!--/pricing-area-->
        </div><!--/container-->
</div>
</section><!--/pricing-page-->

<section class="pricing-page">
    <div class="container">
        <div class="center wow fadeInDown">
            <p class="lead"> *O imposto de consumo não está incluído.</p>
        </div>
    </div>
</section>
<footer id="footer" class="midnight-blue">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                © 2016 <a target="_blank" href="http://kawakuticode.com/">kawakuticode</a>. All Rights Reserved.
            </div>
            <div class="col-sm-6">
                <ul class="pull-right">
                    <li><a href="index.php">TelcoSMS</a></li>
                    <li><a href="help-support.html">Ajuda e Suporte</a></li>
                    <li><a href="contact-us.php">Contactos</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer><!--/#footer-->

    <script src="js/jquery.js"></script>
    <script type="text/javascript">
        $('.carousel').carousel()
    </script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>
</body>
</html>