<?php
    require_once ('../structures/header/header.html');
$conexion = new PDO('mysql:host=fmesasc.com;dbname=daw2', 'daw2', 'Gimbernat');
$query = $conexion->prepare("SELECT * FROM aecProyecto_user ");
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registro</title>
        <link rel=stylesheet href=../structures/header/style_registro.css>
    </head>

    <div class="container">
        <h2>Registro</h2>
    <form id="formulario" method="POST" action="register.php" name="signin-form">
        <div class="form-element">
            <h4>Email: </h4>
            <input type="email" name="mail" required/>
        </div>
        <br>
        <div class="form-element">
            <h4>Username:</h4>
            <input type="text" name="userName" required/>
        </div>
        <br>
        <div class="form-element">
            <h4>Surnames: </h4>
            <input type="text" name="surnames" required/>
        </div>
        <br>
        <div class="form-element">
            <h4>Password:</h4>
            <input type="password" name="password" required/>
        </div>
        <br>
        <button id ="register" type="submit" value="register" >Register</button>
    </form>

        <?php
        $conexion = new PDO('mysql:host=fmesasc.com;dbname=daw2', 'daw2', 'Gimbernat');
        // Comprobamos si nos llega los datos por POST
        if (isset($_POST['mail'])) {
           $mail = $_POST['mail'];
        }
        else{
            $error = true;
        }

        if (isset($_POST['userName'])) {
            $userName = $_POST['userName'];
        }
        else{
            $error = true;
        }

        if (isset($_POST['surnames'])) {
            $surnames = $_POST['surnames'];
        }
        else{
            $error = true;
        }

        if (isset($_POST['password'])) {
            $password = $_POST['password'];
        }
        else{
            $error = true;
        }


        if($error=true){
        }
        else{
            $resultados= $conexion->query('INSERT INTO aecProyecto_user VALUES("'.$mail.'", "'.$userName.'", "'.$surnames.'","'.$password.'","'.false.'")');
            $resultados= $conexion->query('SELECT * FROM aecProyecto_user ');
            foreach ($resultados as $fila){
                echo $fila['mail'] ." - ".$fila['userName']." - ".$fila['surnames']." - ".$fila['password']." - ".$fila['isAdmin'];
            }
        }

        ?>

