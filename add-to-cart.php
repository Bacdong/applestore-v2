<?php
    require_once('public/connection.php');

    $id = $_GET['id-product'];

    $currentQuantity = $_GET['current-quantity'];

    echo 'Ma san pham: '.$id.'<br/>';
    echo 'So luong: '.$currentQuantity; die;
?>