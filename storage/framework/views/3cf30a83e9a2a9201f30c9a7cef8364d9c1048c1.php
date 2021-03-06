<div id="modalHeaderColorPrimary" class="modal-block modal-header-color modal-block-primary ">
    <section class="card">
        <?php echo Form::model($asignatura,['route' => ['asignaturas.update',$asignatura], 'method' => 'PUT','class' => 'form-horizontal form-bordered']); ?>

        <header class="card-header">
            <h2 class="card-title">Editar asignatura: <strong><?php echo e($asignatura->name); ?></strong></h2>
        </header>
        <div class="card-body">
            <?php echo $__env->make('admin.asignaturas.partials.fields', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <footer class="card-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    <button  class="btn btn-danger ml-3 modal-dismiss">Cancelar</button>
                    <button  type="submit" class="btn btn-primary ">Guardar</button>
                </div>
            </div>
        </footer>
        <?php echo Form::close(); ?>

    </section>
</div><?php /**PATH /var/www/SISAC/resources/views/admin/asignaturas/ajax/edit.blade.php ENDPATH**/ ?>