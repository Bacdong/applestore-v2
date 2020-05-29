<?php
    ob_start();
    session_start();
    if(!isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] != true) {
        setcookie('msg', 'Login Failed!', time()+1);
        header("Location: ../../login.php");
    }
    require_once('../../public/connection.php');
    $id = $_GET['id'];
    $query = 'SELECT p.id, p.name, p.price, p.image, p.status, p.created_at, p.category_id, c.description FROM products p LEFT JOIN categories c ON p.category_id = c.id WHERE p.id ='.$id;
    $result = $connection->query($query)->fetch_assoc();

    // category
    $query_cate = 'SELECT * FROM categories;';
    $result_cate = $connection->query($query_cate);
    $categories = array();
    while($row = $result_cate->fetch_assoc()) {
        $categories[] = $row;
    }
    ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- favicon for webpage -->
    <link rel="shortcut icon" href="../../img/favicon/favicon.ico">
    <!-- <link rel="shortcut icon" type="image/png" href="img/favicon/favicon.png"> -->
    <!-- /favicon for webpage -->

    <!-- Responsive library -->
    <link rel="stylesheet" href="../../assets/css/gridLibrary.css">
    <!-- /Responsive library -->

    <!-- main style css -->
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <link rel="stylesheet" href="product.css">
    <!-- /main style css -->

    <!-- base style css -->
    <link rel="stylesheet" href="../../assets/css/base.css">
    <!-- base style css -->

    <!-- google font trademark -->
    <link href="https://fonts.googleapis.com/css2?family=Arima+Madurai:wght@100;200;300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lobster+Two:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;562;600;700&display=swap" rel="stylesheet">
    <!-- /google font trademark-->

    <!-- google font default -->
    <link href="https://fonts.googleapis.com/css2?family=Manuale:wght@400;500;562;600;700&display=swap" rel="stylesheet">
    <!-- /google font default -->
    <title>Details</title>
    <style>
        a.back-link {
            display: block;
            width: 100%;
            margin: 20px 0 40px 0;
            padding: 12px 0;
            font-size: 20px;
            font-weight: 600;
            color: #fff;
            background-color: #1dbfaf;
            border-radius: 8px;
            text-align: center;
        }

        a.back-link:hover {
            transition: all ease 0.2s;
            background-color: #05AF9E;
        }
    </style>
</head>
<body class="body-form">
    <header class="header-login grid">
        <a href="admin.php" class="header-login__link">
            <img src="../../img/logo/logo.png" alt="">
        </a>
    </header>

    <main id="register" class="container-form grid wide c-12 l-12 m-12">
        <section class="main-form row wide c-11">
            <h3 class="title-form">Details Product (Just to see)</h3>
            <form action="" class="form-login">
                <label for="" class="label-form">ID</label>
                <input name="id" type="text" class="input" value="<?=$id;?>">

                <label for="" class="label-form">Product's Name</label>
                <input name="name" type="text" class="input" value="<?=$result['name'];?>">

                <label for="" class="label-form">Price</label>
                <input name="price" value="<?=$result['price'];?>" type="number" class="input" style="color: #ff0000;">

                <label for="" class="label-form">Image</label>
                <img src="../../<?=$result['image'];?>" alt="">
                <input name="image" value="<?=$result['image'];?>" type="text" class="input">

                <label for="" class="label-form">Category</label>
                <select name="category_id" id="category-search">
                    <?php foreach($categories as $cate) { ?>
                    <option <?= ($result['category_id'] == $cate['id']) ? 'selected':''?> value="<?=$cate['id'];?>"><?=$cate['description'];?></option>
                    <?php } ?>
                </select>

                <div class="status">
                    <label for="" class="label-form label-status">Allow display on home page?</label>
                    <input <?= ($result['status'] == 1) ? 'checked':''?> name="status" type="checkbox" class="input input-status" value="<?=$result['status'];?>">
                </div>
                <a href="admin.php" class="back-link">Back</a>
            </form>
        </section>
    </main>
</body>
</html>