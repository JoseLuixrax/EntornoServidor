<?php
    session_start();
    $_SESSION['usuario'] = '';
    $_SESSION['psw'] = '';
    $_SESSION['perfil'] = 'invitado';
    header('Location: index.php');
?>
