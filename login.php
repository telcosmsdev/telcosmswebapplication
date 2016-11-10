<?php //Start the Session
session_start();
require_once('/Applications/XAMPP/htdocs/telcosmswp/connect_db.php');
//3. If the form is submitted or not.
//3.1 If the form is submitted
if (isset($_POST['login_username']) and isset($_POST['login_password'])) {
//3.1.1 Assigning posted values to variables.

    $username = $_POST['login_username'];
    $pass = $_POST['login_password'];


//3.1.2 Checking the values are existing in the database or not
    $password = hash('sha256', $pass);
    $query = "SELECT nomeCompleto,username, password, email, telefone, clienteType  FROM `cliente` WHERE username='$username'";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    $row=mysqli_fetch_array($result);
    $count = mysqli_num_rows($result);
//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
    if ($count == 1 && $row['password'] == $password) {

        $_SESSION['login_username'] = $username;
        $_SESSION['email'] = $row['email'];
        $_SESSION['telefone'] = $row['telefone'];
        $_SESSION['clienteType'] = $row['clienteType'];

        header('Location: http://localhost/telcosmswp/userlogged.html');

    } else {
//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
        $fmsg = "Invalid Login Credentials.";
        header('Location: http://localhost/telcosmswp/index.html');
        echo $fmsg;
    }
}
//3.1.4 if the user is logged in Greets the user with message
if (isset($_SESSION['login_username'])) {

    $username = $_SESSION['login_username'];
    echo "Hai " . $username . "";
   // header('Location: http://localhost/telcosmswp/userlogged.html');

//    echo "<a href='logout.php'>Logout</a>";

} else {
//3.2 When the user visits the page first time, simple login form will be displayed.
} ?>