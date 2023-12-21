<div id="body">     
<?php include "view/boxleft.php";?>
<div class="box-right">
        <div id="form-dk-dn">
        <form action="index.php?act=dangky" method="post" class="form-dk-dn" onsubmit="return checksubmit()">
            <h1 class="form-dk-dn-title">Đăng ký tài khoản</h1>
            <div class="form-dk-dn-item">
                <div class="form-dk-dn-1">
                    <i class="fa-solid fa-phone"></i>
                    <input onblur="return checkphone()" id="phonenumber" type="text" class="form-input" placeholder="Số điện thoại" name="phone">  
                </div>
                <small class="errorphone"></small>
            </div>
            <div class="form-dk-dn-item">
                <div class="form-dk-dn-1">
                    <i class="fa-solid fa-key"></i>
                    <input id="password" onblur="return checkpassword()" type="password" class="form-input" placeholder="Mật khẩu" name="password">
                    <div id="eye">
                        <i class="fa-solid fa-eye"></i>
                    </div>               
                </div>
                <small class="errorpassword"></small>
            </div>
            <div class="form-dk-dn-item">
                <div class="form-dk-dn-1">
                    <i class="fa-solid fa-key"></i>
                    <input onblur="return checkpassword2()" id="password2" type="password" class="form-input" placeholder="Xác nhận mật khẩu">
                    <div id="eye2">
                        <i class="fa-solid fa-eye"></i>
                    </div> 
                </div>
                <small class="errorpassword2"></small>
            </div>
            <input onclick="return checkclicksubmit()" type="submit" value="Đăng ký" name="dangky" class="form-dk-dn-submit">
            <div class="form-dk-dn-cotk">Đã có tài khoản? <a href="http://localhost/hoa/index.php?act=dangnhap">Đăng nhập ngay</a></div>
        </form>
    </div>
        <?php include "view/footerboxright.php";?>
</div>
