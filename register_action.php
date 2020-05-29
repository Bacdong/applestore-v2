<?php
    require_once('public/connection.php');
    date_default_timezone_set('Asia/Ho_Chi_Minh');

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $password = $_POST['password']; 
    $password2 = $_POST['password2'];

    if($name == '' || $name == ' ' || $name == NULL ||
        $phone == '' || $phone == ' ' || $phone == NULL ||
        $username == '' || $username == ' ' || $username == NULL ||
        $password == '' || $password == ' ' || $password == NULL ||
        $password2 != $password
    ) {
        setcookie('msg','The fields are not allowed to be empty!',time()+1);
        header('Location: register.php');
    } else {
        $created_at = date('Y-m-d H:i:s');
        $status = 1;

        $query = "INSERT INTO users(name,phone,username,password,created_at,status) VALUES('".$name."','".$phone."','".$username."','".sha1($_POST['password'])."','".$created_at."','".$status."');";
        $status_create = $connection->query($query);

        if($status_create == true) {
            setcookie('msg','Register successfull!',time()+1);
            header('Location: login.php');
        } else {
            setcookie('msg','Register Failed!',time()+1);
            header('Location: register.php');
        }
    }
    
    
?>