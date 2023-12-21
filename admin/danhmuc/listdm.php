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
        if(isset($_POST['keyarrangedm'])){
            $_SESSION['sortdm'] = $_POST['keyarrangedm'];
        }
    }
    $_SESSION['sortdm'] = isset($_SESSION['sortdm']) ? $_SESSION['sortdm'] : 'new';
    $_SESSION['searchdm'] = isset($_SESSION['searchdm']) ? $_SESSION['searchdm'] : '';  
    $start = ($current_page - 1) * 10;
    $listdm = listdm($_SESSION['sortdm'],$_SESSION['searchdm'],$start);
?>
<div class="admin-dsdm">
        <div class="searchadmin">
            <form class="formsearchadmin" action="index.php?act=searchdm" method="post">
                <h4 class="mgl1">Tìm kiếm theo tên danh mục</h4>
                <input class="mgl1" style="width: 60%;" type="text" name="keynamedm" id="" placeholder="Tên danh mục">
                <button type="submit" class="button-seach-admin"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
            <form class="formsearchadmin" action="index.php?act=listdm" method="post">
            <h4 class="mgl1">Bộ lọc danh mục</h4>
                    <select class="mgl1" style="font-size: 18px; padding: 7px;" name="keyarrangedm">
                        <option value="new" selected>Mới nhất</option>
                        <option value="old" <?php if($_SESSION['sortdm'] == 'old') echo 'selected'; ?>>Cũ nhất</option>
                        <option value="az" <?php if($_SESSION['sortdm'] == 'az') echo 'selected'; ?>>Tên A - Z</option>
                        <option value="za" <?php if($_SESSION['sortdm'] == 'za') echo 'selected'; ?>>Tên Z - A</option>
                    </select>
                    <button type="submit" class="button-seach-admin"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
        <div class="admin-dsdm">
            <table>
                <tr>
                    <th></th>
                    <th>Mã danh mục</th>
                    <th>Tên danh mục</th>
                    <th>Hình ảnh</th>
                    <th>Chỉnh sửa</th>
                </tr>
                <?php
                    foreach ($listdm as $listdm) {
                        extract($listdm);
                        $suadm = "index.php?act=suadm&iddm=".$iddm;
                        $imgdmpath = "../view/upload/imgdm/".$imgdm;
                        if($imgdm!=''){
                            $img = "<img src='".$imgdmpath."'>";
                        }else{
                            $img= "<img src='../view/upload/img/1685368620590.1409.png'>";
                        }?>
                        <td></td>
                        <td><h3><?=$iddm?></h3></td>
                        <td><?=$namedm?></td>
                        <td><?=$img?></td>
                        <td><a href=<?=$suadm?>><button class="button-edit-admin edit-admin-cl"><i class="fa-solid fa-pen"></i> Sửa</button></a><button class="delete-admin-cl button-edit-admin delete mgl3" data-id="<?=$iddm?>"><i class="fa-solid fa-trash"></i> Xóa</button></td>
                    </tr>
                    <?php }?>             
            </table>
            <div class="page-admin">
            <?php   if($total>10){
                    if($current_page > 3){
                        echo '<a href="index.php?act=listdm&page=1"><i class="fa-solid fa-angles-left box-right-dstcsp-page-item-admin"></i></a>';
                    }
                    if($current_page > 1 && $total_page > 1){
                        echo '<a href="index.php?act=listdm&page='.($current_page-1).'"><i class="fa-solid fa-angle-left box-right-dstcsp-page-item-admin"></i></a>';
                    }
                    for($i = 1; $i <= $total_page; $i++){
                        if($i != $current_page){
                            if($i > $current_page - 3 && $i < $current_page +3){
                            echo '<a href="index.php?act=listdm&page='.$i.'" class="box-right-dstcsp-page-item-admin" ">'.$i.'</a> ';
                            }
                        }
                        else{
                            echo '<div class="box-right-dstcsp-page-item1-admin">'.$i.'</div>';
                        }
                    }
                    if($current_page < $total_page && $total_page > 1){
                        echo '<a href="index.php?act=listdm&page='.($current_page+1).'"><i class="fa-solid fa-angle-right box-right-dstcsp-page-item-admin"></i></a>';
                    }
                    if($current_page < $total_page -3){
                        echo '<a href="index.php?act=listdm&page='.($total_page).'"><i class="fa-solid fa-angles-right box-right-dstcsp-page-item-admin"></i></a>';
                    }}
                ?>  
            </div> 
            <div class="mgt2 editadmin">
                <!-- <button class="mgl1 option-edit-admin"><i class="fa-solid fa-circle-check"></i> Chọn tất cả</button>
                <button class="mgl1 option-edit-admin"><i class="fa-solid fa-circle-minus"></i> Bỏ chọn tất cả</button>
                <button class="mgl1 option-edit-admin"><i class="fa-solid fa-trash"></i> Xóa tất cả mục đã chọn</button> -->
                <button class="js-open-add option-edit-admin mgl1" style="margin-bottom: 2%"><i class="fa-sharp fa-solid fa-plus"></i> Thêm danh mục</button>
            </div>
        </div>
</div>
<form action="index.php?act=listdm" method="post" onsubmit="return checksubmitdm()" enctype="multipart/form-data">
        <div class="open-add-admin">
            <div class="box-add">
                <div class="open-add-admin1">
                    <i class="fa-solid fa-close close-add-icon"></i>
                    <h1>Thêm danh mục</h1> 
                    <div class="box-add-item mgl3 mgt3"><label>Tên danh mục</label></br>
                        <input onblur="return IsEmpty()" id="empty" class="mgt2" type="text" name="namedm"></br>   
                        <small class="empty" style="color: red;"></small>         
                    </div>
                    <div class="box-add-item mgl3 mgt5 mgb1"><label>Ảnh minh họa</label></br><input type="file" name="imgdm" id=""></div>
                    <input class="mgl3 mgt5" onclick="return checkdm()" name="adddm" type="submit" value="Thêm">
                </div>
            </div>
        </div>
</form>
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
                            url: 'danhmuc/deletedm.php',
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
                                    window.location.assign("http://localhost/hoa/admin/index.php?act=listdm&page=1");
                                }else{
                                    window.location.assign("http://localhost/hoa/admin/index.php?act=listdm&page=1");
                                }
                            })
                        })          
                        .fail(function(){
                            swal.fire('Thất bại', 'Danh mục có sản phẩm không thể xóa!', 'warning');
                        });
                        
                    };
                    
                });
            });
        });
    });
}); 
</script>
<script src="../view/js/open-add.js"></script>


