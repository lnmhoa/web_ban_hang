<div id="body">     
<?php include "view/boxleft.php";?>
<div class="box-right">
    <?php if(empty($tt)){?>
    <div class="box-ttdh" style="height: 200px">         
    <h4 style="font-size: 20px; margin-bottom:1%;">Thông tin đơn hàng của bạn</h4>
    <div style="font-size: 20px">Không có đơn hàng</div>     
    </div>
    <?php }else{?>
    <div class="box-ttdh">
        <table>
            <tr>
                <th>Mã hóa đơn</th>
                <th>Ngày đặt hàng</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Xem</th>
            </tr>
        <h4 style="font-size: 20px; margin-bottom:1%;">Thông tin đơn hàng của bạn</h4>
        <?php foreach ($checkteldh as $ttdh){ 
            extract($ttdh);
            $tt = trangthaidh($trangthai);
            $chitiet = 'index.php?act=chitietdh&iddh='.$idcart;
            $ngaydh = date('d/m/Y',strtotime($timedh));
        ?>     
            <tr>
                <td><?=$madh?></td>
                <td><?=$ngaydh?></td>
                <td><?=$totalprice?></td>
                <td><?=$tt?></td>
                <td><a href="<?=$chitiet?>"><button class="button-xdh">Xem chi tiết</button></a></td>
            </tr> 
        <?php }?>
        </table>
    </div>
    <?php }?>
    <div style="margin-bottom: 1%"></div>
    <?php include "view/footerboxright.php";?>
</div>