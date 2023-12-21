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
        if(isset($_POST['keyarrangedg'])){
            $_SESSION['sortdg'] = $_POST['keyarrangedg'];
        } 
    }
    $_SESSION['searchdg1'] = isset($_SESSION['searchdg1']) ? $_SESSION['searchdg1'] : '';
    $_SESSION['sortdg'] = isset($_SESSION['sortdg']) ? $_SESSION['sortdg'] : 'new';
    $_SESSION["searchdg2"] = isset($_SESSION["searchdg2"]) ? $_SESSION["searchdg2"] : '';
    $start = ($current_page - 1) * 10;
    $listdg = listdg($_SESSION['searchdg1'],$_SESSION['searchdg2'],$_SESSION['sortdg'],$start);
?>
   <div class="admin-dsdm">
            <div class="searchadmin">
                <form class="formsearchadmin" action="index.php?act=searchdg" method="post">
                    <h4 class="mgl1">Tìm kiếm đánh giá</h4>
                    <input class="mgl1" style="width: 30%;" type="text" name="searchdg1" id="" placeholder="Id sản phẩm">
                    <input style="width: 30%;" type="text" name="searchdg2" id="" placeholder="Id tài khoản">
                    <button type="submit" class="button-seach-admin"><i class="fa-solid fa-magnifying-glass"></i></button>

                </form>
                <form class="formsearchadmin" action="index.php?act=listdg" method="post">
                <h4 class="mgl1">Bộ lọc danh mục</h4>
                        <select class="mgl1" style="font-size: 18px; padding: 7px;" name="keyarrangedg">
                            <option value="new" selected>Mới nhất</option>
                            <option value="old" <?php if($_SESSION['sortdg'] == 'old') echo 'selected'; ?>>Cũ nhất</option>
                            <option value="tichcuc" <?php if($_SESSION['sortdg'] == 'tichcuc') echo 'selected'; ?>>Tích cực</option>
                            <option value="tieucuc" <?php if($_SESSION['sortdg'] == 'tieucuc') echo 'selected'; ?>>Tiêu cực</option>
                        </select>
                        <button type="submit" class="button-seach-admin"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
            <div class="tabledg">
            <table>
                <tr>
                    <th></th>
                    <th>Id</th>
                    <th>Id tài khoản</th>
                    <th>Id sản phẩm</th>
                    <th>Nội dung</th>
                    <th>Rate</th>
                    <th>Thời gian</th>
                    <th>Sửa đánh giá</th>
                    <th>Chỉnh sửa</th>
                </tr>             
                    <?php
                        foreach ($listdg as $listdg){
                            extract($listdg); 
                            if($chinhsua!=0){
                                $edit = "Đã chỉnh sửa";
                            }else{
                                $edit = "Chưa chỉnh sửa";
                            }
                        ?>                                 
                        <tr>
                            <td></td>
                            <td><?=$iddg?></td>
                            <td><?=$idtk?></td>
                            <td><?=$idsp?></td>
                            <td><?=$noidung?></td>
                            <td><?=$starrate?><i class="fas fa-star" style="font-size:20px; color: yellow;"></i></td>
                            <td><?=$timedg?></td>
                            <td><?=$edit?></td>
                            <td><a href="<?=$suatk?>"><button class="button-edit-admin edit-admin-cl"><i class="fa-solid fa-pen"></i> Sửa</button></a></td>
                        </tr>
                        <?php }?>             
                </table>
                <div class="page-admin">
                <?php   if($total>10){
                        if($current_page > 3){
                            echo '<a href="index.php?act=listdg&page=1"><i class="fa-solid fa-angles-left box-right-dstcsp-page-item-admin"></i></a>';
                        }
                        if($current_page > 1 && $total_page > 1){
                            echo '<a href="index.php?act=listdg&page='.($current_page-1).'"><i class="fa-solid fa-angle-left box-right-dstcsp-page-item-admin"></i></a>';
                        }
                        for($i = 1; $i <= $total_page; $i++){
                            if($i != $current_page){
                                if($i > $current_page - 3 && $i < $current_page +3){
                                echo '<a href="index.php?act=listdg&page='.$i.'" class="box-right-dstcsp-page-item-admin" ">'.$i.'</a> ';
                                }
                            }
                            else{
                                echo '<div class="box-right-dstcsp-page-item1-admin">'.$i.'</div>';
                            }
                        }
                        if($current_page < $total_page && $total_page > 1){
                            echo '<a href="index.php?act=listdg&page='.($current_page+1).'"><i class="fa-solid fa-angle-right box-right-dstcsp-page-item-admin"></i></a>';
                        }
                        if($current_page < $total_page -3){
                            echo '<a href="index.php?act=listdg&page='.($total_page).'"><i class="fa-solid fa-angles-right box-right-dstcsp-page-item-admin"></i></a>';
                        }}
                    ?>  
                </div> 
                <div class="mgt2 editadmin">
                    <!-- <button class="mgl1 option-edit-admin"><i class="fa-solid fa-circle-check"></i> Chọn tất cả</button>
                    <button class="mgl1 option-edit-admin"><i class="fa-solid fa-circle-minus"></i> Bỏ chọn tất cả</button>
                    <button class="mgl1 option-edit-admin"><i class="fa-solid fa-trash"></i> Xóa tất cả mục đã chọn</button> -->
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
