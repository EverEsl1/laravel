<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #666;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            padding: 10px 20px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #4caf50;
            color: #fff;
        }

        .btn-danger {
            background-color: #f44336;
        }

        .btn-warning {
            background-color: #ff9800;
        }

        .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            color: #fff;
        }

        .btn:hover {
            opacity: 0.8;
        }
    </style>
</head>

<body>

<div class="container">
    <h1>Vista Crear Usuario</h1>

    <form id="userForm" action="#">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" placeholder="Ingrese el nombre del usuario">

        <label for="correo">Correo Electrónico:</label>
        <input type="email" id="correo" placeholder="Ingrese un correo electrónico válido">

        <button type="button" onclick="agregarUsuario()">Agregar Usuario</button>
    </form> 

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo Electrónico</th>
                <th colspan="2">Acciones</th>
            </tr>
        </thead>
        <tbody id="tablaUsuarios"></tbody>
    </table>
</div>

<script>
    let users = [];

    function agregarUsuario() {
        const nombre = document.getElementById('nombre').value.trim();
        const correo = document.getElementById('correo').value.trim();
        
        if (nombre !== "" && correo !== "") {
            users.push({nombre, correo});
            mostrarTabla();
            limpiarCampos();
        } else {
            alert("Todos los campos son obligatorios");
        }
    }

    function eliminarUsuario(index) {
        users.splice(index, 1);
        mostrarTabla();
    }

    function mostrarTabla() {
        const tabla = document.getElementById('tablaUsuarios');
        tabla.innerHTML = "";

        for (let i = 0; i < users.length; i++) {
            const fila = tabla.insertRow();
            
            const celdaNombre = fila.insertCell();
            const celdaCorreo = fila.insertCell();
            const botonEliminar = fila.insertCell();
            const botonEditar = fila.insertCell();

            celdaNombre.textContent = users[i].nombre;
            celdaCorreo.textContent = users[i].correo;

            const btnEliminar = document.createElement('button');
            btnEliminar.textContent = 'Eliminar';
            btnEliminar.className = 'btn btn-danger';
            btnEliminar.addEventListener('click', () => eliminarUsuario(i));
            botonEliminar.appendChild(btnEliminar);

            const btnEditar = document.createElement('button');
            btnEditar.textContent = 'Editar';
            btnEditar.className = 'btn btn-warning ml-2';
            btnEditar.addEventListener('click', () => mostrarFormularioEdicion(i));
            botonEditar.appendChild(btnEditar);
        }
    }

    function mostrarFormularioEdicion(index) {
        const usuario = users[index];
        document.getElementById('nombre').value = usuario.nombre;
        document.getElementById('correo').value = usuario.correo;

        const btnGuardar = document.createElement('button');
        btnGuardar.textContent = 'Guardar';
        btnGuardar.className = 'btn btn-success mt-2';
        btnGuardar.addEventListener('click', () => guardarCambios(index));
        document.getElementById('userForm').appendChild(btnGuardar);
    }

    function guardarCambios(index) {
        const nombre = document.getElementById('nombre').value.trim();
        const correo = document.getElementById('correo').value.trim();

        if (nombre !== "" && correo !== "") {
            users[index] = {nombre, correo};
            mostrarTabla();
            limpiarCampos();
            document.getElementById('userForm').removeChild(document.querySelector('.btn-success'));
        } else {
            alert("Todos los campos son obligatorios");
        }
    }

    function limpiarCampos() {
        document.getElementById('nombre').value = "";
        document.getElementById('correo').value = "";
    }
</script>

</body>
</html>