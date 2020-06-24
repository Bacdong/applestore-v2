<?php
    ob_start();
    session_start();
    
    if(!isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] != true) {
        setcookie('msg', 'Login Failed!', time()+1);
        header("Location: ../../login.php");
    }

    require_once('../../public/connection.php');

    // // search
    if(!empty($_GET['action']) && $_GET['action'] == 'search' && !empty($_POST)) {
        $name = $_POST['name'];
        $category = $_POST['category-search'];
        $query = "SELECT p.*, c.description, c.title FROM products p LEFT JOIN categories c ON p.category_id = c.id WHERE p.name LIKE '%".$name."%' AND c.title LIKE '%".$category."%';";
    } else {
        $query = "SELECT p.*, c.description, c.title FROM products p LEFT JOIN categories c ON p.category_id = c.id ORDER BY created_at desc;";
    }

    // $query = "SELECT p.*, c.description, c.title FROM products p LEFT JOIN categories c ON p.category_id = c.id ORDER BY created_at desc;";
    $result = $connection->query($query);
    $products = array();
    while($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    // query show categories add product
    $query_add = 'SELECT * FROM categories';
    $result_add = $connection->query($query_add);
    $categories = array();
    while($row = $result_add->fetch_assoc()) {
        $categories[] = $row;
    }


    ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Apple Store | Admin</title>
    <?php require_once('../head-admin.php'); ?>
    <style>
        a.delete-product {
            width: 100%;
            height: 100%;
            display: block;
            color: red;
            text-align: center;
        }

        a.delete-product:hover {
            opacity: 0.7;
        }

        a.delete-product svg {
            width: 26px;
            height: 26px;
        }

        div.status {
            height: 4rem;
            line-height: 4rem;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            flex-direction: row;
            margin-top: 1.2rem;
            padding: 0.6rem 0;
            width: 100%;
        }

        label.label-form.label-status {
            flex-basis: 80%;
            height: 4rem;
            line-height: 1.6rem;
            font-size: 1.8rem;
            font-weight: bold;
        }

        input.input.input-status {
            flex-basis: 20%;
            height: 3rem;
        }
    </style>
</head>
<body>
    <!-- header -->
    <?php require_once('../header-admin.php'); ?>
    <!-- /header -->

    <?php if(isset($_COOKIE['msg'])) { ?>
        <!-- Edit successfull -->
        <section class="alert success">
                <span>Notification!</span><?php echo ' '.$_COOKIE['msg'];?>
        </section>
    <?php } ?>

    <main class="container grid">
        <section class="container-main grid wide">
            <section class="container-product row">
                <section class="main-product c-12 l-7 m-12" style="justify-content: flex-start;">
                    <h4 class="product-title">Product List</h4>
                    <table border="1" class="table-product">
                        <thead class="table-head">
                            <th class="head-title">Order</th>
                            <th class="head-title img">Image</th>
                            <th class="head-title">Name</th>
                            <th class="head-title">Category</th>
                            <th class="head-title">Price</th>
                            <th class="head-title">Active</th>
                        </thead>

                        <tbody class="table-body">
                            <?php
                                $i = 1;
                                foreach($products as $product) { 
                            ?>
                                <tr class="table-row" onclick="location.href='product-details.php?id=<?=$product['id'];?>'">
                                    <td class="table-column"><?=$i;?></td>
                                    <td class="table-column img">
                                        <img src="../../<?=$product['image'];?>" alt="">
                                    </td>
                                    <td class="table-column"><?=$product['name'];?></td>
                                    <td class="table-column"><?=$product['description'];?></td>
                                    <td class="table-column price"><?php echo '$'.$product['price'];?></td>
                                    <td class="table-column active">
                                        <a title="Edit product" href="product-edit.php?id=<?=$product['id'];?>" class="edit-product">
                                            <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="edit" class="svg-inline--fa fa-edit fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                <path fill="currentColor" d="M402.3 344.9l32-32c5-5 13.7-1.5 13.7 5.7V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h273.5c7.1 0 10.7 8.6 5.7 13.7l-32 32c-1.5 1.5-3.5 2.3-5.7 2.3H48v352h352V350.5c0-2.1.8-4.1 2.3-5.6zm156.6-201.8L296.3 405.7l-90.4 10c-26.2 2.9-48.5-19.2-45.6-45.6l10-90.4L432.9 17.1c22.9-22.9 59.9-22.9 82.7 0l43.2 43.2c22.9 22.9 22.9 60 .1 82.8zM460.1 174L402 115.9 216.2 301.8l-7.3 65.3 65.3-7.3L460.1 174zm64.8-79.7l-43.2-43.2c-4.1-4.1-10.8-4.1-14.8 0L436 82l58.1 58.1 30.9-30.9c4-4.2 4-10.8-.1-14.9z"></path>
                                            </svg>
                                        </a>
                                        <a href="product-delete.php?id=<?=$product['id'];?>" title="Delete product" class="delete-product">
                                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="backspace" class="svg-inline--fa fa-backspace fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                                <path fill="currentColor" d="M576 64H205.26A63.97 63.97 0 0 0 160 82.75L9.37 233.37c-12.5 12.5-12.5 32.76 0 45.25L160 429.25c12 12 28.28 18.75 45.25 18.75H576c35.35 0 64-28.65 64-64V128c0-35.35-28.65-64-64-64zm-84.69 254.06c6.25 6.25 6.25 16.38 0 22.63l-22.62 22.62c-6.25 6.25-16.38 6.25-22.63 0L384 301.25l-62.06 62.06c-6.25 6.25-16.38 6.25-22.63 0l-22.62-22.62c-6.25-6.25-6.25-16.38 0-22.63L338.75 256l-62.06-62.06c-6.25-6.25-6.25-16.38 0-22.63l22.62-22.62c6.25-6.25 16.38-6.25 22.63 0L384 210.75l62.06-62.06c6.25-6.25 16.38-6.25 22.63 0l22.62 22.62c6.25 6.25 6.25 16.38 0 22.63L429.25 256l62.06 62.06z"></path>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            <?php $i++; } ?>
                        </tbody>
                    </table>
                    <div class="pagination">
                        <ul class="pagination-list">
                            <li class="pagination-item">
                                <a href="" class="pagination-item__link active">1</a>
                            </li>
                            <li class="pagination-item">
                                <a href="" class="pagination-item__link">2</a>
                            </li>
                            <li class="pagination-item">
                                <a href="" class="pagination-item__link">3</a>
                            </li>
                        </ul>
                    </div>
                </section>

                <section class="main-active c-11 l-4 m-12">
                    <section class="active-search-product">
                        <h4 class="product-title">Search Product</h4>
                        <form action="admin.php?action=search" method="POST" class="form-search">
                            <label for="" class="title-input">Product's name</label>
                            <input name="name" value="" type="text" class="input-form" placeholder="Enter your search...">
                            <span class="error">Product's name is not found!</span>

                            <label for="" class="title-input">Category</label>
                            <select name="category-search" id="category-search">
                                <?php foreach($categories as $cate) { ?>
                                    <option value="<?=$cate['link'];?>"><?=$cate['description'];?></option>
                                <?php } ?>
                            </select>
                            <button type="submit" class="btn-submit">Search</button>
                        </form>
                    </section>

                    <section class="active-add-product">
                        <h4 class="product-title">Create New Product</h4>
                        <form action="product-add_action.php" method="POST" enctype="multipart/form-data" class="form-search">
                            <label for="" class="title-input">Product's name</label>
                            <input name="name" value="" type="text" class="input-form" placeholder="Enter product's name...">
                            <span class="error">Product's name is not valid!</span>

                            <label for="" class="title-input">Category</label>

                            <select name="category-id" id="category-search">
                                <?php foreach($categories as $cate) { ?>
                                <option value="<?=$cate['id'];?>"><?=$cate['description'];?></option>
                                <?php } ?>
                            </select>

                            <label for="" class="title-input">Price</label>
                            <input name="price" value="" type="number" class="input-form" placeholder="Enter price...">
                            <span class="error">Price is not valid!</span>

                            <label for="" class="title-input">Image</label>
                            <img src="../../img/product/10022.png" alt="" width="34%">
                            <input name="image" value="" type="file" class="input-form">
                            <span class="error">Image is not valid!</span>

                            <div class="status">
                                <label for="" class="label-form label-status">Allow display on home page?</label>
                                <input name="status" type="checkbox" class="input input-status" value="1">
                            </div>

                            <div class="button-active">
                                <button onclick="deleteForm();" class="btn-submit btn-delete">Delete</button>
                                <button type="submit" class="btn-submit btn-create">Create</button>
                            </div>
                        </form>
                    </section>
                </section>
            </section>
        </section>
    </main>
</body>
</html>