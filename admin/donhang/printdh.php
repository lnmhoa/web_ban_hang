<?php foreach ($ttdh as $ttdh) {
    extract($ttdh); 
    $totalprice2 = number_format($totalprice);
}
?>

<div class="form-in-borderl">
    <div class="form-in-bordern">
        <form action="" method="post">
            <div class="form-in">
                <div class="form-in-item">
                    <h1 class="form-in-title">Chi tiết đơn hàng</h1> 
                    <div class="mgt1" style="font-size: 20px;"><b>Người nhận: </b><?=$namedh?></div>
                    <div class="mgt1" style="font-size: 20px;"><b>Ngày đặt hàng: </b><?=$timedh?></div>
                    <div class="mgt1" style="font-size: 20px;"><b>SĐT: </b><?=$teldh?></div>
                    <div class="mgt1 mgb4" style="font-size: 20px;"><b>Địa chỉ: </b><?=$addressdh?></div> 
                </div>
                <div class="form-in-item mgt4">
                <div class="mgt2"><b style="font-size: 30px;">Danh sách sản phẩm</b></div> 
                <table class="inbill mgt1">
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng</th>
                    </tr>
                    <?php foreach ($spdh as $spdh) {
                        extract($spdh);
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
                <div style="display: flex; font-size: 20px; justify-content: flex-end;" class="mgt1 mgb1"><b>Tổng tiền:  <?=$totalprice2?>đ</b></div>                                                                       
                </div> 
                <div class="form-in-footer mgt2">                                                    
                    <div class="mgt2" style="font-size: 20px;"><b>Ghi chú :</b><?=$ghichu?></div>
                    <div class="mgt2 mgb4" style="font-size: 20px;"><b>Người gửi hàng: </b>Công ty TNHH BQF - địa chỉ: Số 285 ấp 1 Giồng Sầm, xã Bình Thới, huyện Bình Đại, tỉnh Bến Tre</div>
                </div>   
            </div>
        </form>
    </div>
</div>