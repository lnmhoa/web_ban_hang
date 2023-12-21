<h1 class="mgl1 mgb1">Thông tin web</h1>
<div class="form-khac-admin">
<form action="index.php?act=infoweb" method="post" class="form-khac-admin-item">
    <i class="fa-brands fa-youtube form-khac-admin-item-icon"></i>
    <input type="text" name="url-youtube" <?php if(!empty($info[0][3])){ echo  "value = ".$info[0][3]."";} ?>>
    <button type="submit" name="youtube" class="form-khac-admin-item-button">OK</button>
</form>
<form action="" method="post" class="form-khac-admin-item mgt1">
<i class="fa-brands fa-facebook form-khac-admin-item-icon" style="color:midnightblue"></i>
    <input type="text" name="url-facebook" <?php if(!empty($info[0][4])){ echo  "value = ".$info[0][4]."";} ?>>
    <button type="submit" name="facebook" class="form-khac-admin-item-button">OK</button>
</form>
<form action="" method="post" class="form-khac-admin-item mgt1">
<i class="fa-brands fa-twitter form-khac-admin-item-icon" style="color: #1f71ff;"></i>
    <input type="text" name="url-twitter" <?php if(!empty($info[0][5])){ echo  "value = ".$info[0][5]."";} ?>>
    <button type="submit" name="twitter" class="form-khac-admin-item-button">OK</button>
</form>
<form action="" method="post" class="form-khac-admin-item mgt1">
<i class="fa-solid fa-phone form-khac-admin-item-icon" style="color: #0011ff;"></i>
    <input type="text" name="web-phone" <?php if(!empty($info[0][1])){ echo  "value = ".$info[0][1]."";} ?>>
    <button type="submit" name="phone" class="form-khac-admin-item-button">OK</button>
</form>
<form action="" method="post" class="form-khac-admin-item mgt1">
<i class="fa-solid fa-envelope form-khac-admin-item-icon" style="color: #0011ff;"></i>
    <input type="text" name="web-email" <?php if(!empty($info[0][2])){ echo  "value = ".$info[0][2]."";} ?>>
    <button type="submit" name="email" class="form-khac-admin-item-button">OK</button>
</form>
</div>
<form action="" method="post">
<h1 class="mgl1 mgb1">Banner</h1>
<div class="mgt2 mgl1"></br><input type="file" name="imgsps[]" multiple></div>
<button type="submit" name="add-banner">OK</button>
</form>