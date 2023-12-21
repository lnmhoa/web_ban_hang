
<form action="" method="post" onsubmit="return checksubmitsp()" enctype="multipart/form-data">
        <div class="form-edit-admin">
            <h1 class="admin-edit-title">Thêm sản phẩm</h1>      
            <div class="box-edit-item mgt2 mgl1"><label>Tên sản phẩm</label></br>
                <input onblur="return IsEmpty()" id="empty" type="text" name="namesp">
                <small class="empty" style="color: red;"></small>        
            </div>
            <div class="box-edit-item-001 mgt2 mgl1">
                <div class="box-edit-item"><label>Giá(VNĐ)</label></br>
                    <input onblur="return checkprice()" id="price" type="text" name="pricesp" value="1000">
                    <small class="price" style="color: red;"></small> 
                </div>         
                <div class="box-edit-item"><label>Giá giảm(%)</label></br>
                    <input onblur="return checkpricesale()" id="pricesale" type="text" name="pricesale" value="0">
                    <small class="pricesale" style="color: red;"></small> 
                </div>   
                <div class="box-edit-item"><label>Số lượng</label></br>
                    <input type="text" name="slsp" value="1" id="soluong">
                </div>           
            </div>  
            <div class="box-edit-item-001 mgt2 mgl1">  
                <div class="box-edit-item"><label>Danh mục</label></br>
                    <select name="iddm">
                    <?php 
                        foreach ($listdm as $danhmuc) {
                            extract($danhmuc);
                            echo '<option value ="'.$iddm.'">'.$namedm.'</option>';
                        }
                    ?>
                    </select>
                </div>
            </div>          
            <div class="box-edit-item mgt2 mgl1"><label>Hình ảnh</label></br><input type="file" name="imgsp"></div>
            <div class="box-edit-item mgt2 mgl1"><label>Ảnh chi tiết</label></br><input type="file" name="imgsps[]" multiple></div>
            <div class="box-edit-item mgt2 mgl1" style="margin-right: 1%;"><label>Mô tả sản phẩm</label></br><textarea name="mota" id="" ></textarea></div>
            <div class="save-exit mgt2 mgl1"><a href="http://localhost/hoa/admin/index.php?act=listsp"><div><input style="background-color: red;" type="button" value="Thoát"></div></a><input type="reset" class="mgl3" style="background-color: black;"value="Viết lại"></input><div class="mgl3"><input name="addsp" style="background-color: black;" onclick="return checksp()" type="submit" value="Thêm"></div></div>
        </div>             
    </form>
<script>
    let amountsl = document.getElementById('soluong')
    let amount =amountsl.value
    let render = (amount) =>{
        amountsl.value=amount;
    }
    amountsl.addEventListener('input' ,() =>{
        amount = amountsl.value;
        amount = parseInt(amount);
        amount = (isNaN(amount))?0:amount;
        render(amount); 
    });
    let price = document.getElementById('price')
    let price1 =price.value
    let render1 = (price1) =>{
        price.value=price1;
    }
    price.addEventListener('input' ,() =>{
        price1 = price.value;
        price1 = parseInt(price1);
        price1 = (isNaN(price1))?0:price1;
        render1(price1); 
    });
    let pricesale = document.getElementById('pricesale')
    let pricesale1 =pricesale.value
    let render2 = (pricesale1) =>{
        pricesale.value=pricesale1;
    }
    pricesale.addEventListener('input' ,() =>{
        pricesale1 = pricesale.value;
        pricesale1 = parseInt(pricesale1);
        pricesale1 = (isNaN(pricesale1))?0:pricesale1;
        render2(pricesale1); 
    }); 
    CKEDITOR.replace( 'mota' );
</script>