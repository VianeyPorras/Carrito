<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!--Estilos para El tipo de letras, color de fondo y color de formularios-->
    <style>

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        /* FONDO AZUL / NEGRO */
        body{
            background: linear-gradient(135deg, #050816, #0b1a33, #061427);
            min-height: 100vh;

            display: flex;
            justify-content: center;
            align-items: center;

            padding: 20px;
        }

        /* CONTENEDOR */
        .contenedor{
            width: 780px;
            max-width: 100%;
            min-height: 450px;

            display: flex;

            background: rgba(0,0,0,0.55);
            backdrop-filter: blur(10px);

            border: 1px solid rgba(0,140,255,0.35);
            box-shadow: 0 0 25px rgba(0,140,255,0.25);
        }

        /* PANEL IZQUIERDO */
        .panel-izquierdo{
            width: 40%;

            background: rgba(0,0,0,0.80);

            color: white;

            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;

            padding: 25px;
            text-align: center;

            border-right: 1px solid rgba(0,140,255,0.35);
        }

        .panel-izquierdo h1{
            font-size: 30px;
            font-weight: bold;
            color: #1e90ff;
            margin-bottom: 10px;
        }

        .panel-izquierdo p{
            font-size: 13px;
            color: #dcdcdc;
            margin-bottom: 15px;
        }

        .btn-panel{
            border: 1px solid #1e90ff;
            color: #1e90ff;
            padding: 8px 16px;
            text-decoration: none;
            transition: 0.3s;
        }

        .btn-panel:hover{
            background: #1e90ff;
            color: white;
        }

        /* PANEL DERECHO */
        .panel-derecho{
            width: 60%;
            background: rgba(15,15,15,0.88);

            display: flex;
            justify-content: center;
            align-items: center;

            padding: 20px;
        }

        /* FORM */
        .formulario{
            width: 100%;
            max-width: 300px;
        }

        .titulo{
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            color: #1e90ff;
            margin-bottom: 15px;
        }

        /* INPUTS */
        .input-group{
            margin-bottom: 10px;
        }

        .input-group-text{
            background: #0066cc;
            color: white;
            border: none;
        }

        .form-control{
            background: rgba(255,255,255,0.08);
            border: 1px solid rgba(0,140,255,0.3);
            color: white;
            font-size: 13px;
            padding: 8px;
        }

        .form-control::placeholder{
            color: #cfcfcf;
        }

        .form-control:focus{
            background: rgba(255,255,255,0.10);
            border-color: #1e90ff;
            box-shadow: 0 0 10px rgba(30,144,255,0.5);
            color: white;
        }

        /* BOTÓN */
        .btn-registro{
            width: 100%;
            background: #0066cc;
            color: white;
            border: none;

            padding: 9px;
            font-weight: bold;

            transition: 0.3s;
        }

        .btn-registro:hover{
            background: #1e90ff;
            box-shadow: 0 0 15px rgba(30,144,255,0.4);
        }

        /* ALERTA */
        .alert{
            font-size: 13px;
            padding: 10px;
            border-radius: 6px;
            animation: fadeIn 0.5s ease-in-out;
        }

        /* ANIMACIÓN */
        @keyframes fadeIn{
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* RESPONSIVE */
        @media(max-width: 768px){
            .contenedor{
                flex-direction: column;
            }

            .panel-izquierdo,
            .panel-derecho{
                width: 100%;
            }

            .panel-izquierdo{
                padding: 25px;
            }
        }

    </style>

</head>

<body>

<div class="contenedor">

    <!-- IZQUIERDA -->
    <div class="panel-izquierdo">

        <h1>REGISTRARSE</h1>

        <p>FAVOR DE INGRESAR DATOS PARA EL REGISTRO</p>

        <a href="/login" class="btn-panel">
            INICIAR SESIÓN
        </a>

    </div>

    <!-- DERECHA -->
    <div class="panel-derecho">

        <div class="formulario">

            <h2 class="titulo">CREAR CUENTA</h2>

            <!-- AQUI INDICA CUANDO EL USUARIO TERMINO DE REGISTRASE LE MANDA UN -> MENSAJE DE ÉXITO -->
            @if(session('success'))
                <div class="alert alert-success text-center">
                    <i class="fa-solid fa-circle-check"></i>
                    {{ session('success') }}
                </div>
            @endif

            <form action="/registro" method="POST">
                @csrf

                <!--ESTO ES OBLIGATORIO RESPONDER PORQUE ESTA ASI EN LA BASE DE DATOS.-->
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="fa-solid fa-user"></i>
                    </span>
                    <!--NOMBRE DEL USUARIO Y SUS APELLIDO-->
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre">
                </div>

                <input type="text" name="apellido_paterno" class="form-control mb-2" placeholder="Apellido paterno">
                <input type="text" name="apellido_materno" class="form-control mb-2" placeholder="Apellido materno">

                <div class="input-group">
                    <span class="input-group-text">
                        <i class="fa-solid fa-envelope"></i>
                    </span>

                    <!--CORREO Y SU CONTRASEÑA DEL USUARIO-->
                    <input type="email" name="correo_electronico" class="form-control" placeholder="Correo">
                </div>

                <div class="input-group">
                    <span class="input-group-text">
                        <i class="fa-solid fa-lock"></i>
                    </span>
                    <!--El USUARIO TENDRA UNA CONTRASEÑA HASH SERA ENCRIPTADA--->
                    <input type="password" name="password" class="form-control" placeholder="Contraseña">
                </div>

                <div class="input-group">
                    <span class="input-group-text">
                        <i class="fa-solid fa-phone"></i>
                    </span>
                    <!--SE LE PREGUNTARA SU NUMERO TELEFONICO-->
                    <input type="text" name="telefono" class="form-control" placeholder="Teléfono">
                </div>

                <button type="submit" class="btn-registro mt-2">
                    <i class="fa-solid fa-user-plus"></i>
                    REGISTRARSE
                </button>

            </form>

        </div>

    </div>

</div>

</body>
</html>