<?php
    session_start();
    include "model/taikhoan.php";
    include "model/pdo.php";
    include "model/sanpham.php";
    include "model/danhmuc.php";
    include "model/danhgia.php";
    include "model/donhang.php";
    include "model/thongke.php";
    include "model/info.php";
    include "model/sweetalert2.php";
    $info = infoweb();
    include "view/header.php";
    $loadsphome = loadallsphome();
    $loaddmhome = loadalldmhome();
    $loadspview = loadspview();
    $viewweb = viewweb();
    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = [];
    }
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    if (!isset($_GET['act']) || $_GET['act'] !== 'htdh'){
        unset($_SESSION['idcart']);
    }
    if (isset($_SESSION['tel'])) {
        $checkteldh = checkteldh($_SESSION['tel']);
        $check = false;
        foreach ($checkteldh as $ttdh) {
            extract($ttdh);
            if (isset($_GET['act']) && ($_GET['act'] === 'dhct' || ($_GET['act'] === 'chitietdh' && $_GET['iddh'] === ''.$idcart))) {
                $check = true;
                break;
            }
        }
        if(!$check){
            unset($_SESSION['tel']);
        }
    }
    if(isset($_GET['act'])&&($_GET['act']!="")){
        $act =$_GET['act'];
        switch ($act) {
            case 'dangky':
                if(isset($_POST['dangky'])&&($_POST['dangky'])){
                    $phone = $_POST['phone'];
                    $checkdk = checktkdk($phone);
                    if(is_array($checkdk)){
                        warning('Số điện thoại đã được dùng để đăng ký. Vui lòng sử dụng số điện thoại khác!','http://localhost/hoa/index.php?act=dangky');
                    }else{
                        $time = date('Y/m/d');
                        $password = $_POST['password'];
                        addtk($phone,$password,$time);
                        success('Đăng ký thành công.','http://localhost/hoa/index.php?act=dangky');   
                    }
                }
                include "view/taikhoan/dangky.php";
                break;
            case 'dangnhap':
                if(isset($_POST['dangnhap'])&&($_POST['dangnhap'])){
                    $phone = $_POST['phone'];
                    $password = $_POST['password'];
                    $checkdn = checktkdn($phone,$password);
                    $checkdntel = checktkdntel($phone);
                    if(is_array($checkdn)){
                        $_SESSION['user']=$checkdn;
                        extract($_SESSION['user']);
                        if($role!=0){
                            if(isset($_POST['nhottdn'])&&($_POST['nhottdn'])){
                                setcookie("phone",$phone,time()+(86400*7));
                                setcookie("password",$password,time()+(86400*7));
                            }else{
                                setcookie("phone",$phone,time()-(86400*7));
                                setcookie("password",$password,time()-(86400*7)); 
                            } 
                            success('Đăng nhập thành công.','http://localhost/hoa/index.php');
                        }else{
                            error('Đăng nhập không thành công. Tài khoản đã bị khóa. Vui lòng sử dụng tài khoản khác!','http://localhost/hoa/index.php?act=dangnhap');
                            session_unset();
                        }
                    }else{
                        if(is_array($checkdntel)){
                            error('Đăng nhập không thành công. Mật khẩu hoặc số điện thoại không đúng!','http://localhost/hoa/index.php?act=dangnhap');
                        }else{
                            error('Đăng nhập không thành công. Số điện thoại chưa được đăng ký. Vui lòng kiểm tra lại!','http://localhost/hoa/index.php?act=dangnhap');
                        }
                    }
                }
                include "view/taikhoan/dangnhap.php";
                break;
            case 'edittk':
                if(isset($_SESSION['user'])){
                    $tel = $_SESSION['user']['tel'];      
                    if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                        $name = $_POST['name'];
                        $phone = $_POST['phone'];
                        $password = $_POST['password'];
                        $email = $_POST['email'];
                        $address = $_POST['address'];
                        $id = $_POST['id'];                 
                            if($_FILES["avatar"]["name"]!=''){
                                $avatar = $_FILES['avatar']['name'];
                                $target_dir = "view/upload/imguser/";
                                $avt_type = pathinfo($avatar, PATHINFO_EXTENSION);
                                $new_name_avt = md5(uniqid()).'.'.$avt_type;
                                $target_file = $target_dir . basename($new_name_avt);
                                $avt_type = strtoupper($avt_type);
                                if ($avt_type != 'JPG' && $avt_type != 'PNG' && $avt_type != 'JPEG' && $avt_type != 'GIF') {
                                    warning('Ảnh đại diện không đúng định dạng! Vui lòng chọn lại.','http://localhost/hoa/index.php?act=edittk');
                                    break;       
                                }else{  
                                    if(empty(checktkdk($_POST['phone'])['tel'])){
                                        move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file);
                                        updatetk($name,$phone,$password,$email,$address,$id,$new_name_avt);
                                        include "view/taikhoan/chinhsuatttk.php";
                                        success('Cập nhật tài khoản thành công. Vui lòng đăng nhập lại!','http://localhost/hoa/index.php?act=dangnhap');  
                                        break;
                                    }else{
                                        if(checktkdk($_POST['phone'])['tel']==$_SESSION['user']['tel']){ 
                                            move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file);
                                            updatetk($name,$phone,$password,$email,$address,$id,$new_name_avt);
                                            include "view/taikhoan/chinhsuatttk.php";
                                            success('Cập nhật tài khoản thành công.','http://localhost/hoa/index.php?act=edittk'); 
                                            $_SESSION['user']=checktkdk($tel);   
                                            break;
                                        }
                                        if(checktkdk($_POST['phone'])['tel']!=$_SESSION['user']['tel']){
                                            if(is_array(checktkdk($phone))){
                                                include "view/taikhoan/chinhsuatttk.php";
                                                error('Cập nhật thất bại. Số điện thoại đã được sử dụng. Vui lòng chọn số điện thoại khác!','http://localhost/hoa/index.php?act=edittk');
                                                break;
                                            }else{
                                                session_unset();
                                                break;
                                            }
                                        }
                                    }        
                                }
                            }else{ 
                                $avatar = '';
                                if(empty(checktkdk($_POST['phone'])['tel'])){
                                    updatetk($name,$phone,$password,$email,$address,$id,$avatar);
                                    include "view/taikhoan/chinhsuatttk.php";
                                    success('Cập nhật tài khoản thành công. Vui lòng đăng nhập lại!','http://localhost/hoa/index.php?act=dangnhap');  
                                    break;
                                }else{
                                    if(checktkdk($_POST['phone'])['tel']==$_SESSION['user']['tel']){ 
                                        updatetk($name,$phone,$password,$email,$address,$id,$avatar);
                                        include "view/taikhoan/chinhsuatttk.php";
                                        success('Cập nhật tài khoản thành công.','http://localhost/hoa/index.php?act=edittk'); 
                                        $_SESSION['user']=checktkdk($tel);   
                                        break;
                                    }
                                    if(checktkdk($_POST['phone'])['tel']!=$_SESSION['user']['tel']){
                                        if(is_array(checktkdk($phone))){
                                            include "view/taikhoan/chinhsuatttk.php";
                                            error('Cập nhật thất bại. Số điện thoại đã được sử dụng. Vui lòng chọn số điện thoại khác!','http://localhost/hoa/index.php?act=edittk');
                                            break;
                                        }else{
                                            session_unset();
                                            break;
                                        }
                                    }
                                }    
                            }
                    }else{                        
                        $_SESSION['user']=checktkdk($tel);  
                        include "view/taikhoan/chinhsuatttk.php";
                        break;
                    }
                }else{
                    warning('Vui lòng đăng nhập tài khoản!','http://localhost/hoa/index.php?act=dangnhap');
                    include "view/taikhoan/dangnhap.php";
                    break;
                }
            case 'quenmk':
                if(isset($_POST['xacnhan'])&&($_POST['xacnhan'])){
                    $phone = $_POST['phone'];
                    $email = $_POST['email'];
                    $checkttquenmk = checkttquenmk($phone,$email);
                    if(is_array($checkttquenmk)){
                        $password = $_POST['password'];
                        updatettquenmk($phone,$email,$password);
                        success('Đổi mật khẩu thành công','http://localhost/hoa/index.php?act=dangnhap');
                    }else{
                        $checkdntel = checktkdntel($phone);
                        if(is_array($checkdntel)){
                            error('Đổi mật khẩu thành công thất bại. Vui lòng kiểm tra lại số điện thoại hoặc email','http://localhost/hoa/index.php?act=quenmk');
                        }else{
                            error('Đổi mật khẩu thành công thất bại. Số điện thoại chưa được đăng ký. Vui lòng kiểm tra lại!','http://localhost/hoa/index.php?act=quenmk');
                        }
                    }
                }
                include "view/taikhoan/quenmk.php";
                break;
            case 'dangxuat':
                if($_SESSION['cart']!=''){
                    foreach ($_SESSION['cart'] as $cart) {
                        extract($cart);
                        updateslsp2($cart[4],$cart[0]);
                    }
                }
                session_destroy();
                success('Đăng xuất thành công.','http://localhost/hoa/index.php');
                include "view/home.php";
                break;
            case 'listsp':
                $page = pagesearch('');
                include "view/listsp.php";
                break;
            case 'sanpham':
                if(isset($_GET['iddm'])&&($_GET['iddm'])>0){
                    $iddm = $_GET['iddm'];
                    $_SESSION['iddm'] = $iddm;
                    $page = pagespdm($_SESSION['iddm']);
                    $loadnamedm= loadnamedm($_SESSION['iddm']);
                    include "view/sanphamtheodm.php";
                    break;
                }if(isset($_SESSION['iddm'])&&$_SESSION['iddm']!=''&&!isset($_GET['iddm'])){
                    $loadonesp = loadonesp($_SESSION['iddm']);
                    $page = pagespdm($_SESSION['iddm']);
                    $loadnamedm= loadnamedm($_SESSION['iddm']);
                    include "view/sanphamtheodm.php";
                    break;
                }
            case 'searchsp':
                if(isset($_POST['keyname'])&&$_POST['keyname']!="") {
                    $_SESSION['search'] = $_POST['keyname'];
                    $page = pagesearch($_SESSION['search']);
                    include "view/searchsp.php";
                    break;
                }else if(isset($_POST['keyname'])&&$_POST['keyname']=="") {
                    $_SESSION['search'] = $_POST['keyname'];
                    $page = pagesearch($_SESSION['search']);
                    include "view/listsp.php";
                    break;
                }else if(isset($_SESSION['search'])&&isset($_POST['keyname'])){
                    if($_POST['keyname']!=""){
                        $page = pagesearch($_SESSION['search']);
                        include "view/searchsp.php";
                        break;
                    }if($_POST['keyname']==""){
                        $page = pagesearch($_SESSION['search']);
                        include "view/listsp.php";
                        break;
                    }
                }else if(isset($_SESSION['search'])&&!isset($_POST['keyname'])){
                    $page = pagesearch($_SESSION['search']);
                    include "view/searchsp.php";
                    break;
                }
            case 'sanphamct':
                case 'addtocart':
                    if(isset($_POST['addtocart'])){
                        $quantity = $_POST['quantity']; 
                        if(empty($quantity)){
                            $quantity = 1;
                        }
                        if($quantity<=checkslsp($_POST['idsp'])[0][0]){
                            $idsp = $_POST['idsp'];
                            $namesp = $_POST['namesp'];
                            $imgsp = $_POST['imgsp'];
                            $pricesp = $_POST['pricesp'];
                            $thanhtien = $quantity * $pricesp;
                            $checksp = false;
                            foreach ($_SESSION['cart'] as $key => $item) {
                                if ($item[0] == $idsp) {
                                    $_SESSION['cart'][$key][4] += $quantity;
                                    $_SESSION['cart'][$key][5] += $thanhtien;
                                    $checksp = true;
                                    updateslsp($quantity,$idsp);
                                    break;
                                }
                            }
                            if (!$checksp){
                                $addcart = [$idsp, $namesp, $imgsp, $pricesp, $quantity, $thanhtien];
                                array_push($_SESSION['cart'], $addcart);
                                updateslsp($quantity,$idsp);
                            }
                            success('Thêm vào giỏ hàng thành công.', 'http://localhost/hoa/index.php?act=sanphamct&idsp=' . $_SESSION['idsp']);
                        }else{
                            error('Thêm sản phẩm thất bại. Vui lòng kiểm tra lại số lượng sản phẩm!', 'http://localhost/hoa/index.php?act=sanphamct&idsp=' . $_SESSION['idsp']);
                        }
                        
                    }
                if(isset($_GET['idsp'])&&($_GET['idsp'])>0){
                    $idsp = $_GET['idsp'];
                    $_SESSION['idsp'] = $idsp;
                    $loadonesp = loadonesp($idsp);
                    extract($loadonesp);
                    $page = pagespcl($idsp,$iddm);
                    $loadnamedm= loadnamedm($iddm);
                    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['keyarrangerate'])) {
                        $_SESSION['sortrate']=$_POST['keyarrangerate'];
                    }else{
                        $_POST['keyarrangerate']="new";
                        $_SESSION['sortrate']=$_POST['keyarrangerate'];
                    }
                    $img_ctsp = loadallimgctsp($idsp);
                    view($idsp);
                    $countdg = countdg($idsp);
                    $countdg1 = countdg1($idsp);
                    $countdg2 = countdg2($idsp);
                    $countdg3 = countdg3($idsp);
                    $countdg4 = countdg4($idsp);
                    $countdg5 = countdg5($idsp);
                    $avgrate = avgrate($idsp);
                    $danhgia = loadalldg($idsp,$_SESSION['sortrate']);    
                    include "view/chitietsanpham.php";
                    break;
                }if(isset($_SESSION['idsp'])&&$_SESSION['idsp']!=''&&!isset($_GET['idsp'])){
                    $loadonesp = loadonesp($_SESSION['idsp']);
                    extract($loadonesp);
                    $page = pagespcl($_SESSION['idsp'],$iddm);
                    $loadnamedm= loadnamedm($iddm);
                    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['keyarrangerate'])) {
                        $_SESSION['sortrate']=$_POST['keyarrangerate'];
                    }else{
                        $_POST['keyarrangerate']="new";
                        $_SESSION['sortrate']=$_POST['keyarrangerate'];
                    }
                    view($_SESSION['idsp']);
                    $countdg1 = countdg1($_SESSION['idsp']);
                    $countdg2 = countdg2($_SESSION['idsp']);
                    $countdg3 = countdg3($_SESSION['idsp']);
                    $countdg4 = countdg4($_SESSION['idsp']);
                    $countdg5 = countdg5($_SESSION['idsp']);
                    $countdg = countdg($_SESSION['idsp']);
                    $avgrate = avgrate($_SESSION['idsp']);
                    $danhgia = loadalldg($_SESSION['idsp'],$_SESSION['sortrate']);
                    $img_ctsp = loadallimgctsp($_SESSION['idsp']);             
                    include "view/chitietsanpham.php";
                    break;
                }
                if(isset($_POST['guidanhgia'])){
                    $rate = $_POST['rate'];
                    $idsp = $_POST['idsp1'];
                    $noidung = $_POST['noidung'];
                    $idtk = $_SESSION['user']['idtk'];
                    $time = date('Y/m/d');
                    adddg($idtk,$idsp,$noidung,$rate,$time);
                    success('Đánh giá thành công. Cảm ơn bạn đã đánh giá.','http://localhost/hoa/index.php?act=sanphamct&idsp='.$_SESSION['idsp'].'');
                    break;
                }
                if(isset($_POST['suadanhgia'])){
                    $rate = $_POST['rate'];
                    $idsp = $_POST['idsp1'];
                    $edit = $_POST['idsp1'];
                    $noidung = $_POST['noidung'];
                    $idtk = $_SESSION['user']['idtk'];
                    $time = date('Y/m/d');
                    updatedg($rate,$noidung,$time,$idsp,$idtk,$edit);
                    success('Đánh giá thành công. Cảm ơn bạn đã đánh giá.','http://localhost/hoa/index.php?act=sanphamct&idsp='.$_SESSION['idsp'].'');
                    break;
                }
            case 'delsp':
                if(isset($_GET['idcart'])){
                    $idcart = $_GET['idcart'];
                    $quantity = $_SESSION['cart'][$idcart][4];
                    $idsp = $_SESSION['cart'][$idcart][0];
                    updateslsp2($quantity,$idsp);     
                    array_splice($_SESSION['cart'],$_GET['idcart'],1);
                    break;  
                }
            case 'giohang':
                include "view/giohang/giohang.php";
                break;
            case 'ttdh':
                $totalprice = 0;
                if(isset($_POST['xndh'])){
                    $hoten = $_POST['hoten'];
                    $address = $_POST['address'];
                    $tel = $_POST['tel'];
                    $ghichu = $_POST['ghichu'];
                    $time = date('Y/m/d');
                    $madh = md5(uniqid());
                    if(!isset($_SESSION['user'])){
                        $idtk ='';
                    }else{
                        $idtk = $_SESSION['user']['idtk'];
                    }
                    foreach ($_SESSION['cart'] as $cart) {
                        $totalprice += $cart[5];
                    }
                    $idnewcart = addcart($idtk,$madh,$hoten,$address,$tel,$ghichu,$totalprice,$time);
                    $_SESSION['idcart'] = $idnewcart;
                    foreach($_SESSION['cart'] as $cart){
                        adddh($idtk,$tel,$idnewcart,$cart[0],$cart[1],$cart[3],$cart[4],$cart[5]);
                    }
                    success('Đặt hàng thành công. Cảm ơn quý khách đã mua hàng.','http://localhost/hoa/index.php?act=htdh');
                    $_SESSION['cart'] = [];
                }
                include "view/giohang/thongtindh.php";
                break;
            case 'htdh':
                if(isset($_SESSION['idcart'])){
                    $ttcart = loadttdh($_SESSION['idcart']);
                    $ttsp = loadspdh($_SESSION['idcart']);
                    include "view/giohang/hoanthanhdh.php";
                    break;
                }else{
                    include "view/home.php";
                    break;
                }
            case 'dhct':
                if(isset($_SESSION['user'])){
                    $checkteldh = checkteldh($_SESSION['user']['tel']);
                    if(!empty($checkteldh)){
                        $tt = loadttdh($checkteldh[0][0]);
                    }else{
                        $tt ='';
                    }
                    include "view/giohang/xemdonhang.php";
                    break;
                }if(isset($_SESSION['tel'])){
                    $checkteldh = checkteldh($_SESSION['tel']);
                    $tt = loadttdh($checkteldh[0][0]);
                    include "view/giohang/xemdonhang.php";
                    break;
                }else{
                    if(isset($_POST['ok'])){
                        $tel = $_POST['tel'];
                        if(empty($tel)){
                            warning('Vui lòng nhập số điện thoại!','http://localhost/hoa/index.php?act=dhct');
                        }else{
                            $_SESSION['tel'] = $_POST['tel'];
                            $checkteldh = checkteldh($_SESSION['tel']);
                            if(!empty($checkteldh)){
                                $checkteldh = checkteldh($_SESSION['tel']);
                                $tt = loadttdh($checkteldh[0][0]);
                                include "view/giohang/xemdonhang.php";
                                break;
                            }else{
                                error('Số điện thoại chưa có đơn hàng.','http://localhost/hoa/index.php?act=dhct');
                            }
                        }
                        include "view/giohang/ttxdh.php";
                        break;
                    }
                    include "view/giohang/ttxdh.php";
                    break;
                }
            case 'chitietdh':
                if(isset($_POST['huydh'])){
                    if(isset($_POST['id'])&&$_POST['id']>0){
                        if(isset($_SESSION['user'])){
                            $idcart = $_POST['id'];
                            $tel ='';
                            $idtk = $_SESSION['user']['idtk'];
                            huydh($idcart,$tel,$idtk);
                        }else{
                            $idtk = '0';
                            $idcart = $_POST['id'];               
                            $tel = $_SESSION['tel'];
                            huydh($idcart,$tel,$idtk);
                        }
                        success('Hủy đơn hàng thành công.','http://localhost/hoa/index.php?act=dhct');
                    }
                }
                if(isset($_GET['iddh'])&&$_GET['iddh']>0){
                    $idcart = $_GET['iddh'];               
                    $ttdh = loadttdh($idcart);
                    $ttsp = loadspdh($idcart);
                }
                include "view/giohang/chitietdh.php";
                break;
            default:
                include "view/home.php";
                break;
        }
    }else{
        include "view/home.php";
    }
    include "view/footer.php";

?>