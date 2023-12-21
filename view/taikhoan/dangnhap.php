<div id="body">     
<?php include "view/boxleft.php";?>
<div class="box-right">
<div id="form-dk-dn">
        <form action="index.php?act=dangnhap" method="post" class="form-dk-dn" onsubmit="return checksubmitdn()">
            <h1 class="form-dk-dn-title">Đăng nhập tài khoản</h1>
            <div class="form-dk-dn-item">
                <div class="form-dk-dn-1">
                    <i class="fa-solid fa-phone"></i>
                    <input onblur="return checkphone()" id="phonenumber" type="text" class="form-input" placeholder="Số điện thoại" name="phone" <?php if(isset($_COOKIE['phone'])){echo 'value="'.$_COOKIE['phone'].'" '; } ?>>  
                </div>
                <small class="errorphone"></small>
            </div>
            <div class="form-dk-dn-item">
                <div class="form-dk-dn-1">
                    <i class="fa-solid fa-key"></i>
                    <input id="password" onblur="return checkpassword()" type="password" class="form-input" placeholder="Mật khẩu" name="password" <?php if(isset($_COOKIE['password'])){echo 'value="'.$_COOKIE['password'].'" '; } ?>>
                    <div id="eye">
                        <i class="fa-solid fa-eye"></i>
                    </div>               
                </div>
                <small class="errorpassword"></small>
            </div>
            <div class="form-dk-dn-checkbox">
                <input type="checkbox" name="nhottdn" id="checkboxdn"><label>Nhớ thông tin đăng nhập(7 ngày)</label>
            </div>
            <input onclick="return checkclicksubmitdn()" type="submit" value="Đăng nhập" name="dangnhap" class="form-dk-dn-submit">
            <div class="form-dk-dn-2">
                <div class="form-dk-dn-cotk">Chưa có tài khoản? <a href="http://localhost/hoa/index.php?act=dangky">Đăng ký ngay</a></div>
                <div class="form-dk-dn-cotk" style="margin-left: 67%;"><a href="http://localhost/hoa/index.php?act=quenmk">Quên mật khẩu?</a></div>
            </div>
        </form>
    </div>
        <?php include "view/footerboxright.php";?>
</div>
<script>
    <?php
    if(isset($_COOKIE['phone']) && isset($_COOKIE['password'])) {?>
    var checkbox = document.getElementById("checkboxdn");
    document.addEventListener("DOMContentLoaded", function() {
        checkbox.checked = true;
    });
    <?php }?>
</script>
<!-- <script>
    let phone = document.getElementById('phonenumber')
    let phone1 =phone.value
    let render = (phone1) =>{
        phone.value=phone1;
    }
    phone.addEventListener('input' ,() =>{
        phone1 = phone.value;
        phone1 = parseInt(phone1);
        phone1 = (isNaN(phone1))?'':phone1;
        render(phone1); 
    });
</script> -->