<?php
    require_once('../public/connection.php');

    $currentStatus = $_GET['status'];
    $bill_id = $_GET['id'];

    if ($currentStatus == 0) {
        $statusUpdate = 1;
    } else {
        $statusUpdate = 0;
    }

    // echo 'status = '.$currentStatus.'<br/>'.'ID: '.$bill_id;die;

    $qry = "UPDATE orders SET status = ".$statusUpdate." WHERE id =".$bill_id;
    $rs = $connection->query($qry);

    if ($rs == true) {
        setcookie('msg', 'Successful!', time() + 1);
        header('Location: bills.php');
    } else {
        setcookie('msg', 'Failed!', time() + 1);
        header('Location: bills.php');
    }
?>