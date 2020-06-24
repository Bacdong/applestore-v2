<?php

    // CRUD
    // C: Create New
    // R: Read Data
    // U: Update
    // Destroy/Delete

    // phpinfo(); die;
    session_start();
    require_once('public/connection.php');
    //import query
    require_once('public/query/query_index.php');

    // pagination
    if(!empty($_GET['cate'])) {
        $currentCate = $_GET['cate'];
    } else {
        // $currentCate = 0; 
        $currentCate = 0; 
    }

    $item_in_page = !empty($_GET['item']) ? $_GET['item'] : 8;
    $current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($current_page - 1) * $item_in_page;

    if(!empty($_GET['cate']) && $_GET['cate'] == 1) {
        $query = "SELECT * FROM products p WHERE p.category_id = 1 and p.status = 1  limit ".$offset.",".$item_in_page;
        $result = $connection->query($query);
        $productsAll = array();
        while($row = $result->fetch_assoc()) {
            $productsAll[] = $row;
        }

        $query = 'SELECT COUNT(*) as totalRecord FROM products WHERE status = 1 and category_id = 1;';
        $result =  $connection->query($query)->fetch_assoc();
        $pageTotal = ceil($result['totalRecord'] / $item_in_page);

    } else if(!empty($_GET['cate']) && $_GET['cate'] == 2) {
        $query = "SELECT * FROM products p WHERE p.category_id = 2 and p.status = 1  limit ".$offset.",".$item_in_page;
        $result = $connection->query($query);
        $productsAll = array();
        while($row = $result->fetch_assoc()) {
            $productsAll[] = $row;
        }

        $query = 'SELECT COUNT(*) as totalRecord FROM products WHERE status = 1 and category_id = 2;';
        $result =  $connection->query($query)->fetch_assoc();
        $pageTotal = ceil($result['totalRecord'] / $item_in_page);

    } else if(!empty($_GET['cate']) && $_GET['cate'] == 3) {
        $query = "SELECT * FROM products p WHERE p.category_id = 3 and p.status = 1  limit ".$offset.",".$item_in_page;
        $result = $connection->query($query);
        $productsAll = array();
        while($row = $result->fetch_assoc()) {
            $productsAll[] = $row;
        }

        $query = 'SELECT COUNT(*) as totalRecord FROM products WHERE status = 1 and category_id = 3;';
        $result =  $connection->query($query)->fetch_assoc();
        $pageTotal = ceil($result['totalRecord'] / $item_in_page);

    } else if(!empty($_GET['cate']) && $_GET['cate'] == 4) {
        $query = "SELECT * FROM products p WHERE p.category_id = 4 and p.status = 1  limit ".$offset.",".$item_in_page;
        $result = $connection->query($query);
        $productsAll = array();
        while($row = $result->fetch_assoc()) {
            $productsAll[] = $row;
        }

        $query = 'SELECT COUNT(*) as totalRecord FROM products WHERE status = 1 and category_id = 4;';
        $result =  $connection->query($query)->fetch_assoc();
        $pageTotal = ceil($result['totalRecord'] / $item_in_page);

    } else {
        if (!empty($_GET['input-search'])) {
            $nameSearch = $_GET['input-search'];
            $query = "SELECT * FROM products WHERE status = 1 and name LIKE '%".$nameSearch."%'";
            $result = $connection->query($query);
            $productsAll = array();
            
            if ($result->fetch_assoc() != NULL) {
                while($row = $result->fetch_assoc()) {
                    $productsAll[] = $row;
                }
                // $query = "SELECT COUNT(*) as totalRecord FROM products WHERE status = 1 and name LIKE '%".$nameSearch."%' limit ".$offset.",".$item_in_page;
                $query = "SELECT COUNT(*) as totalRecord FROM products WHERE status = 1 and name LIKE '%".$nameSearch."%'";
                $result =  $connection->query($query)->fetch_assoc();
                $pageTotal = ceil($result['totalRecord'] / $result['totalRecord']);
            } else {
                setcookie('msg', 'Product search is not find!', time()+1);
                $query = "SELECT * FROM products WHERE status = 1 limit ".$offset.",".$item_in_page;
                $result = $connection->query($query);
                $productsAll = array();
                while($row = $result->fetch_assoc()) {
                    $productsAll[] = $row;
                }

                $query = 'SELECT COUNT(*) as totalRecord FROM products WHERE status = 1;';
                $result =  $connection->query($query)->fetch_assoc();
                $pageTotal = ceil($result['totalRecord'] / $item_in_page);
                
            }
            

        } else {
            $query = "SELECT * FROM products WHERE status = 1 limit ".$offset.",".$item_in_page;
            $result = $connection->query($query);
            $productsAll = array();
            while($row = $result->fetch_assoc()) {
                $productsAll[] = $row;
            }

            $query = 'SELECT COUNT(*) as totalRecord FROM products WHERE status = 1;';
            $result =  $connection->query($query)->fetch_assoc();
            $pageTotal = ceil($result['totalRecord'] / $item_in_page);
        }
    }
    // pagination - end
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Apple Store | Home</title>
        <?php require_once('public/head.php'); ?>

        <style>
            div.alert.succes {
                position: fixed;
                position: relative;
                z-index: 11;
                top: 10px;
                left: 10px;
                right: 10px;
                bottom: 10px;
                height: 80px;
                background-color: #27805A;
                width: 100%;
            }

            a.pagination-item__link.active {
                border: 1px solid #7bb6f7;
            }

            section.go-to-top {
                display: none;
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

        <!-- header -->
        <?php require_once('public/header.php'); ?>
        <!-- /header -->

        <!-- main search -->
        <section class="main-search grid wide c-12 l-12 m-12" style="background-color: var(--white-color); position: fixed !important; position: sticky; z-index: 5; left: 0; right: 0; margin-bottom: 6rem">
            <form action="" method="GET"class="main-search__form c-12 l-12 m-12">
                <input name="input-search" value="" type="text" placeholder="Enter your search..." id="form-input__search" class="form-input l-10 m-10 c-8">
                <button class="form-button l-2 m-2 c-3" id="form-button__search">Search</button>
            </form>
        </section>
        <!-- /main search -->

        <!-- main container products -->
        <section id="gototop" class="main">
            <!-- latest products -->
            <section class="main-container grid wide l-12" style="margin-top: 8rem">
                <h4 class="latest-product__title">Latest Products</h4>
                <section class="main-container__latest-product grid wide row c-12">
                    <!-- row -->
                    <section class="container wide row c-12" style="flex-wrap: nowrap; overflow-x: scroll;">
                        
                        <?php
                            $i = 1;
                            foreach($latest_products as $late_product) {
                        ?>
                        <!-- column -->
                        <a href="product-details.php?id=<?=$late_product['id'];?>" class="container-column col c-12 l-3 m-4">
                            <div class="products-sale">
                                <h4 class="title-sale">New Product</h4>
                            </div>
                            <div class="container-product cate-<?=$i;?>">
                                <img src="<?=$late_product['image'];?>" alt="">
                                <div class="container-products__banner">
                                    <h2 class="products-banner__title"><?=$late_product['title'];?></h2>
                                    <p class="banner-title__description"><?=$late_product['description'];?></p>
                                </div>
                            </div>
                            <div class="btn-show-detail">
                                <button class="btn-detail-product">Detail</button>
                            </div>
                            <div class="products-description">
                                <h3 class="products-name"><?=$late_product['name'];?></h3>
                                <span class="products-price"><?php echo '$'.number_format($late_product['price']);?></span>
                            </div>
                        </a>
                        <!-- /column -->
                        <?php $i++; } ?>
                    
                    </section>
                    <!-- /row -->
                </section>
            </section>
            <!-- /latest products -->

            <!-- products-->
            <section class="main-container main-container__products grid wide">
                <section class="main-container__title-trademark grid wide c-12 l-12 m-12">
                    <section class="title-products background-cate-1 c-2 l-2 m-2">
                        <h4 id="iphone" class="latest-product__title title-name" style="font-family: var(--font-default);">Shop List</h4>
                    </section>
                </section>
                
                <section class="main-container__latest-product grid wide">
                    <!-- row -->
                    <section class="container wide row c-12">
                        
                        <?php
                            $i = 1;
                            foreach ($productsAll as $product) {
                        ?>
                        <!-- column -->
                        <a href="product-details.php?id=<?=$product['id'];?>" class="container-column col c-12 l-3 m-4">
                            <div class="container-product cate-<?=$i?>">
                                <img src="<?=$product['image'];?>" alt="">
                                <!-- <div class="container-products__banner">
                                    <h2 class="products-banner__title">iPhone</h2>
                                    <p class="banner-title__description">Own, experience great moments.</p>
                                </div> -->
                            </div>
                            <div class="btn-show-detail">
                                <button class="btn-detail-product">Detail</button>
                            </div>
                            <div class="products-description">
                                <h3 class="products-name"><?=$product['name'];?></h3>
                                <span class="products-price"><?php echo '$'.$product['price'];?></span>
                            </div>
                        </a>
                        <!-- /column -->
                        <?php $i++; } ?>
                    
                    </section>
                    <!-- /row -->

                    <!-- pagination -->
                    <?php require_once('public/pagination.php');?>
                    <!-- /pagination -->
                </section>
            </section>
            <!-- /products-->

        </section>
        <!-- /main container products -->

        <!-- footer -->
        <?php require_once('public/footer.php'); ?>
        <!-- /footer -->

        <!-- go to top -->
        <?php require_once('public/gototop.php'); ?>
        <!-- /go to top -->

        <!-- main javascript -->
        <script src="assets/js/javascript.js"></script>
        <script src="assets/js/gototop.js"></script>
        <!-- /main javascript -->
    </body>
</html>