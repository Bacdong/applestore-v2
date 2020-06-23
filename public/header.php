<?php

    // session_start();
    require_once('connection.php');
    $query_cate = 'SELECT * FROM categories;';
    $result = $connection->query($query_cate);
    $categories = array();
    while($row = $result->fetch_assoc()) {
        $categories[] = $row;
    }
?>

<header class="header grid">
    <section class="header-box grid wide c-12 m-12 l-12">
        <!-- header left -->
        <nav class="header-navbar l-10 m-9">
            <!-- header logo -->
            <div class="header-logo l-3 m-4">
                <a href="index.php" class="header-logo__link">Apple <span>Store</span></a>
            </div>
            <!-- /header logo -->

            <!-- header list categories -->
            <menu class="header-navbar__menu l-5 m-4">
                <ul class="menu-list">
                    <li class="menu-list__item">
                        <a href="index.php" class="list-item__link">Home</a>
                    </li>
                    <?php 
                        $i = 1;
                        foreach($categories as $cate) {
                    ?>
                    <li class="menu-list__item  cate-<?=$i;?>">
                        <a href="index.php?item=<?=$item_in_page?>&page=<?=$current_page?>&cate=<?=$cate['id'];?>" class="list-item__category cate-<?=$i;?>"><?=$cate['title'];?></a>
                    </li>
                    <?php
                        $i++; 
                        if($i == 5) $i=1;
                        }  
                    ?>
                </ul>
            </menu>
            <!-- header list categories -->
        </nav>
        <!-- /header left -->

        
        <!-- header right -->
        <nav class="header-auth">
            <?php if(isset($_SESSION['isLogin'])) { ?>
                <!-- header right users after sign in -->
                <div class="header-auth__users">
                    <a href="" class="auth-users__link">
                        <div class="auth-users__avatar" style="background-image: url('<?=$_SESSION['author']['avatar'];?>');">
                            <div class="auth-users__fullname" style="overflow: hidden; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 1; align-items: center; font-size: 20px; padding-left: 8px;">Welcom! <?=$_SESSION['author']['name']; ?></div>
                        </div>
                        <div class="auth-users__setting" style="margin-top: 2px !important;">
                            <ul class="users-setting__list">
                                <li class="users-setting__item">
                                    <a href="public/users/profiles.php?userId=<?=$_SESSION['author']['id'];?>" class="users-setting__item-link">Your profiles</a>
                                </li>
                                <li class="users-setting__item">
                                    <a href="logout.php" class="users-setting__item-link">Sign up</a>
                                </li>
                            </ul>
                        </div>
                    </a>
                </div>
                <!-- /header right users after sign in -->
            <?php } else { ?>
                <!-- header right users before sign in -->
                <div class="header-auth__users">
                    <a href="" class="auth-users__link">
                        <img src="https://t4.ftcdn.net/jpg/00/97/00/09/240_F_97000908_wwH2goIihwrMoeV9QF3BW6HtpsVFaNVM.jpg" alt="">
                        <div class="auth-users__setting" >
                            <ul class="users-setting__list">
                                <li class="users-setting__item">
                                    <a href="login.php" class="users-setting__item-link">Sign in</a>
                                </li>
                                <li class="users-setting__item">
                                    <a href="register.php" class="users-setting__item-link">Register</a>
                                </li>
                            </ul>
                        </div>
                    </a>
                </div>
                <!-- /header right users before sign in -->
            <?php } ?>

            <!-- header right carts -->
            <div class="header-auth__carts">
                <a href="cart.php" class="auth-carts__link">
                    <img src="https://t4.ftcdn.net/jpg/01/63/42/79/240_F_163427943_W56xtj7YydS4YujdUqQot94IINtt91FV.jpg" alt="Your carts">
                </a>
            </div>
            <!-- /header right carts -->
        </nav>
        <!-- /header right -->

        <!-- header-mobile__navbars -->
        <input type="checkbox" hidden id="navbars-check-box" class="check-input">

        <label for="navbars-check-box" class="overlay-navbars"></label>

        <label for="navbars-check-box" class="header-mobile__navbars">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bars" class="svg-inline--fa fa-bars fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <path fill="currentColor" d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"></path>
            </svg>
        </label>

        <?php if(isset($_SESSION['isLogin'])) { ?>
        <!-- navbars mobile after sign in -->
        <nav class="navbars-mobile__menu">
            <div class="navbars-mobile__menu-header">
                <div class="navbars-mobile__logo navbars-mobile__logo-avatar">
                    <div class="navbars-mobile__logo-avatar" style="background-image: url('<?=$_SESSION['author']['avatar'];?>'); border: 1px solid #ccc; border-radius: 999px"></div>
                    <div class="navbars-mobile__logo-profiles">
                        <span id="navbars-mobile__logo-fullname"><?php echo $_SESSION['author']['surname'].' '.$_SESSION['author']['name'];?></span>
                        <a href="public/users/profiles.php?userId=<?=$_SESSION['author']['id'];?>" class="navbars-mobile__profiles-link-edit">
                            Edit profiles
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pencil-alt" class="svg-inline--fa fa-pencil-alt fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path fill="currentColor" d="M497.9 142.1l-46.1 46.1c-4.7 4.7-12.3 4.7-17 0l-111-111c-4.7-4.7-4.7-12.3 0-17l46.1-46.1c18.7-18.7 49.1-18.7 67.9 0l60.1 60.1c18.8 18.7 18.8 49.1 0 67.9zM284.2 99.8L21.6 362.4.4 483.9c-2.9 16.4 11.4 30.6 27.8 27.8l121.5-21.3 262.6-262.6c4.7-4.7 4.7-12.3 0-17l-111-111c-4.8-4.7-12.4-4.7-17.1 0zM124.1 339.9c-5.5-5.5-5.5-14.3 0-19.8l154-154c5.5-5.5 14.3-5.5 19.8 0s5.5 14.3 0 19.8l-154 154c-5.5 5.5-14.3 5.5-19.8 0zM88 424h48v36.3l-64.5 11.3-31.1-31.1L51.7 376H88v48z"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                
                <label for="navbars-check-box" class="navbars-mobile__menu-close">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times" class="svg-inline--fa fa-times fa-w-11" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512">
                        <path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path>
                    </svg>
                </label>
            </div>
            <ul class="navbars-mobile__list">
                <li class="navbars-mobile__item">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="shopping-cart" class="svg-inline--fa fa-shopping-cart fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                        <path fill="currentColor" d="M528.12 301.319l47.273-208C578.806 78.301 567.391 64 551.99 64H159.208l-9.166-44.81C147.758 8.021 137.93 0 126.529 0H24C10.745 0 0 10.745 0 24v16c0 13.255 10.745 24 24 24h69.883l70.248 343.435C147.325 417.1 136 435.222 136 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-15.674-6.447-29.835-16.824-40h209.647C430.447 426.165 424 440.326 424 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-22.172-12.888-41.332-31.579-50.405l5.517-24.276c3.413-15.018-8.002-29.319-23.403-29.319H218.117l-6.545-32h293.145c11.206 0 20.92-7.754 23.403-18.681z"></path>
                    </svg>
                    <a href="cart.php" class="navbars-mobile__item-link">Your cart</a>
                </li>
                <li class="navbars-mobile__item">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="home" class="svg-inline--fa fa-home fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                        <path fill="currentColor" d="M280.37 148.26L96 300.11V464a16 16 0 0 0 16 16l112.06-.29a16 16 0 0 0 15.92-16V368a16 16 0 0 1 16-16h64a16 16 0 0 1 16 16v95.64a16 16 0 0 0 16 16.05L464 480a16 16 0 0 0 16-16V300L295.67 148.26a12.19 12.19 0 0 0-15.3 0zM571.6 251.47L488 182.56V44.05a12 12 0 0 0-12-12h-56a12 12 0 0 0-12 12v72.61L318.47 43a48 48 0 0 0-61 0L4.34 251.47a12 12 0 0 0-1.6 16.9l25.5 31A12 12 0 0 0 45.15 301l235.22-193.74a12.19 12.19 0 0 1 15.3 0L530.9 301a12 12 0 0 0 16.9-1.6l25.5-31a12 12 0 0 0-1.7-16.93z"></path>
                    </svg>
                    <a href="index.php" class="navbars-mobile__item-link">Home</a>
                </li>
                <li class="navbars-mobile__item">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="mobile" class="svg-inline--fa fa-mobile fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                        <path fill="currentColor" d="M272 0H48C21.5 0 0 21.5 0 48v416c0 26.5 21.5 48 48 48h224c26.5 0 48-21.5 48-48V48c0-26.5-21.5-48-48-48zM160 480c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32z"></path>
                    </svg>
                    <a href="index.php#iphone" class="navbars-mobile__item-link">iPhone</a>
                </li>
                <li class="navbars-mobile__item">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="tablet" class="svg-inline--fa fa-tablet fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path fill="currentColor" d="M400 0H48C21.5 0 0 21.5 0 48v416c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V48c0-26.5-21.5-48-48-48zM224 480c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32z"></path>
                    </svg>
                    <a href="index.php#ipad" class="navbars-mobile__item-link">iPad</a>
                </li>
                <li class="navbars-mobile__item">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="laptop" class="svg-inline--fa fa-laptop fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                        <path fill="currentColor" d="M624 416H381.54c-.74 19.81-14.71 32-32.74 32H288c-18.69 0-33.02-17.47-32.77-32H16c-8.8 0-16 7.2-16 16v16c0 35.2 28.8 64 64 64h512c35.2 0 64-28.8 64-64v-16c0-8.8-7.2-16-16-16zM576 48c0-26.4-21.6-48-48-48H112C85.6 0 64 21.6 64 48v336h512V48zm-64 272H128V64h384v256z"></path>
                    </svg>
                    <a href="index.php#mac" class="navbars-mobile__item-link">Macbook</a>
                </li>
                <li class="navbars-mobile__item">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="clock" class="svg-inline--fa fa-clock fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor" d="M256,8C119,8,8,119,8,256S119,504,256,504,504,393,504,256,393,8,256,8Zm92.49,313h0l-20,25a16,16,0,0,1-22.49,2.5h0l-67-49.72a40,40,0,0,1-15-31.23V112a16,16,0,0,1,16-16h32a16,16,0,0,1,16,16V256l58,42.5A16,16,0,0,1,348.49,321Z"></path>
                    </svg>
                    <a href="index.php#watch" class="navbars-mobile__item-link">Apple Watch</a>
                </li>
                <li class="navbars-mobile__item">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sign-in-alt" class="svg-inline--fa fa-sign-in-alt fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor" d="M416 448h-84c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h84c17.7 0 32-14.3 32-32V160c0-17.7-14.3-32-32-32h-84c-6.6 0-12-5.4-12-12V76c0-6.6 5.4-12 12-12h84c53 0 96 43 96 96v192c0 53-43 96-96 96zm-47-201L201 79c-15-15-41-4.5-41 17v96H24c-13.3 0-24 10.7-24 24v96c0 13.3 10.7 24 24 24h136v96c0 21.5 26 32 41 17l168-168c9.3-9.4 9.3-24.6 0-34z"></path>
                    </svg>
                    <a href="logout.php" class="navbars-mobile__item-link">Sign up</a>
                </li>
            </ul>
        </nav>
        <!-- /navbars mobile after sign in -->
        <?php } else { ?>

        <!-- /navbars mobile before sign in -->
        <nav class="navbars-mobile__menu">
            <div class="navbars-mobile__menu-header">
                <a href="index.php" class="navbars-mobile__logo">Apple <span>Store</span></a>
                
                <label for="navbars-check-box" class="navbars-mobile__menu-close">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times" class="svg-inline--fa fa-times fa-w-11" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512">
                        <path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path>
                    </svg>
                </label>
            </div>
            <ul class="navbars-mobile__list">
                <li class="navbars-mobile__item">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sign-in-alt" class="svg-inline--fa fa-sign-in-alt fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor" d="M416 448h-84c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h84c17.7 0 32-14.3 32-32V160c0-17.7-14.3-32-32-32h-84c-6.6 0-12-5.4-12-12V76c0-6.6 5.4-12 12-12h84c53 0 96 43 96 96v192c0 53-43 96-96 96zm-47-201L201 79c-15-15-41-4.5-41 17v96H24c-13.3 0-24 10.7-24 24v96c0 13.3 10.7 24 24 24h136v96c0 21.5 26 32 41 17l168-168c9.3-9.4 9.3-24.6 0-34z"></path>
                    </svg>
                    <a href="login.php" class="navbars-mobile__item-link">Sign in</a>
                </li>
                <li class="navbars-mobile__item">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-plus" class="svg-inline--fa fa-user-plus fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                        <path fill="currentColor" d="M624 208h-64v-64c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v64h-64c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h64v64c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16v-64h64c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zm-400 48c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"></path>
                    </svg>
                    <a href="register.php" class="navbars-mobile__item-link">Register</a>
                </li>
                <li class="navbars-mobile__item">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="home" class="svg-inline--fa fa-home fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                        <path fill="currentColor" d="M280.37 148.26L96 300.11V464a16 16 0 0 0 16 16l112.06-.29a16 16 0 0 0 15.92-16V368a16 16 0 0 1 16-16h64a16 16 0 0 1 16 16v95.64a16 16 0 0 0 16 16.05L464 480a16 16 0 0 0 16-16V300L295.67 148.26a12.19 12.19 0 0 0-15.3 0zM571.6 251.47L488 182.56V44.05a12 12 0 0 0-12-12h-56a12 12 0 0 0-12 12v72.61L318.47 43a48 48 0 0 0-61 0L4.34 251.47a12 12 0 0 0-1.6 16.9l25.5 31A12 12 0 0 0 45.15 301l235.22-193.74a12.19 12.19 0 0 1 15.3 0L530.9 301a12 12 0 0 0 16.9-1.6l25.5-31a12 12 0 0 0-1.7-16.93z"></path>
                    </svg>
                    <a href="index.php" class="navbars-mobile__item-link">Home</a>
                </li>
                <li class="navbars-mobile__item">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="mobile" class="svg-inline--fa fa-mobile fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                        <path fill="currentColor" d="M272 0H48C21.5 0 0 21.5 0 48v416c0 26.5 21.5 48 48 48h224c26.5 0 48-21.5 48-48V48c0-26.5-21.5-48-48-48zM160 480c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32z"></path>
                    </svg>
                    <a href="index.php#iphone" class="navbars-mobile__item-link">iPhone</a>
                </li>
                <li class="navbars-mobile__item">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="tablet" class="svg-inline--fa fa-tablet fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path fill="currentColor" d="M400 0H48C21.5 0 0 21.5 0 48v416c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V48c0-26.5-21.5-48-48-48zM224 480c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32z"></path>
                    </svg>
                    <a href="index.php#ipad" class="navbars-mobile__item-link">iPad</a>
                </li>
                <li class="navbars-mobile__item">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="laptop" class="svg-inline--fa fa-laptop fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                        <path fill="currentColor" d="M624 416H381.54c-.74 19.81-14.71 32-32.74 32H288c-18.69 0-33.02-17.47-32.77-32H16c-8.8 0-16 7.2-16 16v16c0 35.2 28.8 64 64 64h512c35.2 0 64-28.8 64-64v-16c0-8.8-7.2-16-16-16zM576 48c0-26.4-21.6-48-48-48H112C85.6 0 64 21.6 64 48v336h512V48zm-64 272H128V64h384v256z"></path>
                    </svg>
                    <a href="index.php#mac" class="navbars-mobile__item-link">Macbook</a>
                </li>
                <li class="navbars-mobile__item">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="clock" class="svg-inline--fa fa-clock fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor" d="M256,8C119,8,8,119,8,256S119,504,256,504,504,393,504,256,393,8,256,8Zm92.49,313h0l-20,25a16,16,0,0,1-22.49,2.5h0l-67-49.72a40,40,0,0,1-15-31.23V112a16,16,0,0,1,16-16h32a16,16,0,0,1,16,16V256l58,42.5A16,16,0,0,1,348.49,321Z"></path>
                    </svg>
                    <a href="index.php#watch" class="navbars-mobile__item-link">Apple Watch</a>
                </li>
            </ul>
        </nav>
        <?php } ?>
        <!-- navbars mobile before sign in -->

        <!-- /header-mobile__navbars -->
    </section>
</header>