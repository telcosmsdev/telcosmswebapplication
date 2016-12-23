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


    } catch (mysqli_sql_exception $e) {
        $e->getMessage();
    }


}


function getTipoCliente($type)
{

    if ($type != "") {

        $escolha = $type != "Standard" ? "Corporate" : "Standard";

    } else {

        $escolha = "Standard";
    }
    return $escolha;
}

function getReferenciaCliente($input, $cliente_type)
{

    if ($cliente_type != "Standard") {

        $referencia = $input != "" ? $input : "NULL";

    } else {

        $referencia = "NULL";

    }
    return $referencia;


}

if (isset($_POST['criar_admin_btn'])) {

    // clean user inputs to prevent sql injections
    $name = trim($_POST['register_name']);
    $name = strip_tags($name);
    $name = htmlspecialchars($name);


    $apelido = trim($_POST['register_apelido']);
    $apelido = strip_tags($apelido);
    $apelido = htmlspecialchars($apelido);


    $username_ = trim($_POST['register_username']);
    $username_ = strip_tags($username_);
    $username_ = htmlspecialchars($username_);


    $password_ = trim($_POST['register_password']);
    $password_ = strip_tags($password_);
    $password_ = htmlspecialchars($password_);

    $telemovel = trim($_POST['register_telefone']);
    $telemovel = strip_tags($telemovel);
    $telemovel = htmlspecialchars($telemovel);


    $email = trim($_POST['register_email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);


    $cliente_type = trim(getTipoCliente($_POST['tipo_cliente']));
    $cliente_type = strip_tags($cliente_type);
    $cliente_type = htmlspecialchars($cliente_type);


    $cliente_referencia = trim(getReferenciaCliente($_POST['register_referencia'] , $_POST['tipo_cliente']));
    $cliente_referencia = strip_tags($cliente_referencia);
    $cliente_referencia = htmlspecialchars($cliente_referencia);


    // password encrypt using SHA256();
    $password_encripted = hash('sha256', $password_);

    $name = $name . "  " . $apelido;

    try {
        $query = "INSERT INTO cliente (nome_cliente, username, password, email, telemovel, cliente_type, cliente_referencia) 
                           VALUES('$name', '$username_','$password_encripted','$email','$telemovel', '$cliente_type', '$cliente_referencia');";
        $res = mysqli_query($link, $query);

        if ($res) {

            header('Location: http://localhost/telcosmswp/sucessfull_admin.php');

            unset($name);
            unset($email);
            unset($password_encripted);
            unset($username_);
            unset($telemovel);

        } else {

            echo "danger " . $res;
            $errTyp = "danger";
            $errMSG = "Something went wrong, try again later...";

            echo "Debugging errno: " . mysqli_error($link) . PHP_EOL;
            //header('Location: http://localhost/telcosmswp/404.html');

        }

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

        <div class="center">
            <h2>Criar Cliente</h2>
        </div>


        <form
        ="criar_cliente_admin"  method="post">

        <div class="row contact-wrap">

            <div class="col-sm-4 col-sm-offset-4">
                <div class="form-group">
                    <label>Nome *</label>
                    <input style="height: 40px" type="text"
                           placeholder="Nome"
                           class="form-control" name="register_name" required="required"/>
                </div>

                <div class="form-group">
                    <label>Apelido *</label>
                    <input style="height: 40px" type="text" placeholder="Apelido" class="form-control"
                           name="register_apelido" required="required"/>
                </div>
                <div class="form-group">
                    <label>Username *</label>
                    <input style="height: 40px" type="text"
                           placeholder="Username"
                           class="form-control" name="register_username" required="required"/>
                </div>

                <div class="form-group">
                    <label>Password *</label>
                    <input style="height: 40px" type="password" placeholder="password" name="register_password"
                           class="form-control" required="required"/>
                </div>

                <div class="form-group">
                    <label>Telefone *</label>
                    <input style="height: 40px" type="number"
                           placeholder="Telefone"
                           class="form-control" name="register_telefone" required="required"/>
                </div>

                <div class="form-group">
                    <label>Email *</label>
                    <input style="height: 40px" type="email" placeholder="Email" class="form-control"
                           name="register_email" required="required"/>
                </div>

                <div class="form-group">
                    <label>Cliente Type *</label>
                    <select name="tipo_cliente">
                        <option value=""> Selecionar tipo de cliente</option>
                        <option value="Standard"> Standard</option>
                        <option value="Corporate"> Corporate</option>
                    </select>

                </div>

                <div class="form-group">
                    <label>Reference *</label>
                    <input style="height: 40px" type="text"
                           placeholder="optional - referencia somente para clientes Corporate" name="register_referencia"
                           class="form-control" />
                </div>
                <div class="form-group">
                    <button style="float: left" name="cancel_admin_btn" id="cancel_admin_btn"
                            class="btn btn-primary btn-lg"
                            onclick="window.location='http://localhost/telcosmswp/admin_profile.php';">Cancelar
                    </button>

                    <div class="form-group">
                        <button style="float: right" type="submit" name="criar_admin_btn" id="criar_admin_btn"
                                class="btn btn-primary btn-lg"
                                required="required">Enviar
                        </button>
                    </div>
                    </form>
                </div>

            </div>
        </div>

    </div><!--/container-->

</section><!--/pricing-page-->


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