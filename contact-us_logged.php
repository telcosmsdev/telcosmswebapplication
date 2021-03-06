<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Contactos | TelcoSms</title>
    
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
                    <a class="navbar-brand" href="index_logged.php">
                        <img src="../telcosmswp/images/telcopagelogo.png" alt="logo"></a>
                </div>

                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li><a href="index_logged.php">TelcoSMS</a></li>
                        <li ><a href="services_logged.php">Serviços</a></li>
                        <li><a href="tableprices_logged.php">Pacotes</a></li>
                        <li><a href="about-us_logged.php">Quem Somos</a></li>
                        <li class="active"><a href="contact-us_logged.php">Contactos</a></li>
                        <li><a href="help-support_logged.php">Ajuda e Suporte</a></li>
                        <li><a href="profile.php">Perfil</a></li>
                        <li><a href="logout.php">logout</a></li>
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->





    <section id="contact-info">
        <div class="center">  
            <div class="center wow fadeInDown"> 
<p></p>      
<p></p> 
<p></p> 
<p></p> 
            <h2>Como chegar até nós?</h2>
            <p class="lead">Estamos no São Paulo Luanda.Consulte o  mapa</p>
        </div>
        <div class="gmap-area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5 text-center">
                        <div class="gmap">
                            <iframe frameborder="0" scrol ling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1971.329236102273!2d13.249950248634885!3d-8.818119521575108!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1a51f2330423b025%3A0xc7ba46c9d54c6c68!2sR.+Gil+Liberdade%2C+Luanda%2C+Angola!5e0!3m2!1spt-PT!2spt!4v1474740897375" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>                        </div>
                    </div>

                    <div class="col-sm-7 map-content">
                        <ul class="row">
                            <li class="col-sm-6">
                                <address>
                                    <h5>ESCRITORIO</h5>
                                    <p>Rua Gil Liberdade, Casa nº 41/43<br>
                                    São Paulo - Luanda, Angola </p>
                                    <p>Telefone : +244 918 000 000 <br>
                                    Email : geral@telcoSMS.co.ao</p>
                                </address>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
            </div>
    </section>  <!--/gmap_area -->

    <section id="contact-page">
        <div class="container">
            <div class="center">        
                <h2>Deixe a sua messagem</h2>
                <p class="lead">Deixe a sua mensagem e entraremos em contacto</p>
            </div> 
            <div class="row contact-wrap"> 
                <div class="status alert alert-success" style="display: none"></div>
                <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="sendemail.php">
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="form-group">
                            <label>Nome *</label>
                            <input type="text" name="name" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>Email *</label>
                            <input type="email" name="email" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>Telefone</label>
                            <input type="number" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Empresa</label>
                            <input type="text" class="form-control">
                        </div>                        
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label>Assunto *</label>
                            <input type="text" name="subject" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>Messagem *</label>
                            <textarea name="message" id="message" required="required" class="form-control" rows="8"></textarea>
                        </div>                        
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Enviar</button>
                        </div>
                    </div>
                </form> 
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#contact-page-->


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