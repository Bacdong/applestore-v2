<?php
    //query latest products
    $query_lastestProducts = 'SELECT p.*, c.title, c.description FROM products p LEFT JOIN categories c ON p.category_id = c.id WHERE p.status = 1 ORDER BY created_at desc limit 0,8;';
    $result_lastestProducts = $connection->query($query_lastestProducts);
    $latest_products = array();
    while($row = $result_lastestProducts->fetch_assoc()) {
        $latest_products[] = $row;
    }
    //query latest products - end

    // query pagination
    // $query = 'SELECT COUNT(*) as pageNumber FROM products WHERE status = 1;';
    // $result =  $connection->query($query)->fetch_assoc();
    // $productsNumberInPage = 12;
    // $pageTotal = ceil($result['pageNumber'] / 12);
    // query pagination - end

    


    //query iphone products
    // $query_iphone = 'SELECT p.*, c.title, c.description FROM products p LEFT JOIN categories c ON p.category_id = c.id WHERE p.status = 1 and p.category_id = 1 limit 0,8;';
    // $result_iphone = $connection->query($query_iphone);
    // $iphone_products = array();
    // while($row = $result_iphone->fetch_assoc()) {
    //     $iphone_products[] = $row;
    // }
    //query iphone products - end

    //query ipad products
    // $query_ipad = 'SELECT p.*, c.title, c.description FROM products p LEFT JOIN categories c ON p.category_id = c.id WHERE p.status = 1 and p.category_id = 2 limit 0,8;';
    // $result_ipad = $connection->query($query_ipad);
    // $ipad_products = array();
    // while($row = $result_ipad->fetch_assoc()) {
    //     $ipad_products[] = $row;
    // }
    //query ipad products - end

    //query mac products
    // $query_mac = 'SELECT p.*, c.title, c.description FROM products p LEFT JOIN categories c ON p.category_id = c.id WHERE p.status = 1 and p.category_id = 3 limit 0,8;';
    // $result_mac = $connection->query($query_mac);
    // $mac_products = array();
    // while($row = $result_mac->fetch_assoc()) {
    //     $mac_products[] = $row;
    // }
    //query mac products - end

    //query watch products
    // $query_watch = 'SELECT p.*, c.title, c.description FROM products p LEFT JOIN categories c ON p.category_id = c.id WHERE p.status = 1 and p.category_id = 4 limit 0,8;';
    // $result_watch = $connection->query($query_watch);
    // $watch_products = array();
    // while($row = $result_watch->fetch_assoc()) {
    //     $watch_products[] = $row;
    // }
    //query watch products - end
?>