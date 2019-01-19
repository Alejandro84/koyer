<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php $this->load->view('template/alert');?>
        </div>
    </div>
    <div class="row">
        <h1>Precios</h1>
    </div>
    <div class="row">

        <div class="col-md-6">

            <table class="table table-striped">
                <thead>
                <th>ID</th>
                <th>Modelo</th>
                <th>Precio</th>
                <th>Acciones</th>

                </thead>
                <tbody>
                <?php
                    foreach ($tarifas as $tarifa):
                ?>
                    <tr>
                        <td><?php echo $tarifa->id_tarifa;?></td>
                        <td><?php echo $tarifa->modelo;?></td>
                        <td>$ <?php echo  number_format($tarifa->precio, '0', ',','.');?></td>
                        <td>
                            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModal">
                                Editar Precio
                            </button>
                        </td>
                    </tr>
                <? endforeach; ?>
                </tbody>
            </table>

        </div>

        <div class="col-md-6">
            <?php $this->load->view('tarifa/nuevo');?>
        </div>

    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title" id="exampleModalLabel">Editar Precio</h2>
        </div>
        <div class="modal-body">
            <h4><?php echo $tarifa->modelo;?></h4>
            
            <form action="<?php echo site_url('tarifa/actualizar');?>" method="post">

            <div class="form-group">
                <label for="">Precio</label>
                <input type="text" name="precio" value="<?php echo $tarifa->precio;?>" class="form-control">
            </div>
        </div>
        <div class="modal-footer">
            <input type="text" name="id_tarifa" value="<?php echo $tarifa->id_tarifa;?>" hidden="true">
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </div>
        </form>
        </div>
    </div>
</div>