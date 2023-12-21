<?php
include "view/conn.php";
$total = $page[0]['total'];
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$total_page = ceil($total / 18);
if(($current_page > $total_page)&&($total_page)!=0){
    $current_page = $total_page;
}
if($current_page < 1){
    $current_page = 1;
}
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['keyarrangesearch'])){
    $_SESSION['sortsearch'] = $_POST['keyarrangesearch'];
}
$_SESSION['sortsearch'] = isset($_SESSION['sortsearch']) ? $_SESSION['sortsearch'] : 'new';
$_SESSION['search'] = isset($_SESSION['search']) ? $_SESSION['search'] : '';
if($total != 0){
$start = ($current_page - 1) * 18;
$listsp = listspsearch($_SESSION['search'],$_SESSION['sortsearch'],$start);
}
?>
<div id="body">    
<?php include "view/boxleft.php";?>
<div class="box-right">
            <div class="box-right-dstcsp">
                <div class="box-right-dstcsp-top">
                    <div class="box-right-dstcsp-title">Danh sách sản phẩm với từ khóa : <c style="text-transform: none;"><?= $_SESSION['search']?></c></div>
                    <form class="box-right-dstcsp-select" action="index.php?act=searchsp" method="post">
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
                </div><?php } 
                }else{
                    echo 'Không có sản phẩm';
                } ?>
                 
                </div>         
                <div class="box-right-dstcsp-page">
                    <?php
                       if($total>18){
                        if ($current_page > 3){
                            echo '<a href="index.php?act=searchsp&page=1"><i class="fa-solid fa-angles-left box-right-dstcsp-page-item"></i></a>';
                        }
                        if ($current_page > 1 && $total_page > 1){
                            echo '<a href="index.php?act=searchsp&page='.($current_page-1).'"><i class="fa-solid fa-angle-left box-right-dstcsp-page-item"></i></a>';
                        }
                        for ($i = 1; $i <= $total_page; $i++){
                            if ($i != $current_page){
                                if($i > $current_page - 3 && $i < $current_page +3){
                                echo '<a href="index.php?act=searchsp&page='.$i.'" class="box-right-dstcsp-page-item" ">'.$i.'</a> ';
                                }
                            }
                            else{
                                echo '<div class="box-right-dstcsp-page-item1">'.$i.'</div>';
                            }
                        }
                        if ($current_page < $total_page && $total_page > 1){
                            echo '<a href="index.php?act=searchsp&page='.($current_page+1).'"><i class="fa-solid fa-angle-right box-right-dstcsp-page-item"></i></a>';
                        }
                        if ($current_page < $total_page -3){
                            echo '<a href="index.php?act=searchsp&page='.($total_page).'"><i class="fa-solid fa-angles-right box-right-dstcsp-page-item"></i></a>';
                        }}
                    ?>
                    
                </div>
            </div>
        <?php include "view/footerboxright.php";?>
</div>
