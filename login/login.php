<?php
require_once ('../structures/header/header.html')
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel=stylesheet href=../structures/header/style_login.css>
    </head>

    <div class="container">
    <h2>Login</h2>
    <form id ="formulario" method="post" action="login.php" name="signin-form">
    <div class="form-element">
        <h4>Email</h4>
        <input type="email" name="mail"/>
    </div>
    <br>
    <div class="form-element">
        <h4>Password</h4>
        <input type="password" name="password"/>
    </div>
    <br>
    <button id="login" type="submit" name="login" value="login">Log In</button>
</form>

<?php
/*Configure una base de datos para tener usuarios. Los usuarios tendrán un nombre, un correo (identificador de la plataforma),una contraseña, fecha de nacimiento, permisos (si son o no administradores) y una imagen (que, por el momento, no tendrá ningún valor).*/
$conexion = new PDO('mysql:host=fmesasc.com;dbname=daw2', 'daw2', 'Gimbernat');

/* Comprobar si existe el usuario */
if (isset($_POST['login'])) {
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    $query = $conexion->query('SELECT * FROM aecProyecto_user WHERE mail="'.$mail.'"');

    $result = $query->fetch();

    if ($result['mail']) {
        echo "El valor es $result";
        //echo '<p class="error">La contraseña o el usuario están mal!</p>';
    } else {
        echo print_r($result);
        if ($password == $result['password']) {
            echo '<p class="success">Has iniciado sesión</p>';

        } else {
            echo '<p class="error">La contraseña o el usuario están mal!!</p>';

        }
    }
}
?>
