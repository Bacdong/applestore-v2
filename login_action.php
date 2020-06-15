<?php
    ob_start();
    session_start();
    require_once('public/connection.php');
    $username = $_POST['username'];
    // $password = sha1($_POST['password']);
    $password = $_POST['password'];
    $password = sha1($password);

    // test security for users password
    // $password = $password.$id;
    // echo $password."<br/>";
    // echo md5($password)."<br/>";
    // echo sha1($password)."<br/>";
    // $password = $_POST('password');
    // echo password_hash($password, PASSWORD_BCRYPT);
    // die;
    // test security for users password - end

    $query_users = "SELECT * FROM users WHERE username = '".$username."' and password = '".$password."' and status = 1;";
    
    $author = $connection->query($query_users)->fetch_assoc();

    // var_dump($author); die;

    
    // echo "<pre>";
    //     print_r($author);
    // echo "</pre>";
    // die($query_users);

    if($author !== NULL) {
        setcookie('msg', 'Login successfull!',time()+1);
        $_SESSION['isLogin'] = true;
        $_SESSION['author'] = $author;
        header('Location: index.php');
    } else {
        $query_admin = "SELECT * FROM admins WHERE username = '".$username."' and password = '".$password."' & status = 1;";
        $admin = $connection->query($query_admin)->fetch_assoc();

        if($admin !== NULL) {
            // echo "123123"; die;
            setcookie('msg', 'Login successfull!',time()+1);
            $_SESSION['isAdmin'] = true;
            $_SESSION['admin'] = $admin;
            header('Location: admin/products/admin.php');
        } else {
            setcookie('msg', 'Login Failed!',time()+1);
            header('Location: login.php');
        }
    }

    ob_end_flush();
?>