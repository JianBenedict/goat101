<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>My Page</title>
    <link rel="stylesheet" href="css/users-index.css">
</head>
<body>
    <?php
    include_once 'classes/class.user.php';
    /* instantiate class object */
    $admin = new Admin();
    $subpage = isset($_GET['subpage']) ? $_GET['subpage'] : 'list';
    ?>
    <div id="third-submenu">
        <div class="menu-left">
            <h1>  </h1>
        </div>
        <div class="menu-right">
            <a href="index.php?page=settings&subpage=list">List Admins</a>
            <a href="index.php?page=settings&subpage=create">New Admins</a>
        </div>
    </div>
    <div id="subcontent">
        <?php
        switch($subpage){
            case 'create':
                require_once 'users-module/create-user.php';
                break; 
            case 'modify':
                require_once 'link1';
                break; 
            case 'profile':
                require_once 'link2';
                break;
            case 'list':
                require_once 'users-module/main.php';
                break;
        }
        ?>
    </div>
</body>
</html>