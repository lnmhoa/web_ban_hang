<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="your-new-integrity-value" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="view/css/cssadmin.css">
    <link rel="stylesheet" href="view/css/slick.css">
    <link rel="stylesheet" href="view/css/formdkdn.css">
    <link rel="stylesheet" href="view/css/style.css">
    <link rel="stylesheet" href="view/css/reponsive.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.all.min.js"></script>
    <title>Trang chủ</title>
</head>
<body id="web">
    <div id="header">
        <div class="header">
            <div class="header-logo"><a href="index.php"><img src="view/upload/imght/logo-removebg-preview.png" alt=""></a></div>
            <div class="header-more"><i class="fa-solid fa-bars"></i></div>
            <div class="header-search">
                <div class="header-search-icon"><i class="fa-solid fa-magnifying-glass fa-fw"></i></div>
                <form action="index.php?act=searchsp" method="post" class="form-seach-home">
                <div class="header-search-1">
                    <input type="text" name="keyname" id="" placeholder="Nhập tên sản phẩm">
                </div>
                <div class="header-search-2">
                    <button type="submit" name="searchsp"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
                </form>
            </div>
            <div class="header-order">
                <div class="header-order-icon-cart"><a href="index.php?act=giohang"><i class="fa-solid fa-cart-shopping"></i></a></div>
                <div class="header-order-icon-user js-close-user"><i class="fa-solid fa-user"></i>
                <?php if(isset($_SESSION['user'])){
                    extract($_SESSION['user']);
                    ?>
                    <div class="open-user-menu">
                    <?php if(empty($hoten)){ ?>
                    <div style="padding: 0 1%;">Xin chào,<?=$tel?></div><?php }else{?>
                    <div style="padding: 0 1%;">Xin chào,<?=$hoten?></div><?php }?>
                    <?php if($role == 2){ ?>
                    <a href="admin/index.php"><div>Đăng nhập admin</div></a>
                    <?php } ?>
                    <a href="index.php?act=edittk"><div>Thay đổi thông tin</div></a>
                    <a href="index.php?act=dhct"><div>Đơn hàng của tôi</div></a>
                    <a href="index.php?act=dangxuat"><div>Đăng xuất</div></a>
                </div>
                <?php }else{ ?>
                    <div class="open-user-menu">
                        <a href="index.php?act=dangky"><div>Đăng ký</div></a>
                        <a href="index.php?act=dangnhap"><div>Đăng nhập</div></a> 
                        <a href="index.php?act=dhct"><div>Xem đơn hàng</div></a>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="header-bottom-cl">
                <div class="header-bottom-item"><a href="index.php">Trang chủ</a></div>
                <div class="header-bottom-item"><a href="index.php?act=listsp">Sản phẩm</a></div>
                <!-- <div class="header-bottom-item"><a href="index.php?act=tintuc">Tin tức</a></div> -->
            </div>
            <div class="header-bottom-cl">
                <div class="header-bottom-item"><i class="fa-solid fa-envelope"></i> <?php if(!empty($info[0][2])){ echo $info[0][2];} ?></div>
                <div class="header-bottom-item"><i class="fa-solid fa-phone"></i> <?php if(!empty($info[0][1])){ echo $info[0][1];} ?></div>
            </div>
        </div>
    </div>
    <script>
        var links = document.querySelectorAll('.header-bottom-item a');
        var currentURL = window.location.href;
        for (var i = 0; i < links.length; i++) {
            if (links[i].href === currentURL) {
                links[i].classList.add("highlight-select-header");
            }else if(currentURL.includes('?act=sanpham') || currentURL.includes('?act=addsp') || currentURL.includes('?act=listsp') || currentURL.includes('?act=searchsp')){
                links[1].classList.add("highlight-select-header");
            }
        }
    </script>
    <style>
        .highlight-select-header{
            color: yellow !important;
        }
    </style>
    