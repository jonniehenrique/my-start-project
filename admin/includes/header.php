
<input type="hidden" id="app-url" value="<?php echo APP_URL; ?>">

<aside class="sidebar">
    <?php include_once 'menu.php'; ?>
</aside>

<header class="header">
    <div class="header-left">
        <button type="button" class="btn-menu">
            <i class="fa fa-bars"></i>
        </button>
        <a href="<?php echo urlPage('inicio') ?> " class="logo">
            <span> Sys</span>Admin
        </a>
    </div>
    <div class="header-right">
        <a href="#" class="perfil js-dropdown" data-dropdown="perfil">
            <?php echo getUserByLogin($_SESSION['login']); ?>
            <i class="fa fa-angle-down"></i>
        </a>
        <div class="dropdown dropdown-perfil">
            <a href="<?php echo urlBase(); ?>admin/api/Logout.php" class="dropdown-link">
                <i class="fa fa-signout"></i> Sair
            </a>
        </div>
    </div>
</header>