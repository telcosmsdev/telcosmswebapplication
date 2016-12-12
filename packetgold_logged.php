<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Pacotes | TelcoSMS</title>

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
                <a class="navbar-brand" href="index_logged.php">
                    <img src="../telcosmswp/images/telcopagelogo.png" alt="logo"></a>
            </div>

            <div class="collapse navbar-collapse navbar-right">
                <ul class="nav navbar-nav">
                    <li ><a href="index_logged.php">TelcoSMS</a></li>
                    <li ><a href="services_logged.php">Serviços</a></li>
                    <li class="active"><a href="tableprices_logged.php">Pacotes</a></li>
                    <li><a href="about-us_logged.php">Quem Somos</a></li>
                    <li><a href="contact-us_logged.php">Contactos</a></li>
                    <li><a href="help-support_logged.php">Ajuda e Suporte</a></li>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="logout.php">logout</a></li>
                </ul>
            </div>
        </div><!--/.container-->
    </nav><!--/nav-->
</header><!--/header-->

<!-- BEGIN # MODAL CONSTRUCTION-->
<div class="modal fade" id="construct-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true"
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
                <form id="show_construction" method="post">
                    <div class="modal-body">
                        <p><b> UNDER CONSTRUCTION </b></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--  # MODAL CONSTRUCTION -->

<section class="pricing-page">
    <div class="container">
        <div class="center wow fadeInDown">
            <h2>DETALHES DOS PACOTES GOLD</h2>
            <p class="lead">Temos pacotes para todas necessidades e as melhores ofertas do mercado</p>
        </div>
        <div class="pricing-area text-center">
                <div class="row">
                    <div class="col-sm-5 col-sm-offset-1 plan price-one wow fadeInDown">
                    <ul>
                        <li class="heading-one">
                            <h1>Gold</h1>
                            <span>600.000 Kzs</span>
                        </li>
                        <li>100.000 SMS</li>
                        <li>6kzs por SMS</li>
                        <li>Interface de Envio</li>
                        <li>24/7 Suporte Tecnico</li>
                        <li>Sem Acesso a Base De Dados</li>
                        <li class="plan-action">
                            <a href="#" data-toggle="modal" data-target="#construct-modal" class="btn btn-primary">Pagar</a>
                        </li>
                    </ul>
                </div>

                <div class="col-sm-5 plan price-six wow fadeInDown">
                    <img src="images/ribon_one.png">
                    <ul>
                        <li class="heading-six">
                            <h1>Gold+</h1>
                            <span>900.000 Kzs</span>
                        </li>
                        <li>100.000 SMS</li>
                        <li>9kzs por SMS</li>
                        <li>Interface de Envio</li>
                        <li>24/7 Suporte Tecnico</li>
                        <li>Acesso a Base De Dados</li>
                        <li><select class="form-control" name="form_tipo_bd">
                                <option value=""> Selecionar tipo base de dados</option>
                                <option value="base_dados_standard"> base de dados Standard</option>
                                <option value="base_dados_provincias"> base de dados por Provincias</option>
                                <option value="base_dados_universitarias"> base de dados Universitarias</option>
                            </select></li>
                        <li class="plan-action">
                                <a href="#" data-toggle="modal" data-target="#construct-modal" class="btn btn-primary">Pagar</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div><!--/pricing-area-->
    </div><!--/container-->
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
                    <li><a href="index_logged.php">TelcoSMS</a></li>
                    <li><a href="help-support_logged.php">Ajuda e Suporte</a></li>
                    <li><a href="contact-us_logged.php">Contactos</a></li>
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