<?php


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Kits</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:gainsboro; 
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        #login, #menu {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.5s ease-in-out;
            border: 2px solid black; 
        }
        .hidden {
            display: none;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        h1, h2 {
            margin-bottom: 20px;
            color:black; 
        }
        button {
            margin-top: 10px;
            padding: 10px;
            border: none;
            background-color:black;
            color:white;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: black;
        }
    </style>
</head>
<body>
    <div id="login">
        <h1>Inicio de Sesión</h1>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre"><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email"><br><br>
        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena"><br><br>
        <button onclick="iniciarSesion()">Iniciar Sesión</button>
    </div>

    <div id="menu" class="hidden">
        <h2>Bienvenido, <span id="nombreUsuario"></span>!</h2>
        <h3>Opciones:</h3>
        <button onclick="comprarMateriales()">Comprar materiales por separado</button><br>
        <button onclick="armarKits()">Que la empresa arme los kits</button><br>
        <button onclick="comprarKits()">Comprar kits hechos</button><br>
        <button onclick="cerrarSesion()">Cerrar Sesión</button>
    </div>

    <script>
        const BARRAS_POR_KIT = 1; 
        const DISCOS_POR_KIT = 2; 

        function iniciarSesion() {
            const nombre = document.getElementById('nombre').value;
            const email = document.getElementById('email').value;
            const contrasena = document.getElementById('contrasena').value;

            if (nombre && email && contrasena) {
                document.getElementById('nombreUsuario').innerText = nombre;
                document.getElementById('login').classList.add('hidden');
                document.getElementById('menu').classList.remove('hidden');
            } else {
                alert('Por favor, complete todos los campos.');
            }
        }

        function comprarMateriales() {
            const barras = prompt("¿Cuántas barras desea comprar?");
            const discos = prompt("¿Cuántos discos desea comprar?");
            alert(`Usted ha seleccionado ${barras} barras y ${discos} discos para comprar.`);
        }

        function armarKits() {
            const barras = prompt("¿Cuántas barras tiene?");
            const discos = prompt("¿Cuántos discos tiene?");
            
            const kitsPosibles = Math.min(Math.floor(barras / BARRAS_POR_KIT), Math.floor(discos / DISCOS_POR_KIT));

            if (kitsPosibles > 0) {
                alert(`Con ${barras} barras y ${discos} discos, se pueden armar ${kitsPosibles} kits.`);
            } else {
                alert("No tiene suficientes materiales para armar ningún kit.");
            }
        }

        function comprarKits() {
            const kits = prompt("¿Cuántos kits hechos desea comprar?");
            alert(`Usted ha seleccionado ${kits} kits hechos para comprar.`);
        }

        function cerrarSesion() {
            document.getElementById('login').classList.remove('hidden');
            document.getElementById('menu').classList.add('hidden');
            document.getElementById('nombre').value = '';
            document.getElementById('email').value = '';
            document.getElementById('contrasena').value = '';
        }
    </script>
</body>
</html>

