<?php
    if(is_array($dm)){
        extract($dm);
    }
    $imgpart = "../view/upload/imgdm/".$imgdm;
    if (is_file($imgpart)){
        $imgdm = "<img src='".$imgpart."'>";
    }else{
        $imgdm = "Không có hình ảnh";
    }
?>
<form action="index.php?act=updatedm" method="post" onsubmit="return checksubmitdm()" enctype="multipart/form-data">
    <div class="form-edit-admin">
        <h1 class="admin-edit-title">Chỉnh sửa danh mục</h1> 
        <div>       
            <div class="box-edit-item mgt2 mgl1"><label>Mã danh mục</label></br><input name="iddm" type="text" disabled value="<?=$iddm?>"></div>
            <div class="box-edit-item mgt2 mgl1"><label>Tên danh mục</label></br>
                <input onblur="return IsEmpty()" id="empty" type="text" name="namedm" value="<?php if((isset($namedm)&&($namedm)!="")) echo $namedm;?>">
                <small class="empty" style="color: red;"></small>       
            </div>
            <div class="box-edit-item mgt2 mgl1"><label>Ảnh minh họa</label></br><input name="imgdm" type="file"></div><div class="mgl1 img-edit"><?=$imgdm?></div>
            <div class="save-exit mgt2 mgl1" style="padding-bottom: 1%;">
                <input type="hidden" name="iddm" value="<?php if((isset($iddm)&&($iddm)!="")) echo $iddm; ?>">
                <div><a href="http://localhost/hoa/admin/index.php?act=listdm"><input type="button" style="background-color: red;" value="Thoát chỉnh sửa"></a></div>
                <div class="mgl3"><input onclick="return checkdm()" type="submit" style="background-color: black;" name="capnhatdm" value="Cập nhật"></div>
            </div>
        </div>
    </div>
</form>