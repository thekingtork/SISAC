<div class="form-group row">
    <div class="col-lg-6">
        <div class="form-group">
            <?php echo Form::select('category',['academico' => 'Academico','convivencia' => 'Convivencia'], null, ['class' => 'form-control mb-3','placeholder'=>'Seleccione una Categoria', 'required']); ?>

        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <?php echo Form::select('escala',['texto' => 'Texto','numerica' => 'Numerica'], null, ['class' => 'form-control mb-3','placeholder'=>'Seleccione una escala','required']); ?>

        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-12">
        <?php echo Form::textarea('description',null, array('class'=>'form-control','id' => 'description','rows' => 3, 'cols' => 50,'placeholder'=>'Descripción del aspectos')); ?>

    </div>
</div>