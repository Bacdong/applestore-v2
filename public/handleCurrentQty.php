<?php 
        // session_start();
        require_once('connection.php');
        if (isset($_SESSION['cart'])) {
            if (isset($_SESSION['isLogin']) && !empty($_SESSION['author'])) {
                $userID = $_SESSION['author']['id'];
                $qry = "SELECT * FROM order_details WHERE order_id = ".$userID;
                $rs = $connection->query($qry);
                $items = array();
                while ($row = $rs->fetch_assoc()) {
                    $items[] = $row;
                }

                $totalQty = 0;
                foreach ($items as $item) {
                    $totalQty += $item['quantity'];
                }
                echo $totalQty;
                // var_dump($_SESSION['cart'][$id]);die;
            }
    ?>
        <style>
            div.header-auth__carts::before {
                content: "<?=$_SESSION['cart'][$id];?>";
            }
        </style>
    <?php } ?>