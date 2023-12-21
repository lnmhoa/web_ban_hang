<?php
    $price3 = number_format($price);
    $price1 = ($price*(100-$pricesale)/100);
    $pricebuy = number_format($price1);
    $price2 = ($price*(100-$pricesale)/100);
    include "view/conn.php";
?>
<div id="body">
<?php include "boxleft.php";?>
<div class="box-right-ttsp">
            <div class="box-ttsp-dm">Sản phẩm thuộc danh mục: <?php extract($loadonesp); $linkdm = "http://localhost/hoa/index.php?act=sanpham&iddm=".$iddm; echo '<a href="'.$linkdm.'">'.$loadnamedm.'</a></div>'?>
            <div class="box-ttsp">
                <?php  if(isset($img_ctsp) && count($img_ctsp) > 0){?>
                <div>
                    <div style="width: 100%; text-align: center;">
                        <div class="slider-for">
                        <?php
                            extract($loadonesp);
                            $idsp1 = $idsp;
                            $iddm1 = $iddm;
                            $img = "view/upload/img/".$imgsp;
                                $imgsppath = "view/upload/imgsp/".$imgsp;
                                if($imgsp!=''){
                                    $img = "<img src='".$imgsppath."'>";
                                }else{
                                    $img= "<img src='view/upload/imght/no_img.jpg'>";
                                }
                            echo '<div><i>'.$img.'</i></div>'; 
                            if(isset($img_ctsp) && count($img_ctsp) > 0){
                                foreach ($img_ctsp as $key => $value) {
                                    $img_ctsp_path[$key] = "view/upload/imgsp/" . $value['nameimg'];
                                    if (is_file($img_ctsp_path[$key])) {
                                        $img1 = "<img src='" . $img_ctsp_path[$key] . "'>";
                                        echo '<div><i>'.$img1.'</i></div>';
                                    }       
                            }
                        }
                        ?>
                        </div>
                    </div>
                    <div style="width: 100%; text-align: center;">
                    <div class="slider-nav">
                    <?php
                        extract($loadonesp);
                        $idsp1 = $idsp;
                        $iddm1 = $iddm;
                        $img = "view/upload/img/".$imgsp;
                            $imgsppath = "view/upload/imgsp/".$imgsp;
                            if($imgsp!=''){
                                $img = "<img src='".$imgsppath."'>";
                            }else{
                                $img= "<img src='view/upload/imght/no_img.jpg'>";
                            }
                        echo ' <div><i>'.$img.'</i></div>'; 
                        if(isset($img_ctsp) && count($img_ctsp) > 0){
                            foreach ($img_ctsp as $key => $value) {
                                $img_ctsp_path[$key] = "view/upload/imgsp/" . $value['nameimg'];
                                if (is_file($img_ctsp_path[$key])) {
                                    $img1 = "<img src='" . $img_ctsp_path[$key] . "'>";
                                    echo '<div><i>'.$img1.'</i></div>';
                                }    
                        }
                    }
                    ?>
                    </div>
                </div>
                </div>
                <?php }else{ ?>
                     <div>
                        <div style="width: 100%; text-align: center;">
                            <div class="slider-for">
                            <?php
                                extract($loadonesp);
                                $idsp1 = $idsp;
                                $iddm1 = $iddm;
                                $img = "view/upload/img/".$imgsp;
                                    $imgsppath = "view/upload/imgsp/".$imgsp;
                                    if($imgsp!=''){
                                        $img = "<img src='".$imgsppath."'>";
                                    }else{
                                        $img= "<img src='view/upload/imght/no_img.jpg'>";
                                    }
                                echo '<div><i>'.$img.'</i></div>'; 
                                if(isset($img_ctsp) && count($img_ctsp) > 0){
                                    foreach ($img_ctsp as $key => $value) {
                                        $img_ctsp_path[$key] = "view/upload/imgsp/" . $value['nameimg'];
                                        if (is_file($img_ctsp_path[$key])) {
                                            $img1 = "<img src='" . $img_ctsp_path[$key] . "'>";
                                            echo '<div><i>'.$img1.'</i></div>';
                                        }       
                                    }
                                }
                            ?>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                <div>
                    <div class="box-ttsp-name"><?=$namesp?></div>
                    <div class="box-ttsp-price">
                        <?php if($pricesale>0){ 
                            echo'<div class="box-ttsp-price-normal">'.$price3.'₫</div>
                                <div class="box-ttsp-price-sale"> '.$pricebuy.'₫(giảm '.$pricesale.'%)</div>';
                            }else{
                                echo '<div style="font-size: 25px; margin-top:10px">'.$pricebuy.'₫</div>';
                            }
                        ?>     
                    </div>
                    <?php if($quantity>0){?>
                        <div>
                            <button style="font-size: 20px; padding: 0px 7px; cursor: pointer;" onclick="minussl()"><i class="fas fa-minus"></i></button>
                                <input style="font-size: 20px; padding: 0px 1px; width: 50px; outline: none;text-align:center;" type="text" value="1" id="soluong">
                            <button style="font-size: 20px; padding: 0px 7px; cursor: pointer;" onclick="plussl()"><i class="fas fa-plus"></i></button>
                        </div>
                    <div>Số lượng sản phẩm còn lại: <?=$quantity?></div>
                    <form action="index.php?act=addtocart" method="post">
                        <input type="hidden" name="idsp" value="<?=$idsp?>">
                        <input type="hidden" name="namesp" value="<?=$namesp?>">
                        <input type="hidden" name="imgsp" value="<?=$imgsp?>">
                        <input type="hidden" name="pricesp" value="<?=$price2?>">
                        <input type="hidden" name="quantity" id="quantity">
                        <button type="submit" class="box-ttsp-button" name="addtocart"><div class="box-ttsp-button-buy"><i class="fa-solid fa-cart-shopping"></i><div class="box-ttsp-button-buy-add">Thêm vào giỏ hàng</div></div></button>
                    </form>
                    <?php }else{?>
                        <div style="color:red; font-size: 40px;">Hết hàng</div>
                    <?php }?>
                    <div class="box-ttsp-soid-view">
                        <div class="box-ttsp-soil">Đã bán: 210</div>
                        <div class="box-ttsp-view">Lượt xem: <?=$view?></div>
                    </div>
                </div>
            </div>
            <div class="box-ttct">
                <div class="box-ttct-title">Mô tả chi tiết sản phẩm</div>
                <div><div style="background-color: white;"><div style="margin-left: 2%;"><?=$motasp?></div></div></div>
            </div>
            <div class="box-bl">
                <div class="box-bl-title">Đánh giá sản phẩm</div>
                <div style="margin-bottom: 5px;">
                    <div class="box-star">
                    <div style="font-size: 40px;border-right: 1px solid black"><?php if($avgrate[0]['avgrate']!=0){
                        echo $avgrate[0]['avgrate'];
                        }else{
                        echo '0';} ?>
                    <div class="fas fa-star"></div><div style="font-size: 15px;">(<?=$countdg[0]['countrate']?>)</div></div>
                    <div style="padding: 0 2%">
                        <div>5<div class="fas fa-star"></div><div class="fas fa-star"></div><div class="fas fa-star"></div><div class="fas fa-star"></div><div class="fas fa-star"></div>(<?=$countdg5[0]['countrate5']?>)</div>
                        <div>4<div class="fas fa-star"><div class="fas fa-star"></div><div class="fas fa-star"></div><div class="fas fa-star"></div></div>(<?=$countdg4[0]['countrate4']?>)</div>
                        <div>3<div class="fas fa-star"><div class="fas fa-star"></div><div class="fas fa-star"></div></div>(<?=$countdg3[0]['countrate3']?>)</div>
                        <div>2<div class="fas fa-star"><div class="fas fa-star"></div></div>(<?=$countdg2[0]['countrate2']?>)</div>
                        <div>1<div class="fas fa-star"></div>(<?=$countdg1[0]['countrate1']?>)</div>
                    </div>
                </div>
            </div>
            <div style="display: grid; grid-template-columns: 40% 60%;">
            <div style="padding: 5px 0;">Đánh giá của khách hàng:</div>
            <form class="box-right-dstcsp-select" action="index.php?act=sanphamct" method="post">
                        <select name="keyarrangerate">
                            <option value="new" selected>Mới nhất</option>
                            <option value="old" <?php if ($_SESSION['sortrate'] == 'old') echo 'selected'; ?>>Cũ nhất</option>
                            <option value="tichcuc" <?php if ($_SESSION['sortrate'] == 'tichcuc') echo 'selected'; ?>>Tích cực</option>
                            <option value="tieucuc" <?php if ($_SESSION['sortrate'] == 'tieucuc') echo 'selected'; ?>>Tiêu cực</option>
                        </select>
                        <button type="submit">OK</button>
                    </form>
            </div>        
                <div class="box-bl1">
                    <?php
                        if(empty($danhgia)){
                            echo 'Chưa có đánh giá sản phẩm';
                        }else{
                        foreach($danhgia as $dg){                         
                                extract($dg);
                                $listdg = danhgiasp($idtk);
                                foreach ($listdg as $listdg) {
                                    extract($listdg);
                                    $avatarpath ="view/upload/imguser/" .$avatar;
                                    if(is_file($avatarpath)){
                                        $avatar1 = "<img src='".$avatarpath."'>";
                                    }else{
                                        $avatar1 = "<img src='view/upload/imght/avatardg.jpg'>";
                                    }
                                    if(empty($hoten)){
                                        $hoten1 = "Người dùng ẩn danh";
                                    }else{
                                        $hoten1=$hoten;
                                    }
                                    if($chinhsua != 0){
                                        $chinhsua1 = "(Đã chỉnh sửa)";
                                    }else{
                                        $chinhsua1 = "";
                                    }
                                        echo '
                                        <div class="box-bl-item">'.$avatar1.'<div>
                                        <div style="display: flex;"><div><div class="box-bl-name">'.$hoten1.'</div>
                                        <div class="box-bl-time">'.$timedg.'</div></div><div style="margin: 5px 0 0 15px;">'.$starrate.'
                                        <div class="fas fa-star"></div></div></div><div class="box-bl-nd">'.$noidung.'<i style=" font-weight: 300;">'.$chinhsua1.'</i></div></div></div>';
                                }
                            }                 
                        }                    
                    ?>
            </div>
            <?php if(isset($_SESSION['user'])) { if(!empty(checkdg($_SESSION['user']['idtk'],$idsp))){ ?>
            <button class="js-open-add1 box-bl-button">Sửa đánh giá</button><?php }else{ ?>   
            <button class="js-open-add1 box-bl-button">Thêm đánh giá</button><?php }}else{?>
            <div>Vui lòng đăng nhập để đánh giá sản phẩm.<a style="color: blue; text-decoration: none;" href="http://localhost/hoa/index.php?act=dangnhap">Đăng nhập ngay.</a></div><?php }?>
        </div>
        <?php if(isset($_SESSION['user'])) { if(!empty(checkdg($_SESSION['user']['idtk'],$idsp))){ 
                $stmt = $conn->prepare("select starrate,noidung from danhgia where idtk = :idtk");
                $stmt->bindParam(':idtk',$_SESSION['user']['idtk'] , PDO::PARAM_INT);
                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {             
                    extract($row);
                    $rating = $starrate; 
                }
            ?>
            <form action="index.php?act=sanphamct" method="post" onsubmit="return checksubmitdm1()">
                <div class="open-add-dg1">
                    <div class="box-add1">
                        <div class="open-add-dg11">
                            <i class="fa-solid fa-close close-add-icon1"></i>
                            <h1>Sửa đánh giá sản phẩm</h1> 
                            <div class="box-add-item1">
                                <div class="racing1">
                                    <div class="star-racing1">
                                        <input type="radio" name="rate" id="rate-5" value="5">
                                        <label for="rate-5" class="fas fa-star"></label>
                                        <input type="radio" name="rate" id="rate-4" value="4">
                                        <label for="rate-4" class="fas fa-star"></label>
                                        <input type="radio" name="rate" id="rate-3" value="3">
                                        <label for="rate-3" class="fas fa-star"></label>
                                        <input type="radio" name="rate" id="rate-2" value="2">
                                        <label for="rate-2" class="fas fa-star"></label>
                                        <input type="radio" name="rate" id="rate-1" value="1">
                                        <label for="rate-1" class="fas fa-star"></label>
                                </div></div>
                                <small class="checkrate1" style="text-align:center; color:red; margin-left: 38.8%; font-size: 14px;"></small>        
                            </div>
                            <input type="hidden" name="idsp1" value="<?=$idsp?>">
                            <div class="box-add-item1 checknd"><textarea name="noidung" placeholder="Viết đánh giá"><?=$noidung?></textarea></div>
                            <button type="submit" name="suadanhgia" >Gửi đánh giá</button>
                        </div>
                    </div>
                </div>
             </form>
           <?php }else{ $rating = 0; ?>
            <form action="index.php?act=sanphamct" method="post" onsubmit="return checksubmitdm1()">
               <div class="open-add-dg1">
                   <div class="box-add1">
                       <div class="open-add-dg11">
                           <i class="fa-solid fa-close close-add-icon1"></i>
                           <h1>Đánh giá sản phẩm</h1> 
                           <div class="box-add-item1">
                               <div class="racing1">
                                   <div class="star-racing1">
                                       <input type="radio" name="rate" id="rate-5" value="5">
                                       <label for="rate-5" class="fas fa-star"></label>
                                       <input type="radio" name="rate" id="rate-4" value="4">
                                       <label for="rate-4" class="fas fa-star"></label>
                                       <input type="radio" name="rate" id="rate-3" value="3">
                                       <label for="rate-3" class="fas fa-star"></label>
                                       <input type="radio" name="rate" id="rate-2" value="2">
                                       <label for="rate-2" class="fas fa-star"></label>
                                       <input type="radio" name="rate" id="rate-1" value="1">
                                       <label for="rate-1" class="fas fa-star"></label>
                               </div></div>
                               <small class="checkrate1" style="text-align:center; color:red; margin-left: 38.8%; font-size: 14px;"></small>          
                           </div>
                           <input type="hidden" name="idsp1" value="<?=$idsp?>">
                           <div class="box-add-item1"><textarea name="noidung" placeholder="Viết đánh giá"></textarea></div>
                           <button type="submit" name="guidanhgia" >Gửi đánh giá</button>
                       </div>
                   </div>
               </div>
            </form>    
           <?php }} ?>     
            <div style="width: 100%; height: 10px;"></div>
            <?php
            $total = $page[0]['total'];
            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
            $total_page = ceil($total / 12);
            if ($current_page > $total_page){
                $current_page = $total_page;
            }
            else if ($current_page < 1){
                $current_page = 1;
            }
            $start = ($current_page - 1) * 12;
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['keyarrangesearch'])) {
                $_SESSION['sortsearch'] = $_POST['keyarrangesearch'];
            }
            $_SESSION['sortsearch'] = isset($_SESSION['sortsearch']) ? $_SESSION['sortsearch'] : 'new'; 
            if($total !== 0){
            $start = ($current_page - 1) * 12;
            $listspct = listspcl($_SESSION['sortsearch'],$iddm1,$idsp1,$start);}
            ?>
            <div class="box-right">
            <div class="box-right-dstcsp">
                <div class="box-right-dstcsp-top">
                    <div class="box-right-dstcsp-title">Sản phẩm cùng loại</div>
                    <form class="box-right-dstcsp-select" action="index.php?act=sanphamct" method="post">
                        <select name="keyarrangesearch">
                            <option value="new" selected>Mới nhất</option>
                            <option value="old" <?php if ($_SESSION['sortsearch'] == 'old') echo 'selected'; ?>>Cũ nhất</option>
                            <option value="desc" <?php if ($_SESSION['sortsearch'] == 'desc') echo 'selected'; ?>>Giá giảm dần</option>
                            <option value="asc" <?php if ($_SESSION['sortsearch'] == 'asc') echo 'selected'; ?>>Giá tăng dần</option>
                        </select>
                        <button type="submit">OK</button>
                    </form>
                </div>
                <div class="box-right-dssp-main">
                <?php
                if($total != 0){
                foreach ($listspct as $listspct) {        
                    extract($listspct);
                    $img = "view/upload/img/".$imgsp;
                    $pricebuy = ($price*(100-$pricesale)/100);
                    $linksp = "index.php?act=sanphamct&idsp=".$idsp;
                    $imgsppath = "view/upload/imgsp/".$imgsp;
                    if($imgsp!=''){
                        $img = "<img src='".$imgsppath."'>";
                    }else{
                        $img= "<img src='view/upload/imght/no_img.jpg'>";
                    }?>
                    <div class="box-sp">
                    <a href="<?=$linksp?>">
                    <div class="box-dssp-item">
                        <div><?=$img?></div>
                        <div class="box-dssp-item-name"><?=$namesp?></div>
                        <div class="box-dssp-item-price"><?=$pricebuy?>₫</div>
                        <?php
                            $rate = avgratesp($idsp);
                            if(empty($rate[0]['avgrate'])){
                                $rate[0]['avgrate'] ='0';
                            }                                               
                        ?>
                        <div class="box-dssp-item-soil"><?=$rate[0]['avgrate']?><i class="fas fa-star" style="color: yellow;"></i></div>        
                    </div>       
                </a>
                </div><?php }
                }else{
                    echo 'Không có sản phẩm cùng loại';
                } ?>
                 
                </div>         
                <div class="box-right-dstcsp-page">
                    <?php 
                     if($total > 12){
                        if ($current_page > 3){
                            echo '<a href="index.php?act=sanphamct&idsp='.$idsp1.'&page=1"><i class="fa-solid fa-angles-left box-right-dstcsp-page-item"></i></a>';
                        }
                        if ($current_page > 1 && $total_page > 1){
                            echo '<a href="index.php?act=sanphamct&idsp='.$idsp1.'&page='.($current_page-1).'"><i class="fa-solid fa-angle-left box-right-dstcsp-page-item"></i></a>';
                        }
                        for ($i = 1; $i <= $total_page; $i++){
                            if ($i != $current_page){
                                if($i > $current_page - 3 && $i < $current_page +3){
                                echo '<a href="index.php?act=sanphamct&idsp='.$idsp1.'&page='.$i.'" class="box-right-dstcsp-page-item" ">'.$i.'</a> ';
                                }
                            }
                            else{
                                echo '<div class="box-right-dstcsp-page-item1">'.$i.'</div>';
                            }
                        }
                        if ($current_page < $total_page && $total_page > 1){
                            echo '<a href="index.php?act=sanphamct&idsp='.$idsp1.'&page='.($current_page+1).'"><i class="fa-solid fa-angle-right box-right-dstcsp-page-item"></i></a>';
                        }
                        if ($current_page < $total_page -3){
                            echo '<a href="index.php?act=sanphamct&idsp='.$idsp1.'&page='.($total_page).'"><i class="fa-solid fa-angles-right box-right-dstcsp-page-item"></i></a>';
                        }}
                    ?>
                </div>
            </div>
            <div style="width: 100%; height: 10px;"></div>
            <?php include "view/footerboxright.php"; ?>  
        </div>
         
    </div></div>
<script>
    <?php if((isset($_SESSION['user']))){?>
    let checkrate1 = document.querySelector('.checkrate1')
    const openadd1 = document.querySelector('.open-add-dg1');
    const clickadds1 = document.querySelectorAll('.js-open-add1');
    const boxadd1 = document.querySelector('.box-add1');
    const closeAddIcons1 = document.querySelectorAll('.close-add-icon1');
    for(const clickadd1 of clickadds1){
    clickadd1.addEventListener('click',openadd11);
    }
    for(const closeAddIcon1 of closeAddIcons1){
    closeAddIcon1.addEventListener('click',closeadd11);
        }
    openadd1.addEventListener('click',closeadd11);
    boxadd1.addEventListener('click',function(event){
    event.stopPropagation();
    })
    function openadd11(){
    openadd1.classList.add('open');
    }
    function closeadd11(){
    openadd1.classList.remove('open');
    }
  function checksubmitdm1() {
    const ratings = document.getElementsByName("rate");
    for (let i = 0; i < ratings.length; i++) {
      if (ratings[i].checked) {
        return true;
      }
    }
    checkrate1.innerText = "Vui lòng đánh giá sao";
    return false;
    }<?php }?>
    
    <?php if((isset($_SESSION['user']))){ if($rating > 0){?>
    var rating = <?php echo $rating; ?>;
    document.getElementById("rate-" + rating).checked = true; <?php }}?>  
    <?php extract($loadonesp); if($quantity>0){ ?>
    const maxQuantity = <?=$quantity?>;
    let amountsl = document.getElementById('soluong')
    let amount =amountsl.value
    let render = (amount) =>{
        amountsl.value=amount;
        document.getElementById("quantity").value = amount;  
    }
    let plussl = () =>{
        if(amount < maxQuantity){
            amount++
            render(amount);
        } 
    }
    let minussl = () =>{
        if(amount>1){
            amount--
        };
        render(amount);  
    }
    amountsl.addEventListener('input' ,() =>{
        amount = amountsl.value;
        amount = parseInt(amount);
        amount = (isNaN(amount)||amount===0)?1:amount;
        if (amount > maxQuantity) {
            amount = maxQuantity;
        }
        render(amount);      
    });
    <?php }?>
</script>
 
