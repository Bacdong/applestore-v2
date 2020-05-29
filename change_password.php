<?php
    require_once('public/connection.php');
    $id = $_GET['id'];
    $query = 'SELECT * FROM users WHERE status = 1 and id='.$id;
    $result = $connection->query($query)->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('public/head.php'); ?>
    <title><?=$result['name']?> | Change Password</title>
</head>
<body class="body-form">
    <header class="header-login grid">
        <a href="index.php" class="header-login__link">
            <img src="img/logo/logo.png" alt="">
        </a>
    </header>

    <main id="register" class="container-form grid wide c-12 l-12 m-12">
        <section class="main-form row wide c-11">
            <h3 class="title-form">Change Your Password</h3>
            <form action="change_password_action.php?id=<?=$id?>" method="POST" class="form-login">
                <?php if(isset($_COOKIE['msg'])) { ?>
                <span class="error"><?=$_COOKIE['msg'];?></span>
                <?php } ?>

                <input type="text" hidden name="id" value="<?=$result['id']?>">

                <label for="" class="label-form">A new password</label>
                <input name="password" value="" type="password" class="input" placeholder="Enter your password...">
                <!-- <span class="error">Password is not valid!</span> -->

                <label for="" class="label-form">Confirm password</label>
                <input name="password2" value="" type="password" class="input" placeholder="Enter your password again...">
                <!-- <span class="error">Password is not valid!</span> -->

                <button class="btn-submit">Update</button>
            </form>
            <section class="auth-forgot-password">
                <p class="terms">By clicking update you have agreed change your password.</p>
            </section>
        </section>

        <section class="auth-question-register row wide c-11 l-8 m-8">
            <p class="register-title">
                Back to home?
                <a href="index.php" class="register-link">Back now!</a>
            </p>
        </section>
    </main>
</body>
</html>