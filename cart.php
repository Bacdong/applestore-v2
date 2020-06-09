<?php
    session_start();
    // session_destroy();
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

    foreach ($_POST['current-quantity'] as $id => $quantity) {
        $_SESSION['cart'][$id] = $quantity;
    }

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
        </style>
    </head>
    
    <body>
        <!-- Header -->
        <?php require_once('public/header.php'); ?>
        <!-- /Header -->

        <section class="main-cart grid">
            <section class="main-cart__container grid wide">
                <section class="main-cart__container-title">
                    <h4 class="title">Your Cart</h4>
                </section>
                
                <section class="main-cart__container-body">
                    <section class="main-cart__left l-8">
                        <section class="main-cart__table">
                            <table class="table-list">
                                <thead class="table-list_heading">
                                    <th class="heading-title">Image</th>
                                    <th class="heading-title">Name</th>
                                    <th class="heading-title">Quantity</th>
                                    <th class="heading-title">Price</th>
                                </thead>
        
                                <tbody class="table-list__body">
                                    <?php 
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
                                        <td class="table-list__body-column">$<?php echo number_format($item['price'] * $_SESSION['cart'][$id]);?></td>
                                        <?php $subtotal += $item['price'] * $_SESSION['cart'][$id];?>
                                    </tr>
                                    <!-- /row -->
                                    <?php } ?>
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
                                    <span class="main-cart__right-item-span">$<?php echo number_format($subtotal);?></span>
                                </li>
                                <li class="main-cart__right-item">
                                    Delivery (5%): 
                                    <span class="main-cart__right-item-span">$<?php echo number_format($subtotal * 0.05)?></span>
                                </li>
                                <li class="main-cart__right-item">
                                    Total: 
                                    <span class="main-cart__right-item-span">$<?php echo number_format($subtotal + ($subtotal * 0.05));?></span>
                                </li>
                            </ul>
                        </div>

                        <div class="main-cart__right-active">
                            <button class="btn-checkout">CHECKOUT</button>
                        </div>
                    </section>
                </section>
            </section>
        </section>

        <!-- Footer -->
        <?php require_once('public/footer.php'); ?>
        <!-- /Footer -->
    </body>
</html>