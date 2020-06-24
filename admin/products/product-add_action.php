<?php
    require_once('../../public/connection.php');
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    // upload file
    $target = "../../img/product/";
    $thumbnail = '';

    $target_file = $target.basename($_FILES['image']['name']);
    $status_file = move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
    if($status_file) {
        $thumbnail = "img/product/".basename($_FILES['image']['name']);
    }

    $name = $_POST['name'];
    $price = $_POST['price'];
    $category_id = $_POST['category-id'];
    $created_at = date('Y-m-d H:i:s');
    $admin_id = 1;

    $status = 0;
    if(isset($_POST['status'])) {
        $status = $_POST['status'];
    }

    $query = "INSERT INTO products(name, price, image, category_id, created_at, admin_id, status) VALUES('".$name."','".$price."','".$thumbnail."','".$category_id."','".$created_at."','".$admin_id."','".$status."');";
    $status_add = $connection->query($query);
    // die($query);

    if($status_add == true) {
        setcookie('msg', 'Create successfully!',time()+1);
        header('Location: admin.php');
    } else {
        setcookie('msg', 'Create failed!',time()+1);
        header('Location: admin.php');
    }
?>