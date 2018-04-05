/* MENU.JS - MODULE */

class Menu {

    constructor() {
        this.menu;
    }

    carregar() {
        this.mostrarSubmenu();
        this.mostrarDropdown();
        this.esconderDropdown();
        this.painelTabActive();
        this.menuMobile();
        this.esconderMenuMobile();
    }

    mostrarSubmenu() {
        $('.nav-submenu').click(function (e) {
            e.preventDefault();

            $('.nav-submenu, .submenu-nav').removeClass('active');

            if ($(this).hasClass('active')) {
                $(this).removeClass('active').siblings('.submenu-nav').addClass('active');
                return false;
            }

            $(this).addClass('active').siblings('.submenu-nav').addClass('active');
        });
    }

    painelTabActive() {
        $('.nav-section').click(function (e) {
            e.preventDefault();

            $('.nav-section, .main-section').removeClass('active');

            $(this).addClass('active');
            $('#section-' + $(this).data('section')).addClass('active');
        });
    }

    mostrarDropdown() {
        $('body').on('click', '.js-dropdown', function(e) {
            e.preventDefault();
            e.stopPropagation();

            if ($(this).siblings('.dropdown').hasClass('active')) {
                $('.dropdown-' + $(this).data('dropdown')).removeClass(' active');
                return false;
            }

            $('.dropdown-' + $(this).data('dropdown')).toggleClass(' active');
        });
    }

    esconderDropdown() {
        $('body').on('click', function() {

            if ($('.dropdown').hasClass('active')) {
                $('.dropdown').removeClass('active');
            }
        });
    }

    menuMobile() {
        $('body').on('click', '.btn-menu', function(e) {
            e.stopPropagation();

            $('.sidebar').addClass('active');
        });
    }

    esconderMenuMobile() {
        $('body').on('click', function() {

            if ($('.sidebar').hasClass('active')) {
                $('.sidebar').removeClass('active');
            }
        })
    }
}