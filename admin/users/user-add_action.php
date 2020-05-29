<?php
    require_once('../../public/connection.php');
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    // upload file // nếu muốn tạo người dùng có luôn cả ảnh
    // $target = "../../img/users/";
    // $thumbnail = '';

    // $target_file = $target.basename($_FILES['avatar']['name']);
    // $status_file = move_uploaded_file($_FILES['avatar']['tmp_name'], $target_file);
    // if($status_file) {
    //     $thumbnail = "img/users/".basename($_FILES['avartar']['name']);
    // }

    $surname = $_POST['surname'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    $created_at = date('Y-m-d H:i:s');

    $status = 0;
    if(isset($_POST['status'])) {
        $status = $_POST['status'];
    }

    $query = "INSERT INTO users(surname,name,username,password,created_at,status) VALUES('".$surname."','".$name."','".$username."','".$password."','".$created_at."','".$status."');";
    $status_add = $connection->query($query);

    if($status_add == true) {
        setcookie('msg', 'Create successfully!',time()+1);
        header('Location: users.php');
    } else {
        setcookie('msg', 'Create failed!',time()+1);
        header('Location: users.php');
    }
?>