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
}


if (isset($_POST['delete_cliente'])) {

    $clientes_a_eliminar = $_POST['delete_cliente'];

    if (!empty($clientes_a_eliminar)) {

        deleteClientes($clientes_a_eliminar);
    }

} else {

    echo "<script>";
    echo " var confirm_input  =  confirm('Nenhum Cliente Selecionado');";
    echo " confirm_input;";
    echo "if (confirm_input  == true ){";
    echo "document.location='http://localhost/telcosmswp/listar_clientes.php';";
    echo "}  else  { ";
    echo "document.location='http://localhost/telcosmswp/listar_clientes.php';";
    echo "}";
    echo "</script >";
}

function connection()
{

    $link = mysqli_connect("localhost", "root", "", "telco_sms_db");

    if (!$link) {
        echo "Error: Unable to connect to MySQL . " . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
    return $link;
}

function deleteClientes($array_clientes_a_eliminar)
{

    try {

        $my_connection = connection();

        $i = 0;

        while ( $i < count($array_clientes_a_eliminar) ){
            $query_lista = "DELETE FROM `Cliente`
                 WHERE `Cliente`.`id_cliente`= $array_clientes_a_eliminar[$i]";
            mysqli_query($my_connection, $query_lista);
            $i++;
        }
    } catch (mysqli_sql_exception $l) {
        $l->getMessage();
    }

    mysqli_close($my_connection);
    header("Location: listar_clientes.php");


}

?>
