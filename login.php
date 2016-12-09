<?php //Start the Session

session_start();
require_once('/Applications/XAMPP/htdocs/telcosmswp/connect_db.php');


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
        $query = "SELECT id_cliente,nome_cliente, username ,password, email, telemovel, cliente_referencia  FROM `Cliente` WHERE username='$username' AND  password = '$password_in'";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        $row = mysqli_fetch_array($result);
        $count = mysqli_num_rows($result);


        if ($count == 1 && $row['password'] == $password_in) {

            $return_arr["status"] = '1';
            $return_arr["message"] = 'logged';
            $json = json_encode($return_arr);
            if ($json === false) {
                // Avoid echo of empty string (which is invalid JSON), and
                // JSONify the error message instead:
                $json = json_encode(array("jsonError", json_last_error_msg()));
                if ($json === false) {
                    // This should not happen, but we go all the way now:
                    $json = '{"jsonError": "unknown"}';
                }
                // Set HTTP response status code to: 500 - Internal Server Error
                http_response_code(500);
            }
            else  echo $json;
           // exit();

            //echo "1"; // log in
            // $_SESSION['user_session'] = $row['id_cliente'];

            //unset($password_in);

        } else {

            $return_arr["status"] = '2';
            $return_arr["message"] = 'nologged';
            echo json_encode($return_arr);
            //exit();

        }
    } catch (mysqli_sql_exception $e) {

        echo $e->getMessage();
    }
} ?>

