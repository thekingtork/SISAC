<div class="row m-1">
    <div class="table-responsive">
        <table class="table table-bordered table-striped mb-0 dataTable no-footer" id="datatable-editable">
            <thead>
            <tr>
                <th>N°</th>
                <th>Logro</th>
                <th>Categoria</th>

                <?php if(Auth::user()->type <> 'docente'): ?>
                    <th>Docente</th>
                    <th>Grado</th>
                <?php endif; ?>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $logros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $logro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr data-item-id="<?php echo e($logro->id); ?>">
                    <td><?php echo e($key + 1); ?></td>
                    <td><?php echo e($logro->description); ?></td>
                    <td><?php echo e($logro->category); ?></td>
                    <?php if(Auth::user()->type <> 'docente'): ?>
                        <td><?php echo e($logro->name); ?></td>
                        <td><?php echo e($logro->grade); ?></td>
                    <?php endif; ?>
                    <td class="actions">
                        <a href="#" class="hidden on-editing save-row"><i class="fas fa-save"></i></a>
                        <a href="#" class="hidden on-editing cancel-row"><i class="fas fa-times"></i></a>
                        <a href="#modalEditar" class="on-default edit modal-basic" data-urlupdate="<?php echo e(route('logros.update', $logro->id )); ?>" data-urledit="<?php echo e(route('logros.edit', $logro->id )); ?>" > <i class="fas fa-pencil-alt"></i></a>
                        <a href="#modalEliminar" data-url="<?php echo e(route('logros.destroy',$logro->id)); ?>" data-nlogro="<?php echo e($logro->category); ?>" class="on-default deleted modal-basic" data-nuser="#" data-url="#"><i class="far fa-trash-alt"></i></a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
