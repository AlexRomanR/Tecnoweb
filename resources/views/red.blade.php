<!DOCTYPE html>
<html>
<head>
    <title>Redirigiendo...</title>
</head>
<body>
    <form id="redirectForm" action="{{ route('sueldos.inicio') }}" method="POST">
        @csrf
        <input type="hidden" name="fecha_inicio" value="{{ $fecha_inicio }}">
        <input type="hidden" name="fecha_fin" value="{{ $fecha_fin }}">
        <input type="hidden" name="creado" value=" Depósito creado exitosamente. ">
    </form>
    <script type="text/javascript">
        document.getElementById('redirectForm').submit();
    </script>
</body>
</html>
