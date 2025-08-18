<?php
    require "php/db/config.php";

    session_start();
    if (isset($_SESSION["cuenta_usuario"])){
        header("Location: index.php");
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST"){
        $username = trim(strip_tags($_POST["user"]));
        $username = str_replace(" ", "", $username);
        $password = $_POST["password"];

        if (empty($user) || empty($password)){
            exit();
        }

        $password = password_hash($password, PASSWORD_BCRYPT);

        try{
            $conn = new PDO("mysql:host=$host:$puerto;dbname=$db", $user, $pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = $conn->prepare("INSERT INTO usuarios(username, password, nickname) VALUES (?, ?, ?);");
            $sql->execute([$username, $password, $username]);
            $mensaje = "Usuario registrado, inicia sesión.";
        }
        catch(PDOException $e){
            $mensaje = "<span>Error:</span> El usuario ya existe.";
            // mostrar error de manera más visual (base de datos caida)
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link rel="stylesheet" href="styles/styles.css">
    <script src="js/register/verify.js" defer></script>
    <link rel="shortcut icon" href="favicon.ico" />
</head>
<body>
    <nav>
        <p id="nav-logo">Tachibana</p>
        <ul>
            <li><a href="index.php?pag=1">Inicio</a></li>
            <li><a href="subir.php">Publicar</a></li>
            <li><a href="perfiles.php">Usuarios</a></li>
        </ul>
        <div class="nav-cuenta">
            <a href="php/cuenta.php" id="cuenta">Anónimo</a>
        </div>
    </nav>
    <div class="contenido-menu">
        <form action="register.php" method="post" id="formulario">
            <p id="texto-centrado">Registrarse</p>
            <input type="text" name="user" placeholder="Nombre de usuario" required>
            <input type="password" name="password" placeholder="Contraseña" id="contraseña" required>
            <input type="password" name="verifyPassword" placeholder="Repetir contraseña" id="repetirContraseña" required>
            <?php
                if (isset($mensaje)){
                    echo "<p id='formulario-mensaje'>$mensaje</p>";
                }
            ?>
            <input type="submit" value="Registrarse">
        </form>
        <p id="registrate">¿Tenés cuenta? Iniciá sesión <a href="login.php">acá</a></p>
    </div>
</body>
</html>
