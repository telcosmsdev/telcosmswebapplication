<?php
session_start();
include_once('/Applications/XAMPP/htdocs/telcosmswp/connect_db.php');

if ($_SESSION['user_session'] != "") {

    try {


        $id_in = $_SESSION['user_session'];

        //query sms total disponiveis e enviadas  .... para cada cliente
        $query = "SELECT *  FROM `Cliente` 
                      INNER JOIN SmsEnviadas 
                      ON `Cliente`.`id_cliente` = `SmsEnviadas`.`id_cliente`
                      INNER JOIN `SmsDisponiveis` 
                      ON `Cliente`.`id_cliente` = `SmsDisponiveis`. `id_cliente` 
                      WHERE `Cliente`.`id_cliente` = '$id_in'";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        $useRow = mysqli_fetch_array($result);

        //total de contactos por clientes
        $query_total_contactos = "SELECT COUNT(*) as total_contactos  FROM `ContactosCliente` 
                      WHERE `ContactosCliente`.`id_cliente` = '$id_in'";
        $result_total_contactos = mysqli_query($link, $query_total_contactos) or die(mysqli_error($link));
        $user_total_contactos = mysqli_fetch_array($result_total_contactos);


        $query_lista_contactos = "SELECT n_telemovel FROM `ContactosCliente` 
                      WHERE `ContactosCliente`.`id_cliente` = '$id_in'";
        $result_lista_contactos = mysqli_query($link, $query_lista_contactos) or die(mysqli_error($link));
        $user_lista_contactos = mysqli_fetch_array($result_lista_contactos);

        // echo var_dump( $user_lista_contactos );
    } catch (mysqli_sql_exception $e) {
        $e->getMessage();
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
    <title>Bem-vindo | TelcoSms</title>
    <link href="css/login_css.css" rel="stylesheet">
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
                    <li><a href="index_logged.php">TelcoSMS</a></li>
                    <li><a href="services_logged.php">Serviços</a></li>
                    <li><a href="tableprices_logged.php">Pacotes</a></li>
                    <li><a href="about-us_logged.php">Quem Somos</a></li>
                    <li><a href="contact-us_logged.php">Contactos</a></li>
                    <li><a href="help-support_logged.php">Ajuda e Suporte</a></li>
                    <li class="active"><a href="profile.php">Perfil</a></li>
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
                    <div class="span2">
                        <img src="http://www.gravatar.com/avatar/f6112e781842d6a2b4636b35451401ff?s=125"
                             class="img-polaroid"/>
                    </div>
                    <div class="span4">
                        <h2><?php echo $useRow['nome_cliente'] ?></h2>
                        <ul class="unstyled">
                            <li><i class="fa fa-phone"></i> <?php echo $useRow['telemovel'] ?></li>
                            <li><i class="fa fa-inbox"></i> <?php echo $useRow['email'] ?></li>
                            <li><i class="fa fa-magic"></i> referencia : <?php echo $useRow['cliente_referencia'] ?>
                            </li>
                            <li><i class="fa fa-edit"></i><a href="edit.php"> edit profile</a></li>
                        </ul>
                    </div>
                    <div class="span6">
                        <ul class="inline stats">
                            <li>
                                <span><?php echo $useRow['n_sms_enviadas'] ?></span>
                                sms enviadas
                            </li>
                            <li>
                                <span><?php echo $useRow['n_sms_disponiveis'] ?></span>
                                sms disponiveis
                            </li>
                            <li>
                                <span><?php echo $user_total_contactos['total_contactos'] ?></span>
                                contactos
                            </li>
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


<section id="contact-page">
    <div class="container">
        <div class="center">
            <h2>Envie Mensagem</h2>
            <p-new class="lead-new">Entre em contacto com os seus clientes</p-new>
        </div>
        <div class="row contact-wrap">
            <div class="status alert alert-success" style="display: none"></div>

            <!--<form id="import-contacts" class="contact-form" name="import-contect" method="post"
                  action="importfile.php" enctype="multipart/form-data">-->
            <div class="col-sm-4 col-sm-offset-4">
                <div class="form-group">
                    <label>Origem *</label>
                    <input style="height: 40px" type="text"
                           value=" <?php echo $useRow['cliente_referencia']!= "Standard" ? "Corporate" : "TelcoSMS" ?>"
                           class="form-control" required="required" readonly/>
                </div>

                <div class="form-group">
                    <label>Contactos *</label>
                    <input style="height: 40px" type="number" class="form-control" required="required"/>
                </div>

                <div style="float:right" class="form-group dropdown">
                    <button style="float:right" class="btn btn-primary btn-lg"
                            required="required">
                        <!--<i class="fa fa-angle-down"></i>-->
                        <?php
                        if (isset($_POST['form_tipo_contactos'])) {

                             $escolha = $_POST['form_tipo_contactos'];

                            switch ($escolha) {

                                case "base_dados":
                                    echo "<script language='javascript'>\n alert(base dados');\n </script>";
                                    break;
                                case "meus_contactos":
                                    echo "<script language='javascript'>\n alert('meus contactos');\n </script>";
                                    break;
                                case "import_file":
                                    echo "<script language='javascript'>\n alert('import file');\n </script>";
                                    break;

                            }
                        }
                        ?>
                        <select name="form_tipo_contactos">
                            <option value=""> Selecionar contactos</option>
                            <option value="base_dados"> base de dados</option>
                            <option value="meus_contactos"> meus contactos</option>
                            <option value="import_file"> importar .xls .csv .txt</option>
                        </select>

                        <!--<ul style="float:right" class="dropdown-menu">
                            <selec>
                            <li><a href="#" id="base_dados_select" type="submit">base de dados</a></li>
                            <li><a id="meus_contactos_select" type="submit">meus contactos</a></li>
                            <li><a href="#" id="import_file" type="submit">importar ficheiro .xls .txt</a>
                            </li>
                        </ul>-->
                    </button>
                </div>
            </div>
            </form>
        </div>
        <!-- /form sms -->
        <div class="form-group">
            <form id="sms-content" name="sendsms" name="contact-form" method="post"
                  action="sendtelcosms.php">
                <div class="col-sm-4 col-sm-offset-4">
                    <div class="form-group">
                        <div class="form-group">
                            <label>Messagem *</label>
                            <textarea name="message" id="message" required="required" class="form-control"
                                      rows="8"></textarea>
                        </div>
                        <div class="form-group">
                            <button style="float: right" type="submit" name="submit" class="btn btn-primary btn-lg"
                                    required="required">Enviar
                            </button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>


    </div><!-- /.col-lg-4 -->

    </div><!-- /.row -->

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