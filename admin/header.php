<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../view/css/cssadmin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="your-new-integrity-value" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.min.css" rel="stylesheet">
    <title>Admin</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.all.min.js"></script>
</head>
<body>
<div id="admin">
        <div class="header-admin">
            <div class="mgl1"><a href="index.php?act=listdm">Quản lý danh mục</a></div>
            <div class="mgl1"><a href="index.php?act=listsp">Quản lý sản phẩm</a></div>
            <div class="mgl1"><a href="index.php?act=listtk">Quản lý tài khoản</a></div>
            <div class="mgl1"><a href="index.php?act=listdh">Quản lý đơn hàng</a></div>
            <div class="mgl1"><a href="index.php?act=thongke">Thống kê</a></div>
            <div class="mgl1"><a href="index.php?act=listdg">Đánh giá</a></div>     
            <div class="mgl1"><a href="index.php?act=infoweb">Khác</a></div>     
            <div class="mgl1 mgladmin"><a href="http://localhost/hoa/">Trang chủ</a></div>
    </div>
    <script>
        var links = document.querySelectorAll('#admin a');
        var currentURL = window.location.href;
        for (var i = 0; i < links.length; i++) {
            if (links[i].href === currentURL) {
                links[i].classList.add("highlight-select-header");
            }else if(currentURL.includes('?act=suadm') || currentURL.includes('?act=listdm') || currentURL.includes('?act=searchdm')){
                links[0].classList.add("highlight-select-header");
            }else if(currentURL.includes('?act=suasp') || currentURL.includes('?act=addsp') || currentURL.includes('?act=listsp') || currentURL.includes('?act=searchsp')){
                links[1].classList.add("highlight-select-header");
            }else if(currentURL.includes('?act=suatk') || currentURL.includes('?act=addtk') || currentURL.includes('?act=listtk') || currentURL.includes('?act=searchtk')){
                links[2].classList.add("highlight-select-header");
            }else if(currentURL.includes('?act=listdh') || currentURL.includes('?act=searchdh') || currentURL.includes('?act=chitietdh')){
                links[3].classList.add("highlight-select-header");
            }else if(currentURL.includes('?act=listdg') || currentURL.includes('?act=searchdg')){
                links[5].classList.add("highlight-select-header");
            }
        }
        var header = document.querySelector('.header-admin');
        if(currentURL.includes('?act=printdh')){
            header.style.display = 'none';
        }
    </script>
    <style>
        .highlight-select-header{
            text-decoration: underline !important;
            color: yellow !important;
        }
    </style>
   
    <div class="top-admin"></div>