<?php 
    session_start();

    if (!isset($_SESSION['Username'])) {
        header('Location: ./');
        exit();
    }
    $username = $_SESSION['Username'];

    include './config/config.inc.php';
    // Connect database
    $db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // Check connection
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    
    // check if role == 1
    $sql = "SELECT * FROM `account` WHERE `username` = '$username' AND `role` = '1'";
    $result = mysqli_query($db, $sql);
    if (mysqli_num_rows($result) == 0) {
        header('Location: ./');
        exit();
    }

    // Get list game from database
    $sql = "SELECT * FROM `games`";
    $result = mysqli_query($db, $sql);
    $games = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $games[] = $row;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="./assets/css/menu.css">
    <link rel="stylesheet" href="./assets/css/profile.css">
    <link rel="stylesheet" href="./assets/css/category-add.css">
    

    <!-- Boxicons CSS  -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="icon" href="./assets/img/logo-xanh.png" type="image/x-icon" />
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

    <title>Menu Admin</title>
</head>
<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image" >
                    <img src="./assets/img/logo-xanh.png" alt="logo">  
                </span>

                <div class="text header-text">
                    <span class="name">DevGame</span>
                    <span class="profession">Shop</span>
                </div>

            </div>

            <i class='bx bx-chevron-right toggle'></i>


        </header>

        <div class="menu-bar">
            <div class="menu">
                    <li class="search-box">
                        <a href="#Search">
                            <i class='bx bx-search icon'></i>
                            <input type="text" placeholder="Search...">
                            
                        </a>
                    </li>
                <ul class="menu-links">
                    <li class="nav-links">
                        <a href="admin.php">
                            <i class='bx bx-home-alt icon '></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-links">
                        <a href="view-register.php">
                            <i class='bx bx-user icon ' ></i>
                            <span href="view-register.php" class="text nav-text">Quản lý tài khoản</span>

                        </a>
                    </li>
                    <li class="nav-links">
                        <a href="category-view.php">
                            <i class='bx bxs-cart-add icon '></i>
                            <span class="text nav-text">Mục sản phẩm</span>
                        </a>
                    </li>
                    <li class="nav-links">
                        <a href="#">
                            <i class='bx bxs-cart-download icon '></i>
                            <span class="text nav-text">Đơn hàng</span>
                        </a>
                    </li>
                    <li class="nav-links">
                        <a href="comment.php">
                            <i class='bx bxs-chat icon ' ></i>
                            <span class="text nav-text">Bình luận</span>
                        </a>
                    </li>
                    <li class="nav-links">
                        <a href="wallet.php">
                            <i class='bx bx-wallet icon ' ></i>
                            <span class="text nav-text">Ví</span>
                        </a>
                    </li>
                </ul>
            </div>  
            
            <div class="bottom-content">
                <li class="nav-links">
                    <a href="../logout.php">
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">Đăng xuất </span>
                    </a>
                </li>

                <li class="mode">
                    <div class="moon-sun">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark Mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li> 
            </div>

        </div>

    </nav>

    
    


    <script src="./assets/js/script.js"></script>
    <script src="./assets/js/manager.js"></script>
    <script src="./assets/js/modal.js"></script>
    
</body>
</html>

