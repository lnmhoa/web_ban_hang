<?php
    if(is_array($sp)){
        extract($sp);
        $iddmsp = $iddm;
    }  
    $imgpath = "../view/upload/imgsp/" .$imgsp;
    if (is_file($imgpath)){
        $img = "<img src='".$imgpath."'>";
    }else{
        $img = "Không có hình ảnh";
    }
?>

<form action="index.php?act=updatesp" method="post" onsubmit="return checksubmitsp()" enctype="multipart/form-data">
        <div class="form-edit-admin">
            <h1 class="admin-edit-title">Cập nhật thông tin sản phẩm</h1> 
            <div class="box-edit-item mgt2 mgl1"><label>Mã sản phẩm</label></br><input disabled type="text" value="<?=$idsp?>"></div>       
            <div class="box-edit-item mgt2 mgl1"><label>Tên sản phẩm</label></br>
                <input onblur="return IsEmpty()" id="empty" type="text" name="namesp" value="<?=$namesp?>">
                <small class="empty" style="color: red;"></small>        
            </div>
            <div class="box-edit-item-001 mgt2 mgl1">
                <div class="box-edit-item"><label>Giá(VNĐ)</label></br>
                    <input onblur="return checkprice()" id="price" type="number" name="pricesp" value="<?=$price?>">
                    <small class="price" style="color: red;"></small> 
                </div>         
                <div class="box-edit-item"><label>Giá giảm(%)</label></br>
                    <input type="number" value="<?=$pricesale?>" name="pricesale">
                    <small class="pricesale" style="color: red;"></small> 
                </div>
                <div class="box-edit-item"><label>Số lượng</label></br><input type="number" name="slsp" value="<?=$quantity?>"></div>           
            </div>  
            <div class="box-edit-item-001 mgt2 mgl1">  
                <div class="box-edit-item"><label>Lượt xem</label></br><input type="text" disabled value="<?=$view?>"></div>
            </div>
            <div class="box-edit-item mgt2 mgl1"><label>Danh mục</label></br>           
                <select name="iddm">
                <?php 
                    foreach ($listdm as $danhmuc) {
                        extract($danhmuc);
                        if($iddm==$iddmsp){
                        echo '<option value ="'.$iddm.'" selected>'.$namedm.'</option>';}
                        else{
                            echo '<option value ="'.$iddm.'">'.$namedm.'</option>';
                        }
                    }
                ?>
                </select>
            </div>          
            <div class="box-edit-item mgt2 mgl1"><label>Hình ảnh</label></br><input type="file" name="imgsp"></div><div class="mgl1 img-edit"><?=$img?></div>
            <div class="box-edit-item mgt2 mgl1"><label>Ảnh chi tiết</label></br><input type="file" name="imgsps[]" multiple></div><div class="mgl1 img-edit1">
            <?php
                if (isset($img_ctsp) && count($img_ctsp) > 0) {
                    foreach ($img_ctsp as $key => $value) {
                        $img_ctsp_path[$key] = "../view/upload/imgsp/" . $value['nameimg'];
                        if (is_file($img_ctsp_path[$key])) {
                            $img = "<img src='" . $img_ctsp_path[$key] . "'>";
                        } else {
                            $img = "Không có hình ảnh";                          
                        }
                        echo $img;
                    }
                }else{
                    echo 'Không có ảnh chi tiết sản phẩm.';
                }
                ?></div>
            <div class="box-edit-item mgt2 mgl1"><label>Mô tả sản phẩm</label></br><textarea name="mota" id="" ><?=$motasp?></textarea></div>
            <div class="save-exit mgt2 mgl1" style="padding-bottom: 1%;">
                <input type="hidden" name="idsp" value="<?php if((isset($idsp)&&($idsp)!="")) echo $idsp; ?>">
                <div><a href="http://localhost/hoa/admin/index.php?act=listsp"><input type="button" style="background-color: red;" value="Thoát chỉnh sửa"></a></div>
                <div class="mgl3"><input onclick="return checkdm()" type="submit" style="background-color: black;" name="capnhatsp" value="Cập nhật"></div>
            </div>
        </div>             
    </form>
<script>
    CKEDITOR.replace( 'mota' );
</script>