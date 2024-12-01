<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Recetas</title>
    <link rel="stylesheet" href="../css/EstiloRecetas.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/646ac4fad6.js" crossorigin="anonymous"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #2457a4;
            
        }
        .container {
            max-width: 1500px;
            margin: 50px auto;
            padding: 30px;
            background-color: #ffffff; /* Blanco */
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <div class="titulo"></div>
    <div class="container">
        <div class="table-container">
            <h1>Gestión de Recetas</h1>
            <h2>Lista de Recetas</h2>

            <!-- Buscador -->
            <input type="text" id="buscador" class="form-control" placeholder="Buscar en la tabla...">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" style="font-size: 25px;">ID Receta</th>
                        <th scope="col" style="font-size: 25px;">ID Paciente</th>
                        <th scope="col" style="font-size: 25px;">Nombre Paciente</th>
                        <th scope="col" style="font-size: 25px;">Dosis</th>
                        <th scope="col" style="font-size: 25px;">Instrucciones</th>
                        <th style="font-size: 25px;">Acciones</th>
                    </tr>
                </thead>
                <tbody id="tablaRecetas">
                    <!-- Los datos de las recetas serán generados dinámicamente con JavaScript -->
                </tbody>
            </table>
        </div>

        <!-- Formulario emergente para editar receta -->
        <div id="overlay" onclick="closeEditForm()" style="display: none;"></div>
        <div id="editForm" style="display: none;">
            <form id="formEditar">
                <input type="hidden" id="editId">
                <!-- Campos del formulario -->
                <div class="mb-3">
                    <label for="editIdPaciente" class="form-label">ID Paciente</label>
                    <input type="number" class="form-control" id="editIdPaciente" required>

                    <label for="editDosis" class="form-label">Dosis</label>
                    <input type="text" class="form-control" id="editDosis" required>

                    <label for="editInstrucciones" class="form-label">Instrucciones</label>
                    <input type="text" class="form-control" id="editInstrucciones" required>
                </div>
                <div class="text-end mt-3">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Datos estáticos de pacientes (como ejemplo)
        const pacientes = [
            { idPaciente: 1, nombre: "Juan Pérez" },
            { idPaciente: 2, nombre: "Ana Gómez" },
            { idPaciente: 3, nombre: "Carlos Martínez" }
        ];

        // Datos estáticos de recetas
        const recetas = [
            { idReceta: 1, idPaciente: 1, dosis: "10 mg", instrucciones: "Tomar una vez al día" },
            { idReceta: 2, idPaciente: 2, dosis: "5 mg", instrucciones: "Tomar en ayunas" },
            { idReceta: 3, idPaciente: 3, dosis: "15 mg", instrucciones: "Tomar antes de dormir" },
        ];

        const tablaRecetas = document.getElementById('tablaRecetas');
        const buscador = document.getElementById('buscador');

        // Función para obtener el nombre del paciente por su ID
        function obtenerNombrePaciente(idPaciente) {
            const paciente = pacientes.find(p => p.idPaciente === idPaciente);
            return paciente ? paciente.nombre : 'Desconocido';
        }

        // Renderizar la tabla
        function renderTabla() {
            tablaRecetas.innerHTML = '';
            recetas.forEach(receta => {
                const nombrePaciente = obtenerNombrePaciente(receta.idPaciente);
                const fila = document.createElement('tr');
                fila.innerHTML = `
                    <td style="font-size: 19px;">${receta.idReceta}</td>
                    <td style="font-size: 19px;">${receta.idPaciente}</td>
                    <td style="font-size: 19px;">${nombrePaciente}</td>
                    <td style="font-size: 19px;">${receta.dosis}</td>
                    <td style="font-size: 19px;">${receta.instrucciones}</td>
                    <td>
                        <a class="btn-modificar" title="Editar" onclick="showEditForm(${receta.idReceta})"></a>
                        <a class="btn-eliminar" title="Eliminar" onclick="eliminarReceta(${receta.idReceta})"></a>
                    </td>
                `;
                tablaRecetas.appendChild(fila);
            });
        }

        // Buscar en la tabla
        buscador.addEventListener('keyup', function () {
            const filtro = this.value.toLowerCase();
            const filas = tablaRecetas.querySelectorAll('tr');
            filas.forEach(fila => {
                const textoFila = fila.textContent.toLowerCase();
                fila.style.display = textoFila.includes(filtro) ? '' : 'none';
            });
        });

        // Mostrar el formulario de edición
        function showEditForm(idReceta) {
            const receta = recetas.find(r => r.idReceta === idReceta);
            if (receta) {
                document.getElementById('editId').value = receta.idReceta;
                document.getElementById('editIdPaciente').value = receta.idPaciente;
                document.getElementById('editDosis').value = receta.dosis;
                document.getElementById('editInstrucciones').value = receta.instrucciones;
                document.getElementById('overlay').style.display = 'block';
                document.getElementById('editForm').style.display = 'block';
            }
        }

        // Cerrar el formulario de edición
        function closeEditForm() {
            document.getElementById('overlay').style.display = 'none';
            document.getElementById('editForm').style.display = 'none';
        }

        // Guardar cambios en el formulario de edición
        document.getElementById('formEditar').addEventListener('submit', function (event) {
            event.preventDefault();
            const idReceta = parseInt(document.getElementById('editId').value);
            const idPaciente = parseInt(document.getElementById('editIdPaciente').value);
            const dosis = document.getElementById('editDosis').value;
            const instrucciones = document.getElementById('editInstrucciones').value;

            const recetaEditada = recetas.find(r => r.idReceta === idReceta);
            if (recetaEditada) {
                recetaEditada.idPaciente = idPaciente;
                recetaEditada.dosis = dosis;
                recetaEditada.instrucciones = instrucciones;
                renderTabla();
                closeEditForm();
            }
        });

        // Eliminar receta
        function eliminarReceta(idReceta) {
            const index = recetas.findIndex(r => r.idReceta === idReceta);
            if (index !== -1) {
                recetas.splice(index, 1);
                renderTabla();
            }
        }

        // Inicializar la tabla
        renderTabla();
    </script>
</body>
</html>
