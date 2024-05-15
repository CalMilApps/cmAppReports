<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CalMil - Login</title>
    <!-- Agregar los enlaces a Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos personalizados -->
    <style>
        body {
            /* Centrar verticalmente el contenido */
            display: flex;
            align-items: center;
            /* Añadir padding en la parte superior e inferior */
            padding-top: 4rem;
            padding-bottom: 4rem;
            /* Cambiar el color de fondo */
            background-color: #f8f9fa;
        }

        .form-signin {
            /* Centrar horizontalmente el formulario */
            margin: auto;
            /* Añadir margen a los lados */
            max-width: 400px;
            /* Añadir padding */
            padding: 1rem;
            /* Cambiar el color de fondo */
            background-color: #ffffff; 
            /* Añadir bordes redondeados */
            border-radius: 0.5rem;
            /* Añadir sombra */
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
        }
        h1.outer {
            font-weight: bold;
            margin-bottom: 2rem;
            color: #343a40;
        }
    </style>
</head>
   
<body>
<!-- Contenedor principal -->
<main class="form-signin">

    <div class="container text-center">
        <h1 class="mt-5"><b>CalMil</b></h1>
        <h2 class="h3 mb-3 fw-normal">Please Login!</h2>
    </div>
    <div class="container">

        <!-- Formulario de inicio de sesión -->
        <form action="<?php echo base_url('/login_ac')?>" method="POST">
            <!-- Campo de usuario -->
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="User" required="" name="usuario_ac">
                <label for="floatingInput">User</label>
            </div>

            <!-- Campo de contraseña -->
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" required="" name="pass_ac">
                <label for="floatingPassword">Password</label>
            </div>

            <!-- Checkbox de recordar sesión -->
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">Remember me</label>
            </div>

            <!-- Botón de iniciar sesión -->
            <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
        </form>
    </div>
</main>

</body>
</html>
