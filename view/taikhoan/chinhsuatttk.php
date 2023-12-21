<div id="body">     
<?php include "view/boxleft.php";?>
<div class="box-right">
        <div id="form-dk-dn">
            <?php 
                if(isset($_SESSION['user'])&&(is_array($_SESSION['user'])))
                {
                    extract($_SESSION['user']);
                } 
            ?>
        <form action="index.php?act=edittk" method="post" class="form-dk-dn" onsubmit="return checksubmittdtt()" enctype="multipart/form-data">
            <h1 class="form-dk-dn-title">Thông tin tài khoản</h1>
            <div><?php
            $avatarpath ="view/upload/imguser/" .$avatar;
                if (is_file($avatarpath)){
                    $avatar1 = "<img src='".$avatarpath."'>";
                }else{
                    $avatar1 = "<img src='view/upload/imght/avatar.jpg'>";
            }?>
                <div class="avatar" style="width: 100%"><?=$avatar1?></div>
                <div style="magirn-left: 20px;">Chọn avatar mới :
                <input type="file" name="avatar" id="">
            </div></div>
            <div class="form-dk-dn-item">
                <div class="form-dk-dn-1">
                    <i class="fa-solid fa-user"></i>
                    <input id="name" type="text" class="form-input" placeholder="Họ tên" name="name" value="<?=$hoten?>">  
                </div>
            </div>
            <div class="form-dk-dn-item">
                <div class="form-dk-dn-1">
                    <i class="fa-solid fa-phone"></i>
                    <input onblur="return checkphone()" id="phonenumber" type="text" class="form-input" placeholder="Số điện thoại" name="phone" value="<?=$tel?>">  
                </div>
                <small class="errorphone"></small>
            </div>
            <div class="form-dk-dn-item">
                <div class="form-dk-dn-1">
                    <i class="fa-solid fa-key"></i>
                    <input id="password" onblur="return checkpassword()" type="password" class="form-input" placeholder="Mật khẩu" name="password" value="<?=$password?>">
                    <div id="eye">
                        <i class="fa-solid fa-eye"></i>
                    </div>               
                </div>
                <small class="errorpassword"></small>
            </div>
            <div class="form-dk-dn-item">
                <div class="form-dk-dn-1">
                    <i class="fa-solid fa-envelope"></i>
                    <input onblur="return checkemail()" id="email" type="text" class="form-input" placeholder="Email" name="email" value="<?=$email?>">  
                </div>
                <small class="erroremail"></small>
            </div>
            <div class="form-dk-dn-item">
                <div class="form-dk-dn-1">
                    <i class="fa-solid fa-home"></i>
                    <input id="address" type="text" class="form-input" placeholder="Địa chỉ" name="address" value="<?=$address?>">  
                </div>  
            </div>
            <input type="hidden" name="id" value="<?=$idtk?>">
            <?php if(empty($email)){?>
                <div style="color: red; text-align: center; font-size: 20px;">Vui lòng cập nhật email để lấy lại tài khoản khi cần!</div>
            <?php }?> 
            <input onclick="return checkclicksubmittdtt()" type="submit" value="Cập nhật" name="capnhat" class="form-dk-dn-submit">
        </form>
    </div>
        <?php include "view/footerboxright.php";?>
</div>