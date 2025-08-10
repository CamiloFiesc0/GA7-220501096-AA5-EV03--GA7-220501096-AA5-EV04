<!DOCTYPE html>
<html>
<head>
    <title>Editar Solicitud</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: url('https://source.unsplash.com/1600x900/?form') no-repeat center center fixed;
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
        <h2 class="text-center mb-4">Editar Solicitud</h2>

        <!-- Mostrar errores -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Ups, algo salió mal:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulario -->
        <form action="{{ route('solicitudes.update', $solicitude->codigo) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Código</label>
                <input type="number" name="codigo" class="form-control" value="{{ $solicitude->codigo }}" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <input type="text" name="descripcion" class="form-control" value="{{ old('descripcion', $solicitude->descripcion) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Ubicación</label>
                <input type="text" name="ubicacion" class="form-control" value="{{ old('ubicacion', $solicitude->ubicacion) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Fecha</label>
                <input type="date" name="fecha" class="form-control" value="{{ old('fecha', $solicitude->fecha) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Prioridad</label>
                <input type="text" name="prioridad" class="form-control" value="{{ old('prioridad', $solicitude->prioridad) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Pago</label>
                <input type="number" name="pago" class="form-control" value="{{ old('pago', $solicitude->pago) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">ID Usuario</label>
                <input type="number" name="idusuario" class="form-control" value="{{ old('idusuario', $solicitude->idusuario) }}">
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Actualizar Solicitud</button>
                <a href="{{ route('solicitudes.index') }}" class="btn btn-secondary">← Volver al listado</a>
            </div>
        </form>
    </div>

</body>
</html>
