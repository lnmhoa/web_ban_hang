    <div id="body">
        <?php include "boxleft.php";?>     
        <div class="box-right">
            <div class="box-right-slider">
                <div class="slideshow-container slider-show">
                    <div class="mySlides">
                        <a href=""><img src="view/upload/imght/no_img.jpg"></a>
                    </div>    
                    <div class="mySlides">
                        <a href=""><img src="view/upload/imght/no_img.jpg"></a>
                    </div>                  
                </div>        
            </div>
            <div class="box-right-dcyn">
                <div class="box-right-dcyn-title">Sản phẩm được chú ý nhất</div>
                <div class="js-box-sp01">
                    <?php
                        foreach ($loadspview as $loadspview) {
                            extract($loadspview);
                            $linksp = "index.php?act=sanphamct&idsp=".$idsp;
                            $imgsppath = "view/upload/imgsp/".$imgsp;
                            if($imgsp!=''){
                                $img = "<img src='".$imgsppath."'>";
                            }else{
                                $img= "<img src='view/upload/imght/no_img.jpg'>";
                            }
                            echo '
                            <div class="box-sp-item">
                                <a href="'.$linksp.'">
                                    <div>'.$img.'</div>
                                </a>
                            </div>';}
                     ?>                        
                </div>    
            </div>
            <div class="box-right-dcyn">           
                <div class="box-right-dcyn-title">Sản phẩm được mua nhiều nhất</div>
                <div class="js-box-sp01">
                    <div class="box-sp-item">
                        <a href="">
                            <div><img src="" alt=""></div>
                            <!-- <div title="title" class="box-sp-item-name">Tên</div> -->
                        </a>
                    </div>                                                        
                </div>
            </div>
            <div class="box-right-dssp">
                <div class="box-right-dssp-title">Danh sách sản phẩm</div>
                <div class="box-right-dssp-main">
                    <?php
                        foreach ($loadsphome as $allsp) {
                            extract($allsp);
                        $linksp = "index.php?act=sanphamct&idsp=".$idsp;
                        $price1 = ($price*(100-$pricesale)/100);
                        $pricebuy = number_format($price1);
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
                </div><?php }?>  
                </div>         
                <div class="box-right-tcsp">
                    <a  class="box-right-tcsp-item" href="index.php?act=listsp"><div>Xem tất cả sản phẩm</div></a>
                </div>
            </div>
            <?php include "view/footerboxright.php"; ?>           
        </div>             
    </div>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script type="text/javascript" src="view/js/SliderShow.js"></script>