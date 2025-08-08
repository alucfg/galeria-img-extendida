<?php
    if (isset($_GET["id"]) && is_numeric($_GET["id"])){
        $id = $_GET["id"];
        if (!file_exists("galeria/fullsize/" . $id . ".jpg")){
            if (file_exists("galeria/fullsize/" . $id . ".gif")){
                $ext = "gif";
            }
            else{
                header("Location: error.php?id=2");
                exit();
            }
        }
        else{
            $ext = "jpg";
        }
    }
    else{
        header("Location: error.php?id=2");
        exit();
    }

    $post_titulo = "Sin nombre"; // se debe conseguir a través de una base de datos

    //todo: mejores tags - like y dislikes - mejor preview (?)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        echo "<title>" . $post_titulo . "</title>";
    ?>
    <link rel="stylesheet" href="styles/styles.css">
    <script src="js/post/comentar.js" defer></script>
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
    <header>
        <div class="contenido-post">
            <?php
                echo "<img src='galeria/fullsize/" . $id . "." . $ext ."'>";
                echo "<div class='post-contenido'>";
                echo "<div class='post-contenido-titulo'>";
                echo "<h1 id='post-titulo'>Título</h1>";
                echo "<h2 id='post-id'>ID #" . $id . "</h2>";
                echo "<div class='post-contenido-tags'>";
                echo "<span id='input-tag2'>tag1</span>";
                echo "<span id='input-tag2'>tag2</span>";
                echo "<span id='input-tag2'>asfsafafafafagg</span>";
                echo "<span id='input-tag2'>test tes test t eststst</span>";
                echo "<span id='input-tag2'>test tes test t eststst</span>";
                echo "<span id='input-tag2'>test tes test t eststst</span>";
                echo "<span id='input-tag2'>test tes test t eststst</span>";
                echo "<span id='input-tag2'>test tes test t eststst</span>";
                echo "</div>";
                echo "<div class='post-autor'>";
                echo "<img src='resources/avatar.png' alt='Avatar' id='post-autor-avatar'>";
                echo "<div class='post-autor-info'>";
                echo "<p><b>Autor</b><br>";
                echo "<p>Publicado el 24-07-2025 a las 5:04 AM</p>";
                echo "</div>";
                echo "</div>";
                echo "<h2 id='post-titulo-descripcion'>Descripción</h2>";
                echo "<p id='post-descripcion'>Descripción. Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium aspernatur alias harum velit laborum perspiciatis quisquam autem voluptatum ducimus deleniti. Placeat fugiat veniam provident, blanditiis quos voluptatum aliquam cupiditate ullam.</p>";
                echo "</div>";
            ?>
            <h2 id="post-comentarios-titulo">Comentarios</h1>
            <div class="post-comentarios">
                <div class="post-comentarios-comentario">
                    <img src="resources/avatar.png" alt="" id="post-comentarios-comentario-avatar">
                    <p><b>User</b><br>Hola</p>
                </div>
                <div class="post-comentarios-comentario">
                    <img src="resources/avatar.png" alt="" id="post-comentarios-comentario-avatar">
                    <p><b>User</b><br>Testeo<br><span id="post-comentarios-bluetext">>green text test. jajajjaj</span></p>
                </div>
                <div class="post-comentarios-comentario">
                    <img src="resources/avatar.png" alt="" id="post-comentarios-comentario-avatar">
                    <p><b>User</b><br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae accusamus quidem voluptatum eius. In sunt numquam sequi error vel fugit, consequatur, nesciunt temporibus commodi corporis reiciendis, excepturi sapiente. Facere, debitis.</p>
                </div>
            </div>
            <h2 id="post-comentarios-comentar">Comentar</h2>
            <div class="post-comentarios-comentar">
                <img src="resources/avatar.png" alt="" id="post-comentarios-comentario-avatar">
                <form action="" method="post">
                    <textarea name="" id="post-comentarios-textarea" rows="2" required></textarea>
                    <input type="submit" value="Comentar" id="post-comentarios-enviar" disabled>
                </form>
            </div>
            </div>
        </div>
    </header>
</body>
</html>
