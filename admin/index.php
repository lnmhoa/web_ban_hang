<?php
    session_start();
    include "../model/pdo.php";
    include "../model/danhmuc.php";
    include "../model/sanpham.php";
    include "../model/taikhoan.php";
    include "../model/danhgia.php";
    include "../model/donhang.php";
    include "../model/thongke.php";
    include "../model/info.php";
    include "../model/sweetalert2.php";
    include "../view/conn.php";    
    include "header.php";
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch($act){
            case 'listdm':   
                case'adddm': 
                    if(isset($_POST['adddm'])&&($_POST['adddm'])){
                        if($_FILES["imgdm"]["name"]!=''){
                            $img_dm = $_FILES['imgdm']['name'];
                            $img_dm_type = pathinfo($img_dm, PATHINFO_EXTENSION);
                            $target_dir = "../view/upload/imgdm/";
                            $new_name_img_dm = md5(uniqid()).'.'.$img_dm_type;
                            $target_file = $target_dir . basename($new_name_img_dm);
                            $img_dm_type = strtoupper($img_dm_type);
                            if ($img_dm_type != 'JPG' && $img_dm_type != 'PNG' && $img_dm_type != 'JPEG' && $img_dm_type != 'GIF') {
                                warning('Ảnh danh mục không đúng định dạng! Vui lòng nhập lại.','http://localhost/hoa/admin/index.php?act=listdm');
                                break;       
                            }else{  
                                $namedm = $_POST['namedm'];
                                move_uploaded_file($_FILES["imgdm"]["tmp_name"], $target_file);
                                adddm($namedm,$new_name_img_dm);
                                success('Thêm danh mục thành công.','http://localhost/hoa/admin/index.php?act=listdm');  
                                break;       
                            }
                        }else{
                            $namedm = $_POST['namedm'];
                            adddm($namedm,'');
                            success('Thêm danh mục thành công.','http://localhost/hoa/admin/index.php?act=listdm');    
                            break;
                        }
                    }
                if(isset($_SESSION['searchdm'])&&$_SESSION['searchdm']!=''){
                    $page = pagesearchdm($_SESSION['searchdm']);
                }else{
                    $page = pagesearchdm('');
                } 
                include "danhmuc/listdm.php";
                break;
            case 'suadm': 
                if(isset($_GET['iddm'])&&($_GET['iddm']>0)){
                    $iddm = $_GET['iddm'];
                    $dm = loadonedm($iddm);
                    $page = pagesearchdm('');
                    include "danhmuc/updatedm.php";
                    break;
                }
            case 'updatedm':
                if(isset($_POST['capnhatdm'])&&($_POST['capnhatdm'])){
                    if($_FILES["imgdm"]["name"]!=''){
                        $img_dm = $_FILES['imgdm']['name'];
                        $img_dm_type = pathinfo($img_dm, PATHINFO_EXTENSION);
                        $target_dir = "../view/upload/imgdm/";
                        $new_name_img_dm = md5(uniqid()).'.'.$img_dm_type;
                        $target_file = $target_dir . basename($new_name_img_dm);
                        $img_dm_type = strtoupper($img_dm_type);
                        $iddm = $_POST['iddm'];
                        $namedm = $_POST['namedm'];
                        if ($img_dm_type != 'JPG' && $img_dm_type != 'PNG' && $img_dm_type != 'JPEG' && $img_dm_type != 'GIF') {
                            warning('Ảnh danh mục không đúng định dạng! Vui lòng nhập lại.','http://localhost/hoa/admin/index.php?act=suadm&iddm='.$iddm.'');
                            break;           
                        }else{
                            move_uploaded_file($_FILES["imgdm"]["tmp_name"], $target_file);
                            updatedm($namedm,$iddm,$new_name_img_dm);
                            success('Cập nhật danh mục thành công.','http://localhost/hoa/admin/index.php?act=listdm');
                            break;
                        }
                    }else{
                        $iddm = $_POST['iddm'];
                        $namedm = $_POST['namedm'];
                        $imgdm = '';
                        updatedm($namedm,$iddm,$imgdm);
                        success('Cập nhật danh mục thành công.','http://localhost/hoa/admin/index.php?act=listdm');
                    }
                    $listdm = loadalldm();
                    $page = pagesearchdm('');
                    include "danhmuc/listdm.php";
                    break;
                }
            case 'searchdm':
                if (isset($_POST['keynamedm'])&&$_POST['keynamedm']!="") {
                    $_SESSION['searchdm'] = $_POST['keynamedm'];
                    $page = pagesearchdm($_SESSION['searchdm']);
                }else{
                    unset($_SESSION['searchdm']);
                    $page = pagesearchdm('');
                } 
                include "danhmuc/listdm.php";
                break;            
            case 'listsp':
                if(isset($_POST["keyiddm"])){
                    $_SESSION["selectiddm"] = $_POST["keyiddm"];
                }
                if(isset($_SESSION['searchsp'])&&($_SESSION["searchsp"])!=''){
                    if($_SESSION["selectiddm"]!=0){
                        $page = pagesearchadmin($_SESSION['searchsp'],$_SESSION["selectiddm"]);
                    }if($_SESSION["selectiddm"]==0){
                        $page = pagesearchadmin($_SESSION['searchsp'],$_SESSION["selectiddm"]);
                    }
                }else{
                    if(isset($_POST["keyiddm"])){
                        $_SESSION["selectiddm"] = $_POST["keyiddm"];
                        $_SESSION['sortsp'] = $_POST['keyarrangesp'];
                    }if(!isset($_SESSION["selectiddm"])&&(!isset($_SESSION['sortsp']))){
                        $_SESSION["selectiddm"] = 0;
                        $_SESSION['sortsp'] = "new";
                    }    
                    $page = pagespadmin($_SESSION['selectiddm'],$_SESSION['sortsp']);
                }
                $listdm = loadalldm();
                include "sanpham/listsp.php";
                break; 
            case 'addsp':
                if (isset($_POST['addsp']) && $_POST['addsp']) {
                    if(($_FILES["imgsp"]["name"]!='')  && ($_FILES["imgsps"]["name"][0]=='')){
                        $img_sp = $_FILES['imgsp']['name'];
                        $img_sp_type = pathinfo($img_sp, PATHINFO_EXTENSION);
                        $target_dir = "../view/upload/imgsp/";
                        $new_name_img_sp = md5(uniqid()).'.'.$img_sp_type;
                        $target_file = $target_dir . basename($new_name_img_sp);
                        $img_sp_type = strtoupper($img_sp_type);
                        if ($img_sp_type != 'JPG' && $img_sp_type != 'PNG' && $img_sp_type != 'JPEG' && $img_sp_type != 'GIF') {
                            warning('Ảnh sản phẩm không đúng định dạng! Vui lòng nhập lại.','http://localhost/hoa/admin/index.php?act=addsp');
                            break;          
                        }else{ 
                            $namesp = $_POST['namesp'];
                            $pricesp = $_POST['pricesp'];
                            $pricesale = $_POST['pricesale'];
                            $slsp = $_POST['slsp'];
                            $mota = $_POST['mota'];
                            $iddm = $_POST['iddm'];  
                            move_uploaded_file($_FILES["imgsp"]["tmp_name"], $target_file);
                            addsp($namesp,$pricesp,$pricesale,$slsp,$new_name_img_sp,$mota,$iddm);
                            success('Thêm sản phẩm thành công.','http://localhost/hoa/admin/index.php?act=listsp');
                            break;
                        }
                    }if(($_FILES["imgsps"]["name"][0]!='')  && ($_FILES["imgsp"]["name"]=='')){
                        $namesp = $_POST['namesp'];
                        $pricesp = $_POST['pricesp'];
                        $pricesale = $_POST['pricesale'];
                        $slsp = $_POST['slsp'];
                        $mota = $_POST['mota'];
                        $iddm = $_POST['iddm'];
                        $imgsp = '';
                        $idsp1 = addsp($namesp, $pricesp, $pricesale, $slsp, $imgsp, $mota, $iddm);
                        foreach ($_FILES["imgsps"]["tmp_name"] as $key => $tmp_name) {
                            $img_ctsp = $_FILES["imgsps"]["name"][$key];
                            $img_ctsp_type = pathinfo($img_ctsp, PATHINFO_EXTENSION);
                            $new_name_img_ctsp = md5(uniqid()).'.'.$img_ctsp_type;
                            $target_dir = "../view/upload/imgsp/"; 
                            $target_file1 = $target_dir . basename($new_name_img_ctsp);
                            $img_ctsp_type = strtoupper($img_ctsp_type);
                            if ($img_ctsp_type != 'JPG' && $img_ctsp_type != 'PNG' && $img_ctsp_type != 'JPEG' && $img_ctsp_type != 'GIF') {
                                warning('Ảnh chi tiết sản phẩm không đúng định dạng! Vui lòng nhập lại.','http://localhost/hoa/admin/index.php?act=addsp');
                                break;
                            }else{
                                move_uploaded_file($_FILES["imgsps"]["tmp_name"][$key], $target_file1); 
                                uploadimgct($new_name_img_ctsp, $idsp1);
                                success('Thêm sản phẩm thành công.','http://localhost/hoa/admin/index.php?act=listsp');       
                            }
                        }
                        break;
                    }if(($_FILES["imgsp"]["name"]!='')  && ($_FILES["imgsps"]["name"][0]!='')){
                        $img_sp = $_FILES['imgsp']['name'];
                        $img_sp_type = pathinfo($img_sp, PATHINFO_EXTENSION);
                        $target_dir = "../view/upload/imgsp/";
                        $new_name_img_sp = md5(uniqid()).'.'.$img_sp_type;
                        $target_file = $target_dir . basename($new_name_img_sp);
                        $img_sp_type = strtoupper($img_sp_type);
                        if ($img_sp_type != 'JPG' && $img_sp_type != 'PNG' && $img_sp_type != 'JPEG' && $img_sp_type != 'GIF') {
                            warning('Ảnh sản phẩm không đúng định dạng! Vui lòng nhập lại.','http://localhost/hoa/admin/index.php?act=addsp');
                            break;
                        }else{
                            $add = true;
                            foreach ($_FILES["imgsps"]["tmp_name"] as $key => $tmp_name) {
                                $img_ctsp = $_FILES["imgsps"]["name"][$key];
                                $img_ctsp_type = pathinfo($img_ctsp, PATHINFO_EXTENSION);
                                $new_name_img_ctsp = md5(uniqid()) . '.' . $img_ctsp_type;    
                                $target_file1 = $target_dir . basename($new_name_img_ctsp);
                                $img_ctsp_type = strtoupper($img_ctsp_type);
                                if ($img_ctsp_type != 'JPG' && $img_ctsp_type != 'PNG' && $img_ctsp_type != 'JPEG' && $img_ctsp_type != 'GIF') {
                                    warning('Ảnh chi tiết sản phẩm không đúng định dạng! Vui lòng nhập lại.','http://localhost/hoa/admin/index.php?act=addsp');
                                    break;
                                }else{
                                    if($add){
                                        $namesp = $_POST['namesp'];
                                        $pricesp = $_POST['pricesp'];
                                        $pricesale = $_POST['pricesale'];
                                        $slsp = $_POST['slsp'];
                                        $mota = $_POST['mota'];
                                        $iddm = $_POST['iddm'];
                                        move_uploaded_file($_FILES["imgsp"]["tmp_name"], $target_file);
                                        $idsp1 = addsp($namesp, $pricesp, $pricesale, $slsp, $new_name_img_sp, $mota, $iddm);
                                        $add = false;
                                    }
                                    move_uploaded_file($_FILES["imgsps"]["tmp_name"][$key], $target_file1); 
                                    uploadimgct($new_name_img_ctsp, $idsp1);
                                    success('Thêm sản phẩm thành công.','http://localhost/hoa/admin/index.php?act=listsp');   
                                } 
                            }}
                            break;
                    }if(($_FILES["imgsp"]["name"]=='')  && ($_FILES["imgsps"]["name"][0]=='')){
                        $namesp = $_POST['namesp'];
                        $pricesp = $_POST['pricesp'];
                        $pricesale = $_POST['pricesale'];
                        $slsp = $_POST['slsp'];
                        $mota = $_POST['mota'];
                        $iddm = $_POST['iddm'];
                        $imgsp = '';
                        addsp($namesp, $pricesp, $pricesale, $slsp, $imgsp, $mota, $iddm);
                        success('Thêm sản phẩm thành công','http://localhost/hoa/admin/index.php?act=listsp');
                        break;
                    } 
                }
                $listdm = loadalldm();
                if(isset($_SESSION['sortsp'])){
                    $page = pagespadmin($_SESSION['selectiddm'],$_SESSION['sortsp']);
                }
                include "sanpham/addsp.php";
                break;
            case 'searchsp':
                if (isset($_POST['keynamesp'])&&$_POST['keynamesp']!="") {
                    $_SESSION['searchsp'] = $_POST['keynamesp'];
                    $page = pagesearchadmin($_SESSION['searchsp'],$_SESSION["selectiddm"]);
                    $listdm = loadalldm();
                }else{
                    unset($_SESSION['searchsp']);
                    $page = pagespadmin($_SESSION['selectiddm'],$_SESSION['sortsp']);
                    $listdm = loadalldm();
                }
                include "sanpham/listsp.php";
                break; 
            case 'suasp':
                if(isset($_GET['idsp'])&&($_GET['idsp']>0)){
                    $idsp = $_GET['idsp'];
                    $img_ctsp = loadallimgctsp($idsp);
                    $sp = loadonesp($idsp);
                    $listdm = loadalldm();
                    if(isset($_SESSION['sortsp'])){
                        $page = pagespadmin($_SESSION['selectiddm'],$_SESSION['sortsp']);
                    }
                    include "sanpham/updatesp.php";
                    break;
                }
            case 'updatesp':
                if(isset($_POST['capnhatsp'])&&($_POST['capnhatsp'])){   
                    if(($_FILES["imgsp"]["name"]!='')  && ($_FILES["imgsps"]["name"][0]=='')){
                        $img_sp = $_FILES['imgsp']['name'];
                        $img_sp_type = pathinfo($img_sp, PATHINFO_EXTENSION);
                        $target_dir = "../view/upload/imgsp/";
                        $new_name_img_sp = md5(uniqid()).'.'.$img_sp_type;
                        $target_file = $target_dir . basename($new_name_img_sp);
                        $img_sp_type = strtoupper($img_sp_type);
                        $idsp = $_POST['idsp'];   
                        if ($img_sp_type != 'JPG' && $img_sp_type != 'PNG' && $img_sp_type != 'JPEG' && $img_sp_type != 'GIF') {
                            warning('Ảnh sản phẩm không đúng định dạng! Vui lòng nhập lại.','http://localhost/hoa/admin/index.php?act=suasp&idsp='.$idsp.'');          
                            break;       
                        }else{ 
                            $idsp = $_POST['idsp'];   
                            $namesp = $_POST['namesp'];
                            $pricesp = $_POST['pricesp'];
                            $pricesale = $_POST['pricesale'];
                            $slsp = $_POST['slsp'];
                            $mota = $_POST['mota'];
                            $iddm = $_POST['iddm'];
                            move_uploaded_file($_FILES["imgsp"]["tmp_name"], $target_file);
                            updatesp($idsp, $namesp, $pricesp, $pricesale, $slsp, $new_name_img_sp, $mota, $iddm);
                            success('Chỉnh sửa sản phẩm thành công.','http://localhost/hoa/admin/index.php?act=listsp');
                            break;
                        }
                    }if(($_FILES["imgsps"]["name"][0]!='')  && ($_FILES["imgsp"]["name"]=='')){
                        $delete = true;
                        foreach ($_FILES["imgsps"]["tmp_name"] as $key => $tmp_name) {
                            $img_ctsp = $_FILES["imgsps"]["name"][$key];
                            $img_ctsp_type = pathinfo($img_ctsp, PATHINFO_EXTENSION);
                            $new_name_img_ctsp = md5(uniqid()).'.'.$img_ctsp_type;
                            $target_dir = "../view/upload/imgsp/"; 
                            $target_file1 = $target_dir . basename($new_name_img_ctsp);
                            $img_ctsp_type = strtoupper($img_ctsp_type);
                            $idsp = $_POST['idsp'];  
                            if ($img_ctsp_type != 'JPG' && $img_ctsp_type != 'PNG' && $img_ctsp_type != 'JPEG' && $img_ctsp_type != 'GIF') {
                                warning('Ảnh chi tiết sản phẩm không đúng định dạng! Vui lòng nhập lại.','http://localhost/hoa/admin/index.php?act=suasp&idsp='.$idsp.'');
                                break;
                            }else{  
                                $namesp = $_POST['namesp'];
                                $pricesp = $_POST['pricesp'];
                                $pricesale = $_POST['pricesale'];
                                $slsp = $_POST['slsp'];
                                $mota = $_POST['mota'];
                                $iddm = $_POST['iddm'];
                                $imgsp = '';
                                move_uploaded_file($_FILES["imgsps"]["tmp_name"][$key], $target_file1);
                                updatesp($idsp,$namesp, $pricesp, $pricesale, $slsp, $imgsp, $mota, $iddm);
                                if($delete){
                                    deleteimgct($idsp);
                                    $delete = false;
                                }
                                uploadimgct($new_name_img_ctsp, $idsp);
                                success('Chỉnh sửa sản phẩm thành công.','http://localhost/hoa/admin/index.php?act=listsp');        
                            }
                        }
                        break;
                    }if(($_FILES["imgsp"]["name"]!='')  && ($_FILES["imgsps"]["name"][0]!='')){
                        $img_sp = $_FILES['imgsp']['name'];
                        $img_sp_type = pathinfo($img_sp, PATHINFO_EXTENSION);
                        $target_dir = "../view/upload/imgsp/";
                        $new_name_img_sp = md5(uniqid()).'.'.$img_sp_type;
                        $target_file = $target_dir . basename($new_name_img_sp);
                        $img_sp_type = strtoupper($img_sp_type);
                        $idsp = $_POST['idsp'];
                        if ($img_sp_type != 'JPG' && $img_sp_type != 'PNG' && $img_sp_type != 'JPEG' && $img_sp_type != 'GIF') {
                            warning('Ảnh sản phẩm không đúng định dạng! Vui lòng nhập lại.','http://localhost/hoa/admin/index.php?act=suasp&idsp='.$idsp.'');
                            break;
                        }else{
                            $delete = true;
                            foreach ($_FILES["imgsps"]["tmp_name"] as $key => $tmp_name) {
                                $img_ctsp = $_FILES["imgsps"]["name"][$key];
                                $img_ctsp_type = pathinfo($img_ctsp, PATHINFO_EXTENSION);
                                $new_name_img_ctsp = md5(uniqid()) . '.' . $img_ctsp_type;    
                                $target_file1 = $target_dir . basename($new_name_img_ctsp);
                                $img_ctsp_type = strtoupper($img_ctsp_type);
                                if ($img_ctsp_type != 'JPG' && $img_ctsp_type != 'PNG' && $img_ctsp_type != 'JPEG' && $img_ctsp_type != 'GIF') {
                                    warning('Ảnh chi tiết sản phẩm không đúng định dạng! Vui lòng nhập lại.','http://localhost/hoa/admin/index.php?act=suasp&idsp='.$idsp.'');
                                    break;
                                }else{  
                                    $namesp = $_POST['namesp'];
                                    $pricesp = $_POST['pricesp'];
                                    $pricesale = $_POST['pricesale'];
                                    $slsp = $_POST['slsp'];
                                    $mota = $_POST['mota'];
                                    $iddm = $_POST['iddm'];
                                    move_uploaded_file($_FILES["imgsp"]["tmp_name"], $target_file);
                                    move_uploaded_file($_FILES["imgsps"]["tmp_name"][$key], $target_file1);
                                    updatesp($idsp,$namesp, $pricesp, $pricesale, $slsp, $new_name_img_sp, $mota, $iddm); 
                                    uploadimgct($new_name_img_ctsp, $idsp);
                                    if($delete){
                                        deleteimgct($idsp);
                                        $delete = false;
                                    }
                                    success('Cập nhật sản phẩm thành công.','http://localhost/hoa/admin/index.php?act=listsp');    
                                } 
                            }
                        }
                        break;
                    }if(($_FILES["imgsp"]["name"]=='')  && ($_FILES["imgsps"]["name"][0]=='')){
                        $idsp = $_POST['idsp'];
                        $namesp = $_POST['namesp'];
                        $pricesp = $_POST['pricesp'];
                        $pricesale = $_POST['pricesale'];
                        $slsp = $_POST['slsp'];
                        $mota = $_POST['mota'];
                        $iddm = $_POST['iddm'];
                        $imgsp = '';
                        updatesp($idsp,$namesp, $pricesp, $pricesale, $slsp, $imgsp, $mota, $iddm); 
                        success('Cập nhật sản phẩm thành công.','http://localhost/hoa/admin/index.php?act=listsp');
                        break;
                    }                                          
                    $listdm = loadalldm();    
                    $listsp = loadallsp();
                    $page = pagesearchdm('');
                    include "sanpham/listsp.php";                      
                    break;                                                                                                                                                                
                }
            case 'listtk':
                case'addtk': 
                    if(isset($_POST['addtk'])&&($_POST['addtk'])){
                        $phone = $_POST['phone'];
                        $password = $_POST['password'];
                        $time = date('Y/m/d');
                        if(is_array(checktkdk($phone))){
                            warning('Số điện thoại đã dược đăng ký. Vui lòng kiểm tra lại.','http://localhost/hoa/admin/index.php?act=listtk');
                        }else{
                            addtk($phone,$password,$time);
                            success('Thêm tài khoản thành công.','http://localhost/hoa/admin/index.php?act=listtk');
                        }                                
                    }
                    if($_SERVER['REQUEST_METHOD'] === 'POST'){
                        if(isset($_POST['keyarrangetk'])){
                            $_SESSION['sorttk'] = $_POST['keyarrangetk'];
                        }
                    }
                    if(isset($_SESSION['searchtk'])&&!empty($_SESSION['searchtk'])){
                        $page = pagesearchtk($_SESSION['searchtk']);
                    }else{
                        if(!isset($_SESSION['sorttk'])){
                            $_SESSION['sorttk'] = 'new';
                        }
                        $page = pagetksort($_SESSION['sorttk']);
                    }
                    include "taikhoan/listtk.php";
                    break;  
            case 'suatk':
                $page = pagesearchtk('');
                if(isset($_GET['idtk'])&&($_GET['idtk']>0)){
                    $idtk = $_GET['idtk'];
                    $tttk = loadonetk($idtk);
                    include "taikhoan/updatetk.php";
                    break; 
                }
            case 'updatetk':
                if(isset($_POST['updatetk'])&&($_POST['updatetk'])){  
                    $password = $_POST['password'];
                    $role = $_POST['role'];
                    $idtk = $_POST['id'];   
                    updatetkadmin($password,$role,$idtk);
                    success('Cập nhật tài khoản thành công.','http://localhost/hoa/admin/index.php?act=listtk');                                                                                                                                                             
                }
                $dstk = loadalltkadmin(); 
                $page = pagesearchtk('');
                include "taikhoan/listtk.php";
                break; 
            case 'searchtk':
                if (isset($_POST['keynametk'])&&$_POST['keynametk']!="") {
                    $_SESSION['searchtk'] = $_POST['keynametk'];
                    $page = pagesearchtk($_SESSION['searchtk']);                  
                }else{
                    unset($_SESSION['searchtk']);
                    $page = pagesearchtk('');
                } 
                include "taikhoan/listtk.php";
                break;
            case 'listdg':
                $_SESSION['sortdg'] = isset($_SESSION['sortdg']) ? $_SESSION['sortdg'] : 'new';
                if($_SERVER['REQUEST_METHOD'] === 'POST'){
                    if(isset($_POST['keyarrangedg'])){
                        $_SESSION['sortdg'] = $_POST['keyarrangedg'];
                    } 
                }
                if((isset($_SESSION['searchdg1'])&&(!empty($_SESSION['searchdg1'])))&&(!isset($_SESSION['searchdg2'])||($_SESSION['searchdg2']==''))){
                    $page = pagesearchdg($_SESSION['searchdg1'],'',$_SESSION['sortdg']);         
                }else if((isset($_SESSION['searchdg2'])&&($_SESSION['searchdg2']!=''))&&(!isset($_SESSION['searchdg1'])||($_SESSION['searchdg1']==''))){
                    $page = pagesearchdg('',$_SESSION['searchdg2'],$_SESSION['sortdg']); 
                }else if((isset($_SESSION['searchdg2'])&&($_SESSION['searchdg2']!=''))&&(isset($_SESSION['searchdg1'])&&($_SESSION['searchdg1']!=''))){
                    $page = pagesearchdg($_SESSION['searchdg1'],$_SESSION['searchdg2'],$_SESSION['sortdg']); 
                }else{
                    $page = pagesearchdg('','',$_SESSION['sortdg']); 
                }
                include "danhgia/listdg.php";
                break;  
            case 'searchdg':
                if(((isset($_POST['searchdg1'])&&$_POST['searchdg1']!=''))&&(!isset($_POST['searchdg2'])||($_POST['searchdg2']==''))){
                    $_SESSION['searchdg1'] = $_POST['searchdg1'];
                    $_SESSION['searchdg2'] = $_POST['searchdg2']; 
                    $page = pagesearchdg($_SESSION['searchdg1'],'',$_SESSION['sortdg']);           
                }if(((isset($_POST['searchdg2'])&&$_POST['searchdg2']!=''))&&(!isset($_POST['searchdg1'])||($_POST['searchdg1']==''))){
                    $_SESSION['searchdg1'] = $_POST['searchdg1'];
                    $_SESSION['searchdg2'] = $_POST['searchdg2'];            
                    $page = pagesearchdg('',$_SESSION['searchdg2'],$_SESSION['sortdg']);                 
                }if(((isset($_POST['searchdg2'])&&$_POST['searchdg2']!=''))&&(isset($_POST['searchdg1'])||($_POST['searchdg1']!=''))){
                    $_SESSION['searchdg1'] = $_POST['searchdg1'];            
                    $_SESSION['searchdg2'] = $_POST['searchdg2'];             
                    $page = pagesearchdg($_SESSION['searchdg1'],$_SESSION['searchdg2'],$_SESSION['sortdg']);                    
                }if(!isset($_POST['searchdg1'])||($_POST['searchdg1']=='')&&(!isset($_POST['searchdg2'])||($_POST['searchdg2']==''))){ 
                    unset($_SESSION['searchdg1']);                 
                    unset($_SESSION['searchdg2']);                              
                    $page = pagesearchdg('','',$_SESSION['sortdg']);  
                }
                include "danhgia/listdg.php";
                break;  
            case 'listdh':
                $_SESSION['sortdh'] = isset($_SESSION['sortdh']) ? $_SESSION['sortdh'] : 'new';
                if($_SERVER['REQUEST_METHOD'] === 'POST'){
                    if(isset($_POST['keyarrangedh'])){
                        $_SESSION['sortdh'] = $_POST['keyarrangedh'];
                    }
                }
                if(isset($_SESSION['searchteldh'])&&!isset($_SESSION['searchdh'])){
                    $page = pagesearchdh($_SESSION['searchteldh'],'',$_SESSION['sortdh']);
                }if(!isset($_SESSION['searchteldh'])&&isset($_SESSION['searchdh'])){
                    $page = pagesearchdh('',$_SESSION['searchdh'],$_SESSION['sortdh']);
                }else{
                    $page = pagesearchdh('','',$_SESSION['sortdh']);
                }
                include "donhang/listdh.php";
                break; 
            case 'searchdh':
                $_SESSION['sortdh'] = isset($_SESSION['sortdh']) ? $_SESSION['sortdh'] : 'new';
                if (isset($_POST['keynameteldh'])&&$_POST['keynameteldh']!="") {
                    unset($_SESSION['searchdh']);
                    $_SESSION['searchteldh'] = $_POST['keynameteldh'];
                    $page = pagesearchdh($_SESSION['searchteldh'],'',$_SESSION['sortdh']);
                }else if(isset($_POST['keynamedh'])&&$_POST['keynamedh']!="") {
                    unset($_SESSION['searchteldh']);
                    $_SESSION['searchdh'] = $_POST['keynamedh'];
                    $page = pagesearchdh('',$_SESSION['searchdh'],$_SESSION['sortdh']);
                }else if(isset($_POST['keynameteldh'])&&$_POST['keynameteldh']==""){
                    unset($_SESSION['searchdh']);
                    unset($_SESSION['searchteldh']);
                    $page = pagesearchdh('','',$_SESSION['sortdh']);
                }else if(isset($_POST['keynamedh'])&&$_POST['keynamedh']==""){
                    unset($_SESSION['searchdh']);
                    unset($_SESSION['searchteldh']);
                    $page = pagesearchdh('','',$_SESSION['sortdh']);
                } 
                include "donhang/listdh.php";
                break; 
            case 'printdh':
                if(isset($_GET['iddh'])&($_GET['iddh'])>0){
                    $iddh = $_GET['iddh'];
                    $ttdh = loadttdh($iddh);
                    $spdh = loadspdh($iddh);
                }
                include "donhang/printdh.php";
                break; 
            case 'chitietdh':
                if(isset($_GET['iddh'])&($_GET['iddh'])>0){
                    $iddh = $_GET['iddh'];
                    $ttdh = loadttdh($iddh);
                    $spdh = loadspdh($iddh);
                }
                include "donhang/chitietdh.php";
                break;
            case 'thongke':
                if($_SERVER['REQUEST_METHOD'] === 'POST'){
                    if(isset($_POST['month'])){
                        $_SESSION['month'] = $_POST['month'];
                    }if(isset($_POST['month1'])){
                        $_SESSION['month1'] = $_POST['month1'];
                    }if(isset($_POST['month2'])){
                        $_SESSION['month2'] = $_POST['month2'];
                    }if(isset($_POST['month3'])){
                        $_SESSION['month3'] = $_POST['month3'];
                    }if(isset($_POST['year'])){
                        $_SESSION['year'] = $_POST['year'];
                    }if(isset($_POST['year1'])){
                        $_SESSION['year1'] = $_POST['year1'];
                    }if(isset($_POST['year2'])){
                        $_SESSION['year2'] = $_POST['year2'];
                    }if(isset($_POST['year3'])){
                        $_SESSION['year3'] = $_POST['year3'];
                    }if(isset($_POST['year4'])){
                        $_SESSION['year4'] = $_POST['year4'];
                    }if(isset($_POST['year5'])){
                    $_SESSION['year5'] = $_POST['year5'];
                    }if(isset($_POST['year6'])){
                        $_SESSION['year6'] = $_POST['year6'];
                      }if(isset($_POST['year7'])){
                        $_SESSION['year7'] = $_POST['year7'];
                      }
                }  
                $check = checkcart(); 
                if(!empty($check)){
                    $year = lastyear();
                    $month = lastmonth();   
                    $_SESSION['month'] = (isset($_SESSION['month'])) ? $_SESSION['month'] : $month[0][0];
                    $_SESSION['month2'] = (isset($_SESSION['month2'])) ? $_SESSION['month2'] : $month[0][0];
                    $_SESSION['month3'] = (isset($_SESSION['month3'])) ? $_SESSION['month3'] : $month[0][0];
                    $_SESSION['year'] = (isset($_SESSION['year'])) ? $_SESSION['year'] : $year[0][0];
                    $_SESSION['year4'] = (isset($_SESSION['year4'])) ? $_SESSION['year4'] : $year[0][0];
                    $_SESSION['year5'] = (isset($_SESSION['year5'])) ? $_SESSION['year5'] : $year[0][0];
                    $_SESSION['year6'] = (isset($_SESSION['year6'])) ? $_SESSION['year6'] : $year[0][0];
                    $_SESSION['year7'] = (isset($_SESSION['year7'])) ? $_SESSION['year7'] : $year[0][0];
                }else{
                    $_SESSION['month'] = (isset($_SESSION['month'])) ? $_SESSION['month'] : '9';
                    $_SESSION['month2'] = (isset($_SESSION['month2'])) ? $_SESSION['month2'] : '9';
                    $_SESSION['month3'] = (isset($_SESSION['month3'])) ? $_SESSION['month3'] : '9';
                    $_SESSION['year'] = (isset($_SESSION['year'])) ? $_SESSION['year'] : '2023';
                    $_SESSION['year4'] = (isset($_SESSION['year4'])) ? $_SESSION['year4'] : '2023';
                    $_SESSION['year5'] = (isset($_SESSION['year5'])) ? $_SESSION['year5'] : '2023';
                    $_SESSION['year6'] = (isset($_SESSION['year6'])) ? $_SESSION['year6'] : '2023';
                    $_SESSION['year7'] = (isset($_SESSION['year7'])) ? $_SESSION['year7'] : '2023';
                }
                $year1 = lastyeartk();
                $month1 = lastmonthtk();      
                $_SESSION['month1'] = (isset($_SESSION['month1'])) ? $_SESSION['month1'] : $month1[0][0];
                $_SESSION['year1'] = (isset($_SESSION['year1'])) ? $_SESSION['year1'] : $year1[0][0];
                $_SESSION['year2'] = (isset($_SESSION['year2'])) ? $_SESSION['year2'] : $year1[0][0];
                $_SESSION['year3'] = (isset($_SESSION['year3'])) ? $_SESSION['year3'] : $year1[0][0];
                $allmonth = allmonth();
                $allyear = allyear();
                $allmonth1 = allmonthtk();
                $allyear1 = allyeartk();
                $sodm = sodm();
                $view = soview();
                $danhgia = sodg();
                $sosp = sosp();
                $iddm = iddm();
                $iddm1 = iddm();
                $list = dttheongaythang($_SESSION['month'],$_SESSION['year']);
                $list1 = dttheothangnam($_SESSION['year1']);
                $list2 = tktheongaythang($_SESSION['month1'],$_SESSION['year2']);
                $list3 = tktheothangnam($_SESSION['year3']);
                $list4 = dhtctheongay($_SESSION['month2'],$_SESSION['year4']);
                $list5 = dhtctheonam($_SESSION['year5']);
                $list6 = dhktctheongay($_SESSION['month3'],$_SESSION['year6']);
                $list7 = dhktctheonam($_SESSION['year7']);
                $tkkhoa = tkkhoa();
                $tkhd = tkhd();
                include "thongke/thongke.php";
                break; 
            case 'infoweb':
                if(isset($_POST['youtube'])){
                    if(isset($_POST['url-youtube'])&&($_POST['url-youtube']!='')){
                        updateyoutube($_POST['url-youtube']);
                    }
                }if(isset($_POST['facebook'])){
                    if(isset($_POST['url-facebook'])&&($_POST['url-facebook']!='')){
                        updatefacebook($_POST['url-facebook']);
                    }
                }if(isset($_POST['twitter'])){
                    if(isset($_POST['url-twitter'])&&($_POST['url-twitter']!='')){
                        updatetwitter($_POST['url-twitter']);
                    }
                }if(isset($_POST['phone'])){
                    if(isset($_POST['web-phone'])&&($_POST['web-phone']!='')){
                        updatephone($_POST['web-phone']);
                    }
                }if(isset($_POST['email'])){
                    if(isset($_POST['web-email'])&&($_POST['web-email']!='')){
                        updateemail($_POST['web-email']);
                    }
                }
                if(isset($_POST['add-banner'])){
                    if(($_FILES["imgsps"]["name"][0]!='')  && ($_FILES["imgsp"]["name"]=='')){
                        $namesp = $_POST['namesp'];
                        $pricesp = $_POST['pricesp'];
                        $pricesale = $_POST['pricesale'];
                        $slsp = $_POST['slsp'];
                        $mota = $_POST['mota'];
                        $iddm = $_POST['iddm'];
                        $imgsp = '';
                        $idsp1 = addsp($namesp, $pricesp, $pricesale, $slsp, $imgsp, $mota, $iddm);
                        $delete = true;
                        foreach ($_FILES["imgsps"]["tmp_name"] as $key => $tmp_name) {
                            $img_ctsp = $_FILES["imgsps"]["name"][$key];
                            $img_ctsp_type = pathinfo($img_ctsp, PATHINFO_EXTENSION);
                            $new_name_img_ctsp = md5(uniqid()) . '.' . $img_ctsp_type;    
                            $target_file1 = $target_dir . basename($new_name_img_ctsp);
                            $img_ctsp_type = strtoupper($img_ctsp_type);
                            if ($img_ctsp_type != 'JPG' && $img_ctsp_type != 'PNG' && $img_ctsp_type != 'JPEG' && $img_ctsp_type != 'GIF') {
                                warning('Ảnh chi tiết sản phẩm không đúng định dạng! Vui lòng nhập lại.','http://localhost/hoa/admin/index.php?act=suasp&idsp='.$idsp.'');
                                break;
                            }else{  
                                $namesp = $_POST['namesp'];
                                $pricesp = $_POST['pricesp'];
                                $pricesale = $_POST['pricesale'];
                                $slsp = $_POST['slsp'];
                                $mota = $_POST['mota'];
                                $iddm = $_POST['iddm'];
                                move_uploaded_file($_FILES["imgsp"]["tmp_name"], $target_file);
                                move_uploaded_file($_FILES["imgsps"]["tmp_name"][$key], $target_file1);
                                updatesp($idsp,$namesp, $pricesp, $pricesale, $slsp, $new_name_img_sp, $mota, $iddm); 
                                uploadimgct($new_name_img_ctsp, $idsp);
                                if($delete){
                                    deleteimgct($idsp);
                                    $delete = false;
                                }
                                success('Cập nhật sản phẩm thành công.','http://localhost/hoa/admin/index.php?act=listsp');    
                            } 
                        }
                    }
                }
                $info = infoweb();
                include "khac/infoweb.php";
                break;                                       
            default:
                include "home.php";
                break;
        }
    }else{
        include "home.php";
    }
    include "footer.php";
?>