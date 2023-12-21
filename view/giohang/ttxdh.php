<div id="body">     
<?php include "view/boxleft.php";?>
<div class="box-right">
    <div class="box-giohang">
        <form action="index.php?act=dhct" method="post">
            <h4 style="font-size: 20px; margin-bottom:1%;">Vui lòng nhập số điện thoại đặt hàng:</h4> 
            <input type="text" name="tel" style=" font-size: 20px; min-width: 200px; padding: 2px;" name="tel" id=""><button name="ok" style="font-size: 20px; padding: 2px 10px;" type="submit">OK</button>
            <div>Hoặc</div>
            <div><a style="text-decoration: none; color: blue;" href="http://localhost/hoa/index.php?act=dangnhap">Đăng nhập</a> để xem thông tin đơn hàng.</div>
        </form>
    </div>
    <div style="margin-bottom: 1%"></div>
    <?php include "view/footerboxright.php";?>
</div>