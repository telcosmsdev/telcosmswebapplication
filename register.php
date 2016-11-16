<?php
ob_start();
session_start();
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


    $password_ = trim($_POST['register_password']);
    $password_ = strip_tags($password_);
    $password_ = htmlspecialchars($password_);

    $telemovel = trim($_POST['register_telefone']);
    $telemovel = strip_tags($telemovel);
    $telemovel  = htmlspecialchars($telemovel);


    $email = trim($_POST['register_email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);



    // password encrypt using SHA256();
   $password_encripted = hash('sha256', $password_);

    $name = $name."  ".$apelido;

        $query = "INSERT INTO cliente (nome_cliente, username, password, email, telemovel, cliente_referencia) 
                           VALUES('$name', '$username_','$password_encripted','$email','$telemovel', NULL);";
         $res = mysqli_query($link, $query);

        if ($res) {
            $errTyp = "success";
            $errMSG = "Successfully registered, you may login now";

            header('Location: http://localhost/telcosmswp/sucessfull.html');

            unset($name);
            unset($email);
            unset($password_encripted);
            unset($username_);
            unset($telemovel);

        } else {

            echo "danger ".$res;
            $errTyp = "danger";
            $errMSG = "Something went wrong, try again later...";

            echo "Debugging errno: " . mysqli_error($link) . PHP_EOL;
            //header('Location: http://localhost/telcosmswp/404.html');

        }

}
?>