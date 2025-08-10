<!DOCTYPE html>
<html>
<head>
    <title>Bienvenido al CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container text-center py-5">
        <h1 class="mb-5">Bienvenido al CRUD de HelpingHand</h1>

        <div class="row justify-content-center">
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h4 class="card-title mb-3">Usuarios</h4>
                        <p class="card-text">Gestiona los usuarios registrados en el sistema.</p>
                        <a href="{{ route('usuarios.index') }}" class="btn btn-primary w-100">Ir a Usuarios</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h4 class="card-title mb-3">Solicitudes</h4>
                        <p class="card-text">Gestiona las solicitudes registradas.</p>
                        <a href="{{ route('solicitudes.index') }}" class="btn btn-success w-100">Ir a Solicitudes</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
