<?php
session_start() or die;
if ((!isset($_SESSION['login'])) || $_SESSION['tipousuario'] == 2) {
    header('location: /');
    session_destroy();
    exit;
}
?>