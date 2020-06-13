<!DOCTYPE html>
<html lang="en">
<head>
    <title>Apple Store | Sign in</title>
    <?php require_once('public/head.php'); ?>

    <style>
        #notification-login {
            color: #1dbfaf;
        }

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

    <main id="signin" class="container-form grid wide c-12 l-12 m-12">
        <section class="main-form row wide c-11">
            <h3 class="title-form">Sign in</h3>
            <form action="login_action.php" method="POST" class="form-login" onsubmit="checkLogin();">
                <label for="" class="label-form">Username</label>
                <input id="username-login" name="username" value="" type="text" class="input" onchange="checkUsernameLogin();" onblur="checkUsernameLogin();" placeholder="Enter your username..." title="Your name must be more than 5 characters.">
                <span id="username-login-error" class="error">Username is not valid!</span>

                <label for="" class="label-form">Password</label>
                <input id="password-login" name="password" value="" type="password" class="input" onchange="checkPasswordLogin();" placeholder="Enter your password..." title="Your name must be more than 5 characters.">
                <span id="password-login-error" class="error">Password is not valid!</span>

                <?php if(isset($_COOKIE['msg'])) { ?>
                <span class="error" id="notification-login">Notification! <?php echo $_COOKIE['msg']; ?>!</span>
                <?php } ?>
                <button onclick="checkLogin();" class="btn-submit">Sign in</button>
            </form>
            <section class="auth-forgot-password">
                <a href="reset-password.php" class="forgot-password">Forgot password?</a>
            </section>
        </section>

        <section class="auth-question-register row wide c-11 l-6 m-8">
            <p class="register-title">
                Do not have an account?
                <a href="register.php" class="register-link">Register now!</a>
            </p>
        </section>
    </main>

    <!-- javascript -->
    <script src="assets/js/javascript.js"></script>
</body>
</html>