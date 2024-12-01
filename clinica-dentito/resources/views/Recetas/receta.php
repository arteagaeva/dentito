<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Recetas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../EstiloRecetas.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #2457a4;
        }
        .container {
            max-width: 700px;
            margin: 50px auto;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="text mb-4">
            <h1>Gestión de Recetas</h1>
            <h2>Registrar Receta</h2>
        </div>
        <form action="" method="POST" class="form-container">
            <div class="mb-3">
                <label for="idPaciente" class="form-label">ID Paciente</label>
                <input type="number" id="idPaciente" name="idPaciente" class="form-control" placeholder="ID del Paciente" required>
            </div>
            <div class="mb-3">
                <label for="dosis" class="form-label">Dosis</label>
                <input type="text" id="dosis" name="dosis" class="form-control" placeholder="Dosis" required>
            </div>
            <div class="mb-3">
                <label for="instrucciones" class="form-label">Instrucciones</label>
                <input type="text" id="instrucciones" name="instrucciones" class="form-control" placeholder="Instrucciones" required>
            </div><br>
            <div class="text-center">
                <button type="submit" class="btn btn-primary" name="btnRegistrar" value="ok">Registrar Receta</button>
            </div>
        </form>
        <?php if (!empty($error)): ?>
            <div class="alert alert-danger mt-3">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
