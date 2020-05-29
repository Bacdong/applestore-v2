<?php
    ob_start();
    session_start();
    if(!isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] != true) {
        setcookie('msg', 'Login Failed!', time()+1);
        header("Location: ../../login.php");
    }
    require_once('../../public/connection.php');
    $id = $_GET['user'];

    // user
    $query = 'SELECT * FROM users WHERE id='.$id;
    $result = $connection->query($query)->fetch_assoc();
    ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Details</title>
    <?php require_once('head-user.php'); ?>
</head>
<body class="body-form">
    <header class="header-login grid">
        <a href="users.php" class="header-login__link">
            <img src="../../img/logo/logo.png" alt="">
        </a>
    </header>

    <main id="register" class="container-form grid wide c-12 l-12 m-12">
        <section class="main-form row wide c-11">
            <h3 class="title-form">User Information (Just to see)</h3>
            <form action="" class="form-login">
                <label for="" class="label-form">ID</label>
                <input name="id" type="text" class="input" value="<?=$id;?>">

                <label for="" class="label-form">Username</label>
                <input name="username" value="<?=$result['username'];?>" type="text" class="input">

                <label for="" class="label-form">Surname</label>
                <input name="surname" type="text" class="input" value="<?=$result['surname'];?>">

                <label for="" class="label-form">Name</label>
                <input name="name" type="text" class="input" value="<?=$result['name'];?>">

                <label for="" class="label-form">Phone number</label>
                <input name="phone" value="<?=$result['phone'];?>" type="text" class="input">

                <label for="" class="label-form">Address</label>
                <input name="address" value="<?=$result['address'];?>" type="text" class="input">

                <label for="" class="label-form">Avatar</label>
                <img src="../../<?=$result['avatar'];?>" alt="" width="120px" style="padding: 10px 0;">
                <input value="../../<?=$result['avatar'];?>" name="avatar" type="file" class="input">

                <div class="status">
                    <label for="" class="label-form label-status">Allow active user?</label>
                    <input <?= ($result['status'] == 1) ? 'checked':''?> name="status" type="checkbox" class="input input-status" value="<?=$result['status'];?>">
                </div>
                <a href="users.php" class="back-link">Back</a>
            </form>
        </section>
    </main>
</body>
</html>