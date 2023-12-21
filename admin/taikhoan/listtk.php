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
        if(isset($_POST['keyarrangetk'])){
            $_SESSION['sorttk'] = $_POST['keyarrangetk'];
        }
    }    
    $_SESSION['sorttk'] = isset($_SESSION['sorttk']) ? $_SESSION['sorttk'] : 'new';
    $_SESSION['searchtk'] = isset($_SESSION['searchtk']) ? $_SESSION['searchtk'] : '';
    $start = ($current_page - 1) * 10;
    $listtk = listtk($_SESSION['searchtk'],$_SESSION['sorttk'],$start);
?>
<div class="admin-dsdm">
            <div class="searchadmin">
                <form class="formsearchadmin" action="index.php?act=searchtk" method="post">
                    <h4 class="mgl1">Tìm kiếm theo số điện thoại</h4>
                    <input class="mgl1" style="width: 60%;" type="text" name="keynametk" id="" placeholder="Số điện thoại">
                    <button type="submit" class="button-seach-admin"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
                <form class="formsearchadmin" action="index.php?act=listtk" method="post">
                <h4 class="mgl1">Bộ lọc danh mục</h4>
                        <select class="mgl1" style="font-size: 18px; padding: 7px;" name="keyarrangetk">
                            <option value="new" selected>Mới nhất</option>
                            <option value="old" <?php if($_SESSION['sorttk'] == 'old') echo 'selected'; ?>>Cũ nhất</option>
                            <option value="chd" <?php if($_SESSION['sorttk'] == 'chd') echo 'selected'; ?>>Còn hoạt động</option>
                            <option value="tkbk" <?php if($_SESSION['sorttk'] == 'tkbk') echo 'selected'; ?>>Tài khoản bị khóa</option>
                        </select>
                        <button type="submit" class="button-seach-admin"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div> 
            <div class="tabletk">
            <table>
                <tr>
                    <th></th>
                    <th>Id</th>
                    <th>Avatar</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Chức vụ</th>
                    <th>Chỉnh sửa</th>
                </tr>
                    <?php
                        foreach ($listtk as $listtk) {
                            extract($listtk);
                            $suatk = "index.php?act=suatk&idtk=".$idtk;
                            $avatarpath ="../view/upload/img/" .$avatar;
                        if (is_file($avatarpath)){
                            $avatar1 = "<img src='".$avatarpath."'>";
                            }else{
                            $avatar1 = "<img src='../view/img/avatar.jpg'>";
                        } 
                           if(empty($email)){
                            $email = 'Không có email';
                           }
                           if($role==0){
                            $role1 = 'Tài khoản bị khóa';
                           }
                           if($role==1){
                            $role1 = 'Khách hàng';
                           }?>
                        <tr>
                            <td></td>
                            <td><?=$idtk?></td>
                            <td><?=$avatar1?></td>
                            <td><?=$email?></td>
                            <td><?=$tel?></td>
                            <td><?=$role1?></td>
                            <td><a href="<?=$suatk?>"><button class="button-edit-admin edit-admin-cl"><i class="fa-solid fa-pen"></i> Sửa</button></a><?php if($role!=0){ echo '<button class="delete-admin-cl button-edit-admin lock mgl3" data-id="'.$idtk.'"><i class="fa-solid fa-lock"></i>Lock</button>';}else{ echo '<button class="delete-admin-cl button-edit-admin unlock mgl3" data-id="'.$idtk.'"><i class="fa-solid fa-unlock"></i>Unlock</button>';}?></td>
                        </tr>
                        <?php }?>             
                </table>
                <div class="page-admin">
                <?php   if($total>10){
                        if($current_page > 3){
                            echo '<a href="index.php?act=listtk&page=1"><i class="fa-solid fa-angles-left box-right-dstcsp-page-item-admin"></i></a>';
                        }
                        if($current_page > 1 && $total_page > 1){
                            echo '<a href="index.php?act=listtk&page='.($current_page-1).'"><i class="fa-solid fa-angle-left box-right-dstcsp-page-item-admin"></i></a>';
                        }
                        for($i = 1; $i <= $total_page; $i++){
                            if($i != $current_page){
                                if($i > $current_page - 3 && $i < $current_page +3){
                                echo '<a href="index.php?act=listtk&page='.$i.'" class="box-right-dstcsp-page-item-admin" ">'.$i.'</a> ';
                                }
                            }
                            else{
                                echo '<div class="box-right-dstcsp-page-item1-admin">'.$i.'</div>';
                            }
                        }
                        if($current_page < $total_page && $total_page > 1){
                            echo '<a href="index.php?act=listtk&page='.($current_page+1).'"><i class="fa-solid fa-angle-right box-right-dstcsp-page-item-admin"></i></a>';
                        }
                        if($current_page < $total_page -3){
                            echo '<a href="index.php?act=listtk&page='.($total_page).'"><i class="fa-solid fa-angles-right box-right-dstcsp-page-item-admin"></i></a>';
                        }}
                    ?>  
                </div> 
                <div class="mgt2 editadmin">
                    <!-- <button class="mgl1 option-edit-admin"><i class="fa-solid fa-circle-check"></i> Chọn tất cả</button>
                    <button class="mgl1 option-edit-admin"><i class="fa-solid fa-circle-minus"></i> Bỏ chọn tất cả</button>
                    <button class="mgl1 option-edit-admin"><i class="fa-solid fa-trash"></i> Xóa tất cả mục đã chọn</button> -->
                    <button class="js-open-add option-edit-admin mgl1" style="margin-bottom: 2%"><i class="fa-sharp fa-solid fa-plus"></i>Thêm tài khoản</button>
                </div>
            </div>
    </div>
    <form action="index.php?act=listtk" method="post" onsubmit="return checksubmittk()">
        <div class="open-add-admin">
            <div class="box-add">
                <div class="open-add-admin1">
                    <i class="fa-solid fa-close close-add-icon"></i>
                    <h1>Thêm tài khoản</h1>        
                    <div class="box-add-item mgl3 mgt3"><label>Số điện thoại</label></br>
                        <input onblur="return checkphone()" id="phonenumber" name="phone" class="mgt2" type="text"></br>
                        <small class="errorphone" style="color: red;"></small> 
                    </div>
                    <div class="box-add-item mgl3 mgt3"><label>Mật khẩu</label></br>
                        <input id="password" onblur="return checkpassword()" name="password" class="mgt2" type="text"></br>
                        <small class="errorpassword" style="color: red;"></small> 
                    </div>
                    <div class="box-add-item mgl3 mgt3"><label>Mật khẩu xác nhận</label></br>
                        <input id="password2" onblur="return checkpassword2()" class="mgt2" type="text"></br>
                        <small class="errorpassword2" style="color: red;"></small> 
                    </div>
                    <input onclick="return checktk()" class="mgl3 mgt3" name="addtk" type="submit" value="Thêm">
                </div>
            </div>
        </div>
    </form>
    <script type="text/javascript">
    $(document).ready(function(){
        $('.lock').click(function(){
            $(document).ready(function(){

                $(document).on('click', '.lock', function(){
                    var id = $(this).data('id');
                    swal.fire({
                        title: 'Thông báo',
                        text: 'Có chắc muốn khóa tài khoản này?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Rồi',
                        cancelButtonText: 'Chưa'
                    }).then((result) => {
                        if (result.value){
                            $.ajax({
                                url: 'taikhoan/locktk.php',
                                type: 'POST',
                                data: {id:id},
                                dataType: 'json'
                            })
                            .done(function(response){
                                Swal.fire({
                                    title: 'Thông báo',
                                    text: 'Khóa thành công',
                                    icon: 'success',
                                    confirmButtonText: 'Đóng',
                                    confirmButtonColor: '#3085d6',
                                }).then((result) => {   
                                    if (result.isConfirmed) {
                                        window.location.assign("http://localhost/hoa/admin/index.php?act=listtk");
                                    }else{
                                        window.location.assign("http://localhost/hoa/admin/index.php?act=listtk");
                                    }
                                })
                            })          
                            .fail(function(){
                                swal.fire('Không thành công', 'error');
                            });
                            
                        };
                        
                    });
                });
            });
        });
    });
    $(document).ready(function(){
        $('.unlock').click(function(){
            $(document).ready(function(){

                $(document).on('click', '.unlock', function(){
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
                                url: 'taikhoan/unlocktk.php',
                                type: 'POST',
                                data: {id:id},
                                dataType: 'json'
                            })
                            .done(function(response){
                                Swal.fire({
                                    title: 'Thông báo',
                                    text: 'Mở khóa thành công',
                                    icon: 'success',
                                    confirmButtonText: 'Đóng',
                                    confirmButtonColor: '#3085d6',
                                }).then((result) => {   
                                    if (result.isConfirmed) {
                                        window.location.assign("http://localhost/hoa/admin/index.php?act=listtk");
                                    }else{
                                        window.location.assign("http://localhost/hoa/admin/index.php?act=listtk");
                                    }
                                })
                            })          
                            .fail(function(){
                                swal.fire('Không thành công', 'error');
                            });
                            
                        };
                        
                    });
                });
            });
        });
    });
    </script>
    <script src="../view/js/open-add.js"></script>