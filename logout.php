<?php
session_start();
if (isset($_SESSION['user_session']) != "") {
    session_destroy();
    mysqli_close($link);

    unset($_SESSION['user_session']);
    header("Location: index.php");
}
if (isset($_SESSION['admin_session']) != "") {
    session_destroy();
    mysqli_close($link);

    unset($_SESSION['admin_session']);
    header("Location: index.php");
}
?>