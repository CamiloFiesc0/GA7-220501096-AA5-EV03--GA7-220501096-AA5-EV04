<!DOCTYPE html>
<html>
<head>
    <title>Crear Solicitud</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: url('https://source.unsplash.com/1600x900/?helpdesk') no-repeat center center fixed;
            background-size: cover;
        }

        .bg-blur {
            background-color: rgba(255,255,255,0.95);
            padding: 30px;
            border-radius: 10px;
            margin-top: 50px;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>

    <div class="container bg-blur">
        <h2 class="text-center mb-4">Registrar Nueva Solicitud</h2>

        <!-- Mostrar errores -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Por favor corrige los siguientes errores:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulario -->
        <form action="{{ route('solicitudes.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Código</label>
                <input type="number" name="codigo" class="form-control" value="{{ old('codigo') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <input type="text" name="descripcion" class="form-control" value="{{ old('descripcion') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Ubicación</label>
                <input type="text" name="ubicacion" class="form-control" value="{{ old('ubicacion') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Fecha</label>
                <input type="date" name="fecha" class="form-control" value="{{ old('fecha') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Prioridad</label>
                <input type="text" name="prioridad" class="form-control" value="{{ old('prioridad') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Pago</label>
                <input type="number" name="pago" class="form-control" value="{{ old('pago') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">ID Usuario</label>
                <input type="number" name="idusuario" class="form-control" value="{{ old('idusuario') }}">
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Guardar Solicitud</button>
                <a href="{{ route('solicitudes.index') }}" class="btn btn-secondary">← Volver al listado</a>
            </div>
        </form>
    </div>

</body>
</html>
