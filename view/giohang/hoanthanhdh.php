<div id="body">     
<?php include "view/boxleft.php";
    foreach ($ttcart as $cart) {
        extract($cart);
        $totalprice1 = number_format($totalprice);
        $ngaydh = date('d/m/Y',strtotime($timedh));
    }
?>
<div class="box-right">
    <div class="box-giohang">
        <h4 style="font-size: 20px; margin-bottom:1%;">Đặt hàng thành công</h4>
        <div class="box-ttdh-user">
            <div>
                <div style="margin-bottom:0.2%;">Mã đơn hàng: <b><?=$madh?></b></div>
            </div>
            <div>
                <div style="margin-bottom:0.2%;">Họ tên người nhận hàng: <b><?=$namedh?></b></div>
            </div>
            <div>  
                <div style="margin-bottom:0.2%;">Địa chỉ nhận hàng: <b><?=$addressdh?></b></div>
            </div> 
            <div>
                <div style="margin-bottom:0.2%;">Số điện thoại: <b><?=$teldh?></b></div>
            </div>
            <div>
                <div style="margin-bottom:0.2%;">Ghi chú: <b><?=$ghichu?></b></div>
            </div>
            <div>
                <div style="margin-bottom:0.2%;">Ngày đặt hàng: <b><?=$ngaydh?></b></div>
            </div>
            <div>
                <div style="margin-bottom:0.2%; margin-bottom:1%">Tổng giá trị giỏ hàng: <b><?=$totalprice1?>đ</b></div>
            </div>
        </div>
        <h4 style="font-size: 15px; margin-bottom:1%">Danh sách sản phẩm trong giỏ hàng</h4>
        <table>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Tổng</th>
            </tr>
            <?php
                foreach ($ttsp as $sp) {
                    extract($sp);
                    $price1 = number_format($price);
                    $totalprice1 = number_format($totalprice);
                ?>
                <tr>
                    <td><?=$namesp?></td>
                    <td><?=$price1?>đ</td>
                    <td><?=$quantity?></td>
                    <td><?=$totalprice1?>đ</td>
                </tr>
            <?php }?>
        </table>
        <div style="width: 100%; display: flex; flex-direction: row-reverse;">
            <a href="index.php"><button class="button-dh" style="margin-left: 4%">Quay lại trang chủ</button></a>
        </div>   
    </div>
    <div style="margin-bottom: 1%"></div>
    <?php include "view/footerboxright.php";?>
</div>