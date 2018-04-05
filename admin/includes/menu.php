<h1>
    <a href="<?php echo urlPage('inicio') ?> " class="logo">
        <span> Sys</span>Admin
    </a>
</h1>
<nav class="menu-nav">
    <ul class="menu-nav-list">
        <li class="menu-nav-item">
            <a href="#" class="menu-nav-link nav-submenu"> Catálogo </a>
            <ul class="submenu-nav" hidden>
                <li class="submenu-nav-item">  
                    <a href="<?php echo urlPage('listar-produtos'); ?>" class="submenu-nav-link">
                        <i class="fa fa-angle-right"></i> Listar
                    </a>
                </li>
                <li class="submenu-nav-item">  
                    <a href="<?php echo urlPage('cadastrar-produto'); ?>" class="submenu-nav-link">
                        <i class="fa fa-angle-right"></i> Cadastrar
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-nav-item">
            <a href="#" class="menu-nav-link nav-submenu"> Categorias </a>
            <ul class="submenu-nav" hidden>
                <li class="submenu-nav-item">  
                    <a href="<?php echo urlPage('listar-categorias'); ?>" class="submenu-nav-link">
                        <i class="fa fa-angle-right"></i> Listar
                    </a>
                </li>
                <li class="submenu-nav-item">  
                    <a href="<?php echo urlPage('cadastrar-categoria'); ?>" class="submenu-nav-link">
                        <i class="fa fa-angle-right"></i> Cadastrar
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-nav-item">
            <a href="#" class="menu-nav-link nav-submenu"> Usuários </a>
            <ul class="submenu-nav" hidden>
                <li class="submenu-nav-item">  
                    <a href="<?php echo urlPage('listar-usuarios'); ?>" class="submenu-nav-link">
                        <i class="fa fa-angle-right"></i> Listar
                    </a>
                </li>
                <li class="submenu-nav-item">  
                    <a href="<?php echo urlPage('cadastrar-usuario'); ?>" class="submenu-nav-link">
                        <i class="fa fa-angle-right"></i> Cadastrar
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-nav-item">
            <a href="<?php echo urlPage('configuracoes'); ?>" class="menu-nav-link">
                Configurações 
            </a>
        </li>
        <!--
        <li class="menu-nav-item menu-nav-logout">
            <a href="<?php echo '?logout'; ?> " class="menu-nav-link nav-logout"> 
                Sair 
            </a>
        </li>
    -->
    </ul>
</nav>