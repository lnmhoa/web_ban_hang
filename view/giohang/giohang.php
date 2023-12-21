<div id="body">     
<?php include "view/boxleft.php";?>
<div class="box-right">
    <div class="box-giohang">
        <h4 style="font-size: 20px; margin-bottom:1%;">Danh sách sản phẩm trong giỏ hàng</h4>
        <table>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Giá(1 sản phẩm)</th>
                <th>Số lượng</th>
                <th>Chỉnh sửa</th>
            </tr>
            <?php
                $thanhtien = 0;
                $i = 0;
                foreach($_SESSION['cart'] as $cart){
                if(!empty($cart[2])){
                    $imgsp = '<img src="view/upload/imgsp/'.$cart[2].'">';
                }else{
                    $imgsp = '<img src="view/upload/imght/no_img.jpg">';
                }
                $price1sp = number_format($cart[3]); 
                $thanhtien += $cart[5];
                $thanhtien1 = number_format( $thanhtien);
                $xoasp = 'index.php?act=delsp&idcart='.$i;
                $xemlai = 'index.php?act=sanphamct&idsp='.$cart[0];
                ?>
                <tr>
                <td><?=$cart[1]?></td>
                <td><?=$imgsp?></td>
                <td><?=$price1sp?>đ</td>
                <td><?=$cart[4]?></td>
                <td><a href="<?=$xemlai?>"><button style="background-color: rgb(0, 68, 255); margin-right: 1%">Xem lại</button></a><a href="<?=$xoasp?>"><button>Xóa</button></a></td>
            </tr>
            <?php $i+=1;}?>
            
        </table>
        <?php if(!empty($_SESSION['cart'])){?>
        <table>
            <tr>
                <td style="border-top:hidden; text-align: end;">Tổng tiền: <b><?=$thanhtien1?>đ</b></td>
            </tr>
        </table>
        <div style="width: 100%; display: flex; flex-direction: row-reverse;">
            <a href="index.php?act=ttdh"><button class="button-dh" style="margin-left: 4%">Bắt đầu đặt hàng</button></a>
            <a href="index.php?act=listsp"><button class="button-dh">Tiếp tục mua hàng</button></a>
        </div>
        <?php }else{
            echo 'Hiện chưa có sản phẩm trong giỏ hàng'; ?>
            <div style="width: 100%; display: flex; flex-direction: row-reverse;">
            <a href="index.php?act=listsp"><button class="button-dh">Bắt đầu mua hàng</button></a>
        </div>
        <?php }?>
        
    </div>
    <div style="margin-bottom: 1%"></div>
    <?php include "view/footerboxright.php";?>
</div>