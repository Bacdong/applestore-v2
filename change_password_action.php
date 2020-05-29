<?php
    require_once('public/connection.php');

    $id = $_POST['id'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if ($password != '') {
        if ($password2 != $password) {
            setcookie('msg', 'Retype the password incorrectly!',time()+1);
            header('Location: change_password.php');
        } else {
            $query = "UPDATE users SET password = '".sha1($password)."' WHERE id = ".$id;
            $status_change = $connection->query($query);

            if ($status_change == true) {
                setcookie('msg', 'Password changed successfully!',time()+1);
                header('Location: public/users/profiles.php?userId='.$id);
            } else {
                setcookie('msg', 'Password changed fail!',time()+1);
                header('Location: change_password.php');
            }
        }
    } else {
        setcookie('msg', 'Password is not null!',time()+1);
        header('Location: change_password.php');
    }
?>