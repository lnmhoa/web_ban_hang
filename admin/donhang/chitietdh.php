<?php foreach ($ttdh as $ttdh) {
    extract($ttdh); 
    $totalprice2 = number_format($totalprice);
}
?>
<div class="top-admin"></div>
    <form action="index.php?act=updatetk" method="post" onsubmit="return checksubmitupdatetk()">
        <div class="form-edit-admin">
            <h1 class="admin-edit-title">Thông tin đơn hàng</h1>
            <div class="box-edit-item mgt2 mgl1"><label>Mã đơn hàng: </label><?=$madh?>
            </div>
            <div class="box-edit-item mgt2 mgl1"><label>Họ tên người nhận: </label><?=$namedh?>
            </div>
            <div class="box-edit-item mgt2 mgl1"><label>Địa chỉ nhận hàng</label><?=$addressdh?>
            </div>
            <div class="box-edit-item mgt2 mgl1"><label>Số điện thoại: </label><?=$teldh?>
            </div>
            <div class="box-edit-item mgt2 mgl1"><label>Địa chỉ: </label><?=$ghichu?>
            </div>
            <div class="box-edit-item mgt2 mgl1"><label>Danh sách sản phẩm:</label>
            </div>
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
                        $printdh = "index.php?act=printdh&iddh=".$iddh;
                    ?>
                    <tr>
                        <td style="width:10% !important;"><?=$namesp?></td>
                        <td style="width:10% !important;"><?=$price1?>đ</td>
                        <td style="width:15% !important;"><?=$quantity?></td>
                        <td style="width:55% !important;"><?=$totalprice1?>đ</td>
                    </tr>
                    <?php }?>
                </table>
                <div style="display: flex; font-size: 20px; justify-content: flex-end; padding-right: 2%;" class="mgt1 mgb1"><b>Tổng tiền:  <?=$totalprice2?>đ</b></div>                                                                       
            <div class="save-exit mgt2 mgl1" style="padding-bottom: 1%;">
                <input type="hidden" name="id" value="<?php if((isset($idtk)&&($idtk)!="")) echo $idtk; ?>">
                <div><a href="http://localhost/hoa/admin/index.php?act=listdh"><input type="button" style="background-color: red;" value="Thoát"></a></div>
                <div class="mgl3"><a href="<?=$printdh?>"><input type="button" style="background-color: green; margin-left: 2%" value="In đơn hàng"></a></div>
            </div>
        </div>
    </form>