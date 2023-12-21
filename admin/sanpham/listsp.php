<?php
    $total = $page[0]['total'];
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $total_page = ceil($total / 10);
    if(($current_page > $total_page)){
        $current_page = $total_page;
    }if($current_page < 1){
        $current_page = 1;
    }
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_POST['keyarrangesp'])){
            $_SESSION['sortsp'] = $_POST['keyarrangesp'];
        }if(isset($_POST["keyiddm"])){
            $_SESSION["selectiddm"] = $_POST["keyiddm"];
        }
    }
    $_SESSION['searchsp'] = isset($_SESSION['searchsp']) ? $_SESSION['searchsp'] : '';
    $_SESSION['sortsp'] = isset($_SESSION['sortsp']) ? $_SESSION['sortsp'] : 'new';
    $_SESSION["selectiddm"] = isset($_SESSION["selectiddm"]) ? $_SESSION["selectiddm"] : 0;
    $start = ($current_page - 1) * 10;
    $listsp = listsp($_SESSION["selectiddm"],$_SESSION['searchsp'],$_SESSION['sortsp'],$start)

?>
<div class="admin-dsdm">
            <div class="searchadmin">
            <form class="formsearchadmin" action="index.php?act=searchsp" method="post">
                    <h4 class="mgl1">Tìm kiếm theo tên sản phẩm</h4>
                    <input class="mgl1" style="width: 60%;" type="text" name="keynamesp" id="" placeholder="Tên sản phẩm">
                    <button type="submit" class="button-seach-admin"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
            <form class="formsearchadmin" action="index.php?act=listsp" method="post">
                <h4 class="mgl1">Phân loại sản phẩm</h4>
                        <select class="mgl1" style="font-size: 18px; padding: 7px;" name="keyarrangesp">
                            <option value="new" selected>Mới nhất</option>
                            <option value="old" <?php if($_SESSION['sortsp'] == 'old') echo 'selected'; ?>>Cũ nhất</option>
                            <option value="az" <?php if($_SESSION['sortsp'] == 'az') echo 'selected'; ?>>Tên A - Z</option>
                            <option value="za" <?php if($_SESSION['sortsp'] == 'za') echo 'selected'; ?>>Tên Z - A</option>
                            <option value="sale" <?php if($_SESSION['sortsp'] == 'sale') echo 'selected'; ?>>Đang giảm giá</option>
                        </select>
                        <select style="font-size: 18px; padding: 7px;" name="keyiddm">
                        <option value="0" <?php if($_SESSION["selectiddm"] == '0') echo "selected"; ?>>Tất cả</option>
                            <?php
                                foreach($listdm as $danhmuc) {
                                    extract($danhmuc);
                                    echo '<option value="'.$iddm.'"'.($_SESSION["selectiddm"] == $iddm ? "selected" : "").'>'. $namedm .'</option>';
                                }
                            ?>
                        </select>
                <button type="submit" class="button-seach-admin"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
            </div>
            <div class="tabledssp">
                <table>
                    <tr>
                        <th></th>
                        <th>Mã sản phẩm</th>
                        <th>Mã danh mục</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá(VNĐ)</th>
                        <th>Số lượng</th>
                        <th>Đánh giá</th>
                        <th>Hình ảnh</th>
                        <th>Chỉnh sửa</th>
                    </tr>
                    <?php
                        foreach ($listsp as $listsp) {
                            extract($listsp);
                            $pricebuy = ($price*(100-$pricesale)/100);
                            $suasp = "index.php?act=suasp&idsp=".$idsp;
                            $imgsppath = "../view/upload/imgsp/".$imgsp;
                            $rate = avgratesp($idsp);
                            if(empty($rate[0]['avgrate'])){
                                $rate[0]['avgrate'] ='0';
                            }  
                            if($imgsp!=''){
                                $img = "<img src='".$imgsppath."'>";
                            }else{
                                $img= "<img src='../view/upload/img/1685368620590.1409.png'>";
                            }?>   
                            <tr>
                            <td></td>
                            <td><h3><?=$idsp?></h3></td>
                            <td><h3><?=$iddm?></h3></td>
                            <td><?=$namesp?></td>
                            <td><?=$price?></td>
                            <td><?=$quantity?></td>
                            <td><?=$rate[0]['avgrate']?><i class="fas fa-star" style="font-size:20px; color: yellow;"></i></td>
                            <td><?=$img?></td>
                            <td><a href=<?=$suasp?>><button class="button-edit-admin edit-admin-cl"><i class="fa-solid fa-pen"></i> Sửa</button></a><button class="delete-admin-cl button-edit-admin delete mgl3" data-id="<?=$idsp?>"><i class="fa-solid fa-trash"></i> Xóa</button></td>
                        </tr>  <?php }?>       
                </table>
                <div class="page-admin">
                   <?php
                        if($total>10){
                        if($current_page > 3){
                            echo '<a href="index.php?act=listsp&page=1"><i class="fa-solid fa-angles-left box-right-dstcsp-page-item-admin"></i></a>';
                        }
                        if($current_page > 1 && $total_page > 1){
                            echo '<a href="index.php?act=listsp&page='.($current_page-1).'"><i class="fa-solid fa-angle-left box-right-dstcsp-page-item-admin"></i></a>';
                        }
                        for($i = 1; $i <= $total_page; $i++){
                            if ($i != $current_page){
                                if($i > $current_page - 3 && $i < $current_page +3){
                                echo '<a href="index.php?act=listsp&page='.$i.'" class="box-right-dstcsp-page-item-admin" ">'.$i.'</a> ';
                                }
                            }
                            else{
                                echo '<div class="box-right-dstcsp-page-item1-admin">'.$i.'</div>';
                            }
                        }
                        if($current_page < $total_page && $total_page > 1){
                            echo '<a href="index.php?act=listsp&page='.($current_page+1).'"><i class="fa-solid fa-angle-right box-right-dstcsp-page-item-admin"></i></a>';
                        }
                        if($current_page < $total_page -3){
                            echo '<a href="index.php?act=listsp&page='.($total_page).'"><i class="fa-solid fa-angles-right box-right-dstcsp-page-item-admin"></i></a>';
                        }}
                    ?> 
                </div>  
                <div class="mgt2 editadmin">
                    <!-- <button class="mgl1 option-edit-admin"><i class="fa-solid fa-circle-check"></i> Chọn tất cả</button>
                    <button class="mgl1 option-edit-admin"><i class="fa-solid fa-circle-minus"></i> Bỏ chọn tất cả</button>
                    <button class="mgl1 option-edit-admin"><i class="fa-solid fa-trash"></i> Xóa tất cả mục đã chọn</button> -->
                    <a href="http://localhost/hoa/admin/index.php?act=addsp"><button class="option-edit-admin mgl1"><i class="fa-sharp fa-solid fa-plus"></i> Thêm sản phẩm</button></a>
                </div>
            </div>
    </div>
    </div>
<script type="text/javascript">
    $(document).ready(function(){
        $('.delete').click(function(){
            $(document).ready(function(){
                $(document).on('click', '.delete', function(){
                    var id = $(this).data('id');
                    swal.fire({
                        title: 'Thông báo',
                        text: 'Chắc chưa?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Rồi',
                        cancelButtonText: 'Chưa'      
                    }).then((result) => {
                        if (result.value){
                            $.ajax({
                                url: 'sanpham/deletesp.php',
                                type: 'POST',
                                data: {id:id},
                                dataType: 'json'
                            })
                            .done(function(response){
                                Swal.fire({
                                    title: 'Thông báo',
                                    text: 'Xóa thành công',
                                    icon: 'success',
                                    confirmButtonText: 'Đóng',
                                    confirmButtonColor: '#3085d6',
                                }).then((result) => {   
                                    if (result.isConfirmed) {
                                        window.location.assign("http://localhost/hoa/admin/index.php?act=listsp");
                                    }else{
                                        window.location.assign("http://localhost/hoa/admin/index.php?act=listsp");
                                    }
                                })
                            })          
                            .fail(function(){
                                swal.fire('Thông báo', 'Có lỗi xảy ra. Vui lòng kiểm tra lại.', 'error');
                            });               
                        }                       
                    })
                });
            });
        });
    });
</script>
