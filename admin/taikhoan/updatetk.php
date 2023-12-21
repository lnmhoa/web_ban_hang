<?php if(is_array($tttk)){
    extract($tttk);
    $ngaydk = date('d/m/Y',strtotime($timedk));
} ?>
<div class="top-admin"></div>
    <form action="index.php?act=updatetk" method="post" onsubmit="return checksubmitupdatetk()">
        <div class="form-edit-admin">
            <h1 class="admin-edit-title">Chỉnh sửa thông tin tài khoản</h1>
                
            <div class="box-edit-item mgt2 mgl1"><label>Mã tài khoản</label></br><input value="<?=$idtk?>" type="text" disabled></div>
            <div class="box-edit-item mgt2 mgl1"><label>Số điện thoại</label></br>
                <input value="<?=$tel?>" type="text" disabled></br>
            </div>
            <div class="box-edit-item mgt2 mgl1"><label>Mật khẩu</label></br>
                <input id="password" onblur="return checkpassword()" name="password" value="<?=$password?>" type="password"></br>
                <small class="errorpassword" style="color: red;"></small> 
            </div> 
            <div class="box-edit-item mgt2 mgl1"><label>Họ tên khách hàng</label></br><input value="<?=$hoten?>" type="text" disabled></div>
            <div class="box-edit-item mgt2 mgl1"><label>Email</label></br><input value="<?=$email?>"type="text" disabled></div>
            <div class="box-edit-item mgt2 mgl1"><label>Địa chỉ</label></br><input value="<?=$address?>" type="text" disabled></div>
            <div class="box-edit-item mgt2 mgl1"><label>Ngày đăng ký</label></br><input value="<?=$ngaydk?>" type="text" disabled></div>
            <div class="save-exit mgt2 mgl1" style="padding-bottom: 1%;">
                <input type="hidden" name="id" value="<?php if((isset($idtk)&&($idtk)!="")) echo $idtk; ?>">
                <div><a href="http://localhost/hoa/admin/index.php?act=listtk"><input type="button" style="background-color: red;" value="Thoát chỉnh sửa"></a></div>
                <div class="mgl3"><input onclick="return checkclickupdatetk()" type="submit" style="background-color: black;" name="updatetk" value="Cập nhật"></div>
            </div>
        </div>
    </form>