<!DOCTYPE html>
<html>
<head>
    <title>Registrar Usuario</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: url('https://source.unsplash.com/1600x900/?technology') no-repeat center center fixed;
            background-size: cover;
        }

        .bg-blur {
            background-color: rgba(255, 255, 255, 0.95);
            padding: 30px;
            border-radius: 10px;
            margin-top: 50px;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>
    <div class="container bg-blur">
        <h2 class="text-center mb-4">Registrar Nuevo Usuario</h2>

        <!-- Mostrar errores de validación -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>¡Ups!</strong> Hubo algunos errores:
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulario para crear usuario -->
        <form method="POST" action="{{ route('usuarios.store') }}">
            @csrf

            <div class="mb-3">
                <label for="id" class="form-label">Documento (ID)</label>
                <input type="text" name="id" id="id" class="form-control" value="{{ old('id') }}" required>
            </div>

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}" required>
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" name="telefono" id="telefono" class="form-control" value="{{ old('telefono') }}">
            </div>

            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" name="direccion" id="direccion" class="form-control" value="{{ old('direccion') }}">
            </div>

            <div class="mb-3">
                <label for="correo" class="form-label">Correo electrónico</label>
                <input type="email" name="correo" id="correo" class="form-control" value="{{ old('correo') }}">
            </div>

            <div class="mb-3">
                <label for="contrasena" class="form-label">Contraseña</label>
                <input type="password" name="contrasena" id="contrasena" class="form-control">
            </div>

            <div class="mb-3">
                <label for="edad" class="form-label">Edad</label>
                <input type="number" name="edad" id="edad" class="form-control" value="{{ old('edad') }}">
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Guardar Usuario</button>
                <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">← Volver al listado</a>
            </div>
        </form>
    </div>
</body>
</html>
