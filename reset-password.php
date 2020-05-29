<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- favicon for webpage -->
    <link rel="shortcut icon" href="img/favicon/favicon.ico">
    <!-- <link rel="shortcut icon" type="image/png" href="img/favicon/favicon.png"> -->
    <!-- /favicon for webpage -->

    <!-- Responsive library -->
    <link rel="stylesheet" href="assets/css/gridLibrary.css">
    <!-- /Responsive library -->

    <!-- main style css -->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- /main style css -->

    <!-- base style css -->
    <link rel="stylesheet" href="assets/css/base.css">
    <!-- base style css -->

    <!-- google font trademark -->
    <link href="https://fonts.googleapis.com/css2?family=Arima+Madurai:wght@100;200;300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lobster+Two:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;562;600;700&display=swap" rel="stylesheet">
    <!-- /google font trademark-->

    <!-- google font default -->
    <link href="https://fonts.googleapis.com/css2?family=Manuale:wght@400;500;562;600;700&display=swap" rel="stylesheet">
    <!-- /google font default -->
    <title>Apple Store | Sign in</title>

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

    <main id="reset-password" class="container-form grid wide c-12 l-12 m-12">
        <section class="main-form row wide c-11">
            <h3 class="title-form">Password recovery request</h3>
            <form action="" class="form-login" onsubmit="checkEmailRequest();">
                <label for="" class="label-form">Your email</label>
                <input id="email-request" type="email" class="input" onchange="checkEmailRequest();" placeholder="Enter your email...">
                <span id="email-request-error" class="error">Your email is not valid!</span>
                <button onclick="checkEmailRequest();" class="btn-submit">Request</button>
            </form>
            <section class="auth-forgot-password">
                <a href="login.php" class="register-link">Sign in</a>
            </section>
        </section>
    
        <section class="auth-question-register row wide c-11 l-6 m-8">
            <p class="register-title">
                Do you need support?
                <a href="tel:+84915272291" class="contact-phone">+84 915 272 291</a>
            </p>
        </section>
    </main>

    <!-- javascript -->
    <script src="assets/js/javascript.js"></script>
</body>
</html>