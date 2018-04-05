/* CATEGORIA.JS - MODULE */

class Categoria {

    constructor() {
        this.urlbase = $('#app-url').val();
        this.dados = [];
        this.id;

        this.app = new App();
    }

    carregar() {
        this.carregarCategoria();
    }

    carregarCategoria() {
        this.disparaCadastrarCategoria();
        this.disparaEditarCategoria();
        this.disparaDeletarCategoria();
    }

    disparaCadastrarCategoria() {
        let that = this;

        $('#form-categoria').submit(function (e) {
            e.preventDefault();

            that.dados = $(this).serializeArray();
            that.cadastrarCategoria();
        });
    }

    cadastrarCategoria() {
        let that = this;

        $.ajax({
            type: 'POST',
            url: that.urlbase + 'admin/api/CategoriaCadastrar.php',
            data: that.dados,

            beforeSend() {
                $('#form-categoria').css({opacity: '.5'});
            },

            success(json) {
                if (json == '1') {
                    that.app.mostrarMensagem('success', 'Categoria adicionada com sucesso');
                    $('#form-categoria').find('input, select, textarea').val('');
                } else {
                    that.app.mostrarMensagem('danger', 'Erro ao adicionar categoria');
                }
            },

            complete() {
                $('#form-categoria').css({opacity: '1'});
            }
        });
    }

    disparaEditarCategoria() {
        let that = this;

        $('#form-categoria-edit').submit(function (e) {
            e.preventDefault();

            that.dados = $(this).serializeArray();
            that.editarCategoria();
        });
    }

    editarCategoria() {
        let that = this;

        $.ajax({
            type: 'POST',
            url: that.urlbase + 'admin/api/CategoriaEditar.php',
            data: that.dados,

            beforeSend() {
                $('#form-categoria-edit').css({opacity: '.5'});
            },

            success(json) {
                if (json == '1') {
                    that.app.mostrarMensagem('success', 'Categoria atualizada com sucesso');
                } else {
                    that.app.mostrarMensagem('danger', 'Erro ao atualizar categoria');
                }
            },

            complete() {
                $('#form-categoria-edit').css({opacity: '1'});
            }
        });
    }

    disparaDeletarCategoria() {
        let that = this;

        $('.table-categorias .delete').click(function (e) {
            e.preventDefault();

            that.id = $(this).data('id');

            alert('Deseja realmente excluir a categoria ' + $(this).data('nome') + ' do sistema?');

            that.deletarCategoria();
        });
    }

    deletarCategoria() {
        let that = this;

        $.ajax({
            type: 'POST',
            url: that.urlbase + 'admin/api/CategoriaDeletar.php',
            data: {id: that.id},

            beforeSend() {
                $('.table-categorias').css({opacity: '.5'});
            },

            success(json) {
                if (json == '1') {
                    that.app.mostrarMensagem('success', 'Categoria deletada com sucesso');
                    location.reload();
                } else {
                    that.app.mostrarMensagem('danger', 'Erro ao deletar categoria');
                }
            },

            complete() {
                $('.table-categorias').css({opacity: '1'});
            }
        });
    }
}