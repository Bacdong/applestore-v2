<?php
    require_once('../../public/connection.php');
    $id = $_GET['id'];
    $query = "DELETE FROM products WHERE id =".$id;
    $status = $connection->query($query);
    if($status == true) {
        setcookie('msg','Deleted Successfull!',time()+1);
        header('Location: admin.php');
    } else {
        setcookie('msg','Delete Failed!',time()+1);
        header('Location: admin.php');
    }
?>