<?php
include "view/conn.php";
$total = $page[0]['total'];
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$total_page = ceil($total / 18);
if ($current_page > $total_page){
    $current_page = $total_page;
}
else if ($current_page < 1){
    $current_page = 1;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['keyarrangespdm'])) {
    $_SESSION['sortspdm'] = $_POST['keyarrangespdm'];
}
$_SESSION['sortspdm'] = isset($_SESSION['sortspdm']) ? $_SESSION['sortspdm'] : 'new';
if($total != 0){
$start = ($current_page - 1) * 18;
$listsp = listspdm($_SESSION['sortspdm'],$_SESSION['iddm'],$start);
}
?>
<div id="body">     
        <?php include "boxleft.php";?>   
        <div class="box-right">
            <div class="box-right-dstcsp">
                <div class="box-right-dstcsp-top">
                    <div class="box-right-dstcsp-title">Danh sách sản phẩm thuộc danh mục: <?=$loadnamedm?></div>
                    <form class="box-right-dstcsp-select" action="index.php?act=sanpham" method="post">
                        <select name="keyarrangespdm">
                            <option value="new" selected>Mới nhất</option>
                            <option value="old" <?php if ($_SESSION['sortspdm'] == 'old') echo 'selected'; ?>>Cũ nhất</option>
                            <option value="desc" <?php if ($_SESSION['sortspdm'] == 'desc') echo 'selected'; ?>>Giá giảm dần</option>
                            <option value="asc" <?php if ($_SESSION['sortspdm'] == 'asc') echo 'selected'; ?>>Giá tăng dần</option>
                        </select>
                        <button type="submit">OK</button>
                    </form>
                </div>
                <div class="box-right-dssp-main">
                <?php
                if($total != 0){
                foreach ($listsp as $listsp) {
                    if(!empty($listsp)){
                    extract($listsp);
                    $img = "view/upload/img/".$imgsp;
                    $pricebuy = ($price*(100-$pricesale)/100);
                    $linksp = "index.php?act=sanphamct&idsp=".$idsp;
                    $imgsppath = "view/upload/imgsp/".$imgsp;
                    if($imgsp!=''){
                        $img = "<img src='".$imgsppath."'>";
                    }else{
                        $img= "<img src='view/upload/imght/no_img.jpg'>";
                    }}?>
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
                </div><?php }?> 
                <?php }else{
                    echo 'Không có sản phẩm';
                } ?>
                
                </div>         
                <div class="box-right-dstcsp-page">
                <?php
                       if($total>18){
                        if ($current_page > 3){
                            echo '<a href="index.php?act=sanpham&page=1"><i class="fa-solid fa-angles-left box-right-dstcsp-page-item"></i></a>';
                        }
                        if ($current_page > 1 && $total_page > 1){
                            echo '<a href="index.php?act=sanpham&page='.($current_page-1).'"><i class="fa-solid fa-angle-left box-right-dstcsp-page-item"></i></a>';
                        }
                        for ($i = 1; $i <= $total_page; $i++){
                            if ($i != $current_page){
                                if($i > $current_page - 3 && $i < $current_page +3){
                                echo '<a href="index.php?act=sanpham&page='.$i.'" class="box-right-dstcsp-page-item" ">'.$i.'</a> ';
                                }
                            }
                            else{
                                echo '<div class="box-right-dstcsp-page-item1">'.$i.'</div>';
                            }
                        }
                        if ($current_page < $total_page && $total_page > 1){
                            echo '<a href="index.php?act=sanpham&page='.($current_page+1).'"><i class="fa-solid fa-angle-right box-right-dstcsp-page-item"></i></a>';
                        }
                        if ($current_page < $total_page -3){
                            echo '<a href="index.php?act=sanpham&page='.($total_page).'"><i class="fa-solid fa-angles-right box-right-dstcsp-page-item"></i></a>';
                        }}
                    ?>
                </div>
            </div>
            <?php include "view/footerboxright.php"; ?>     
            </div>      
        </div>             
    </div>
    <div>
    </div>
    <span></span>