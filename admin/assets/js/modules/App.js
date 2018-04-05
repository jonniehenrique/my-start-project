/* APP.JS - MODULE */

class App {

    constructor() {
        this.urlbase = $('#app-url').val();
        this.dados = [];
        this.id;
    }

    carregar() {
        this.esconderAlerta();
    }

    esconderAlerta() {
        $('.alert').click(function (e) {
            e.preventDefault();

            $(this).html('').removeClass('alert-danger').removeClass('alert-success');
        })
    }

    mostrarMensagem(tipo, mensagem) {
        $('.alert').addClass('alert-' + tipo).html(mensagem);
    }
}