<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Hace que la página sea responsiva en celulares -->
    <title>Inicio</title>

    <!-- Bootstrap (librería de estilos) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        /* ESTILO GENERAL DEL CUERPO */
        body{
            margin:0;
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(135deg, #050816, #0b1a33, #061427);
            color: white;
            min-height: 100vh;
        }

        /* NAVBAR (barra superior) */
        .navbar{
            background: rgba(0,0,0,0.85) !important;
            border-bottom: 1px solid rgba(0,140,255,0.4);
        }

        /* LOGO O TITULO DEL SISTEMA */
        .navbar-brand{
            color: #1e90ff !important;
            font-weight: bold;
        }

        /* LINKS DEL MENÚ */
        .nav-link{
            color: #dcdcdc !important;
        }

        /* EFECTO HOVER EN LINKS */
        .nav-link:hover{
            color: #1e90ff !important;
        }

        /* BOTÓN DE CERRAR SESIÓN */
        .btn-salir{
            border: 1px solid #1e90ff;
            color: #1e90ff;
            background: transparent;
            padding: 6px 12px;
            border-radius: 0;
            transition: 0.3s;
        }

        /* EFECTO AL PASAR EL MOUSE */
        .btn-salir:hover{
            background: #1e90ff;
            color: white;
        }

        /* SECCIÓN PRINCIPAL (BIENVENIDA) */
        .hero{
            text-align: center;
            padding: 80px 20px;
        }

        /* TÍTULO PRINCIPAL */
        .hero h1{
            font-size: 42px;
            font-weight: bold;
            color: #1e90ff;
        }

        /* TEXTO SECUNDARIO */
        .hero p{
            color: #cfd8ff;
            font-size: 16px;
            margin-top: 10px;
        }

        /* TARJETAS */
        .card{
            background: rgba(0,0,0,0.6);
            border: 1px solid rgba(0,140,255,0.3);
            color: white;
        }

        /* TITULO DE LAS TARJETAS */
        .card-title{
            color: #1e90ff;
        }

    </style>
</head>

<body>

    <!-- NUEVA MENTE UNA VALIDACIÓN DE SESIÓN -->
    @if(!session('cliente_id'))
    <script>
        // Si no hay sesión, redirige al login automaticamente
        window.location = "/login";
    </script>
    @endif

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">

        <!-- LOGO DEL SISTEMA -->
        <a class="navbar-brand" href="#">PROYECTO LARAVEL</a>

        <!-- BOTÓN RESPONSIVE -->
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav">

            <ul class="navbar-nav ms-auto">

                <!-- BOTÓN DE CERRAR SESIÓN -->
                <li class="nav-item">
                    <a class="btn btn-salir ms-3" href="/logout">
                        CERRAR SESIÓN
                    </a>
                </li>

            </ul>

        </div>
    </div>
</nav>

<!--BIENVENIDA DEL USUARIO-->
<header class="hero">

    <h1>
        Bienvenida, {{ session('cliente_nombre') }}
        <!-- Muestra el nombre del usuario guardado en sesión -->
    </h1>

    <p>
        Has ingresado correctamente al sistema
    </p>

</header>

<!-- CONTENIDO PRINCIPAL -->
<main class="container my-5">

    <div class="row g-4">

        <!-- TARJETA 1 -->
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Hobbies:</h5>
                    <p class="card-text">Investigacion de Redes, música, gym.</p>
                </div>
            </div>
        </div>

        <!-- TARJETA 2 -->
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Estudiante:</h5>
                    <p class="card-text">
                        Estudiante de informática / sistemas <br>
                        Interés en desarrollo web y bases de datos <br>
                        Objetivo: Estudiar CiberSeguridad
                    </p>
                </div>
            </div>
        </div>

        <!-- TARJETA 3 -->
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Estado:</h5>
                    <p class="card-text">Chambeadora y triste</p>
                </div>
            </div>
        </div>

    </div>

</main>

<!-- FOOTER -->
<footer class="text-center py-4 mt-5" style="background: rgba(0,0,0,0.7); border-top: 1px solid rgba(0,140,255,0.3);">
    <p>&copy; 2026 - Sistema Laravel | VIANEY</p>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>