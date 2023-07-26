<?php 
    session_start();

    include './config.inc.php';
    $db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (isset($_SESSION['Username'])) {
        $username = $_SESSION['Username'];
        // check if role == 1
        $sql = "SELECT * FROM `account` WHERE `username` = '$username' AND `role` = '1'";
        $result = mysqli_query($db, $sql);
        if (mysqli_num_rows($result) == 1) {
            header('Location: ./manager.php');
            exit();
        }
    }

    if (!isset($_GET['product'])) {
        header('Location: ./');
        exit();
    }

    $product = $_GET['product'];

    $sql = "SELECT * FROM `games` WHERE `id` = '$product'";
    $result = mysqli_query($db, $sql);
    if (mysqli_num_rows($result) == 0) {
        header('Location: ./');
        exit();
    }

    $data = mysqli_fetch_assoc($result);
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./assets/img/logo.svg" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/product.css">
    <link rel="stylesheet" href="./assets/fonts/fontawesome/css/all.css">
    <title>DevGame Shop</title>
</head>
<body>
    
    <!-- Header -->
    <header>

        <!-- Header Up -->
        <div class="header">
            <div class="grid padding">
                <div class="header-navbar">
                    <ul class="navbar">
                        <li class="navbar-item header-margin-down">
                            <a href="" class="navbar-icon">
                                <i class="icon-navbar fa-solid fa-arrows-left-right"></i>
                            </a>
                            Chào mừng bạn đến với Shop!
                        </li>
                    </ul>
        
                    <ul class="navbar">
                        <li class="navbar-item">
                            <a href="" class="navbar-link hover">
                                <i class="icon-navbar fa-solid fa-book"></i>
                                Hướng dẫn mua hàng
                            </a>
                        </li>
                        <li class="navbar-item">
                            <a href="" class="navbar-link hover">
                                <i class="icon-navbar fa-solid fa-percent"></i>
                                Ưu đãi khách hàng
                            </a>
                        </li>
                        <li class="navbar-item">
                            <a href="#footer" class="navbar-link hover">
                                <i class="icon-navbar fa-solid fa-phone"></i>
                                Thông tin liên hệ
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Header Center -->
        <div class="header-center">
            <div class="grid">
                <!-- Header logos -->
                <div class="header-nav">
                    <a class="header-logo" title="Trang chủ" href="./">
                        <img class="header-img" src="./assets/img/logo trang.png" alt="logo">
                        <h4 class="header-text">DevGame Shop</h4>
                    </a>
                    <!-- Header search -->
                    <div class="header-search">
                        <form role="search">
                            <div class="search">
                                <input type="text" class="search-text border" placeholder="Tìm kiếm sản phẩm">
                                <button class="search-button border" aria-label="search">
                                    <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path d="M508.5 468.9L387.1 347.5c-2.3-2.3-5.3-3.5-8.5-3.5h-13.2c31.5-36.5 50.6-84 50.6-136C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c52 0 99.5-19.1 136-50.6v13.2c0 3.2 1.3 6.2 3.5 8.5l121.4 121.4c4.7 4.7 12.3 4.7 17 0l22.6-22.6c4.7-4.7 4.7-12.3 0-17zM208 368c-88.4 0-160-71.6-160-160S119.6 48 208 48s160 71.6 160 160-71.6 160-160 160z"></path>
                                    </svg>
                                </button>
                                <div class="search-history">
                                    <div class="history-list">
                                        <a class="history-item hover" href="#">Nâng cấp AutoDesk</a>
                                        <a class="history-item hover" href="#">Tài khoản GTA V giá rẻ</a>
                                        <a class="history-item hover" href="#">Tài khoản Battlefield giá rẻ</a>
                                        <a class="history-item hover" href="#">Tài khoản Netflix Premium</a>
                                        <a class="history-item hover" href="#">Discord Nitro 3 tháng</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Header login/register -->
                    <div class="header-login-register">
                        <div class="header-list">
                            <button class="user-btn">
                                <svg class="user-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path d="M256 288c79.5 0 144-64.5 144-144S335.5 0 256 0 112 64.5 112 144s64.5 144 144 144zm128 32h-55.1c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16H128C57.3 320 0 377.3 0 448v16c0 26.5 21.5 48 48 48h416c26.5 0 48-21.5 48-48v-16c0-70.7-57.3-128-128-128z"></path>
                                </svg>
                            </button>
                            <div class="login-register">
                                <a href="./" class="login hover">Đăng nhập</a>
                                <a href="#" class="check">/</a>
                                <a href="./" class="register hover">Đăng ký</a>
                            </div>
                        </div>
                    </div>
                    <!-- Header cart -->
                    <div class="header-cart">
                        <a href="./cart.html" class="cart">
                            <i class="cart-icon fa-solid fa-cart-shopping"></i>
                            <div class="cart-text">Giỏ hàng</div>
                        </a>
                    </div>
                </div>
                
            </div>
        </div>

        <!-- Header down -->
        <div class="header-down">
            <div class="grid">
                <div class="down-lists">
                    <i class="fa-solid fa-bars menu-icon"></i>
                    <h4 class="fist-item">Danh mục sản phẩm:</h4>
                    <a class="lists-item btn btn--left" href="#special">
                        <i class="fa-solid fa-star"></i> Ưu đãi đặt biệt</a>
                    <a class="lists-item btn btn--left" href="#ost">
                        <i class="fa-brands fa-steam"></i> Game trên Steam</a>
                    <a class="lists-item btn btn--left" href="#epic">
                        <i class="fa-solid fa-gamepad"></i> Game on Epic</a>
                    <a class="lists-item btn btn--left" href="#wallet">
                        <i class="fa-solid fa-wallet"></i> Code Wallet</a>
                    <a class="lists-item btn btn--left" href="#host">
                        <i class="fa-brands fa-hotjar"></i> Sản phẩm nổi bật</a>
                </div>
            </div>
        </div>

    </header>

    <!-- Body -->
    <div class="product-body">
        <div class="grid">
            <div class="product-content">
                <div class="product-image">
                    <div class="product-img">
                        <img src="./assets/img/Uploads/<?= $data['image'] ?>" alt="product">
                    </div>
                </div>
                <div class="product-txt-content">
                    <div class="product-txt">
                        <div class="product-title">
                            <div class="product-title-name">
                                <span class="product-name">Sản phẩm</span>
                                <h3 class="name-product"><?= $data['name'] ?></h3>
                            </div>
                            <div class="product-title-category">
                                <div class="product-condition">
                                    <i class="fa-solid fa-box product-icon"></i>
                                    <div class="type-txt">Tình trạng:
                                        <?= $data['status'] == 0 ? '<span class="type-condition-red">Hết hàng</span>':'<span class="type-condition">Còn hàng</span>' ?>
                                    </div>
                                </div>
                                <div class="product-type">
                                    <i class="fa-solid fa-tag type-icon"></i>
                                    <div class="product-type-text">
                                        Thể loại: <?= $data['type'] == 0 ? 'Steam' : ($data['type'] == 1 ? 'Epic' : 'Code Wallet') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-price">
                            <div class="product-price-final">
                                <h4><?= $data['discount'] == 0 ? number_format($data['price']) : number_format($data['discount']) ?>đ</h4>
                            </div>
                            <?php if ($data['discount'] > 0): ?>
                                <div class="product-price-down">
                                    <div class="product-price-orginal"><?= number_format($data['price']) ?></div>
                                    <div class="product-price-discound">- <?= ceil(($data['price'] - $data['discount']) * 100 / $data['price']) ?>%</div>
                                </div>
                            <?php endif ?>
                        </div>
                        <div class="product-line"></div>
                        <div class="product-buy">
                            <div class="product-buy-content">
                                <div class="buy-btn">
                                    <div class="buy-btn-item">
                                        <i class="fa-solid fa-credit-card"></i>
                                        <div class="buy-btn-txt">Mua ngay</div>
                                    </div>
                                    <div class="buy-btn-items">
                                        <i class="fa-solid fa-cart-plus"></i>
                                        <div class="buy-btn-txt">Thêm vào giỏ hàng</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-detail">
                    <div class="product-detail-content">
                        <div class="detail-title">Chi tiết sản phẩm</div>
                        <div class="detail-body"><?= $data['desc'] ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer id="footer">
        <!-- social networks -->
        <div class="social-lists">
            <div class="social-ft">
                <a href="#" class="social-member social-face">
                    <img class="social-img" src="./assets/img/face.svg" alt="Facebook">
                </a>
                <a href="#" class="social-member">
                    <img class="social-img" src="./assets/img/youtube.svg" alt="Facebook">
                </a>
                <a href="#" class="social-member">
                    <img class="social-img" src="./assets/img/ins.svg" alt="Facebook">
                </a>
            </div>
        </div>

        <div class="grid">

            <div class="line"></div>

            <!-- Information -->
            <div class="infor-lists">
                <div class="infor-member">
                    <div class="infor-txt">
                        <div class="infor-tittle">
                            <div class="infor-header">Giới thiệu</div>
                            <div class="infor-body">
                                <span>Phạm Minh Nhựt</span>
                                <span>Hồ Ngọc Hùng</span>
                                <span>Huỳnh Phước Trí</span>
                                <span>Nguyễn Tuấn Kiệt</span>
                            </div>
                        </div>
                        <div class="infor-tittle">
                            <div class="infor-header">MSSV</div>
                            <div class="infor-body">
                                <span>2000004365</span>
                                <span>200000****</span>
                                <span>200000****</span>
                                <span>200000****</span>
                            </div>
                        </div>
                        <div class="infor-tittle">
                            <div class="infor-header">Liên hệ</div>
                            <div class="infor-body">
                                <span>Hotline:
                                    <span class="red">1900 2525</span>
                                </span>
                                <span>(Các ngày trong tuần từ 8h đến 24h)</span>
                                <span>Email hỗ trợ: tktw@gmail.com</span>
                                <span>Địa chỉ giao dịch: Phòng M106</span>
                                <span>Trường đại học NTTU</span>
                            </div>
                        </div>
                    </div>

                    <div class="infor-img">
                        <a href="#">
                            <img class="infor-logo" src="./assets/img/logo-xanh.png" alt="">
                        </a>
                        <div class="logo-txt">DevGame Shop</div>
                    </div>
                </div>
            </div>

        </div>
    </footer>

</body>
</html>