<!DOCTYPE html>
<html>
<head>
    <title>Editar Usuario</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: url('https://source.unsplash.com/1600x900/?technology') no-repeat center center fixed;
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
        <h2 class="text-center mb-4">Editar Usuario</h2>

        <!-- Mostrar errores -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Ups!</strong> Hay algunos errores:<br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Documento (ID)</label>
                <input type="text" name="id" class="form-control" value="{{ $usuario->id }}" disabled>
            </div>

            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{ $usuario->nombre }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Teléfono</label>
                <input type="text" name="telefono" class="form-control" value="{{ $usuario->telefono }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Dirección</label>
                <input type="text" name="direccion" class="form-control" value="{{ $usuario->direccion }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Correo</label>
                <input type="email" name="correo" class="form-control" value="{{ $usuario->correo }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input type="text" name="contrasena" class="form-control" value="{{ $usuario->contrasena }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Edad</label>
                <input type="number" name="edad" class="form-control" value="{{ $usuario->edad }}">
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success">Actualizar Usuario</button>
                <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">← Volver al listado</a>
            </div>
        </form>
    </div>
</body>
</html>
