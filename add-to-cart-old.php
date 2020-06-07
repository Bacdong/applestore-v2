<?php
    session_start();
    require_once('public/connection.php');
    date_default_timezone_set('Asia/Ho_Chi_Minh');

    $id = $_POST['id-product'];
    $name = $_POST['name-product'];
    $currentPrice = $_POST['price-product'];
    $quantity = $_POST['current-quantity'];
    $price = $currentPrice * $quantity;
    $created_at = date('Y-m-d H:i:s');
    // $image = $_POST['image'];
    $status = 1;
    // $order_id = 1;

    // query export item
    $query = "SELECT o.*, p.image FROM order_details o LEFT JOIN products p ON o.product_id = p.id";
    $result = $connection->query($query);
    $items = array();

    if ($result->fetch_assoc() == NULL) {
        $query_update = "INSERT INTO order_details(name, price, quantity, created_at, status, product_id) VALUES('".$name."', ".$price.", ".$quantity.", '".$created_at."', ".$status.", '".$id."')";
        $status_update = $connection->query($query_update);
        if ($status_update) {
            setcookie('msg', 'Product has been successfully added to the cart.', time()+1);
            Header('Location: cart.php');
        } else {
            setcookie('msg', 'There was an error adding the product. Please try again later.', time()+1);
            Header('Location: product_details.php?id='.$id);
        }
        // $query = "SELECT o.*, p.image FROM order_details o LEFT JOIN products p ON o.product_id = p.id";
        // $result = $connection->query($query);
        // $items = array(); 
        // while ($row = $result->fetch_assoc()) {
        //     $items[] = $row;
        // }
    } else {
        while ($row = $result->fetch_assoc()) {
            $items[] = $row;
        }
    
        foreach ($items as $item) {
            if ($item['product_id'] == $id) {
                $quantity_update = $quantity + $item['quantity'];
                // echo $quantity_update; die;
                $price_update = $price + $item['price'];
                $query_update = "UPDATE order_details SET quantity = '".$quantity_update."', price = '".$price_update."' WHERE product_id = '".$id."' AND id =".$item['id'];
                $status_update = $connection->query($query_update);
                if ($status_update) {
                    setcookie('msg', 'Product has been successfully added to the cart.', time()+1);
                    Header('Location: cart.php');
                } else {
                    setcookie('msg', 'There was an error adding the product. Please try again later.', time()+1);
                    Header('Location: product_details.php?id='.$id);
                }
                // die($query_update);
            } else {
                $query_update = "INSERT INTO order_details(name, price, quantity, created_at, status, product_id) VALUES('".$name."', ".$price.", ".$quantity.", '".$created_at."', ".$status.", '".$id."')";
                $status_update = $connection->query($query_update);
                if ($status_update) {
                    setcookie('msg', 'Product has been successfully added to the cart.', time()+1);
                    Header('Location: cart.php');
                } else {
                    setcookie('msg', 'There was an error adding the product. Please try again later.', time()+1);
                    Header('Location: product_details.php?id='.$id);
                }
                // die($query_update);
            }
        }
    }
?>