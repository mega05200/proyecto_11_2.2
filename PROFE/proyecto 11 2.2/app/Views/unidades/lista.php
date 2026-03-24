<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
          <h1 class="mt-4"><?php echo $titulo;?></h1> 
          <div>
            <p>
                <a href="<?= site_url('unidades/registrar') ?>" class="btn btn-info">Registrar</a>
                <a href="<?= site_url('unidades/eliminadas') ?>" class="btn btn-secondary">Ver eliminadas</a>
            </p>
          </div>           
            <div class="card mb-4">
                <div class="card-header">
                                <i class="fa-solid fa-list"></i>
                                Listado de Unidades
                </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatablesSimple"class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Siglas</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach($unidades as $unidad) {?>
                                    <tr>
                                        <td><?php echo $unidad['id']?></td>
                                        <td><?php echo $unidad['nombre']?></td>
                                        <td><?php echo $unidad['siglas']?></td>

                                        <td>
                                            <a href="<?= site_url('unidades/editar/') ?><?php echo $unidad['id']; ?>"
                                            class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                            <a href="#" data-href="<?= site_url('unidades/eliminar/') ?><?php echo $unidad['id']; ?>"
                                            data-bs-toggle="modal" data-bs-target="#modal-confirma" data-placement="top" title="Eliminar Registro" 
                                            class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>

                                    <?php }?>
                                </tbody>

                            </table>
                        </div>        
                    </div>
            </div>
        </div>
    </main>

<div class="modal fade" id="modal-confirma" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Eliminar Registro</h5>
                <button type="button" class="close" data-dismiss="modal" id="cerrar" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="moda-body">
                <p>Desea Eliminar este Registro?</p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" id="cancelar-modal">Cancelar</button>
                <button type="button" class="btn btn-danger" id="no-modal">NO</button>
                <a class="btn btn-success btn-ok">SI</a>

            </div>

        </div>
    </div>
</div>            
