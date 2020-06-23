<?php
    require_once('../../public/connection.php');
    if(isset($_POST['image'])) {
        $currentThumbnail = $_POST['image'];
    } else {
        $currentThumbnail = "../../img/product/temp.png";
    }
    
    // upload file
    $target = "../../img/product/";
    $thumbnail = '';

    $target_file = $target.basename($_FILES['image']['name']);
    $status_file = move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
    if($status_file) {
        $thumbnail = ",image = 'img/product/".basename($_FILES['image']['name']."'");
    }

    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
    $admin_id = 1;
    $status = 0;
    // echo $status;
    // die;
    if(isset($_POST['status'])) {
        // $status = $_POST['status'];
        $status = 1;
    }
    // echo $status;
    // die;
    
    $query = "UPDATE products SET name = '".$name."', price = '".$price."'$thumbnail, category_id = '".$category_id."', admin_id = '".$admin_id."', status = '".$status."' WHERE id=".$id;
    $status_update = $connection->query($query);

    if($status_update == true) {
        setcookie('msg', 'Update Successfull!', time()+1);
        header('Location: admin.php');
    } else {
        setcookie('msg', 'Update Failed!', time()+1);
        header('Location: product-edit.php?id='.$id);
    }
?>