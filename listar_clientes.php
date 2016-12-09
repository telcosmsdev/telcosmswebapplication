<?php
session_start();
include_once('/Applications/XAMPP/htdocs/telcosmswp/connect_db.php');

if ($_SESSION['admin_session'] != "") {

    try {


        $id_in = $_SESSION['admin_session'];

        //info sobre o admin
        $query = "SELECT *  FROM `Admin`  WHERE `id_admin` = '$id_in'";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        $useRow = mysqli_fetch_array($result);

        //echo print_r($useRow);

    } catch (mysqli_sql_exception $e) {
        $e->getMessage();
    }


    if (isset($_POST['listar_btn'])) {


    }


}


function getClientesInfo()
{


    try {

        $link = mysqli_connect("localhost", "root", "", "telco_sms_db");

        if (!$link) {
            echo "Error: Unable to connect to MySQL." . PHP_EOL;
            echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
            exit;
        }

        //info sobre o admin
        $query_lista = "SELECT *  FROM `Cliente` 
                      INNER JOIN SmsEnviadas 
                      ON `Cliente`.`id_cliente` = `SmsEnviadas`.`id_cliente`
                      INNER JOIN `SmsDisponiveis` 
                      ON `Cliente`.`id_cliente` = `SmsDisponiveis`. `id_cliente`";
        $result_lista = mysqli_query($link, $query_lista) or die(mysqli_error($link));


        $lista = array();
        while ($object = mysqli_fetch_object($result_lista)) {

            $lista[] = $object;
        }


    } catch (mysqli_sql_exception $l) {
        $l->getMessage();
    }
    mysqli_close($link);
    return $lista;


}

function buildTableClientes()
{

    $table_str = '<table id="clientes_table">';
    $clientes = getClientesInfo();

    $table_str .= '<tr>';
    $table_str .= '<th>id</th> 
                    <th>Nome Completo</th>
                   <th>Username</th>
                    <th>Email</th>
                   <th>Telefone</th>
                   <th>Tipo Cliente</th> 
                   <th>Referencia</th>';
    $table_str .= '</tr>';
    foreach ($clientes as $cliente) {


        $table_str .= '<tr>';
        $table_str .=
            '<td>' . $cliente->id_cliente . '</td>
             <td>' . $cliente->nome_cliente . '</td>
             <td>' . $cliente->username . '</td>
             <td>' . $cliente->email . '</td>
             <td>' . $cliente->telemovel . '</td>
             <td>' . $cliente->cliente_type . '</td>
             <td>' . $cliente->cliente_referencia . '</td>';
        $table_str .= '</tr>';

    }
    $table_str .= '</table>';
    return $table_str;

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Bem-vindo | TelcoSms</title>
    <link href="css/login_css.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <style type="text/css">
        #clientes_table {
            margin: 0 auto;
            border: 1px solid lightgray;
            border-collapse: collapse;
        }

        #clientes_table td, th {

            border: 1px solid lightgray;

        }
    </style>


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
                <a class="navbar-brand" href="admin_profile.php">
                    <img src="../telcosmswp/images/telcopagelogo.png" alt="logo"></a>
            </div>

            <div class="collapse navbar-collapse navbar-right">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="admin_profile.php">Perfil</a></li>
                    <li><a href="logout.php">logout</a></li>
                </ul>
            </div>
        </div><!--/.container-->
    </nav><!--/nav-->
</header><!--/header-->


<div class="container profile">
    <div class="row">
        <div class="span12">
            <div class="well well-small clearfix">
                <div class="row-fluid">
                    <div class="span4" align="center">
                        <h3> Bem.vindo Admnistrador</h3>
                        <h2><?php echo $useRow['nome_completo'] ?></h2>
                        </ul>
                        <div><!--/span6-->
                        </div><!--/row-->
                    </div>
                    <!--Body content-->
                </div>
            </div>
        </div>
    </div>
</div>


<section class="pricing-page">
    <div class="container">
        <div class="center wow fadeInDown">
            <h2>Bem-vindo ao Painel do Admnistrador</h2>
            <p class="lead">Selecione as seguintes operaçoes</p>
        </div>
        <div class="pricing-area text-center">
            <div class="row">
                <div class="col-sm-5 col-sm-offset-1 plan price-one wow fadeInDown">
                    <ul>
                        <li class="heading-four">
                            <form action="criar_cliente.php">
                                <h1>
                                    <button class="btn btn-primary" type="submit"> Criar Cliente
                                </h1>
                            </form>
                    </ul>
                </div>

                <div class="col-sm-5 plan price-six wow fadeInDown">
                    <ul>
                        <li class="heading-four">
                            <form action="listar_clientes.php" method="post">
                                <h1>
                                    <button class="btn btn-primary" name="listar_btn" type="submit"> Listar Clientes
                                </h1>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div><!--/pricing-area-->
    </div><!--/container-->
</section><!--/pricing-page-->

<section class="panel-body">
    <?php

    echo buildTableClientes();

    ?>
</section>

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