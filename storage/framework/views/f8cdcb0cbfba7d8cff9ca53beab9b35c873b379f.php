<?php $__env->startSection('titulo', "Grados"); ?>
<?php $__env->startSection('namePage', "Modulo: Grados"); ?>
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2/css/select2.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2-bootstrap-theme/select2-bootstrap.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/pnotify/pnotify.custom.css')); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="card card-transparent">
        <div class="col-sm-6">
            <div class="mb-3">
                <a href="<?php echo e(route('jornadas.create')); ?>"  class="btn btn-primary on-default simple-ajax-modal">Agregar jornada <i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="row">
        <?php $__currentLoopData = $jornadas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jornada): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-2 col-xl-2">
                <section class="card card-featured-left card-featured-primary mb-4">
                    <div class="card-body">
                        <div class="widget-summary">
                            <div class="widget-summary-col">
                                <div class="summary">
                                    <h2 ><strong><?php echo e($jornada->name); ?></strong> </h2>
                                </div>
                                <div class="summary-footer">
                                    <a href="<?php echo e(route('jornadas.edit',$jornada)); ?>" class="btn btn-xs btn-primary simple-ajax-modal"><i class="fas fa-pencil-alt"></i> Editar</a>
                                    <a href="#modalEliminar" class="btn btn-xs btn-primary deleted modal-basic" data-nasg="<?php echo e($jornada->name); ?>" data-url="<?php echo e(route('jornadas.destroy', $jornada )); ?>"><i class="far fa-trash-alt"></i> Eliminar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <?php echo $__env->make('admin.grados.partials.modals', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('admin.grados.partials.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('vendor/select2/js/select2.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/pnotify/pnotify.custom.js')); ?>"></script>
    <script src="<?php echo e(asset('js/examples/examples.modals.js')); ?>"></script>
    <script>
        $(".deleted").click(function (e) {
            $("#form-delete").attr('action', $(this).data('url') );
            $("#NombreGrado").text( $(this).data('nasg') );
        });
    </script>
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('scriptfin'); ?>
    <script src="<?php echo e(asset('js/examples/examples.notifications.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>