<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
          <h1 class="mt-4"><?php echo $titulo;?></h1>
          <div>
            <p>
                <a href="<?= site_url('unidades') ?>" class="btn btn-info">Volver a unidades</a>
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
                                        <th>siglas</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($unidades as $unidad): ?>
                                    <tr>
                                        <td><?= $unidad['id'] ?></td>
                                        <td><?= $unidad['nombre'] ?></td>¨
                                        <td><?= $unidad['siglas'] ?></td>
                                           
                                        <td>
                                            <a href="<?= site_url('unidades/activar/'.$unidad['id']) ?>" class="btn btn-success">Activar</a>
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