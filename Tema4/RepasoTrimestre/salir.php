<?php
    session_start();
    $_SESSION['rol'] = 'INVITADO';
    header('Location: index.php');
?>
