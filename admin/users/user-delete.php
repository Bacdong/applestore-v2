<?php
    require_once('../../public/connection.php');
    $id = $_GET['user'];
    $query = 'DELETE FROM users WHERE id='.$id;
    $status = $connection->query($query);
    if($status == true) {
        setcookie('msg','Deleted Successful!',time()+1);
        header('Location: users.php');
    } else {
        setcookie('msg','Delete Failed!',time()+1);
        header('Location: users.php');
    }
?>