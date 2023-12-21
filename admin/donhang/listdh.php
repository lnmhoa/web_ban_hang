<?php
    $total = $page[0]['total'];
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $total_page = ceil($total / 10);
    if($current_page > $total_page){
        $current_page = $total_page;
    }if($current_page < 1){
        $current_page = 1;
    }
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_POST['keyarrangedh'])){
            $_SESSION['sortdh'] = $_POST['keyarrangedh'];
        }
    }     
    $_SESSION['sortdh'] = isset($_SESSION['sortdh']) ? $_SESSION['sortdh'] : 'new';
    $_SESSION['searchteldh'] = isset($_SESSION['searchteldh']) ? $_SESSION['searchteldh'] : '';
    $_SESSION['searchdh'] = isset($_SESSION['searchdh']) ? $_SESSION['searchdh'] : '';
    $start = ($current_page - 1) * 10;
    $listdh = listdh($_SESSION['searchdh'],$_SESSION['sortdh'],$_SESSION['searchteldh'],$start);
?>

<div class="admin-dsdm">
    <div class="searchadmin">
        <form class="formsearchadmin" action="index.php?act=searchdh" method="post">
            <h4 class="mgl1">Tìm kiếm theo số điện thoại</h4>
            <input class="mgl1" style="width: 60%;" type="text" name="keynameteldh" id="" placeholder="Số điện thoại">
            <button type="submit" class="button-seach-admin"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
        <form class="formsearchadmin" action="index.php?act=searchdh" method="post">
            <h4 class="mgl1">Tìm kiếm theo mã đơn hàng</h4>
            <input class="mgl1" style="width: 60%;" type="text" name="keynamedh" id="" placeholder="Mã đơn hàng">
            <button type="submit" class="button-seach-admin"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
        <form class="formsearchadmin" action="index.php?act=listdh" method="post">
        <h4 class="mgl1">Bộ lọc danh mục</h4>
                <select class="mgl1" style="font-size: 18px; padding: 7px;" name="keyarrangedh">
                    <option value="new" selected>Mới nhất</option>
                    <option value="old" <?php if($_SESSION['sortdh'] == 'old') echo 'selected'; ?>>Cũ nhất</option>
                    <option value="bihuy" <?php if($_SESSION['sortdh'] == 'bihuy') echo 'selected'; ?>>Bị hủy</option>
                    <option value="cxn" <?php if($_SESSION['sortdh'] == 'cxn') echo 'selected'; ?>>Chờ xác nhận</option>
                    <option value="dxn" <?php if($_SESSION['sortdh'] == 'dxn') echo 'selected'; ?>>Đã xác nhận</option>
                    <option value="dg" <?php if($_SESSION['sortdh'] == 'dg') echo 'selected'; ?>>Đang giao</option>
                    <option value="dagiao" <?php if($_SESSION['sortdh'] == 'dagiao') echo 'selected'; ?>>Đã giao</option>
                </select>
                <button type="submit" class="button-seach-admin"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </div> 
    <div class="tabledh">
    <table>
        <tr>
            <th></th>
            <th>Mã đơn hàng</th>
            <th>Số điện thoại</th>
            <th>Giá trị</th>
            <th>Thời gian</th>
            <th>Trạng thái</th>
            <th>Chỉnh sửa</th>
        </tr>
            <?php
                foreach ($listdh as $listdh) {
                    extract($listdh);
                    $tt = trangthaidh($trangthai);
                    $printdh = "index.php?act=printdh&iddh=".$idcart;
                    $chitietdh = "index.php?act=chitietdh&iddh=".$idcart;
                    $totalprice1 = number_format($totalprice);
                    ?>
                <tr>
                    <td></td>
                    <td><?=$madh?></td>
                    <td><?=$teldh?></td>
                    <td><?=$totalprice1?>đ</td>
                    <td><?=$timedh?></td>
                    <td><?=$tt?></td>
                    <td>
                        <a style="margin-right: 5px;" href="<?=$printdh?>"><button class="button-edit-admin edit-admin-cl"><i class="fa-solid fa-print"></i> In</button></a>
                        <a style="margin-right: 5px;" href="<?=$chitietdh?>"><button class="button-edit-admin edit-admin-cl"><i class="fa-solid fa-print"></i> Chi tiết</button></a>
                        <button <?php if($trangthai<0){echo 'style="background-color: #333; margin-right: 5px;" disabled';}else{echo 'style="margin-right: 5px;"';}?> data-id="<?=$idcart?>" data-step="<?=$trangthai?>" data-update="0" class="button-edit-admin edit-admin-cl laststep"><i class="fa-solid fa-backward-step"></i></button>
                        <button <?php if($trangthai>2){echo 'style="background-color: #333;" disabled';} ?> class="button-edit-admin edit-admin-cl nextstep" data-id="<?=$idcart?>" data-step="<?=$trangthai?>" data-update="1"><i class="fa-solid fa-forward-step"></i></button></td>
                </tr>
                <?php }?>             
        </table>
        <div class="page-admin">
        <?php   if($total>10){
                if($current_page > 3){
                    echo '<a href="index.php?act=listdh&page=1"><i class="fa-solid fa-angles-left box-right-dstcsp-page-item-admin"></i></a>';
                }
                if($current_page > 1 && $total_page > 1){
                    echo '<a href="index.php?act=listdh&page='.($current_page-1).'"><i class="fa-solid fa-angle-left box-right-dstcsp-page-item-admin"></i></a>';
                }
                for($i = 1; $i <= $total_page; $i++){
                    if($i != $current_page){
                        if($i > $current_page - 3 && $i < $current_page +3){
                        echo '<a href="index.php?act=listdh&page='.$i.'" class="box-right-dstcsp-page-item-admin" ">'.$i.'</a> ';
                        }
                    }
                    else{
                        echo '<div class="box-right-dstcsp-page-item1-admin">'.$i.'</div>';
                    }
                }
                if($current_page < $total_page && $total_page > 1){
                    echo '<a href="index.php?act=listdh&page='.($current_page+1).'"><i class="fa-solid fa-angle-right box-right-dstcsp-page-item-admin"></i></a>';
                }
                if($current_page < $total_page -3){
                    echo '<a href="index.php?act=listdh&page='.($total_page).'"><i class="fa-solid fa-angles-right box-right-dstcsp-page-item-admin"></i></a>';
                }}
            ?>  
        </div> 
        <div style="height: 20px;"></div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('.nextstep').click(function(){
            $(document).ready(function(){
                $(document).on('click', '.nextstep', function(){
                    var id = $(this).data('id');
                    var step = $(this).data('step');
                    var nb = $(this).data('update');
                    $.ajax({
                        url: 'donhang/updatetrangthai.php',
                        type: 'POST',
                        data: {
                            id:id,
                            step:step,
                            nb:nb
                        },
                        dataType: 'json'
                    })
                    .done(function(response){
                        Swal.fire({
                            title: 'Thông báo',
                            text: 'Thành công',
                            icon: 'success',
                            confirmButtonText: 'Đóng',
                            confirmButtonColor: '#3085d6',
                        }).then((result) => {   
                            if (result.isConfirmed) {
                                window.location.assign("http://localhost/hoa/admin/index.php?act=listdh");
                            }else{
                                window.location.assign("http://localhost/hoa/admin/index.php?act=listdh");
                            }
                        })
                    })          
                    .fail(function(){
                        swal.fire('Khoan', 'Có lỗi xảy ra. Vui lòng kiểm tra lại!', 'error');
                    });               
                })                         
            });
        });
    });
    $(document).ready(function(){
        $('.laststep').click(function(){
            $(document).ready(function(){
                $(document).on('click', '.laststep', function(){
                    var id = $(this).data('id');
                    var step = $(this).data('step');
                    var nb = $(this).data('update');
                    $.ajax({
                        url: 'donhang/updatetrangthai.php',
                        type: 'POST',
                        data: {
                            id:id,
                            step:step,
                            nb:nb
                        },
                        dataType: 'json'
                    })
                    .done(function(response){
                        Swal.fire({
                            title: 'Thông báo',
                            text: 'Thành công',
                            icon: 'success',
                            confirmButtonText: 'Đóng',
                            confirmButtonColor: '#3085d6',
                        }).then((result) => {   
                            if (result.isConfirmed) {
                                window.location.assign("http://localhost/hoa/admin/index.php?act=listdh");
                            }else{
                                window.location.assign("http://localhost/hoa/admin/index.php?act=listdh");
                            }
                        })
                    })          
                    .fail(function(){
                        swal.fire('Khoan', 'Có lỗi xảy ra. Vui lòng kiểm tra lại!', 'error');
                    });                                     
                });
            });
        });
    });
</script>
