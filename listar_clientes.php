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



function deleteCliente($id_cliente)
{
    $result = false;

    try {

        $link = mysqli_connect("localhost", "root", "", "telco_sms_db");

        if (!$link) {
            echo "Error: Unable to connect to MySQL." . PHP_EOL;
            echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
            exit;
        }

        //info sobre o admin
        $query_lista = "DELETE FROM `Cliente` 
                      WHERE `Cliente`.`id_cliente` = $id_cliente";
        if(mysqli_query($link, $query_lista)) {
            $result = true;
        }

    } catch (mysqli_sql_exception $l) {
        $l->getMessage();
    }
    mysqli_close($link);

    if ($result != false ){
        header("Location: listar_clientes.php") ;

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


function getTotalContactosCliente($id_cliente)
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
        $query_total_contactos = "select Count(*) as total_contactos from `ContactosCliente` where id_cliente='$id_cliente'";
        $result_total_contactos = mysqli_query($link, $query_total_contactos) or die(mysqli_error($link));
        $total_contactos = mysqli_fetch_array($result_total_contactos);

    } catch (mysqli_sql_exception $l) {
        $l->getMessage();
    }
    mysqli_close($link);
    return $total_contactos ['total_contactos'];
}

function getTotalPacotes($id_cliente)
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
        $query_total_pacotes = "select Count(*) as total_pacotes from `Compra` where id_cliente='$id_cliente'";
        $result_total_pacotes = mysqli_query($link, $query_total_pacotes) or die(mysqli_error($link));
        $total_pacotes = mysqli_fetch_array($result_total_pacotes);

    } catch (mysqli_sql_exception $l) {
        $l->getMessage();
    }
    mysqli_close($link);
    return $total_pacotes ['total_pacotes'];
}


function checkReferenceCliente($reference)
{

    return $reference != "NULL" ? $reference : "No Reference";
}

function buildTableClientes()
{

    $table_str = '<form  action= "eliminar_clientes.php" method="post">';
    $table_str .= '<table id="clientes_table">';

    $clientes = getClientesInfo();
    $i = 1;
    $table_str .= '<tr class="head_table">';
    $table_str .= '<th></th>
                   <th>id</th> 
                   <th>Nome Completo</th>
                   <th>Username</th>
                   <th>Email</th>
                   <th>Telefone</th>
                   <th>Tipo Cliente</th> 
                   <th>Referencia</th>
                   <th>Sms Enviadas</th>
                   <th>Sms Disponiveis</th>
                   <th>Total Contactos</th>
                   <th>Pacotes Comprados</th>';
    $table_str .= '</tr>';


    foreach ($clientes as $cliente) {


        if ($i % 2 == 0) {
            $stylex = 'row_even';
        } else {
            $stylex = 'row_odd';
        }
        $table_str .= '<tr class="' . $stylex . '" >';
        $table_str .=

            '<td><input type="checkbox" name = "delete_cliente[]" value= "' . $cliente->id_cliente . '"> </td>
              <td class="table_text_center">' . $cliente->id_cliente . '</td>
              <td class="table_text_center">' . $cliente->nome_cliente . '</td>
              <td class="table_text_center">' . $cliente->username . '</td>
              <td class="table_text_center">' . $cliente->email . '</td>
              <td class="table_text_center">' . $cliente->telemovel . '</td>
              <td class="table_text_center">' . $cliente->cliente_type . '</td>
              <td class="table_text_center">' . checkReferenceCliente($cliente->cliente_referencia) . '</td>
              <td class="table_text_center">' . $cliente->n_sms_disponiveis . '</td>
              <td class="table_text_center">' . $cliente->n_sms_enviadas . '</td>
              <td class="table_text_center"> <a href =listar_contactos.php?id=' . $cliente->id_cliente . '> ' . getTotalContactosCliente($cliente->id_cliente) . '</a></td>
             <td class="table_text_center"> <a href =listar_pacotes_comprados.php?id=' . $cliente->id_cliente . '> ' . getTotalPacotes($cliente->id_cliente) . '</a></td>';

        $table_str .= ' </tr > ';
        $i++;

    }


    $table_str .= '</table > ';
    $table_str .= '<button style="float: right" class="btn btn-primary" 
                  name="eliminar_btn" type="submit"> Eliminar cliente
                selecionado </button> </form>';
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

    </div>


    <style type="text/css">
        #clientes_table {
            margin: 0 auto;
            border: 1px solid lightgray;
            border-collapse: collapse;
        }

        #clientes_table td, th {

            border: 1px solid lightgray;

        }

        .head_table {
            background-color: #b3d9ff;

        }

        .row_odd {
            background-color: #e6fff2;

        }

        .row_even {
            background-color: #ffe6ff;

        }

        .table_text_center {
            text-align: center;
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
    <div class="center wow fadeInDown">
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