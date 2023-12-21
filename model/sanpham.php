<?php 
function loadallsp(){
    $sql="select * from sanpham order by idsp desc";
    $listsp = pdo_query($sql);
    return $listsp;
}

function loadallimgctsp($idsp){
    $sql="select * from imgctsp where idsp=".$idsp;
    $listsp = pdo_query($sql);
    return $listsp;
}

function loadsptheodm($iddm){
    $sql="select * from sanpham where iddm = '".$iddm."' order by namesp desc";
    $listsp = pdo_query($sql);
    return $listsp;
}

function loadspsearch($keyname){
    $sql="select * from sanpham where namesp like '%".$keyname."%' order by namesp desc";
    $listsp = pdo_query($sql);
    return $listsp;
}


function loadallsphome(){
    $sql="select * from sanpham order by idsp desc limit 0,18";
    $listsp = pdo_query($sql);
    return $listsp;
}

function loadtcsp(){
    $sql="select * from sanpham order by namesp asc";
    $listsp = pdo_query($sql);
    return $listsp;
}

function loadspview(){
    $sql="select * from sanpham order by view desc limit 0,15";
    $listsp = pdo_query($sql);
    return $listsp;
}

function loadonesp($idsp){
    $sql = "select * from sanpham where idsp=".$idsp;
    $sp = pdo_query_one($sql) ;
    return $sp;
}

function loadspcl($idsp,$iddm){
    $sql = "select * from sanpham where iddm=".$iddm." AND idsp <> ".$idsp;
    $sp = pdo_query($sql) ;
    return $sp;
}

function addsp($namesp, $price, $pricesale, $slsp, $imgsp, $motasp, $iddm) {
    $sql = "insert into sanpham(namesp, price, pricesale, quantity, imgsp, motasp, iddm) values ('$namesp', '$price', '$pricesale', '$slsp', '$imgsp', '$motasp', '$iddm')";
    return pdo_execute_lastInsertId($sql);
}
function updatesp($idsp,$namesp,$price,$pricesale,$slsp,$imgsp,$motasp,$iddm){
    if($imgsp!=""){
        $sql="update sanpham set namesp ='".$namesp."', price ='".$price."', pricesale ='".$pricesale."', quantity ='".$slsp."', imgsp ='".$imgsp."', motasp='".$motasp."' where idsp=".$idsp;
    }else{
        $sql="update sanpham set namesp ='".$namesp."', price ='".$price."', pricesale ='".$pricesale."', quantity ='".$slsp."', motasp='".$motasp."' where idsp=".$idsp;
    }
    pdo_execute($sql);
}


function pagespcl($idsp,$iddm){
    $sql = "select count(idsp) as total from sanpham where iddm=".$iddm." AND idsp <> ".$idsp;
    $sp = pdo_query($sql) ;
    return $sp;
}

function pagesearch($keyname){
    if($keyname!=''){
        $sql="select count(idsp) as total from sanpham where namesp like '%".$keyname."%'";
    }else{
        $sql ="select count(idsp) as total from sanpham";
    }
    $listsp = pdo_query($sql);
    return $listsp;
}

function pagespdm($iddm){
    $sql="select count(idsp) as total from sanpham where iddm=".$iddm;
    $listsp = pdo_query($sql);
    return $listsp;
}

function view($idsp){
    $sql ="update sanpham set view = view+1 where idsp =".$idsp;
    pdo_execute($sql);
}
function avgratesp($idsp){
    $sql = "select round(avg(starrate),1) as avgrate from danhgia where idsp=".$idsp;
    $avgratesp = pdo_query($sql);
    return $avgratesp;
}

function pagesearchadmin($keyname,$iddm){
    if($iddm!=0){
        $sql="select count(idsp) as total from sanpham where namesp like '%".$keyname."%' and iddm =".$iddm;
    }else{
        $sql="select count(idsp) as total from sanpham where namesp like '%".$keyname."%'";
    }
    $listsp = pdo_query($sql);
    return $listsp;
}

function pagespadmin($iddm,$sale){
    if($iddm!=0&&$sale!="sale"){
        $sql ="select count(idsp) as total from sanpham where iddm =".$iddm;
    }else if($iddm!=0&&$sale=="sale"){
        $sql ="select count(idsp) as total from sanpham where iddm ='".$iddm."' and pricesale <> 0";
    }else if($iddm==0&&$sale=="sale"){
        $sql ="select count(idsp) as total from sanpham where pricesale <> 0";
    }else if($iddm==0&&$sale!="sale"){
        $sql ="select count(idsp) as total from sanpham";
    }
    $listsp = pdo_query($sql);
    return $listsp;
}

function uploadimgct($nameimg,$idsp){
    $sql = "insert into imgctsp(nameimg, idsp) values ('".$nameimg."', '".$idsp."')";
    pdo_execute($sql);
}

function deleteimgct($idsp){
    $sql = "delete from imgctsp where idsp =".$idsp;
    pdo_execute($sql);
}
function updateslsp($quantity,$idsp){
    $sql = "update sanpham set quantity = quantity - '".$quantity."' where idsp =".$idsp;
    pdo_execute($sql);
}

function updateslsp2($quantity,$idsp){
    $sql = "update sanpham set quantity = quantity + '".$quantity."' where idsp =".$idsp;
    pdo_execute($sql);
}

function checkslsp($idsp){
    $sql="select quantity from sanpham where idsp=".$idsp;
    $slsp = pdo_query($sql);
    return $slsp;
}

function listsp($iddm,$namesp,$sort,$start){
    if($iddm==0){
        if($sort == 'new'){
            $sql = "select * from sanpham where namesp like '%".$namesp."%' order by idsp desc limit ".$start.", 10";
        }else if($sort == 'old'){
            $sql = "select * from sanpham where namesp like '%".$namesp."%' order by idsp asc limit ".$start.", 10";
        }else if($sort == 'az'){
            $sql = "select * from sanpham where namesp like '%".$namesp."%' order by namesp asc limit ".$start.", 10";
        }else if($sort == 'za'){
            $sql = "select * from sanpham where namesp like '%".$namesp."%' order by namesp desc limit ".$start.", 10";
        }else if($sort == 'sale'){
            $sql = "select * from sanpham where namesp like '%".$namesp."%' and pricesale <> 0 order by namesp desc limit ".$start.", 10";
        }
    }else{
        if($sort == 'new'){
            $sql = "select * from sanpham where namesp like '%".$namesp."%' and iddm = '".$iddm."' order by idsp desc limit ".$start.", 10";
        }else if($sort == 'old'){
            $sql = "select * from sanpham where namesp like '%".$namesp."%' and iddm = '".$iddm."' order by idsp asc limit ".$start.", 10";
        }else if($sort == 'az'){
            $sql = "select * from sanpham where namesp like '%".$namesp."%' and iddm = '".$iddm."' order by namesp asc limit ".$start.", 10";
        }else if($sort == 'za'){
            $sql = "select * from sanpham where namesp like '%".$namesp."%' and iddm = '".$iddm."' order by namesp desc limit ".$start.", 10";
        }else if($sort == 'sale'){
            $sql = "select * from sanpham where namesp like '%".$namesp."%' and iddm = '".$iddm."' and pricesale <> 0 order by namesp desc limit ".$start.", 10";
        }
    }
    $listsp = pdo_query($sql);
    return $listsp;
}

function listspcl($sort,$iddm,$idsp,$start){
    if($sort=='new'){
        $sql = "select * from sanpham where iddm = '".$iddm."' and idsp <> '".$idsp."' order by idsp desc limit ".$start.", 12 ";
    }else if($sort=='old'){
        $sql = "select * from sanpham where iddm = '".$iddm."' and idsp <> '".$idsp."' order by idsp asc limit ".$start.", 12 ";
    }else if($sort=='desc'){
        $sql = "select * from sanpham where iddm = '".$iddm."' and idsp <> '".$idsp."' order by price desc limit ".$start.", 12 ";
    }
    else if($sort=='asc'){
        $sql = "select * from sanpham where iddm = '".$iddm."' and idsp <> '".$idsp."' order by price asc limit ".$start.", 12 ";
    }
    $listsp = pdo_query($sql);
    return $listsp;
}

function listsphome($sort,$start){
    if($sort=='new'){
        $sql = "select * from sanpham order by idsp desc limit ".$start.", 18 ";
    }else if($sort=='old'){
        $sql = "select * from sanpham order by idsp asc limit ".$start.", 18 ";
    }else if($sort=='desc'){
        $sql = "select * from sanpham order by price desc limit ".$start.", 18 ";
    }else if($sort=='asc'){
        $sql = "select * from sanpham order by price asc limit ".$start.", 18 ";
    }
    $listsp = pdo_query($sql);
    return $listsp;
}

function listspdm($sort,$iddm,$start){
    if($sort=='new'){
        $sql = "select * from sanpham where iddm = '".$iddm."' order by idsp desc limit ".$start.", 18 ";
    }else if($sort=='old'){
        $sql = "select * from sanpham where iddm = '".$iddm."' order by idsp asc limit ".$start.", 18 ";
    }else if($sort=='desc'){
        $sql = "select * from sanpham where iddm = '".$iddm."' order by price desc limit ".$start.", 18 ";
    }
    else if($sort=='asc'){
        $sql = "select * from sanpham where iddm = '".$iddm."' order by price asc limit ".$start.", 18 ";
    }
    $listsp = pdo_query($sql);
    return $listsp;
}

function listspsearch($namesp,$sort,$start){
    if($sort=='new'){
        $sql = "select * from sanpham where namesp like '%".$namesp."%' order by idsp desc limit ".$start.", 18 ";
    }else if($sort=='old'){
        $sql = "select * from sanpham where namesp like '%".$namesp."%' order by idsp asc limit ".$start.", 18 ";
    }else if($sort=='desc'){
        $sql = "select * from sanpham where namesp like '%".$namesp."%' order by price desc limit ".$start.", 18 ";
    }else if($sort=='asc'){
        $sql = "select * from sanpham where namesp like '%".$namesp."%' order by price asc limit ".$start.", 18 ";
    }
    $listsp = pdo_query($sql);
    return $listsp;
}


?>
