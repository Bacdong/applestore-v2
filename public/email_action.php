<?php
    require_once('connection.php');
    date_default_timezone_set('Asia/Ho_Chi_Minh');

    $email = $_POST['email'];

    $register_at = date('Y-m-d H:i:s');
    $status = 1;

    $query = "INSERT INTO news_letter(email,status,register_at) VALUES ('".$email."','".$status."','".$register_at."')";
    $status_register = $connection->query($query);

    if ($status_register == true) {
        setcookie('msg','Sign up to receive notifications of success!',time()+1);
        header('Location: ../index.php');
    } else {
        setcookie('msg','Sign up to receive notifications failed!',time()+1);
        header('Location: ../index.php');
    }
?>