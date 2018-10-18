<?php $__env->startSection('titulo', "Reportes"); ?>
<?php $__env->startSection('namePage', "Reportes: Academicos"); ?>
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2/css/select2.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2-bootstrap-theme/select2-bootstrap.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/datatables/media/css/dataTables.bootstrap4.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/pnotify/pnotify.custom.css')); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xl-3">
                <section class="card card-featured-left card-featured-primary mb-3">
                    <div class="card-body">
                        <div class="widget-summary">
                            <div class="widget-summary-col widget-summary-col-icon">
                                <div class="summary-icon bg-primary">
                                    <i class="fas fa-list-alt"></i>
                                </div>
                            </div>
                            <div class="widget-summary-col">
                                <h4 class="title">Reporte de Logros</h4>
                                <div class="summary-footer">
                                    <a class="text-muted text-uppercase modal-basic" href="#modalLogros">Descargar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        <?php if (\Illuminate\Support\Facades\Blade::check('director')): ?>
        <div class="col-xl-3">
                <section class="card card-featured-left card-featured-secondary">
                    <div class="card-body">
                        <div class="widget-summary">
                            <div class="widget-summary-col widget-summary-col-icon">
                                <div class="summary-icon bg-secondary">
                                    <i class="fas fa-clipboard-list"></i>
                                </div>
                            </div>
                            <div class="widget-summary-col">
                                <h4 class="title">Sabana de notas</h4>
                                <div class="summary-footer">
                                    <a class="text-muted text-uppercase modal-basic" href="#modalSabana">Descargar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        <div class="col-xl-3">
                <section class="card card-featured-left card-featured-tertiary mb-3">
                    <div class="card-body">
                        <div class="widget-summary">
                            <div class="widget-summary-col widget-summary-col-icon">
                                <div class="summary-icon bg-tertiary">
                                    <i class="fas fa-eye"></i>
                                </div>
                            </div>
                            <div class="widget-summary-col">
                                <h4 class="title">Observadores - estudiantes </h4>
                                <div class="summary-footer">
                                    <a class="text-muted text-uppercase" href="#">Descargar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        <div class="col-xl-3">
                <section class="card card-featured-left card-featured-quaternary">
                    <div class="card-body">
                        <div class="widget-summary">
                            <div class="widget-summary-col widget-summary-col-icon">
                                <div class="summary-icon bg-quaternary">
                                    <i class="fas fa-calendar-check"></i>
                                </div>
                            </div>
                            <div class="widget-summary-col">
                                <h4 class="title">Directorio de padres</h4>
                                <div class="summary-footer">
                                    <a class="text-muted text-uppercase" href="#">Descargar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        <?php endif; ?>
        <?php echo $__env->make('docente.reportes.partials.modals', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('vendor/select2/js/select2.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/datatables/media/js/dataTables.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/examples/examples.modals.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/pnotify/pnotify.custom.js"')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>