<?php
    session_start();
    // session_destroy();die;
    require_once('public/connection.php');
    date_default_timezone_set('Asia/Ho_Chi_Minh');

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case "add":
                foreach ($_POST['current-quantity'] as $id => $quantity) {
                    $_SESSION['cart'][$id] = $quantity;
                }
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
                            <form action="cart.php">
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
                            </form>
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