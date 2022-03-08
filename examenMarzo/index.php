<?php
include ("./Config/config.php");
include ("./Models/Eventos.php");
include ("./Models/Usuario.php");
include ("./Models/perfiles.php");
include ("./Models/categoria.php");
session_start();

if(isset($_POST['registrarse'])){
    $usuario = Usuario::getInstancia();
    $usuarios=$usuario->getAll();
    //Comprobar que no existe correo en la base de datos de usuarios
    $existeCorreo=false;
    foreach($usuarios as $usuario){
        if($usuario['email']==$_POST['email']){
            $existeCorreo=true;
        }
    }
    if($existeCorreo){
        echo "El correo ya existe en la base de datos";
    }else{
        $perfil = new perfiles();
        $usuario->set(array(
            'usuario' => $_POST['usuario'],
            'password' => $_POST['password'],
            'email' => $_POST['email'],
            'perfiles_perfil' => "cliente"
        ));
    }
}

//Si han pasado 60 segundos, borrar la cookie 
//Este codigo me peta, pero mi idea es eliminar la cookie cuando hayan pasado 60 segundos y mostrar el formulario de login
// if(isset($_COOKIE['ErrorInicio'])){
    // if((time()-$_COOKIE['ErrorInicio'])>60){
        // setcookie('ErrorInicio', null, time()-60);
    // }
    // $ocultarForm=false;
// }

if(isset($_POST['inicioSesion'])){
    $usuario = Usuario::getInstancia();
    $usuarios=$usuario->comprobarDatos(array(
        'email' => $_POST['email'],
        'password' => $_POST['password']
    ));

    if(count($usuarios)==0){
        setcookie("ErrorInicio", "IntentoFallido", time()+60);
        $ocultarForm=true;
    }else{
        $_SESSION['usuario']=$usuarios[0]['usuario'];
        $_SESSION['email']=$usuarios[0]['email'];
        $_SESSION['perfil']=$usuarios[0]['perfiles_perfil'];
        $_SESSION['id']=$usuarios[0]['id'];
        header("Location: infoPersonal.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Gestor de eventos</title>
</head>
<body>
    <h1>Página de inicio</h1>
    <nav>
        <?php
            if(isset($_SESSION['perfil'])){
                if($_SESSION['perfil']=="productor"){
                    echo "<a href='home.php'>Home</a>";
                    echo "<a href='infoPersonal.php'>Mi perfil</a>";
                    echo "<a href='crearEventos.php'>Crear evento</a>";
                    echo "<a href='cerrarsesion.php'>Cerrar sesión</a>";
                }else{
                    echo "<a href='home.php'>Home</a>";
                    echo "<a href='infoPersonal.php'>Mi perfil</a>";
                    echo "<a href='compraEntradas.php'>Comprar entradas</a>";
                    echo "<a href=tramitarEntradas.php>Tramitar compras</a>";
                    echo "<a href='cerrarsesion.php'>Cerrar sesión</a>";
                }
            }else {
                echo "No posees acceso a la web";
            }
        ?>
    </nav>
    <main>
        <?php
            if(!isset($_SESSION['usuario'])){
                if($ocultarForm){
                    echo "<p>Has intentado acceder demasiadas veces, por favor espera un minuto para volver a intentarlo</p>";
                }else{
                    echo "<form class=formRegistro action='index.php' method='post'>";
                    echo "<label for='usuario'>Usuario: </label>";
                    echo "<input type='text' name='usuario' id='usuario' required>";
                    echo "<label for='email'>Email: </label>";
                    echo "<input type='text' name='email' required>";
                    echo "<label for='password'>Contraseña: </label>";
                    echo "<input type='password' name='password' required>";
                    echo "<label for='password2'>Repetir contraseña: </label>";
                    echo "<input type='password' name='password2' id='password2' required>";
                    echo "<input type='submit' name='registrarse' value='Registrarse'>";
                    echo "</form>";
    
                    echo "<br>";
    
                    echo "<form class=formRegistro action='index.php' method='post'>";
                    echo "<label for='email'>Email: </label>";
                    echo "<input type='text' name='email' required>";
                    echo "<label for='password'>Contraseña: </label>";
                    echo "<input type='password' name='password' required>";
                    echo "<input type='submit' name='inicioSesion' value='Iniciar sesion'>";
                    echo "</form>";
                }
                
            }else{
                echo "<h2>Bienvenido ".$_SESSION['usuario']."</h2>";
            }
            
        ?>
    </main>
</body>
</html>