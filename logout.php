<?php
    ob_start();
    session_start();
    session_destroy();
    setcookie('msg', 'You have been logged out!',time()+1);
    header('Location: index.php');
    ob_end_flush();
?>