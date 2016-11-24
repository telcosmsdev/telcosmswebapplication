<?php
session_start();
if (isset($_SESSION['user_session']) != "") {
    session_destroy();
    mysqli_close($link);
    unset($_SESSION['user_session']);
    header("Location: index.php");
}

?>