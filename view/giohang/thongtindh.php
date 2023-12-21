<div id="body">     
<?php include "view/boxleft.php";
    if(isset($_SESSION['user'])){
        extract($_SESSION['user']);
    }
?>
<div class="box-right">
    <div class="box-giohang">
    <form action="" method="post" onsubmit="return checksubmitttdh()">
        <h4 style="font-size: 20px; margin-bottom:1%;">Thông tin người đặt hàng</h4>
        <div class="box-ttdh-user">
            <div>
                <h4 style="margin-bottom:0.2%;">Họ tên người nhận hàng:</h4>
                <input name="hoten" onblur="return checkhotendh()" id="hotendh" type="text" <?php if(isset($_SESSION['user'])){echo 'value="'.$hoten.'"'; } ?>></br>
                <small style="color:red" class="errorhotendh"></small>
            </div>
            <div>  
                <h4 style="margin-bottom:0.2%;">Địa chỉ nhận hàng:</h4>
                <input name="address" onblur="return checkdiachidh()" id="diachidh" type="text" <?php if(isset($_SESSION['user'])){echo 'value="'.$address.'"'; } ?>></br>
                <small style="color:red" class="errordiachidh"></small>
            </div> 
            <div>
                <h4 style="margin-bottom:0.2%;">Số điện thoại:</h4>
                <input name="tel" onblur="return checkphonedh()" id="phonedh" type="text" <?php if(isset($_SESSION['user'])){echo 'value="'.$tel.'"'; } ?>></br>
                <small style="color:red" class="errorphonedh"></small>
            </div>
            <div>
                <div style="margin-bottom:0.2%;">Ghi chú:</div>
                <input name="ghichu" type="text">
            </div>
        </div>
        <h4 style="font-size: 20px; margin-bottom:1%;">Danh sách sản phẩm trong giỏ hàng</h4>
        <table>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Giá(1 sản phẩm)</th>
                <th>Số lượng</th>
                <th>Tổng giá</th>
            </tr>
            <?php
                $thanhtien = 0;
                $i = 0;
                foreach ($_SESSION['cart'] as $cart) {
                if(!empty($cart[2])){
                    $imgsp = '<img src="view/upload/imgsp/'.$cart[2].'">';
                }else{
                    $imgsp = '<img src="view/upload/imght/no_img.jpg">';
                }
                $price1sp = number_format($cart[3]); 
                $thanhtien += $cart[5];
                $thanhtien1 = number_format($thanhtien);
                $thanhtien2 = number_format($cart[5]);
                $xoasp = 'index.php?act=delsp&idcart='.$i;
                $xemlai = 'index.php?act=sanphamct&idsp='.$cart[0]; 
                ?>
                <tr>
                <td><?=$cart[1]?></td>
                <td><?=$imgsp?></td>
                <td><?=$price1sp?>đ</td>
                <td><?=$cart[4]?></td>
                <td><?=$thanhtien2?>đ</td>
            </tr>
            <?php $i+=1;}?>
            
        </table> 
        <?php if(!empty($_SESSION['cart'])){ ?>    
        <table>
            <tr>
                <td style="border-top:hidden; text-align: end;">Tổng tiền cần thanh toán: <b><?=$thanhtien1?>đ</b></td>
            </tr>
        </table>
        <?php }else{
            echo 'Chưa có sản phẩm trong giỏ hàng. Vui lòng thêm sản phẩm vào giỏ hàng và thực hiện lại.';
        }?>
        <div style="width: 100%; display: flex; flex-direction: row-reverse;">
            <?php if(!empty($_SESSION['cart'])){ ?> 
            <button name="xndh" class="button-dh" onclick="return checkttdh()" type="submit" style="margin-left: 4%">Xác nhận đặt hàng</button>
            <?php }?>
        </div>   
    </form>  
    </div>
    <div style="margin-bottom: 1%"></div>
    <?php include "view/footerboxright.php";?>
</div>
<script>
    let phone = document.getElementById('phonedh')
    let phone1 =phone.value
    let render = (phone1) =>{
        phone.value=phone1;
    }
    phone.addEventListener('input' ,() =>{
        phone1 = phone.value;
        phone1 = parseInt(phone1);
        phone1 = (isNaN(phone1))?'0':phone1;
        render(phone1); 
    });
</script>