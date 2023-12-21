<div id="body">     
<?php include "view/boxleft.php";?>
<div class="box-right">
<div id="form-dk-dn">
        <form action="index.php?act=quenmk" method="post" class="form-dk-dn" onsubmit="return checksubmitquenmk()">
            <h1 class="form-dk-dn-title">Lấy lại mật khẩu</h1>
            <div class="form-dk-dn-item">
                <div class="form-dk-dn-1">
                    <i class="fa-solid fa-phone"></i>
                    <input onblur="return checkphone()" id="phonenumber" type="text" class="form-input" placeholder="Số điện thoại" name="phone">  
                </div>
                <small class="errorphone"></small>
            </div>
            <div class="form-dk-dn-item">
                <div class="form-dk-dn-1">
                    <i class="fa-solid fa-envelope"></i>
                    <input onblur="return checkemail()" id="email" type="text" class="form-input" placeholder="Email" name="email">  
                </div>
                <small class="erroremail"></small>
            </div>
            <div class="form-dk-dn-item">
                <div class="form-dk-dn-1">
                    <i class="fa-solid fa-key"></i>
                    <input id="password" onblur="return checkpassword()" type="password" class="form-input" placeholder="Nhập mật khẩu mới" name="password">
                    <div id="eye">
                        <i class="fa-solid fa-eye"></i>
                    </div>               
                </div>
                <small class="errorpassword"></small>
            </div>
            <div class="form-dk-dn-item">
                <div class="form-dk-dn-1">
                    <i class="fa-solid fa-key"></i>
                    <input onblur="return checkpassword2()" id="password2" type="password" class="form-input" placeholder="Xác nhận mật khẩu mới">
                    <div id="eye2">
                        <i class="fa-solid fa-eye"></i>
                    </div> 
                </div>
                <small class="errorpassword2"></small>
            </div>
            <input onclick="return checkclicksubmitquenmk()" type="submit" value="Xác nhận" name="xacnhan" class="form-dk-dn-submit">
            <div class="form-dk-dn-2">
                <div class="form-dk-dn-cotk">Chưa có tài khoản? <a href="http://localhost/hoa/index.php?act=dangky">Đăng ký ngay</a></div>
                <div class="form-dk-dn-cotk" style="margin-left: 67%;"><a href="http://localhost/hoa/index.php?act=quenmk">Quên mật khẩu?</a></div>
            </div>
        </form>
    </div>
        <?php include "view/footerboxright.php";?>
</div>