<?php
    require_once('public/connection.php');
    $id = $_GET['id'];
    $query_details_product = 'SELECT p.id, p.name, p.price, p.image, p.status, d.Screen, d.Operating_System, d.Front_Camera, d.Rear_Camera, d.CPU, d.RAM, d.ROM, d.MicroUSB, d.Battery, d.Size, c.title, c.description 
    FROM products p LEFT JOIN details d ON p.id = d.product_id LEFT JOIN categories c ON p.category_id = c.id
    WHERE p.status = 1 and p.id ='.$id;
    $result_details_product = $connection->query($query_details_product);
    $details_product = $result_details_product->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?=$details_product['name'];?></title>
        <?php require_once('public/head.php'); ?>

        <style>
            form#form-add-to-cart {
                width: 100%;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            input.active-quantity__decrease,
            input.active-quantity__increase {
                flex: 1;
                width: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                cursor: pointer;
                background: none;
                position: relative;
                font-size: 20px;
                font-weight: 500;
                color: #333;
            }

            input.active-quantity__decrease:hover,
            input.active-quantity__increase:hover {
                box-shadow: 0 1px 4px rgba(0, 0, 0, 0.4) ;
                background-color: #fafafa;
                transition: all ease 0.2s;
            }

            input.active-quantity__decrease:active,
            input.active-quantity__increase:active {
                background-color: #e5e5e5;
            }

            /* input.active-quantity__decrease ~ svg,
            input.active-quantity__increase ~ svg {
                width: 1rem;
                color: rgba(0, 0, 0, 0.5);
                position: absolute;
                z-index: 3;
                top: 10px;
            } */
        </style>
    </head>

    <body>
        <!-- header -->
        <?php require_once('public/header.php'); ?>
        <!-- /header -->

        <!-- main -->
        <section class="container-main grid">
            <section class="main-product grid wide c-12 l-12 m-12">
                <section class="main-product__img row wide c-11 l-5 m-12">
                    <img src="<?=$details_product['image'];?>" alt="">
                </section>

                <section class="main-product__details row wide c-12 l-5 m-12">
                    <h6 class="title-category"><?=$details_product['description'];?></h6>
                    <h4 class="single-product-name"><?=$details_product['name'];?></h4>
                    <span class="single-product-price"><?php echo '$'.$details_product['price'];?></span>
                    <div class="single-product-details__container">
                        <ul class="single-product-details details-title" id="details-title">
                            <li class="single-product-details__item item-title">Screen:</li>
                            <li class="single-product-details__item item-title">Operating System:</li>
                            <li class="single-product-details__item item-title">Front Camera:</li>
                            <li class="single-product-details__item item-title">Rear Camera:</li>
                            <li class="single-product-details__item item-title">CPU:</li>
                            <li class="single-product-details__item item-title">RAM:</li>
                            <li class="single-product-details__item item-title">ROM:</li>
                            <li class="single-product-details__item item-title">MicroUSB:</li>
                            <li class="single-product-details__item item-title">Battery:</li>
                            <li class="single-product-details__item item-title">Size:</li>
                        </ul>
                        <ul class="single-product-details details-description" id="details-description">
                            <li class="single-product-details__item"><?=$details_product['Screen'];?></li>
                            <li class="single-product-details__item"><?=$details_product['Operating_System'];?></li>
                            <li class="single-product-details__item"><?=$details_product['Front_Camera'];?></li>
                            <li class="single-product-details__item"><?=$details_product['Rear_Camera'];?></li>
                            <li class="single-product-details__item"><?=$details_product['CPU'];?></li>
                            <li class="single-product-details__item"><?=$details_product['RAM'];?></li>
                            <li class="single-product-details__item"><?=$details_product['ROM'];?></li>
                            <li class="single-product-details__item"><?=$details_product['MicroUSB'];?></li>
                            <li class="single-product-details__item"><?=$details_product['Battery'];?></li>
                            <li class="single-product-details__item"><?=$details_product['Size'];?></li>
                        </ul>
                    </div>
                    
                    <div class="single-product-active">
                        <form action="cart.php?action=add" method="POST" id="form-add-to-cart">
                            <div class="active-quantity">
                                <div class="quantity-current">
                                    <span class="active-name">Quantity: </span>
                                    <input name="current-quantity[<?=$id;?>]" type="text" id="input_quantity" pattern="[0-9]*" value="1">
                                </div>
                                <div class="quantity">
                                    <input value="+" type="button" onclick="quantityUp();" class="active-quantity__increase" />
                                    <!-- <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-up" class="svg-inline--fa fa-chevron-up fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path fill="currentColor" d="M240.971 130.524l194.343 194.343c9.373 9.373 9.373 24.569 0 33.941l-22.667 22.667c-9.357 9.357-24.522 9.375-33.901.04L224 227.495 69.255 381.516c-9.379 9.335-24.544 9.317-33.901-.04l-22.667-22.667c-9.373-9.373-9.373-24.569 0-33.941L207.03 130.525c9.372-9.373 24.568-9.373 33.941-.001z"></path>
                                    </svg> -->
                                    <input value="-" type="button" onclick="quantityDown();" class="active-quantity__decrease" />
                                    <!-- <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" class="svg-inline--fa fa-chevron-down fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path>
                                    </svg> -->
                                </div>
                            </div>
                            <button class="active-add-to-cart">Add to Cart</button>
                        </form>
                    </div>
                </section>
            </section>
        </section>
        <!-- /main -->

        <!-- footer -->
        <?php require_once('public/footer.php'); ?>
        <!-- /footer -->

        <!-- main javascript -->
        <script src="assets/js/javascript.js"></script>
        <!-- /main javascript -->
    </body>
</html>