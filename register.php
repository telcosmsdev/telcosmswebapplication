<?php
ob_start();
session_start();
/*if( isset($_SESSION['user'])!="" ){
    header("Location: home.php");
}*/
require_once('/Applications/XAMPP/htdocs/telcosmswp/connect_db.php');


if (isset($_POST['register_btn']) ) {

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


    $pass = trim($_POST['register_password']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);

    $telefone = trim($_POST['register_telefone']);
    $telefone = strip_tags($telefone);
    $telefone  = htmlspecialchars($telefone);


    $email = trim($_POST['register_email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);



    // password encrypt using SHA256();
   $password = hash('sha256', $pass);

    // if there's no error, continue to signup
/*    if( !$error ) {*/
        //$fullname = $name."  ".$apelido;
        $query = "INSERT INTO cliente (nomeCompleto, username, password, email, telefone, clienteType) 
                           VALUES('$name', '$username_','$password','$email','$telefone', 0);";

    $res = mysqli_query($link, $query);

        if ($res) {
            $errTyp = "success";
            $errMSG = "Successfully registered, you may login now";
            header('Location: http://localhost/telcosmswp/sucessfull.html');

        /*    unset($name);
            unset($email);
            unset($pass);*/
        } else {

            echo "danger".$res;
            $errTyp = "danger";
            $errMSG = "Something went wrong, try again later...";

            echo "Debugging errno: " . mysqli_error($link) . PHP_EOL;
            //header('Location: http://localhost/telcosmswp/404.html');

        }

}
?>