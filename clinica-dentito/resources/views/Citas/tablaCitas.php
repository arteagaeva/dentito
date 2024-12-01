<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Citas</title>
    <link rel="stylesheet" href="../css/EstiloUsuarios.css">
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
            <h1>Gestión de Citas</h1>
            <h2>Lista de Citas</h2>

            <!-- Buscador -->
            <input type="text" id="buscador" class="form-control" placeholder="Buscar en la tabla...">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" style="font-size: 25px;">ID Cita</th>
                        <th scope="col" style="font-size: 25px;">ID Paciente</th>
                        <th scope="col" style="font-size: 25px;">ID Doctor</th>
                        <th scope="col" style="font-size: 25px;">Tratamiento</th>
                        <th scope="col" style="font-size: 25px;">Fecha Cita</th>
                        <th scope="col" style="font-size: 25px;">Estado</th>
                        <th scope="col" style="font-size: 25px;">Motivo</th>
                        <th style="font-size: 25px;">Acciones</th>
                    </tr>
                </thead>
                <tbody id="tablaCitas">
                    <!-- Los datos de las citas serán generados dinámicamente con JavaScript -->
                </tbody>
            </table>
        </div>

        <!-- Formulario emergente para editar cita -->
        <div id="overlay" onclick="closeEditForm()" style="display: none;"></div>
        <div id="editForm" style="display: none;">
            <form id="formEditar">
                <input type="hidden" id="editIdCita">
                <!-- Campos del formulario -->
                <div class="mb-3">
                    <label for="editIdPaciente" class="form-label">ID Paciente</label>
                    <input type="text" class="form-control" id="editIdPaciente" required>

                    <label for="editIdDoctor" class="form-label">ID Doctor</label>
                    <input type="text" class="form-control" id="editIdDoctor" required>

                    <label for="editTratamiento" class="form-label">Tratamiento</label>
                    <input type="text" class="form-control" id="editTratamiento" required>

                    <label for="editFechaCita" class="form-label">Fecha Cita</label>
                    <input type="date" class="form-control" id="editFechaCita" required>

                    <label for="editEstado" class="form-label">Estado</label>
                    <select class="form-control" id="editEstado" required>
                        <option value="Pendiente">Pendiente</option>
                        <option value="Confirmada">Confirmada</option>
                        <option value="Cancelada">Cancelada</option>
                    </select>

                    <label for="editMotivo" class="form-label">Motivo</label>
                    <input type="text" class="form-control" id="editMotivo" required>
                </div>
                <div class="text-end mt-3">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Datos estáticos de citas
        const citas = [
            { idCita: 1, idPaciente: 101, idDoctor: 201, tratamiento: "Consulta general", fechaCita: "2024-12-01", estado: "Pendiente", motivo: "Chequeo rutinario" },
            { idCita: 2, idPaciente: 102, idDoctor: 202, tratamiento: "Examen dental", fechaCita: "2024-12-05", estado: "Confirmada", motivo: "Dolor de muelas" },
            { idCita: 3, idPaciente: 103, idDoctor: 203, tratamiento: "Consulta pediátrica", fechaCita: "2024-12-10", estado: "Pendiente", motivo: "Revisión de vacunas" },
        ];

        const tablaCitas = document.getElementById('tablaCitas');
        const buscador = document.getElementById('buscador');

        // Renderizar la tabla
        function renderTabla() {
            tablaCitas.innerHTML = '';
            citas.forEach(cita => {
                const fila = document.createElement('tr');
                fila.innerHTML = 
                    `<td style="font-size: 19px;">${cita.idCita}</td>
                    <td style="font-size: 19px;">${cita.idPaciente}</td>
                    <td style="font-size: 19px;">${cita.idDoctor}</td>
                    <td style="font-size: 19px;">${cita.tratamiento}</td>
                    <td style="font-size: 19px;">${cita.fechaCita}</td>
                    <td style="font-size: 19px;">${cita.estado}</td>
                    <td style="font-size: 19px;">${cita.motivo}</td>
                    <td>
                        <a class="btn-modificar" title="Editar" onclick="showEditForm(${cita.idCita})"></a>
                        <a class="btn-eliminar" title="Eliminar" onclick="eliminarCita(${cita.idCita})"></a>
                    </td>`;
                tablaCitas.appendChild(fila);
            });
        }

        // Buscar en la tabla
        buscador.addEventListener('keyup', function () {
            const filtro = this.value.toLowerCase();
            const filas = tablaCitas.querySelectorAll('tr');
            filas.forEach(fila => {
                const textoFila = fila.textContent.toLowerCase();
                fila.style.display = textoFila.includes(filtro) ? '' : 'none';
            });
        });

        // Mostrar el formulario de edición
        function showEditForm(idCita) {
            const cita = citas.find(c => c.idCita === idCita);
            if (cita) {
                document.getElementById('editIdCita').value = cita.idCita;
                document.getElementById('editIdPaciente').value = cita.idPaciente;
                document.getElementById('editIdDoctor').value = cita.idDoctor;
                document.getElementById('editTratamiento').value = cita.tratamiento;
                document.getElementById('editFechaCita').value = cita.fechaCita;
                document.getElementById('editEstado').value = cita.estado;
                document.getElementById('editMotivo').value = cita.motivo;
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
            const idCita = parseInt(document.getElementById('editIdCita').value);
            const idPaciente = parseInt(document.getElementById('editIdPaciente').value);
            const idDoctor = parseInt(document.getElementById('editIdDoctor').value);
            const tratamiento = document.getElementById('editTratamiento').value;
            const fechaCita = document.getElementById('editFechaCita').value;
            const estado = document.getElementById('editEstado').value;
            const motivo = document.getElementById('editMotivo').value;

            const citaEditada = citas.find(c => c.idCita === idCita);
            if (citaEditada) {
                citaEditada.idPaciente = idPaciente;
                citaEditada.idDoctor = idDoctor;
                citaEditada.tratamiento = tratamiento;
                citaEditada.fechaCita = fechaCita;
                citaEditada.estado = estado;
                citaEditada.motivo = motivo;

                renderTabla();
                closeEditForm();
            }
        });

        // Eliminar una cita
        function eliminarCita(idCita) {
            const index = citas.findIndex(c => c.idCita === idCita);
            if (index !== -1) {
                citas.splice(index, 1);
                renderTabla();
            }
        }

        // Inicializar la tabla al cargar la página
        renderTabla();
    </script>
</body>
</html>
