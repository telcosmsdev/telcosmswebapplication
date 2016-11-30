<?php
session_start();

if (isset($_SESSION['user_session'])!="") {
    header("Location: tableprices_logged.php");
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






<html><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Pacotes | TelcoSms</title>

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
</head>
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
                    <li><a href="about-us.html">Quem Somos</a></li>
                    <li><a href="contact-us.html">Contactos</a></li>
                    <li><a href="help-support.html">Ajuda e Suporte</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#login-modal">Log In</a></li>
                </ul>
            </div>
        </div><!--/.container-->
    </nav><!--/nav-->

</header><!--/header-->

<!-- BEGIN # MODAL LOGIN -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
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
                <form id="login-form" action ="login.php" method="post">
                    <div class="modal-body">
                        <div id="div-login-msg">
                            <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                            <span id="text-login-msg">Type your username and password.</span>
                        </div>
                        <input name="login_username" class="form-control" type="text" placeholder="Username" required>
                        <input name="login_password" class="form-control" type="password" placeholder="Password" required>
                        <!--<div class="checkbox">
                            <label>
                                <input type="checkbox"> Remember me
                            </label>
                        </div>-->
                    </div>
                    <div class="modal-footer">
                        <div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
                        </div>
                        <div>
                            <button id="login_lost_btn" type="button" class="btn btn-link">Lost Password?</button>
                            <button id="login_register_btn" type="button" class="btn btn-link">Register</button>
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
                        <input id="lost_email" class="form-control" type="text" placeholder="E-Mail (type ERROR for error effect)" required>
                    </div>
                    <div class="modal-footer">
                        <div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Send</button>
                        </div>
                        <div>
                            <button id="lost_login_btn" type="button" class="btn btn-link">Log In</button>
                            <button id="lost_register_btn" type="button" class="btn btn-link">Register</button>
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
                    <input name="register_name"     class="form-control" type="text" placeholder="Nome" required>
                    <input name="register_apelido"  class="form-control" type="text" placeholder="Apelido" required>
                    <input name="register_username" class="form-control" type="text" placeholder="username" required>
                    <input name="register_password" class="form-control" type="password" placeholder="password" required>
                    <input name="register_telefone" class="form-control" type="number" placeholder="telefone" required>
                    <input name="register_email"    class="form-control"    type="email" placeholder="E-Mail" required>


                    <div class="modal-footer">
                        <div>
                            <button type="submit" name="register_btn" class="btn btn-primary btn-lg btn-block">Criar
                            </button>

                            <button id="register_login_btn" type="button" class="btn btn-link">Log In</button>
                            <button id="register_lost_btn" type="button" class="btn btn-link">Lost Password?</button>
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
            <a href="packetbasic.php" class="btn btn-primary">pague ja</a>
        </td>


    </tr>
    <tr>
        <td>15.000 à 80.000</td>
        <td>1,33 UTT</td>
        <td>13,25 AOA</td>
        <td>15,75 AOA</td>
        <td>
            <a href="packetstandard.html" class="btn btn-primary">pague ja</a>
        </td>
    </tr>
    <tr>
        <td>80.000 à 250.000</td>
        <td>1,03 UTT</td>
        <td>10,25 AOA</td>
        <td>12,75 AOA</td>
        <td>
            <a href="packetpremium.html" class="btn btn-primary">pague ja</a>
        </td>
    </tr>
    <tr>
        <td>250.000 à 500.000</td>
        <td>0,88 UTT</td>
        <td>8,75 AOA</td>
        <td>11,25 AOA</td>
        <td>
            <a href="packetgold.html" class="btn btn-primary">pague ja</a>
        </td>

    </tr>

    <tr>
        <td> > 500.000</td>
        <td> a negociar</td>
        <td> a negociar</td>
        <td>45% do preço por SMS</td>
        <td>
            <a href="packetsupergold.html" class="btn btn-primary">encomende</a>
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
                © 2016 <a target="_blank" href="http://kawakuticode.com/" >kawakuticode</a>. All Rights Reserved.
            </div>
            <div class="col-sm-6">
                <ul class="pull-right">
                    <li><a href="#">TelcoSms</a></li>
                    <li><a href="help-support.html">Ajuda e Suporte</a></li>
                    <li><a href="contact-us.html">Contactos</a></li>
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