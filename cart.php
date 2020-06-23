<?php
    session_start();
    // session_destroy();die;
    require_once('public/connection.php');
    date_default_timezone_set('Asia/Ho_Chi_Minh');

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    if (isset($_GET['action'])) {
        function updateCart($add = false) {
            foreach ($_POST['current-quantity'] as $id => $quantity) {
                if ($quantity == 0) {
                    unset($_SESSION['cart'][$id]);
                } else {
                    if ($add) {
                        $_SESSION['cart'][$id] += $quantity;
                    } else {
                        $_SESSION['cart'][$id] = $quantity;
                    }
                }
            }
        }

        switch ($_GET['action']) {
            case "add":
                updateCart(true);
                break;

            case "delete":
                if (isset($_GET['id'])) {
                    $removeID = $_GET['id'];
                    // var_dump($_SESSION['cart']);
                    // echo $_GET['id']; die;
                    unset($_SESSION['cart'][$removeID]);
                }
                header('Location: cart.php');
                break;
        }
    }

    if (!empty($_SESSION['cart'])) {
            
        // echo '<pre>';
        // var_dump($_SESSION['cart']);
        // echo '</pre>'; die;

        $condition_query = implode(',', array_keys($_SESSION['cart']));
        // echo $condition_query; die;
        $query = "SELECT * FROM products WHERE id IN(".$condition_query.")";
        $result = $connection->query($query);
        $items = array();
        while ($row = $result->fetch_assoc()) {
            $items[] = $row;
        }
    }

    // Show list ordered
    if (isset($_SESSION['author'])) {
        $user_id = $_SESSION['author']['id'];
        $qry = "SELECT o.totalPrice, od.* FROM orders o LEFT JOIN order_details od ON o.id = od.order_id WHERE o.user_id =".$user_id;
        $rs = $connection->query($qry);
        $ordereds = array();
        while ($row = $rs->fetch_assoc()) {
            $ordereds[] = $row;
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require_once('public/head.php'); ?>
        <link rel="stylesheet" href="assets/css/cart.css">
        <title>Apple Store | Your Cart</title>

        <style>
            section.main-cart.grid {
                padding-bottom: 100px;
            }

            tr,td {
                border-bottom: 1px solid #f5f7fa;
            }

            tbody:last-child {
                border-bottom: 1px solid #fff;
            }

            .price {
                color: #4BB92F;
            }

            a.btn-remove {
                text-decoration: none;
                color: red;
                font-size: 18px;
            }

            a.btn-remove:hover {
                text-decoration: underline;
                opacity: 0.7;
            }

            .list-ordered {
                width: 100%;
                border: 1px solid #dbdbdb;
                border-radius: 20px;
                margin-bottom: 20px;
            }

            h4 {
                font-size: 20px;
                color: #444;
                font-weight: normal;
            }

            span.total-price-ordered {
                font-size: 20px;
                color: red;
                padding-left: 16px;
            }

            .card-ordered {
                width: 100%;
                min-height: 80px;
                padding: 20px;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .card-ordered span {
                font-size: 18px;
            }

            span.price-ordered,
            span.total-ordered {
                color: red;
            }
        </style>
    </head>
    
    <body>
        <?php if(isset($_COOKIE['msg'])) { ?>
            <!-- alert -->
            <div class="alert success" style="display: flex; justify-content: center; position: fixed; position: absolute; z-index: 11; top: 0; left: 0; right: 0; height: 80px; background-color: transparent; width: 100%;">
                <div class="notification" style="width: 420px; max-width: 100%; height: 100%; background-color: rgb(168, 228, 182); box-shadow: 0 1px 10px rgba(0, 0, 0, 0.3); border-radius: 8px; font-size: 17px; letter-spacing: 0.8px; display: flex; justify-content: center; align-items: center">
                    <strong>Notification! </strong> &nbsp; <?php echo $_COOKIE['msg'];?>
                </div>
            </div>
            <!-- /alert -->
        <?php } ?>

        <!-- Header -->
        <?php require_once('public/header.php'); ?>
        <!-- /Header -->

        <section class="main-cart grid">
            <section class="main-cart__container grid wide">
                <section class="main-cart__container-title">
                    <h4 class="title">Your Cart</h4>
                </section>
                
                <form action="cart_action.php" method="POST">
                    <section class="main-cart__container-body">
                        <section class="main-cart__left l-8">
                            <section class="main-cart__table">
                                <?php 
                                    if (isset($_SESSION['author'])) {
                                ?>
                                    <div class="list-ordered">
                                        <?php 
                                            $i = 1;
                                            foreach ($ordereds as $order) {
                                        ?>
                                            <div class="card-ordered">
                                                <span class="stt"><?=$i;?></span>
                                                <span class="name-ordered"><?=$order['name'];?></span>
                                                <span class="price-ordered"><?php echo '$'.number_format($order['price']);?></span>
                                                <span class="icon-multi">X</span>
                                                <span class="qty-ordered"><?=$order['quantity'];?></span>
                                                <span class="total-ordered"><?php echo '$'.number_format($order['price'] * $order['quantity']);?></span>
                                            </div>
                                        <?php
                                                $i++; 
                                            }
                                        ?>
                                        <div class="card-ordered">
                                            <h4>Total: <span class="total-price-ordered"><?=$order['totalPrice'];?></span></h4>
                                            <span class="status-ordered">Unconfirm</span>
                                        </div>
                                        
                                    </div>
                                <?php } ?>

                                <table class="table-list">
                                    <thead class="table-list_heading">
                                        <th class="heading-title">Image</th>
                                        <th class="heading-title">Name</th>
                                        <th class="heading-title">Quantity</th>
                                        <th class="heading-title">Price</th>
                                        <th class="heading-title">Active</th>
                                    </thead>
            
                                    <tbody class="table-list__body">
                                        <?php 
                                            if (!empty($_SESSION['cart'])) {
                                                $subtotal = 0;
                                                foreach ($items as $item) {
                                        ?>
                                        <!-- row -->
                                        <tr class="table-list__body-row">
                                            <td class="table-list__body-column">
                                                <img src="<?=$item['image'];?>" alt="">
                                            </td>
                                            <td class="table-list__body-column"><?=$item['name'];?></td>
                                            <td class="table-list__body-column">
                                                <button class="btn-quantity" id="btn-quantity-down">-</button>
                                                <input type="number" min="0" class="input-quantity" value="<?=$_SESSION['cart'][$item['id']];?>" name="">
                                                <button class="btn-quantity" id="btn-quantity-up">+</button>
                                            </td>
                                            <td class="table-list__body-column price">$<?php echo number_format($item['price'] * $_SESSION['cart'][$item['id']]);?></td>
                                            <td class="table-list__body-column">
                                                <a href="cart.php?action=delete&id=<?=$item['id'];?>" class="btn-remove">Remove</a>
                                            </td>
                                            <?php $subtotal += $item['price'] * $_SESSION['cart'][$item['id']];?>
                                        </tr>
                                        <!-- /row -->
                                        <?php
                                                } 
                                            } else {
                                                echo '<tr class="table-list__body-row">';
                                                echo '<td class="table-list__body-column" colspan="5">Your cart is empty!</td>';  
                                                echo '</tr>';  
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </section>
                        </section>
                        
                        <section class="main-cart__right c-12 l-3 m-3">
                            <div class="main-cart__right-top">
                                <h4 class="main-cart__right-title">Cart Total</h4>
            
                                <ul class="main-cart__right-list">
                                    <li class="main-cart__right-item">
                                        Subtotal: 
                                        <span class="main-cart__right-item-span">$
                                            <?php 
                                                if (!empty($subtotal)) {
                                                    echo number_format($subtotal);
                                                } else {
                                                    echo '0';
                                                }
                                            ?>
                                        </span>
                                    </li>
                                    <li class="main-cart__right-item">
                                        Delivery (5%): 
                                        <span class="main-cart__right-item-span">$
                                            <?php 
                                                if (!empty($subtotal)) {
                                                    echo number_format($subtotal * 0.05);
                                                } else {
                                                    echo '0';
                                                }
                                            ?>
                                        </span>
                                    </li>
                                    <li class="main-cart__right-item">
                                        Total: 
                                        <span class="main-cart__right-item-span">$
                                            <?php 
                                                if (!empty($subtotal)) {
                                                    echo number_format($subtotal + ($subtotal * 0.05));
                                                } else {
                                                    echo '0';
                                                }
                                            ?>
                                        </span>
                                    </li>
                                </ul>
                            </div>

                            <div class="main-cart__right-active">
                                <button type="submit" class="btn-checkout">CHECKOUT</button>
                            </div>
                        </section>
                    </section>
                </form>
            </section>
        </section>

        <!-- Footer -->
        <?php require_once('public/footer.php'); ?>
        <!-- /Footer -->
    </body>
</html>