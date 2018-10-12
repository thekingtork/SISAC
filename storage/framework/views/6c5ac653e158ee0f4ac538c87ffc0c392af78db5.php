<div class="form-group row">
    <label class="col-sm-4 control-label text-sm-right pt-1" for="name">Nombre periodo: </label>
    <div class="col-sm-8">
        <?php echo Form::text('name', null, ['class' => 'form-control','id'=>'name', 'placeholder' => 'Por favor introduzca nombre de periodo']); ?>

    </div>
</div>
<div class="form-group row">
    <label class="col-sm-4 control-label text-sm-right pt-1" for="datestart">Fecha de inicio: </label>
    <div class="col-sm-8">
        <?php echo Form::date('datestart',null,['class' => 'form-control','id'=>'datestart','require']); ?>

    </div>
</div>
<div class="form-group row">
    <label class="col-sm-4 control-label text-sm-right pt-1" for="dateend">Fecha de fin: </label>
    <div class="col-sm-8">
        <?php echo Form::date('dateend',null,['class' => 'form-control','id'=>'dateend','require']); ?>

    </div>
</div>
<div class="form-group row">
    <label class="col-sm-4 control-label text-sm-right pt-1" for="cierre">Fecha de cierre (Docentes): </label>
    <div class="col-sm-8">
        <?php echo Form::datetime('cierre',null,['class' => 'form-control','id'=>'cierre','require']); ?>

    </div>
</div>
<div class="form-group row">
    <label class="col-sm-4 control-label text-sm-right pt-1" for="estado">Estado: </label>
    <div class="col-sm-8">
        <?php echo Form::select('estado',['finalizado'=>'Finalizado','activo'=>'Activo'], null, ['class' => 'form-control mb-3', 'id'=>'estado','required', 'placeholder'=>'Seleccione un estado']); ?>

    </div>
</div>
<script>
    $('#cierre').datetimepicker({
        format: 'Y-m-d H:i:s'
    });
</script>