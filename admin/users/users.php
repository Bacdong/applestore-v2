<?php
    ob_start();
    session_start();
    if(!isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] != true) {
        setcookie('msg', 'Login Failed!', time()+1);
        header("Location: ../../login.php");
    }
    require_once('../../public/connection.php');
    $query = 'SELECT * FROM users;';
    $result = $connection->query($query);
    $users = array();
    while($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
    ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Managerment</title>
    <?php require_once('head-user.php'); ?>
    <style>
        /* alert */
            section.alert {
                position: absolute;
                z-index: 11;
                --height: 70px;
                border-radius: 8px;
                box-shadow: 0 1px 10px rgba(0, 0, 0, 0.3);
                width: 400px;
                max-width: 100%;
                height: var(--height);
                line-height: var(--height);
                font-size: 20px;
                position: fixed;
                top: 16px;
                left: 120px;
                opacity: 0;
                padding-left: 2rem;
                letter-spacing: 1.1px;
                transform: translateY(-200%);
                will-change: animation;
                animation: fadeIn ease-in 0.4s;
            }
    
            section.alert {
                opacity: 1;
                transform: translateY(0);
                transition: all linear 1s;
            }
    
            section.alert.success {
                color: #27805A;
                background-color: #D4EDDA;
            }
    
            section.alert.success span {
                color: #155724;
                font-weight: bold;
            }
    
            section.alert.failed {
                color: #8E3637;
                background-color: #F8D7DA;
            }
    
            section.alert.failed span {
                color: #981C24;
                font-weight: bold;
            }

            label.label-form.label-status {
                line-height: 16px;
            }
            /* /alert */
    </style>
</head>
<body>
    <!-- header -->
    <?php require_once('header-user.php'); ?>
    <!-- /header -->

    <?php if(isset($_COOKIE['msg'])) { ?>
    <!-- Edit failed -->
    <section class="alert success">
        <span>Notification!</span> &nbsp; <?php echo $_COOKIE['msg'];?>
    </section>
    <?php } ?>

    <main class="container grid">
        <section class="container-main grid wide">
            <section class="container-product row">
                <section class="main-product c-12 l-7 m-12">
                    <h4 class="product-title">User List</h4>
                    <table border="1" class="table-product">
                        <thead class="table-head">
                            <th class="head-title">Id</th>
                            <th class="head-title img">Surname</th>
                            <th class="head-title">Name</th>
                            <th class="head-title">Username</th>
                            <th class="head-title">Created</th>
                            <th class="head-title">Active</th>
                        </thead>

                        <tbody class="table-body">
                            <?php 
                                $i = 1;
                                foreach($users as $user) { 
                            ?>
                            <tr class="table-row" onclick="location.href='user-details.php?user=<?=$user['id'];?>'">
                                <td class="table-column"><?=$i;?></td>
                                <td class="table-column img"><?=$user['surname'];?></td>
                                <td class="table-column"><?=$user['name'];?></td>
                                <td class="table-column"><?=$user['username'];?></td>
                                <td class="table-column price"><?=$user['created_at'];?></td>
                                <td class="table-column active">
                                    <a title="Edit product" href="user-edit.php?user=<?=$user['id'];?>" class="edit-product">
                                        <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="edit" class="svg-inline--fa fa-edit fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                            <path fill="currentColor" d="M402.3 344.9l32-32c5-5 13.7-1.5 13.7 5.7V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h273.5c7.1 0 10.7 8.6 5.7 13.7l-32 32c-1.5 1.5-3.5 2.3-5.7 2.3H48v352h352V350.5c0-2.1.8-4.1 2.3-5.6zm156.6-201.8L296.3 405.7l-90.4 10c-26.2 2.9-48.5-19.2-45.6-45.6l10-90.4L432.9 17.1c22.9-22.9 59.9-22.9 82.7 0l43.2 43.2c22.9 22.9 22.9 60 .1 82.8zM460.1 174L402 115.9 216.2 301.8l-7.3 65.3 65.3-7.3L460.1 174zm64.8-79.7l-43.2-43.2c-4.1-4.1-10.8-4.1-14.8 0L436 82l58.1 58.1 30.9-30.9c4-4.2 4-10.8-.1-14.9z"></path>
                                        </svg>
                                    </a>
                                    <a href="user-delete.php?user=<?=$user['id'];?>" title="Delete product" class="delete-product">
                                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="backspace" class="svg-inline--fa fa-backspace fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                            <path fill="currentColor" d="M576 64H205.26A63.97 63.97 0 0 0 160 82.75L9.37 233.37c-12.5 12.5-12.5 32.76 0 45.25L160 429.25c12 12 28.28 18.75 45.25 18.75H576c35.35 0 64-28.65 64-64V128c0-35.35-28.65-64-64-64zm-84.69 254.06c6.25 6.25 6.25 16.38 0 22.63l-22.62 22.62c-6.25 6.25-16.38 6.25-22.63 0L384 301.25l-62.06 62.06c-6.25 6.25-16.38 6.25-22.63 0l-22.62-22.62c-6.25-6.25-6.25-16.38 0-22.63L338.75 256l-62.06-62.06c-6.25-6.25-6.25-16.38 0-22.63l22.62-22.62c6.25-6.25 16.38-6.25 22.63 0L384 210.75l62.06-62.06c6.25-6.25 16.38-6.25 22.63 0l22.62 22.62c6.25 6.25 6.25 16.38 0 22.63L429.25 256l62.06 62.06z"></path>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            <?php $i++; } ?>
                            
                        </tbody>
                    </table>
                    <div class="pagination">
                        <ul class="pagination-list">
                            <li class="pagination-item">
                                <a href="" class="pagination-item__link active">1</a>
                            </li>
                            <li class="pagination-item">
                                <a href="" class="pagination-item__link">2</a>
                            </li>
                            <li class="pagination-item">
                                <a href="" class="pagination-item__link">3</a>
                            </li>
                        </ul>
                    </div>
                </section>

                <section class="main-active c-11 l-4 m-12">
                    <section class="active-search-product">
                        <h4 class="product-title">Search User</h4>
                        <form action="" method="" class="form-search">
                            <label for="" class="title-input">Name</label>
                            <input type="text" class="input-form" placeholder="Enter name your search...">
                            <span class="error">User is not found!</span>

                            <label for="" class="title-input">Username</label>
                            <input type="text" class="input-form" placeholder="Enter username your search...">
                            <span class="error">User is not found!</span>

                            <label for="" class="title-input">Registration Date</label>
                            <input type="date" class="input-form" placeholder="Enter date your search...">
                            <span class="error">User is not found!</span>

                            <button type="submit" class="btn-submit">Search</button>
                        </form>
                    </section>

                    <section class="active-add-product">
                        <h4 class="product-title">Create New User</h4>
                        <form action="user-add_action.php" method="POST" enctype="multipart/form-data" class="form-search">
                            <label for="" class="title-input">Surname</label>
                            <input name="surname" value="" type="text" class="input-form" placeholder="Enter surname...">
                            <span class="error">Surname is not valid!</span>
                            
                            <label for="" class="title-input">Name</label>
                            <input name="name" value="" type="text" class="input-form" placeholder="Enter name...">
                            <span class="error">Your name is not valid!</span>
                            
                            <label for="" class="title-input">Username</label>
                            <input name="username" value="" type="text" class="input-form" placeholder="Enter username...">
                            <span class="error">Username is not valid!</span>
                            
                            <label for="" class="title-input">Password</label>
                            <input name="password" value="" type="password" class="input-form" placeholder="Enter password...">
                            <span class="error">Password is not valid!</span>

                            <label for="" class="title-input">Confirm password</label>
                            <input name="password" value="" type="password" class="input-form" placeholder="Enter password again...">
                            <span class="error">Password is not valid!</span>

                            <div class="status">
                                <label for="" class="label-form label-status">Allow active user?</label>
                                <input name="status" type="checkbox" class="input input-status" value="1">
                            </div>

                            <div class="button-active">
                                <button onclick="deteteForm();" class="btn-submit btn-delete">Delete</button>
                                <button type="submit" class="btn-submit btn-create">Create</button>
                            </div>
                        </form>
                    </section>
                </section>
            </section>
        </section>
    </main>
</body>
</html>