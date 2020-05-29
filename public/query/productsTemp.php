<!-- ipad products-->
<section class="main-container main-container__products grid wide">
            <section class="main-container__title-trademark grid wide c-12 l-12 m-12">
                <section class="title-products background-cate-2 c-2 l-2 m-2">
                    <h4 id="ipad" class="latest-product__title title-name">iPad</h4>
                </section>
            </section>
            
            <section class="main-container__latest-product grid wide">
                <!-- row -->
                <section class="container wide row c-12">
                    
                    <?php 
                        $i = 1;
                        foreach($ipad_products as $ipad) {
                    ?>
                    <!-- column -->
                    <a href="product-details.php?id=<?=$ipad['id'];?>" class="container-column col c-12 l-3 m-4">
                        <div class="container-product cate-<?=$i;?>">
                            <img src="<?=$ipad['image'];?>" alt="">
                            <!-- <div class="container-products__banner">
                                <h2 class="products-banner__title">iPad</h2>
                                <p class="banner-title__description">Own, experience great moments.</p>
                            </div> -->
                        </div>
                        <div class="btn-show-detail">
                            <button class="btn-detail-product">Detail</button>
                        </div>
                        <div class="products-description">
                            <h3 class="products-name"><?=$ipad['name'];?></h3>
                            <span class="products-price"><?php echo '$'.$ipad['price'];?></span>
                        </div>
                    </a>
                    <!-- /column -->
                    <?php $i++; } ?>
                   
                </section>
                 <!-- /row -->

                 <!-- pagination -->
                <section class="main-container__pagination row wide c-12 l-12 m-12">
                    <ul class="pagination-list">
                        <li class="pagination-item">
                            <a href="index.php#ipad" class="pagination-item__link active">1</a>
                        </li>
                        <li class="pagination-item">
                            <a href="index.php?ipadPage=2#ipad" class="pagination-item__link">2</a>
                        </li>
                        <li class="pagination-item">
                            <a href="index.php?ipadPage=3#ipad" class="pagination-item__link">3</a>
                        </li>
                    </ul>
                </section>
                <!-- /pagination -->
            </section>
        </section>
        <!-- /ipad products-->

        <!-- mac products-->
        <section class="main-container main-container__products grid wide">
            <section class="main-container__title-trademark grid wide c-12 l-12 m-12">
                <section class="title-products background-cate-3 c-2 m-2 l-2">
                    <h4 id="mac" class="latest-product__title title-name">Macbook</h4>
                </section>
            </section>
            
            <section class="main-container__latest-product grid wide">
                <!-- row -->
                <section class="container wide row c-12">
                    
                    <?php
                        $i = 1;
                        foreach($mac_products as $mac) {
                    ?>
                    <!-- column -->
                    <a href="product-details.php?id=<?=$mac['id'];?>" class="container-column col c-12 l-3 m-4">
                        <div class="container-product cate-<?=$i;?>">
                            <img src="<?=$mac['image'];?>" alt="">
                            <!-- <div class="container-products__banner">
                                <h2 class="products-banner__title">Macbook</h2>
                                <p class="banner-title__description">Own, experience great moments.</p>
                            </div> -->
                        </div>
                        <div class="btn-show-detail">
                            <button class="btn-detail-product">Detail</button>
                        </div>
                        <div class="products-description">
                            <h3 class="products-name"><?=$mac['name'];?></h3>
                            <span class="products-price"><?php echo '$'.$mac['price'];?></span>
                        </div>
                    </a>
                    <!-- /column -->
                    <?php $i++; } ?>
                   
                </section>
                 <!-- /row -->

                 <!-- pagination -->
                <section class="main-container__pagination row wide c-12 l-12 m-12">
                    <ul class="pagination-list">
                        <li class="pagination-item">
                            <a href="index.php#mac" class="pagination-item__link active">1</a>
                        </li>
                        <li class="pagination-item">
                            <a href="index.php?macPage=2#mac" class="pagination-item__link">2</a>
                        </li>
                        <li class="pagination-item">
                            <a href="index.php?macPage=3#mac" class="pagination-item__link">3</a>
                        </li>
                    </ul>
                </section>
                <!-- /pagination -->
            </section>
        </section>
        <!-- /mac products-->

        <!-- watch products-->
        <section class="main-container main-container__products grid wide">
            <section class="main-container__title-trademark grid wide c-12 l-12 m-12">
                <section class="title-products background-cate-4 c-3 m-3 l-3">
                    <h4 id="watch" class="latest-product__title title-name">Watch</h4>
                </section>
            </section>
            
            <section class="main-container__latest-product grid wide">
                <!-- row -->
                <section class="container wide row c-12">
                    
                    <?php
                        $i = 1;
                        foreach($watch_products as $watch) {
                    ?>
                    <!-- column -->
                    <a href="product-details.php?id=<?=$watch['id'];?>" class="container-column col c-12 l-3 m-4">
                        <div class="container-product cate-<?=$i;?>">
                            <img src="<?=$watch['image'];?>" alt="">
                            <!-- <div class="container-products__banner">
                                <h2 class="products-banner__title">Watch</h2>
                                <p class="banner-title__description">Own, experience great moments.</p>
                            </div> -->
                        </div>
                        <div class="btn-show-detail">
                            <button class="btn-detail-product">Detail</button>
                        </div>
                        <div class="products-description">
                            <h3 class="products-name"><?=$watch['name'];?></h3>
                            <span class="products-price"><?php echo '$'.$watch['price'];?></span>
                        </div>
                    </a>
                    <!-- /column -->
                    <?php $i++; } ?>
                   
                </section>
                 <!-- /row -->

                 <!-- pagination -->
                <section class="main-container__pagination row wide c-12 l-12 m-12">
                    <ul class="pagination-list">
                        <li class="pagination-item">
                            <a href="index.php#watch" class="pagination-item__link active">1</a>
                        </li>
                        <li class="pagination-item">
                            <a href="index.php?watchPage=2#watch" class="pagination-item__link">2</a>
                        </li>
                        <li class="pagination-item">
                            <a href="index.php?watchPage=3#watch" class="pagination-item__link">3</a>
                        </li>
                    </ul>
                </section>
                <!-- /pagination -->
            </section>
        </section>
        <!-- /watch products-->