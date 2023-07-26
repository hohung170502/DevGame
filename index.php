<?php 
    session_start();

    include './admin/config/config.inc.php';
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
            header('Location: ./admin/admin.php');
            exit();
        }
    }


    $sql = "SELECT * FROM `games` WHERE `type` = '0'";
    $result = mysqli_query($db, $sql);
    $game_steam = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $game_steam[] = $row;
    }

    $sql = "SELECT * FROM `games` WHERE `type` = '1'";
    $result = mysqli_query($db, $sql);
    $game_epic = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $game_epic[] = $row;
    }

    $sql = "SELECT * FROM `games` WHERE `type` = '2'";
    $result = mysqli_query($db, $sql);
    $code_wallet = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $code_wallet[] = $row;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/fonts/fontawesome/css/all.css">
    <link rel="icon" href="./assets/img/logo-xanh.png" type="image/x-icon" />

    <!-- Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <title>DevGame Shop</title>
</head>

<body>
    <div id="wed-divine">

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
                        <a class="header-logo" title="Trang chủ" href="">
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
                                <?php if (!isset($_SESSION['Username'])): ?>
                                    <a href="#" class="login hover" onclick="tab1();">Đăng nhập</a>
                                    <a href="#" class="check">/</a>
                                    <a href="#" class="register over" onclick="tab2();">Đăng ký</a>
                                <?php else: ?>
                                    <a href="#" class="username over"><?php echo $_SESSION['Username']; ?></a>
                                    <a href="#" class="check">/</a>
                                    <a href="./logout.php" class="username hover">Đăng xuất</a>
                                <?php endif; ?>
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
                    </div>
                </div>
            </div>

        </header>

        <!-- Body -->
        <div class="body">
            <div class="grid">

                <!-- Body-header -->
                <div class="body-header">
                    <div class="body-header-1">
                        <div class="body-column">
                            <a href="/product.html" class="column-list">
                                <img class="column-img border" src="./assets/img/header (1).jpg" alt="">
                            </a>
                            <a href="#" class="column-list">
                                <img class="column-img border" src="./assets/img/header (2).jpg" alt="">
                            </a>
                        </div>
                    </div>

                    <div class="body-slide swiper">
                        <div class="body-content swiper-wrapper">
                            <a href="#" class="content-img swiper-slide">
                                <img class="slide-img border swiper-slide" src="./assets/img/header.jpg" alt="" >
                            </a>
                            <a href="#" class="content-img swiper-slide">
                                <img class="slide-img border swiper-slide" src="./assets/img/ark.jpg" alt="" >
                            </a>
                            <a href="#" class="content-img swiper-slide">
                                <img class="slide-img border swiper-slide" src="./assets/img/gta.jpg" alt="" >
                            </a>
                            <a href="#" class="content-img swiper-slide">
                                <img class="slide-img border swiper-slide" src="./assets/img/boruto.jpg" alt="" >
                            </a>
                            <a href="#" class="content-img swiper-slide">
                                <img class="slide-img border swiper-slide" src="./assets/img/red.jpg" alt="" >
                            </a>
                            <a href="#" class="content-img swiper-slide">
                                <img class="slide-img border swiper-slide" src="./assets/img/gun.jpg" alt="" >
                            </a>
                            <a href="#" class="content-img swiper-slide">
                                <img class="slide-img border swiper-slide" src="./assets/img/mafia.jpg" alt="" >
                            </a>
                            <a href="#" class="content-img swiper-slide">
                                <img class="slide-img border swiper-slide" src="./assets/img/forza.jpg" alt="" >
                            </a>
                            <a href="#" class="content-img swiper-slide">
                                <img class="slide-img border swiper-slide" src="./assets/img/conan.jpg" alt="" >
                            </a>
                        </div>
                        <div class="swiper-button-next" style="right: 8px;"></div>
                        <div class="swiper-button-prev" style="left: 8px;"></div>
                        <div class="swiper-pagination"></div>
                    </div>
    
                    <div class="body-header-1">
                        <div class="body-column">
                            <a href="#" class="column-list">
                                <img class="column-img border" src="./assets/img/header (7).jpg" alt="">
                            </a>
                            <a href="#" class="column-list">
                                <img class="column-img border" src="./assets/img/header(7).jpg" alt="">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="body-header-2">
                    <div class="body-menu">
                        <a href="#" class="menu-items">
                            <img src="./assets/img/header (3).jpg" alt="" class="item-img border">
                        </a>
                        <a href="#" class="menu-items">
                            <img src="./assets/img/header (4).jpg" alt="" class="item-img border">
                        </a>
                        <a href="#" class="menu-items">
                            <img src="./assets/img/header (5).jpg" alt="" class="item-img border">
                        </a>
                        <a href="#" class="menu-items">
                            <img src="./assets/img/header (6).jpg" alt="" class="item-img border">
                        </a>
                    </div>
                </div>

                <!-- Special offers -->
                <div id="special" class="special-offers">

                    <!-- special-title -->
                    <div class="special-title">
                        <h2 class="special-text">Ưu đãi đặt biệt</h2>
                        <a href="#" class="special-more">Khám phá</a>
                    </div>
                    <div class="tittle-down">
                        Danh sách những sản phẩm ưu đãi mà có thể bạn sẽ thích!
                    </div>

                    <!-- body-slide -->
                    <div class="slide-container swiper">
                        <div class="slide-contnet">
                            <div class="card-wrapper swiper-wrapper">
                                
                                <a href="#" class="card swiper-slide">
                                    <div class="image-content">
                                        <div class="card-image">
                                            <img src="./assets/img/spotlight_image_english.jpg" alt="" class="card-img">
                                        </div>
                                    </div>

                                    <div class="card-content">
                                        <h2 class="title">Sale trong ngày</h2>
                                        <div class="content-text">Ưu đãi kết thúc vào 00:00!</div>
                                        <div class="content-price">
                                            <div class="final-price">495.000đ</div>
                                            <div class="original-price">990.000đ</div>
                                            <div class="discount-percent">-50%</div>
                                        </div>
                                    </div>
                                </a>

                                <a href="#" class="card swiper-slide">
                                    <div class="image-content">
                                        <div class="card-image">
                                            <img src="./assets/img/gta.jpg" alt="" class="card-img">
                                        </div>
                                    </div>

                                    <div class="card-content">
                                        <h2 class="title">Sale trong ngày</h2>
                                        <div class="content-text">Ưu đãi kết thúc vào 00:00!</div>
                                        <div class="content-price">
                                            <div class="final-price">495.000đ</div>
                                            <div class="original-price">990.000đ</div>
                                            <div class="discount-percent">-50%</div>
                                        </div>
                                    </div>
                                </a>

                                <a href="#" class="card swiper-slide">
                                    <div class="image-content">
                                        <div class="card-image">
                                            <img src="./assets/img/ark.jpg" alt="" class="card-img">
                                        </div>
                                    </div>

                                    <div class="card-content">
                                        <h2 class="title">Sale trong ngày</h2>
                                        <div class="content-text">Ưu đãi kết thúc vào 00:00!</div>
                                        <div class="content-price">
                                            <div class="final-price">495.000đ</div>
                                            <div class="original-price">990.000đ</div>
                                            <div class="discount-percent">-50%</div>
                                        </div>
                                    </div>
                                </a>

                                <a href="#" class="card swiper-slide">
                                    <div class="image-content">
                                        <div class="card-image">
                                            <img src="./assets/img/conan.jpg" alt="" class="card-img">
                                        </div>
                                    </div>

                                    <div class="card-content">
                                        <h2 class="title">Sale trong ngày</h2>
                                        <div class="content-text">Ưu đãi kết thúc vào 00:00!</div>
                                        <div class="content-price">
                                            <div class="final-price">495.000đ</div>
                                            <div class="original-price">990.000đ</div>
                                            <div class="discount-percent">-50%</div>
                                        </div>
                                    </div>
                                </a>

                                <a href="#" class="card swiper-slide">
                                    <div class="image-content">
                                        <div class="card-image">
                                            <img src="./assets/img/gun.jpg" alt="" class="card-img">
                                        </div>
                                    </div>

                                    <div class="card-content">
                                        <h2 class="title">Sale trong ngày</h2>
                                        <div class="content-text">Ưu đãi kết thúc vào 00:00!</div>
                                        <div class="content-price">
                                            <div class="final-price">495.000đ</div>
                                            <div class="original-price">990.000đ</div>
                                            <div class="discount-percent">-50%</div>
                                        </div>
                                    </div>
                                </a>

                                <a href="#" class="card swiper-slide">
                                    <div class="image-content">
                                        <div class="card-image">
                                            <img src="./assets/img/naurto.jpg" alt="" class="card-img">
                                        </div>
                                    </div>

                                    <div class="card-content">
                                        <h2 class="title">Sale trong ngày</h2>
                                        <div class="content-text">Ưu đãi kết thúc vào 00:00!</div>
                                        <div class="content-price">
                                            <div class="final-price">495.000đ</div>
                                            <div class="original-price">990.000đ</div>
                                            <div class="discount-percent">-50%</div>
                                        </div>
                                    </div>
                                </a>

                                <a href="#" class="card swiper-slide">
                                    <div class="image-content">
                                        <div class="card-image">
                                            <img src="./assets/img/boruto.jpg" alt="" class="card-img">
                                        </div>
                                    </div>

                                    <div class="card-content">
                                        <h2 class="title">Sale trong ngày</h2>
                                        <div class="content-text">Ưu đãi kết thúc vào 00:00!</div>
                                        <div class="content-price">
                                            <div class="final-price">495.000đ</div>
                                            <div class="original-price">990.000đ</div>
                                            <div class="discount-percent">-50%</div>
                                        </div>
                                    </div>
                                </a>

                                <a href="#" class="card swiper-slide">
                                    <div class="image-content">
                                        <div class="card-image">
                                            <img src="./assets/img/red.jpg" alt="" class="card-img">
                                        </div>
                                    </div>

                                    <div class="card-content">
                                        <h2 class="title">Sale trong ngày</h2>
                                        <div class="content-text">Ưu đãi kết thúc vào 00:00!</div>
                                        <div class="content-price">
                                            <div class="final-price">495.000đ</div>
                                            <div class="original-price">990.000đ</div>
                                            <div class="discount-percent">-50%</div>
                                        </div>
                                    </div>
                                </a>

                                <a href="#" class="card swiper-slide">
                                    <div class="image-content">
                                        <div class="card-image">
                                            <img src="./assets/img/forza.jpg" alt="" class="card-img">
                                        </div>
                                    </div>

                                    <div class="card-content">
                                        <h2 class="title">Sale trong ngày</h2>
                                        <div class="content-text">Ưu đãi kết thúc vào 00:00!</div>
                                        <div class="content-price">
                                            <div class="final-price">495.000đ</div>
                                            <div class="original-price">990.000đ</div>
                                            <div class="discount-percent">-50%</div>
                                        </div>
                                    </div>
                                </a>

                            </div>
                        </div>

                        <div class="swiper-button-next swiper-navBtn"></div>
                        <div class="swiper-button-prev swiper-navBtn"></div>
                        <div class="swiper-pagination"></div>

                    </div>

                </div>

                <!-- Game on steam -->
                <div id="ost" class="game-ost">
                    <div class="ost-tittle">
                        <div class="tittle-up">
                            <h3 class="tittle-l">Game trên Steam</h3>
                            <a href="#" class="special-more">Khám phá</a>
                        </div>
                        <div class="tittle-down">
                            Những trò chơi được đánh giá tốt, nội dung hấp dẫn thu hút đang chờ bạn!
                        </div>
                    </div>

                    <div class="ost-list">
                        <div class="ost-items">
                            <?php if (count($game_steam) > 0):
                                    foreach ($game_steam as $game): ?>
                                        <div class="ost-member">
                                            <a href="./product.php?product=<?= $game['id']?>" class="member-content">
                                                <img class="member-img" src="./assets/img/Uploads/<?= $game['image']?>" alt="">
                                                <div class="member-txt"><?= $game['name']?></div>
                                                <div class="member-price">
                                                    <div class="price-final"><?= $game['discount'] > 0 ? number_format($game['discount']) : number_format($game['price']) ?>đ</div>
                                                    <?php if ($game['discount'] > 0): ?>
                                                        <div class="price-root"><?= number_format($game['price']) ?>đ</div>
                                                        <div class="price-dicount">- <?= ceil(($game['price'] - $game['discount']) * 100 / $game['price']) ?>%</div>
                                                    <?php endif; ?>
                                                </div>
                                            </a>
                                        </div>
                                    <?php endforeach;
                                endif; ?>
                        </div>

                    </div>
                </div>

                <!-- Game on epic -->
                <div id="epic" class="epic-game">
                    <div class="epic-tittle">
                        <div class="tittle-up">
                            <h3 class="tittle-l">Game on Epic</h3>
                            <a href="#" class="special-more">Khám phá</a>
                        </div>
                    </div>

                    <div class="epic-list">
                        <div class="epic-items">
                            <?php if (count($game_epic) > 0):
                                    foreach ($game_epic as $game): ?>
                                        <div class="epic-member">
                                            <a href="./product.php?product=<?= $game['id']?>" class="member-content">
                                                <img class="member-img" src="./assets/img/Uploads/<?= $game['image']?>" alt="">
                                                <div class="member-txt"><?= $game['name']?></div>
                                                <div class="member-price">
                                                    <div class="price-final"><?= $game['discount'] > 0 ? number_format($game['discount']) : number_format($game['price']) ?>đ</div>
                                                    <?php if ($game['discount'] > 0): ?>
                                                        <div class="price-root"><?= number_format($game['price']) ?>đ</div>
                                                        <div class="price-dicount">- <?= ceil(($game['price'] - $game['discount']) * 100 / $game['price']) ?>%</div>
                                                    <?php endif; ?>
                                                </div>
                                            </a>
                                        </div>
                                    <?php endforeach;
                                endif; ?>
                        </div>

                    </div>
                </div>

                <!-- Code wallet -->
                <div id="wallet" class="code-wallet">
                    <div class="wallet-tittle">
                        <div class="tittle-up">
                            <h3 class="tittle-l">Code Wallet</h3>
                            <a href="#" class="special-more">Khám phá</a>
                        </div>
                    </div>

                    <div class="wallet-list">
                        <div class="wallet-items">
                            <?php if (count($code_wallet) > 0):
                                    foreach ($code_wallet as $game): ?>
                                        <div class="wallet-member">
                                            <a href="./product.php?product=<?= $game['id']?>" class="member-content">
                                                <img class="member-img" src="./assets/img/Uploads/<?= $game['image']?>" alt="">
                                                <div class="member-txt"><?= $game['name']?></div>
                                                <div class="member-price">
                                                    <div class="price-final"><?= $game['discount'] > 0 ? number_format($game['discount']) : number_format($game['price']) ?>đ</div>
                                                    <?php if ($game['discount'] > 0): ?>
                                                        <div class="price-root"><?= number_format($game['price']) ?>đ</div>
                                                        <div class="price-dicount">- <?= ceil(($game['price'] - $game['discount']) * 100 / $game['price']) ?>%</div>
                                                    <?php endif; ?>
                                                </div>
                                            </a>
                                        </div>
                                    <?php endforeach;
                                endif; ?>
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
                                    <span>Nguyễn Văn Toàn</span>
                                    <span>Hồ Ngọc Hùng</span>
                                    <span>Võ Thành Công</span>
                                    <span>Nguyễn Tuấn Kiệt</span>
                                    <span>Trần Thanh Bình</span>
                                </div>
                            </div>
                            <div class="infor-tittle">
                                <div class="infor-header">MSSV</div>
                                <div class="infor-body">
                                    <span>2000002725</span>
                                    <span>200000****</span>
                                    <span>200000****</span>
                                    <span>200000****</span>
                                    <span<200000****</span>
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

        <!-- Babk to top -->
        <div id="backtop">
            <i class="fa-solid fa-chevron-up icon-back"></i>
        </div>

        <!-- Modal -->
        <div class="modal hide">
            <div class="modal-ovelay"></div>
            <div class="modal-body">
                <div class="modal-inner">
                    <div class="switch">
                        <div class="login-modal" onclick="tab1();">Đăng nhập</div>
                        <div class="signup-modal close" onclick="tab2();">Đăng ký</div>
                    </div>
                    <div class="close-modal">
                        <i class="fa-solid fa-xmark close-icon"></i>
                    </div>
                    <div class="outer">
                        <form id="form">
                            <div id="page">
                                <div class="auth-modal">
                                    <div id="login" class="page-content">
                                    <p class="title-note">Đăng nhập để theo dõi đơn hàng, và nhận nhiều ưu đãi hấp dẫn</p>
                                    <div class="element">
                                        <input class="input-modal" type="text" placeholder="" id="inp-user">
                                        <label class="input-label">Tên đăng nhập</label>
                                    </div>
                                    <div class="element">
                                        <input class="input-modal" type="password" placeholder="" id="inp-pass">
                                        <label class="input-label">Mật khẩu</label>
                                    </div>
                                    <div class="forgot-password hover">Bạn quên mật khẩu?</div>
                                    <button id="btn-login" class="btn-modal">Đăng nhập</button>
                                    <div class="login-more">Hoặc đăng nhập bắng</div>
                                    <div class="login-social">
                                        <a href="#" class="login-social-icon">
                                            <img src="./assets/img/gg.svg" alt="Đăng nhập bằng Google">
                                        </a>
                                        <a href="#" class="login-social-icon face-icon">
                                            <img src="./assets/img/face.svg" alt="Đăng nhập bằng Facebook">
                                        </a>
                                    </div>
                                    </div>

                                    <div id="page-img">
                                    <img src="./assets/img/login.svg" alt="Login" class="page-img">
                                    </div>

                                    <div id="signup" class="page-content">
                                    <p class="title-note">Đăng ký để theo dõi đơn hàng, và nhận nhiều ưu đãi hấp dẫn</p>
                                    <div class="element form-control">
                                        <input id="username" class="input-modal" name="namelogin" type="text" placeholder=" ">
                                        <label class="input-label">Tên đăng nhập</label>
                                        <small class="small">Error message</small>
                                    </div>
                                    <div class="element">
                                        <input id="email" class="input-modal" name="email" type="email" placeholder=" ">
                                        <label class="input-label">Email</label>
                                        <small>Error message</small>
                                    </div>
                                    <div class="element">
                                        <input id="password" class="input-modal" name="password" type="password" placeholder=" ">
                                        <label class="input-label">Mật khẩu</label>
                                        <small>Error message</small>
                                    </div>
                                    <div class="element">
                                        <input id="password2" class="input-modal" name="password2" type="password" placeholder=" ">
                                        <label class="input-label">Nhập lại mật khẩu</label>
                                        <small>Error message</small>
                                    </div>
                                    <button id="btn-signup" class="btn-modal">Tạo tài khoản</button>
                                    </div>

                                    <div id="page-img">
                                    <img src="./assets/img/signup.svg" alt="Login" class="page-img">
                                    </div>

                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Javascript -->
    <script src="./assets/js/slider.js"></script>
    <script src="./assets/js/slider1.js"></script>
    <script src="./assets/js/more-btn.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="./assets/js/backtop.js"></script>
    <script src="./assets/js/modal.js"></script>
    <script src="./assets/js/switch.js"></script>
    <script src="./assets/js/signup.js"></script>
    
</body>
</html>
