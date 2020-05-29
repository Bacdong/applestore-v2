<section class="main-container__pagination row wide c-12 l-12 m-12">
    <ul class="pagination-list">
        
        <?php 
            if ($current_page > 1) {
                $pre_page = ($current_page - 1);
        ?>

        <li class="pagination-item">
            <a href="index.php?item=<?=$item_in_page;?>&page=<?=$pre_page;?>&cate=<?=$currentCate;?>" class="pagination-item__link <?= ($pre_page == $current_page) ? 'active':''; ?>"><</a>
        </li>

        <?php 
            } 
            if ($current_page > 3) {
                $first_page = 1;
        ?>

        <li class="pagination-item">
            <a href="index.php?item=<?=$item_in_page;?>&page=<?=$first_page;?>&cate=<?=$currentCate;?>" class="pagination-item__link <?= ($first_page == $current_page) ? 'active':''; ?>"><?='First';?></a>
        </li>

        <?php } ?>

        <?php for ($index = 1; $index <= $pageTotal; $index++) { ?>
            <?php if ($index > ($current_page - 3) && $index < ($current_page + 3)) { ?>
                <li class="pagination-item">
                    <a href="index.php?item=<?=$item_in_page;?>&page=<?=$index;?>&cate=<?=$currentCate;?>" class="pagination-item__link <?= ($index == $current_page) ? 'active':''; ?>"><?=$index;?></a>
                </li>
            <?php } ?>
        <?php } ?>
        
        <?php 
            if ($current_page < ($pageTotal - 3)) {
                $end_page = $pageTotal;
        ?>

        <li class="pagination-item">
            <a href="index.php?item=<?=$item_in_page;?>&page=<?=$end_page;?>&cate=<?=$currentCate;?>" class="pagination-item__link <?= ($end_page == $current_page) ? 'active':''; ?>"><?='Last';?></a>
        </li>

        <?php 
            } 
            if ($current_page < ($pageTotal - 1)) {
                $next_page = ($current_page + 1);
        ?>

        <li class="pagination-item">
            <a href="index.php?item=<?=$item_in_page;?>&page=<?=$next_page;?>&cate=<?=$currentCate;?>" class="pagination-item__link <?= ($next_page == $current_page) ? 'active':''; ?>">></a>
        </li>

        <?php } ?>

    </ul>
</section>