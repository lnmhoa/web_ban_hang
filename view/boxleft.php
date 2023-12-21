<div class="box-left">
            <div class="box-left-dm-title js-opendm-tl__mb">Danh mục<i class="fa-solid more-dm-tl__mb fa-angle-right"></i></div>
            <div class="box-left-dm-name">
                <?php
                    foreach ($loaddmhome as $dm) {
                        extract($dm);
                        $imgdmpath = "view/upload/imgdm/".$imgdm;
                        if($imgdm!=0){
                            $img = "<img src='".$imgdmpath."'>";
                        }else{
                            $img= "<img src='view/upload/img/1685368620590.1409.png'>";
                        }
                        $linkdm = "index.php?act=sanpham&iddm=".$iddm;
                        echo '<div class="box-left-dm-name-lv1"><a class="box-left-dm-name-lv1-item" href="'.$linkdm.'">'.$img.''.$namedm.'</a><i class="fa-solid fa-plus js-opendm"></i>
                    </div>';
                    }
                ?>
            </div>
            <div class="box-left-kn-title js-openkn-tl__mb">Kết nối với BQF<i class="fa-solid more-kn-tl__mb fa-angle-right"></i></div>
            <div class="box-left-kn-title-open-tl__mb">
                <a class="box-left-kn-name-lv1-item" href="<?php if(!empty($info[0][4])){ echo $info[0][4];} ?>"><img src="view/upload/imght/Facebook-icon.png" alt="">Facebook</a>
                <a class="box-left-kn-name-lv1-item" href="<?php if(!empty($info[0][3])){ echo $info[0][3];} ?>"><img src="view/upload/imght/Yotube-icon.png" alt="">Yotube</a>
                <a class="box-left-kn-name-lv1-item" href="<?php if(!empty($info[0][5])){ echo $info[0][5];} ?>"><img src="view/upload/imght/Twitter-icon.png" alt="">Twitter</a>
            </div>
            <div class="box-left-k">
            <div class="box-left-k-title js-openk-tl__mb">Khác<i class="fa-solid more-k-tl__mb fa-angle-right"></i></div>
            <div class="box-left-k-title-open-tl__mb">      
                <div class="box-left-k-item"><a href="">Giới thiệu về BQF</a></div>
                <div class="box-left-k-item"><a href="">Hướng dẫn mua hàng</a></div>
                <div class="box-left-k-item"><a href="">Phương thức giao hàng</a></div>
                <div class="box-left-k-item-tl__mb">Hotline: <a href="">0836752979</a></div>
                <div class="box-left-k-item-tl__mb"><a href="">Chính sách đổi trả</a></div>
                <div class="box-left-k-item-tl__mb"><a href="">Chính sách bảo mật</a></div>
                <div class="box-left-k-item-tl__mb"><a href="">Điều khoản</a></div>
                <div class="box-left-k-item-tl__mb"><a href="">lnmhoa2101251@gmail.com</a></div>
            </div>  
            </div>
            </div>
            <div class="box-left-opendmmb">
        </div>