/* Usuario.JS - MODULE */

class Usuario {

    constructor() {
        this.urlbase = $('#app-url').val();
        this.dados = [];
        this.id;

        this.app = new App();
    }

    carregar() {
        this.carregarUsuario();
    }

    carregarUsuario() {
        this.disparaCadastrarUsuario();
        this.disparaEditarUsuario();
        this.disparaDeletarUsuario();
    }

    disparaCadastrarUsuario() {
        let that = this;

        $('#form-usuario').submit(function (e) {
            e.preventDefault();

            that.dados = $(this).serializeArray();
            that.cadastrarUsuario();
        });
    }

    cadastrarUsuario() {
        let that = this;

        $.ajax({
            type: 'POST',
            url: that.urlbase + 'admin/api/UsuarioCadastrar.php',
            data: that.dados,

            beforeSend() {
                $('#form-usuario').css({opacity: '.5'});
            },

            success(json) {
                if (json == '1') {
                    that.app.mostrarMensagem('success', 'Usuário adicionado com sucesso');
                    $('#form-usuario').find('input, textarea, select').val('');
                } else {
                    that.app.mostrarMensagem('danger', 'Erro ao adicionar o usuário');
                }
            },

            complete() {
                $('#form-usuario').css({opacity: '1'});
            }
        });
    }

    disparaEditarUsuario() {
        let that = this;

        $('#form-usuario-edit').submit(function (e) {
            e.preventDefault();

            that.dados = $(this).serializeArray();
            that.editarUsuario();
        });
    }

    editarUsuario() {
        let that = this;

        $.ajax({
            type: 'POST',
            url: that.urlbase + 'admin/api/UsuarioEditar.php',
            data: that.dados,

            beforeSend() {
                $('#form-usuario-edit').css({opacity: '.5'});
            },

            success(json) {
                if (json == '1') {
                    that.mostrarMensagem('success', 'Usuário atualizado com sucesso');
                } else {
                    that.mostrarMensagem('danger', 'Erro ao atualizar o usuário');
                }
            },

            complete() {
                $('#form-usuario-edit').css({opacity: '1'});
            }
        });
    }

    disparaDeletarUsuario() {
        let that = this;

        $('.table-usuario .delete').click(function (e) {
            e.preventDefault();

            that.id = $(this).data('id');

            alert('Deseja realmente excluir ' + $(this).data('nome') + ' como usuário do sistema?');

            that.deletarUsuario();
        });
    }

    deletarUsuario() {
        let that = this;

        $.ajax({
            type: 'POST',
            url: that.urlbase + 'admin/api/UsuarioDeletar.php',
            data: {id: that.id},

            beforeSend() {
                $('.table-usuario').css({opacity: '.5'});
            },

            success(json) {
                if (json == '1') {
                    that.mostrarMensagem('success', 'Usuário deletado com sucesso');
                    location.reload();
                } else {
                    that.mostrarMensagem('danger', 'Erro ao deletar usuário');
                }
            },

            complete() {
                $('.table-usuario').css({opacity: '1'});
            }
        });
    }

    mostrarMensagem(tipo, mensagem) {
        $('.alert').addClass('alert-' + tipo).html(mensagem);
    }
}