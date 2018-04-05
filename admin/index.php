<?php
ob_start();
session_start();

require_once '../app/App.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">

        <title> Login | Sistema EJC </title>

        <!-- CSS Padrao -->
        <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Montserrat">
        <link rel="stylesheet" href="<?php echo urlBase(); ?>assets/css/base.css">
        <link rel="stylesheet" href="<?php echo urlBase(); ?>assets/css/font-awesome.min.css">
        <!-- CSS Login -->
        <link rel="stylesheet" href="<?php echo urlBase(); ?>admin/assets/css/login.css">
    </head>
    <body>
        <input type="hidden" id="app-url" value="<?php echo APP_URL; ?>">
        
        <div class="alert"></div>

        <div class="login flex-center">
            <section class="login-form flex-center flex-column">
                <h2 class="login-title"> <i class="fa fa-user"></i> Faça seu login </h2>
                <form id="login-form" enctype="multipart/form-data" class="flex-center flex-column">
                    <input type="text" placeholder="Seu login" name="login" autocomplete="off">
                    <input type="password" placeholder="Sua senha" name="senha" autocomplete="off">

                    <button class="btn btn-primary btn-login"> LOGIN</button>
                </form>
            </section>
        </div>

        <script src="<?php echo urlBase(); ?>assets/js/libs/jquery.min.js"></script>
        <script src="assets/js/modules/Login.js"></script>
        <script src="assets/js/controllers/login.js"></script>
    </body>
</html>