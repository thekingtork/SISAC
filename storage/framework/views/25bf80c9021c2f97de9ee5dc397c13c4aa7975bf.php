<?php $__env->startSection('titulo'); ?>
    Bienvenido <?php echo e(Auth::user()->name); ?>

    <?php $__env->stopSection(); ?>
<?php $__env->startSection('namePage'); ?>
    Bienvenido
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>