<?php
    require_once('../connection.php');
    $id = $_GET['userId'];
    $query = 'SELECT * FROM users WHERE status = 1 and id='.$id;
    $result = $connection->query($query)->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('head-profiles.php'); ?>
    <title><?=$result['name']?> | Profiles</title>

    <style>
        a.link-change-password {
            display: block;
            width: 100%;
            height: 2rem;
            color: #1dbfaf;
            font-size: 18px;
            padding-top: 12px;
        }

        a.link-change-password:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body class="body-form">
    <header class="header-login grid">
        <a href="../../index.php" class="header-login__link">
            <img src="../../img/logo/logo.png" alt="">
        </a>
    </header>

    <main id="register" class="container-form grid wide c-12 l-12 m-12">
        <section class="main-form row wide c-11">
            <h3 class="title-form">Edit Your Profiles</h3>
            <form action="profiles_action.php" method="POST" enctype="multipart/form-data" class="form-login">
                <?php  if(isset($_COOKIE['msg'])) { ?>
                <span style="font-size: 26px;" class="error"><?=$_COOKIE['msg'];?></span>
                <?php } ?> 

                <input type="text" hidden name="id" value="<?=$result['id']?>">

                <label for="" class="label-form">Avatar</label>
                <img src="../../<?=$result['avatar'];?>" alt="" width="120px" style="padding: 12px 0">
                <input name="avatar" value="<?=$result['avatar'];?>" type="file" class="input" placeholder="Choose your avatar...">

                <label for="" class="label-form">Surname</label>
                <input name="surname" value="<?=$result['surname'];?>" type="text" class="input" placeholder="Enter your surname...">
                <!-- <span class="error">Surname is not valid!</span> -->

                <label for="" class="label-form">Your name</label>
                <input name="name" value="<?=$result['name'];?>" type="text" class="input" placeholder="Enter your name...">
                <!-- <span class="error">Your is not valid!</span> -->

                <label for="" class="label-form">Your email</label>
                <input name="email" value="<?=$result['email'];?>" type="email" class="input" placeholder="Enter your email...">
                <!-- <span class="error">Your email is not valid!</span> -->

                <label for="" class="label-form">Phone number</label>
                <input name="phone" value="<?=$result['phone'];?>" type="number" class="input" placeholder="Enter your phone number...">
                <!-- <span class="error">Your phone number is not valid!</span> -->

                <label for="" class="label-form">Your address</label>
                <input name="address" value="<?=$result['address'];?>" type="text" class="input" placeholder="Enter your address...">
                <!-- <span class="error">Your address is not valid!</span> -->

                <label for="" class="label-form">Username</label>
                <input name="username" value="<?=$result['username'];?>" type="text" class="input" placeholder="Enter your username...">
                <!-- <span class="error">Username is not valid!</span> -->

                <a class="link-change-password" href="../../change_password.php?id=<?=$result['id']?>">Change Password</a>
                <button class="btn-submit">Update</button>
            </form>
            <section class="auth-forgot-password">
                <p class="terms">By clicking update you have agreed to our terms.</p>
            </section>
        </section>

        <section class="auth-question-register row wide c-11 l-8 m-8">
            <p class="register-title">
                Back to Home?
                <a href="index.php" class="register-link">Back Now!</a>
            </p>
        </section>
    </main>
</body>
</html>