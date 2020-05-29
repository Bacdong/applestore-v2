<?php
    require_once('../connection.php');
    // upload file
    $target = "../../img/users/";
    $thumbnail = '';

    $target_file = $target.basename($_FILES['avatar']['name']);
    // echo '<pre>';
    // print_r($_FILES['avatar']);
    // echo '</pre>'; die;
    // var_dump($_FILES['avatar']); die;

    $status_file = move_uploaded_file($_FILES['avatar']['tmp_name'], $target_file);

    // echo '<pre>';
    // print_r($status_file);
    // echo '</pre>'; die;

    if($status_file) {
        $thumbnail = ",avatar = 'img/users/".basename($_FILES['avatar']['name']."'");
    }

    $id = $_POST['id'];
    $surname = $_POST['surname'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    // $password = sha1($_POST['password']);
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $status = 1;
    
    // $query = "UPDATE users SET surname = '".$surname."', name = '".$name."', email = '".$email."', phone = '".$phone."', address = '".$address."', username = '".$username."', password = '".$password."'$thumbnail, status = '".$status."' WHERE id=".$id;
    $query = "UPDATE users SET surname = '".$surname."', name = '".$name."', email = '".$email."', phone = '".$phone."', address = '".$address."', username = '".$username."' $thumbnail, status = '".$status."' WHERE id=".$id;
    
    $status_update = $connection->query($query);

    if($status_update == true) {
        setcookie('msg', 'Update Successfull!', time()+1);
        $_SESSION['isLogin'] = true;
        $_SESSION['author'] = $author;
        header('Location: ../../index.php');
    } else {
        setcookie('msg', 'Update Failed!', time()+1);
        header('Location: profiles.php?userId='.$id);
    }
?>