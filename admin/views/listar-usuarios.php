<?php 
$usuarios = getAll('login'); 
?>

<div class="container">
    <header class="main-header">
        <h2 class="main-title">Usuários</h2>
        <h3 class="main-subtitle">Lista de usuários</h3>
    </header>

    <section class="main-section">

        <div class="main-content">
            <?php if ($usuarios): ?>
                <div class="table table-usuarios">
                    <div class="table-header">
                        <div class="table-header-item">
                            <span> # </span>
                        </div>
                        <div class="table-header-item">
                            <span> Nome </span>
                        </div>
                        <div class="table-header-item">
                            <span> Login </span>
                        </div>
                        <div class="table-header-item">
                            <span class="acoes"> Ações </span>
                        </div>
                    </div>
                    <div class="table-body">
                        <?php foreach ($usuarios as $usuario): ?>
                            <div class="table-body-item">
                                <span>  <?php echo $usuario->id; ?> </span>
                                <span>  <?php echo ucfirst($usuario->nome); ?> </span>
                                <span>  <?php echo $usuario->usuario; ?> </span>
                                <span class="acoes"> 
                                    <a href="<?php echo urlPage('editar-usuario'); ?>&id=<?php echo $usuario->id; ?>" class="edit">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="#" class="delete" data-id="<?php echo $usuario->id; ?>" data-nome="<?php echo $usuario->nome; ?> ">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                </span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php else: ?>
                <?php include_once 'sem-registros.php'; ?>
            <?php endif; ?>
        </div>
    </section>
</div>