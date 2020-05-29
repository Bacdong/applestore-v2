<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('public/head.php'); ?>
    <title>Register</title>

    <style>
        .error {
            display: none;
        }
    </style>
</head>
<body class="body-form">
    <header class="header-login grid">
        <a href="index.php" class="header-login__link">
            <img src="img/logo/logo.png" alt="">
        </a>
    </header>

    <main id="register" class="container-form grid wide c-12 l-12 m-12">
        <section class="main-form row wide c-11">
            <h3 class="title-form">Register</h3>
            <form action="register_action.php" method="POST" class="form-login" onsubmit="checkRegister();">
                <?php if(isset($_COOKIE['msg'])) { ?>
                <span class="error"><?=$_COOKIE['msg'];?></span>
                <?php } ?>

                <label for="" class="label-form">Your name</label>
                <input title="Your name must be more than 5 characters." id="name" name="name" value="" type="text" class="input" onchange="checkName();" placeholder="Enter your name...">
                <span id="name-error" class="error">Your is not valid!</span>

                <label for="" class="label-form">Phone number</label>
                <input title="Your name must be more than 9 characters." id="phone" name="phone" value="" type="number" min="1" class="input" onchange="checkPhone();" placeholder="Enter your phone number...">
                <span id="phone-error" class="error">Your phone number is not valid!</span>

                <label for="" class="label-form">Username</label>
                <input title="Your name must be more than 5 characters." id="username" name="username" value="" type="text" class="input" onchange="checkUsername();" placeholder="Enter your username...">
                <span id="username-error" class="error">Username is not valid!</span>

                <label for="" class="label-form">Password</label>
                <input title="Your name must be more than 5 characters." id="password" name="password" value="" type="password" class="input" onchange="checkPassword();" placeholder="Enter your password...">
                <span id="password-error" class="error">Password is not valid!</span>

                <label for="" class="label-form">Confirm password</label>
                <input title="Your confirmation password must match the password." id="password2" name="password2" value="" type="password" class="input" onchange="checkConfirmPassword();" placeholder="Enter your password again...">
                <span id="password2-error" class="error">Password confirmation does not match!</span>

                <button onclick="checkRegister();" class="btn-submit">Register</button>
            </form>
            <section class="auth-forgot-password">
                <p class="terms">By clicking register you have agreed to our terms.</p>
            </section>
        </section>

        <section class="auth-question-register row wide c-11 l-8 m-8">
            <p class="register-title">
                You are already a member?
                <a href="login.php" class="register-link">Sign in</a>
            </p>
        </section>
    </main>

    <!-- javascript -->
    <script src="assets/js/javascript.js"></script>
</body>
</html>