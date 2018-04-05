<?php
ob_start();
session_start();
header('Content-type: text/html; charset=utf-8');

require_once '../app/App.php';
require_once '../app/Model.php';
require_once '../app/Logout.php';

if (!isset($_SESSION['usuario']) && (!isset($_SESSION['senha']))):
    header('Location: ' . urlBase() . 'admin/index');
    exit;
endif;
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <meta name="author" content="Jonnie Henrique | Desenvolvimento web">
        <meta name="description" content="Painel administrativo">
        <meta name="theme-color" content="#2196F3">
        <meta name="apple-mobile-web-app-status-bar-style" content="#2196F3">

        <title> Painel Administrativo | Sistema EJC </title>

        <!-- CSS Padrao -->
        <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Montserrat">
        <link rel="stylesheet" href="<?php echo urlBase(); ?>assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo urlBase(); ?>assets/css/base.css">
        <!-- CSS Painel -->
        <link rel="stylesheet" href="<?php echo urlBase(); ?>admin/assets/css/admin.css">
    </head>
    <body>

    <?php include_once 'includes/header.php'; ?>

        <main class="content">
            <div class="alert"></div>

            <?php
            if (file_exists('views/' . $_GET['view'] . '.php')):
                include_once 'views/' . $_GET['view'] . '.php';
            else:
                include_once 'views/404.php';
            endif;
            ?>
        </main>

        <script src="<?php echo urlBase(); ?>admin/assets/js/jquery.min.js"></script>
        <script src="<?php echo urlBase(); ?>admin/assets/js/modules/Menu.js"></script>
        <script src="<?php echo urlBase(); ?>admin/assets/js/modules/App.js"></script>
        <script src="<?php echo urlBase(); ?>admin/assets/js/modules/Usuario.js"></script>
        <script src="<?php echo urlBase(); ?>admin/assets/js/controllers/menu.js"></script>
        <script src="<?php echo urlBase(); ?>admin/assets/js/controllers/app.js"></script>
        <script src="<?php echo urlBase(); ?>admin/assets/js/controllers/usuario.js"></script>
    </body>
</html>

