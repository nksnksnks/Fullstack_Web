<?php
    session_start();
    $check_login = 0;
    if (isset($_SESSION['username'])) {
    //   echo "Chào mừng " . $_SESSION['username'] . " đến với trang web của chúng tôi!";
    $check_login = 1;
    } else {
    //   header('Location: login.php');
    //   exit;
    }
?>
<!DOCTYPE html>
<html lang="vi">
    <head>
        <title>Admin</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="shortcut icon" href="img/logo-tab.png" type="image/x-icon">
        <link rel="stylesheet" href="css/main.css">
        <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" 
        crossorigin="anonymous">
        <link rel="stylesheet" 
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <script src="script.js"></script>
        <script 
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" 
            crossorigin="anonymous">
        </script>
        <style>
            .btn-secondary {
                --bs-btn-color: #fff;
                --bs-btn-border-color: #9317a3;
                --bs-btn-hover-bg:  #850661;
                --bs-btn-hover-border-color: #565e64;
                --bs-btn-active-bg: #9317a3;
                background-color: transparent;
                border:transparent;
                font-size: 150%;
                top: -50%;
            }
            .btn {
                --bs-btn-padding-x: 0.75rem;
                --bs-btn-padding-y: 0.375rem;
                --bs-btn-font-family: ;
                --bs-btn-font-size: 1rem;
                --bs-btn-font-weight: 400;
                --bs-btn-line-height: 1.5;
            }
            .dropdown-menu {
                --bs-dropdown-link-active-bg: #9317a3;
            }
            .table {
                margin-top: 50px;
                --bs-table-color: var(--bs-body-color);
                --bs-table-bg: transparent;
                --bs-table-border-color: var(--bs-border-color);
                --bs-table-accent-bg: transparent;
                --bs-table-striped-color: var(--bs-body-color);
                --bs-table-striped-bg: rgba(143, 0, 0, 0.05);
                --bs-table-active-color: var(--bs-body-color);
                --bs-table-active-bg: rgba(3, 0, 0, 0.1);
                --bs-table-hover-color: var(--bs-body-color);
                --bs-table-hover-bg: rgba(143, 2, 115, 0.075);
            }
            table {
                caption-side: bottom;
                border-collapse: collapse;
            }
            table {
                border-collapse: separate;
                text-indent: initial;
                /* border-spacing: 2px; */
            }
            .btn{
                border: 1px solid #a00875;
                padding: 5px;
                padding-left: 20px;
                padding-right: 20px;
                border-radius: 5px;
            }
            .btn:hover{
                border: 1px solid #a00875;
                background-color: #850661;
                color: white;
            }
        </style>
    </head>
    <body>
        <!-- header -->
        <header>  
            <div class="menubar">
                <img class="menubar-background" src="img/menubar.png" alt="">
                <div class="home">
                    <a class="home-btn" href="index.php"></a>
                </div>
                <div class="search-cart-menuhome">
                    <form action="search.php" method="GET" > 
                        <input class="input-search" type="text" placeholder="Search" style="padding-left: 15px;"name="keyword" required>
                        <button class="button-search" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                        <button onclick="" id="cart">
                            <i class="bi bi-journal-plus"></i>
                            <a href="book-add.php" style = "color:white; text-decoration: none;">Add book</a> 
                        </button> 
                        <div class="dropdown menu-btn" style="top:-30%; border: none;">
                            <button class="btn btn-secondary" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-list menu-symbol" style=" border: none;"></i>
                            </button>
                            <?php if($check_login == 1){
                                ?>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="admin_sell_wait.php">Xử lý đơn hàng</a></li>
                                <li><a class="dropdown-item" href="#">Đổi mật khẩu</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="logout.php">Đăng xuất</a></li>
                            </ul>
                            <?php
                            }
                            else{
                                ?>
                                <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="admin_sell_wait.php">Xử lý đơn hàng</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="login.php">Đăng nhập</a></li>
                            </ul>
                            <?php
                            }
                            ?>
                          </div>
                    </form>
                </div>
                <div class="menubar-box">
                    <div class="menubar-address-text">
                        <i class="bi bi-geo-alt-fill"></i>
                        112 Vu Ngoc Phan St., Lang Ha, Dong Da, HNC
                    </div>
                    <div class="menubar-phone-text">
                        <i class="bi bi-headset"></i>
                        Call Us: 1800 1508 | 084 8173 289
                    </div>
                </div>
            </div>
        </header>
        <a href=""style="margin-top: 90px;">Add Book</a>