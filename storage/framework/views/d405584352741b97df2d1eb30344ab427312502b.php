<?php $__env->startSection('titulo', "Estudiantes - "."{$grupo->name_aula}"); ?>
<?php $__env->startSection('namePage', "Modulo: Grupo - Estudiantes - "."{$grupo->name_aula}"); ?>
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2/css/select2.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/bootstrap-fileupload/bootstrap-fileupload.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2-bootstrap-theme/select2-bootstrap.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/datatables/media/css/dataTables.bootstrap4.css')); ?>" />
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.6/css/select.bootstrap4.min.css" />
    <link rel="stylesheet" href="<?php echo e(asset('css/editor.bootstrap4.min.css')); ?>" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.2/css/responsive.dataTables.min.css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="card-body">
        <div class="row" id="ControlPanel">
            <div class="col-sm-6">
                <div class="mb-3">
                    <a href="<?php echo e(route('grupos.index')); ?>"  class="btn btn-primary on-default ">Regresar <i class="fas fa-backward"></i></a>
                </div>
            </div>
        </div>
        <table class="table table-bordered table-striped mb-0" id="estudiantes">
            <thead>
            <tr>
                <th></th>
                <th></th>
                <th>N° de Identidad</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Estado</th>
            </tr>
            </thead>
        </table>
    </div>
    <div id="inf" data-urltabla ="<?php echo e(url()->current()); ?>"  data-url ="<?php echo e(Config::get('app.url')); ?>"></div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('vendor/autosize/autosize.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/select2/js/select2.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/datatables/media/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/datatables/media/js/dataTables.bootstrap4.min.js')); ?>"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo e(asset('js/buttons.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/dataTables.responsive.min.js')); ?>"></script>
    <script src="https://cdn.datatables.net/select/1.2.6/js/dataTables.select.min.js"></script>
    <script src="<?php echo e(asset('js/dataTables.editor.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/editor.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(asset('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js')); ?>"></script>
    <script src="<?php echo e(asset('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js')); ?>"></script>
    <script src="<?php echo e(asset('https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(asset('https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/examples/examples.modals.js')); ?>"></script>
    <script src="<?php echo e(asset('js/custom.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/bootstrap-fileupload/bootstrap-fileupload.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/municipios.js')); ?>"></script>
    <script src="<?php echo e(asset('js/tablas/estudiantesshow.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>