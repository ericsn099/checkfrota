<?php
session_start() or die;
if ((!isset($_SESSION['login'])) || $_SESSION['tipousuario'] == 1) {
    header('location: /');
    session_destroy();
    exit;
}
?>