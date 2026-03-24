<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
          <div>
            <p>
                <a href="<?= site_url('categorias') ?>" class="btn btn-info">Volver a categorias</a>
            </p>
          </div>
            <div class="card mb-4">
                <div class="card-header">
                                <i class="fa-solid fa-list"></i>
                                <?php echo $titulo;?>
                </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($categorias as $categoria): ?>
                                    <tr>
                                        <td><?= $categoria['id'] ?></td>
                                        <td><?= $categoria['nombre'] ?></td>

                                        <td>
                                            <a href="<?= site_url('categorias/activar/'.$categoria['id']) ?>" class="btn btn-success">Activar</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
        </div>
    </main>
</div>