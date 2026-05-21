<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Moderno</title>

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
            min-height: 420px;

            display: flex;
            overflow: hidden;

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
            margin-bottom: 18px;
        }

        /* INPUTS */
        .input-group{
            margin-bottom: 12px;
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
        .btn-login{
            width: 100%;
            background: #0066cc;
            color: white;
            border: none;

            padding: 9px;
            font-weight: bold;

            transition: 0.3s;
        }

        .btn-login:hover{
            background: #1e90ff;
            box-shadow: 0 0 15px rgba(30,144,255,0.4);
        }

        /* LINK REGISTRO */
        .registro-texto{
            text-align: center;
            margin-top: 12px;
            font-size: 12px;
            color: #cfd8ff;
        }

        .registro-texto a{
            color: #1e90ff;
            text-decoration: none;
            font-weight: bold;
        }

        .registro-texto a:hover{
            text-decoration: underline;
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

        <h1>BIENVENIDO</h1>

        <p>¿NO TIENES CUENTA? </p>
        
        <!--En casos de que el usuario no tenga cuenta, se le redirigue a una pagina distinta para registrarse-->
        <a href="/registro" class="btn-panel">
            REGISTRATE
        </a>

    </div>

    <!-- DERECHA -->
    <div class="panel-derecho">

        <div class="formulario">

            <h2 class="titulo">INICIAR SESIÓN</h2>

            <!--- SI EL USUARIO INGRESA UN DATO INCORRECTO, AUTOMATICAMENTE LE MANDA UN MENSAJE DE ERROR --->

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="/login">

                @csrf

                <!-- EMAIL -->
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="fa-solid fa-envelope"></i>
                    </span>
                    <input type="email"
                    name="correo_electronico"
                    class="form-control"
                    placeholder="Correo Electrónico">
                </div>

                
                <!-- PASSWORD -->
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="fa-solid fa-lock"></i>
                    </span>
                    <input type="password"
                           name="password"
                           class="form-control"
                           placeholder="Contraseña">
                </div>

                <button type="submit" class="btn-login">
                    <i class="fa-solid fa-right-to-bracket"></i>
                    INGRESAR    <!--Boton para ingresar al sistema-->
                </button>

            </form>
        </div>

    </div>

</div>

</body>
</html>