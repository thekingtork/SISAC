@extends('layouts.app')
@section('titulo', "Logros")
@section('namePage', "Modulo: Académico")
@section('styles')
    <link rel="stylesheet" href="{{asset('vendor/select2/css/select2.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/select2-bootstrap-theme/select2-bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/datatables/media/css/dataTables.bootstrap4.css')}}" />
@endsection
@section('content')
    <section class="card">

        <header class="card-header ">
          <h2 class="card-title">Buscar Logros</h2>
        </header>
    <div class="card-body">
        @include('admin.logros.partials.messages')
        @include('admin.logros.partials.fields')
        <hr>
        @if(count($logros) > 0)
            @include('admin.logros.partials.resultados')
            @else
            <div class=".col-md-6 .offset-md-3">
                <h4 class="text-center">No hay resultados para la busqueda ...</h4>
            </div>
        @endif
    </div>
        @include('admin.logros.partials.modals')
    </section>
@endsection
@section('script')
    <script src="{{asset('vendor/autosize/autosize.js')}}"></script>
    <script src="{{asset('vendor/select2/js/select2.js')}}"></script>
    <script src="{{asset('vendor/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/media/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('js/examples/examples.modals.js')}}"></script>
    <script src="{{asset('js/examples/examples.datatables.editable.js')}}"></script>
    <script>
        $(".deleted").click(function (e) {
            $("#form-delete").attr('action', $(this).data('url') );
            $("#NombreLogro").text( $(this).data('nlogro') );
        });

        $(".edit").click(function (e) {
            $("#form-edit").attr('action', $(this).data('urlupdate') );
            var ruta = $(this).data('urledit');
            $.get(ruta , function (data) {
                $("#docente_id").val(data.docente_id);
                $("#periodo_id").val(data.periodo_id);
                $("#asignatura_id").val(data.asignatura_id);
                $("#grade").val(data.grade);
                $("#category").val(data.category);
                $("#description").val(data.description);
                $("#indicador").val(data.indicador);
                $("#codeUser").val(data.code.substring(0, 3));
            });
        });

        $("#codeUser").change(function (e) {updateCode();});
        $("#category").change(function (e) {updateCode();});
        $("#asignatura_id").change(function (e) {updateCode();});
        $("#grade").change(function (e) {updateCode();});
        $("#periodo_id").change(function (e) {updateCode();});
        $("#docente_id").change(function (e) {updateCode();});


        function updateCode() {
            var category = $("#category").val();
            var asignatura_id = $("#asignatura_id").val();
            var docente_id = $("#docente_id").val();
            var grade = $("#grade").val();
            var periodo_id = $("#periodo_id").val();
            var codeorg =$("#codeUser").val();
            var code = codeorg+category+grade+asignatura_id+docente_id+periodo_id;
            $("#code").val(code);
            console.log(code);
        }
    </script>
    @endsection
