<?php
    // session_start();
    require_once('public/connection.php');
    date_default_timezone_set('Asia/Ho_Chi_Minh');

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // if (isset($_GET['action']) && $_GET['action'] == 'add') {
    //     foreach ($_POST['current-quantity'] as $id => $quantity) {
    //         $_SESSION['cart'][$id] = $quantity;
    //     }
    // }

    // foreach ($_POST['current-quantity'] as $id => $quantity) {
    //     $_SESSION['cart'][$id] = $quantity;
    // }

    if (!empty($_SESSION['cart'])) {
        $condition_query = implode(',', array_keys($_SESSION['cart']));
        // echo $condition_query; die;
        $query = "SELECT * FROM products WHERE id IN(".$condition_query.")";
        $result = $connection->query($query);
        $items = array();
        while ($row = $result->fetch_assoc()) {
            $items[] = $row;
        }
    }
    // Header('Location: cart.php');
?>