<?php

ob_start();
session_start();

require_once '../../app/App.php';

if (isset($_SESSION['login'])):
    session_destroy();

    session_unset($_SESSION['login']);
    session_unset($_SESSION['senha']);

    header('Location: ' . urlBase() . 'admin/');
endif;