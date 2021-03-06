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
                                <input type="text" class="search-form" autocomplete="off" placeholder="Pesquise">
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
                    <li><a href="profile.php">Perfil</a></li>
                    <li><a href="logout.php">logout</a></li>
                </ul>
            </div>
        </div><!--/.container-->
    </nav><!--/nav-->

</header><!--/header-->


<style>
    table {
        width: 100%;
    }

    table, th, td {
        border: 1px solid rgb(240, 250, 255);
        border-collapse: collapse;
    }

    th, td {
        padding: 5px;
        text-align: center;
    }

    table#tpackets th {
        background-color: rgba(40, 36, 78, 0.99);
        color: white;
    }

    table#tpackets tr {
        background-color: rgba(147, 170, 255, 0.7);
    }

    table#tpackets tr:last-child {
        background-color: #6f8eff;
    }

    table#tuttconvertion tr {
        background-color: rgba(147, 170, 255, 0.7);
    }

</style>


<title>CUSTOS PACOTES</title>


<table id="tpackets">
     
    <tr>
           
        <th>Pacote SMS</th>
           
        <th>Custo por SMS (UTT)</th>
           
        <th>Custo por SMS s/ BD (AOA)</th>
        <th>Custo por SMS c/ BD (AOA)</th>
        <th>Compre</th>
         
    </tr>

    <tr>
        <td> 1 à 15.000</td>
        <td>1,50 UTT</td>
        <td>15,00 AOA</td>
        <td>17,50 AOA</td>
        <td>
            <a href="packetbasic_logged.php" class="btn btn-primary">pague ja</a>
        </td>


    </tr>
    <tr>
        <td>15.000 à 80.000</td>
        <td>1,33 UTT</td>
        <td>13,25 AOA</td>
        <td>15,75 AOA</td>
        <td>
            <a href="packetstandard_logged.php" class="btn btn-primary">pague ja</a>
        </td>
    </tr>
    <tr>
        <td>80.000 à 250.000</td>
        <td>1,03 UTT</td>
        <td>10,25 AOA</td>
        <td>12,75 AOA</td>
        <td>
            <a href="packetpremium_logged.php" class="btn btn-primary">pague ja</a>
        </td>
    </tr>
    <tr>
        <td>250.000 à 500.000</td>
        <td>0,88 UTT</td>
        <td>8,75 AOA</td>
        <td>11,25 AOA</td>
        <td>
            <a href="packetgold_logged.php" class="btn btn-primary">pague ja</a>
        </td>

    </tr>

    <tr>
        <td> > 500.000</td>
        <td> a negociar</td>
        <td> a negociar</td>
        <td>45% do preço por SMS</td>
        <td>
            <a href="packetsupergold_logged.php" class="btn btn-primary">encomende</a>
        </td>

    </tr>


</table>
<br>

<table id="tuttconvertion">
    <tr>  
        <td> 1UTT = 10,00 AOA</td>

    </tr>
</table>

</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>

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
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/jquery.isotope.min.js"></script>
<script src="js/main.js"></script>
<script src="js/wow.min.js"></script>


</body>
</html>