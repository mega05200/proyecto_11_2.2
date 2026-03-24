<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <?php $validation = session('validation')?>
          <h1 class="mt-4"><?php echo $titulo;?></h1>            
            <div class="card mb-4">
                <div class="card-header">
                                <i class="fa-solid fa-floppy-disk"></i>
                                         <?php echo $titulo;?>
                                <?php if (isset($validation)){?>
                                    <div class= "alert alert-danger">
                                        <?php echo $validation-> listErrors(); ?>
                                    </div>
                                
                                <?php }?>
                </div>
                    <div class="card-body">
                        

                        <form action="<?= site_url('unidades/modificar') ?>" autocomplete="off" method="POST">
                            <div class="form-group"> 
                                <div class="row">
                                    <div class="col-6 col-lg-6">
                                        <label for="nombre">Nombre</label>
                                        <input class="form-control" name="nombre" id="idnombre" placeholder="kilogramos" 
                                        value="<?php echo $unidad['nombre'];?>" autofocus>
                                        <?php if($validation && $validation->hasError('nombre')): ?>
                                            <span class="text-danger"><?php echo $validation->getError('nombre'); ?></span>
                                        <?php endif; ?>

                                    </div>
                                    <div class="col-6 col-lg-6">
                                        <label for="siglas">Siglas</label>
                                        <input class="form-control" name="siglas" id="idsiglas" placeholder="KG" 
                                        value="<?php echo $unidad['siglas'];?>" >
                                        <?php if($validation && $validation->hasError('siglas')): ?>
                                            <span class="text-danger"><?php echo $validation->getError('siglas'); ?></span>
                                        <?php endif; ?>

                                    </div>
                                </div>
                                <br>
                                <input type="hidden" name="id" value="<?php echo $unidad['id']; ?>">                
                            </div>
                            <button type="submit" class="btn btn-success">Actualizar</button>
                            <a href="<?= site_url('unidades') ?>" class="btn btn-danger">Cancelar</a>
                        </form>    

                    </div>
            </div>
        </div>
    </main>
            
