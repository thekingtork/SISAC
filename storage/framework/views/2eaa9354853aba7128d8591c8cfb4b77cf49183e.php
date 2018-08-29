<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Sabana de notas</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('vendor/bootstrap/css/bootstrap.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('css/invoice-print.css')); ?>" />
    <style>
        .table thead th{
            border-bottom: none;
        }
        .card-body{
            border-radius: 0;
        }
        .card{
            border-radius: 0;
        }

    </style>
</head>
<body>
    <div class="invoice page">
        <header class="clearfix">
            <div class="row justify-content-md-center">
                <div class="col-sm-1 mt-0 position-absolute">
                    <div class="ib ml-5">
                        <img class="ml-5" src="<?php echo e(asset('img/escudo_100x100.png')); ?>" alt="INELMU" />
                    </div>
                </div>
                <div class="col-sm-6 text-right mt-3 mb-3">
                    <p class="ib text-center" style="line-height: 1.2">
                        <span class="text-uppercase">Institución  Educativa Las Mujeres</span><br>
                        Las Mujeres – Moñitos<br>
                        DANE Nº 223500000863 - NIT 900127736 - 3<br>
                        Correo electrónico: ee_22350000086301@hotmail.com<br>
                        <span class="font-weight-light" style="font-size: 10px; line-height: 1">RESOLUCIÓN DE APROBACIÓN  DE LA INSTITUCIÓN EDUCATIVA 349 DE 28 DE JULIO DE 2011 Y 661 DE DICIEMBRE DE 2011</span></br>
                    </p>
                    <p class="text-center"><span class="ib text-center text-uppercase">Ficha de seguimiento, evaluación y promoción de estudiantes</span></p>
                </div>
            </div>
        </header>
        <section>
            <table class="table" style="border: none; border-color: #ffffff;">
                <tbody>
                <tr>
                    <td>Grupo:  <strong><?php echo e($salon->full_name); ?></strong></td>
                    <td>Periodo:  <strong><?php echo e($periodo->name); ?></strong></td>
                    <td>Año lectivo: <strong><?php echo e(date_format(new \Carbon\Carbon($periodo->datestart),"Y")); ?></strong></td>
                    <td>Director de grupo:  <strong><?php echo e($salon->director); ?></strong></td>
                    <td>Fecha:  <strong><?php echo e(\Carbon\Carbon::now()->toDateString()); ?></strong></td>
                </tr>
                </tbody>
            </table>
            <table class="table table-bordered">
                <tbody>
                    <tr class="text-center " >
                        <td class="p-0" rowspan="2" style="vertical-align: middle"><strong>N°</strong></td>
                        <td class="p-0" rowspan="2" style="vertical-align: middle"><strong>APELLIDOS NOMBRE(S)</strong></td>
                        <td class="text-center p-0" colspan="12"><strong>AREAS Y ASIGNATURAS</strong></td>
                    </tr>
                    <tr>
                        <?php $__currentLoopData = $salon->asignaturas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asignatura): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td class="p-0 text-center"><strong><?php echo e($asignatura->short_name); ?></strong></td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                    <?php $__currentLoopData = $salon->estudiantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estudiante): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="m-0 p-0">
                            <td class="text-center m-0 p-0"><?php echo e($estudiante->numero); ?></td>
                            <td class="m-0 pl-1 pt-0 pb-0 pr-0"><?php echo e($estudiante->apellido_name); ?></td>
                            <?php $__currentLoopData = $salon->asignaturas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asignatura): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <td class="text-center m-0 p-0"><?php echo e($estudiante->getDefInforme($asignatura->id,$periodo->id)); ?></td>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </section>
    </div>
</body>
</html>
