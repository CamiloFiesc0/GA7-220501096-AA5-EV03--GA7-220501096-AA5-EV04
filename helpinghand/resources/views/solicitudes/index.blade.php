<!DOCTYPE html>
<html>
<head>
    <title>Lista de Solicitudes</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: url('https://source.unsplash.com/1600x900/?support') no-repeat center center fixed;
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
        <h2 class="text-center mb-4">Lista de Solicitudes</h2>

        <div class="mb-3 text-end">
            <a href="{{ route('solicitudes.create') }}" class="btn btn-success">Nueva Solicitud</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Código</th>
                        <th>Descripción</th>
                        <th>Ubicación</th>
                        <th>Fecha</th>
                        <th>Prioridad</th>
                        <th>Pago</th>
                        <th>ID Usuario</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($solicitudes as $solicitud)
                    <tr>
                        <td>{{ $solicitud->codigo }}</td>
                        <td>{{ $solicitud->descripcion }}</td>
                        <td>{{ $solicitud->ubicacion }}</td>
                        <td>{{ $solicitud->fecha }}</td>
                        <td>{{ $solicitud->prioridad }}</td>
                        <td>{{ $solicitud->pago }}</td>
                        <td>{{ $solicitud->idusuario }}</td>
                        <td>
                            <a href="{{ route('solicitudes.edit', $solicitud->codigo) }}" class="btn btn-warning btn-sm">Editar</a>

                            <form action="{{ route('solicitudes.destroy', $solicitud->codigo) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="text-center mt-4">
            <a href="{{ url('/') }}" class="btn btn-secondary">← Volver al inicio</a>
        </div>
    </div>
</body>
</html>
