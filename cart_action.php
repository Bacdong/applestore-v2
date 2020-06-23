<?php
    session_start();
    require_once('public/connection.php');
    date_default_timezone_set('Asia/Ho_Chi_Minh');

    if (isset($_SESSION['isLogin']) && !empty($_SESSION['author'])) {

        $userID = $_SESSION['author']['id'];
        $created_at = date('Y-m-d H:i:s');

        if (isset($_SESSION['cart'])) {
            $condition_query = implode(',', array_keys($_SESSION['cart']));
            $query = "SELECT * FROM products WHERE id IN(".$condition_query.")";
            $result = $connection->query($query);
            $items = array();
            while ($row = $result->fetch_assoc()) {
                $items[] = $row;
            }
            
            $totalPrice = 0;
            foreach ($items as $item) {
                $totalPrice += $item['price'] * $_SESSION['cart'][$item['id']];
            }
            $totalPrice += ($totalPrice * 0.05);

            $query = "INSERT INTO orders(user_id, totalPrice, created_at) VALUES('".$userID."', '".$totalPrice."', '".$created_at."')";
            $result = $connection->query($query);
            $orderID = $connection->insert_id;
            
            if ($result) {
                $valueInsert = "";
                $arrLen = count($items);
                $count = 0;
                foreach ($items as $item) {
                    $valueInsert .= "('".$item['name']."', '".$item['price']."', '".$_SESSION['cart'][$item['id']]."', '".$created_at."', '".$orderID."', '".$item['id']."')";
                    if ($count != ($arrLen - 1)) {
                        $valueInsert .= ", ";
                    }
                    $count++;
                }

                $qry = "INSERT INTO order_details(name, price, quantity, created_at, order_id, product_id) VALUES ".$valueInsert."";
                $rs = $connection->query($qry);

                if ($rs) {
                    unset($_SESSION['cart']);
                    setcookie('msg', 'Order Success!', time() + 1);
                    header('Location: cart.php');
                } else {
                    setcookie('msg', 'Order Failed!', time() + 1);
                    header('Location: cart.php');
                }
            } else {
                setcookie('msg', 'Order Failed!', time() + 1);
                header('Location: cart.php');
            }
        }
    } else {
        setcookie('msg', 'Sign in to pay!', time() + 1);
        header('Location: cart.php');
    }
?>