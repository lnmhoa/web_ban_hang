<?php

function addcart($idtk,$madh,$name,$address,$tel,$ghichu,$totalprice,$time){
    $sql="insert into cart(idtk,madh,namedh,addressdh,teldh,ghichu,totalprice,timedh) values ('$idtk','$madh','$name','$address','$tel','$ghichu','$totalprice','$time')";
    return pdo_execute_lastInsertId($sql);
}

function adddh($idtk,$tel,$idcart,$idsp,$namesp,$price,$quantity,$totalprice){
    $sql="insert into donhang(idtk,tel,idcart,idsp,namesp,price,quantity,totalprice) values ('$idtk','$tel','$idcart','$idsp','$namesp','$price','$quantity','$totalprice')";
    pdo_execute($sql);
}

function loadttdh($idcart){
    $sql = "select madh,namedh,addressdh,teldh,ghichu,totalprice,timedh,trangthai from cart where idcart =".$idcart;
    $ttdh = pdo_query($sql);
    return $ttdh;
}

function loadspdh($idcart){
    $sql = "select namesp,price,quantity,totalprice from donhang where idcart =".$idcart;
    $ttdh = pdo_query($sql);
    return $ttdh;
}

function checkteldh($tel){
    $sql = "select * from cart where teldh =".$tel;
    $tel = pdo_query($sql);
    return $tel;
}

function huydh($idcart,$tel,$idtk){
    if($idtk!='0'){
        $sql = "update cart set trangthai = '-1' where idcart = ".$idcart." and idtk=".$idtk;
    }else{
        $sql = "update cart set trangthai = '-1' where idcart = ".$idcart." and teldh=".$tel;
    }
    pdo_execute($sql);
}


function pagesearchdh($keynametel,$keyname,$sort){
    if($sort=='bihuy'){
        if($keynametel!=''){
            $sql="select count(idcart) as total from cart where trangthai = '-1' and teldh ='".$keynametel."'";
        }else if($keyname!=''){
            $sql="select count(idcart) as total from cart where trangthai = '-1' and madh ='".$keyname."'";
        }else if($keynametel=='' && $keyname==''){
            $sql ="select count(idcart) as total from cart where trangthai = '-1'";
        }
    }else if($sort=='cxn'){
        if($keynametel!=''){
            $sql="select count(idcart) as total from cart where trangthai = '0' and teldh ='".$keynametel."'";
        }else if($keyname!=''){
            $sql="select count(idcart) as total from cart where trangthai = '0' and madh ='".$keyname."'";
        }else if($keynametel=='' && $keyname==''){
            $sql ="select count(idcart) as total from cart where trangthai = '0'";
        }
    }else if($sort=='dxn'){
        if($keynametel!=''){
            $sql="select count(idcart) as total from cart where trangthai = '1' and teldh ='".$keynametel."'";
        }else if($keyname!=''){
            $sql="select count(idcart) as total from cart where trangthai = '1' and madh ='".$keyname."'";
        }else if($keynametel=='' && $keyname==''){
            $sql ="select count(idcart) as total from cart where trangthai = '1'";
        }
    }else if($sort=='dg'){
        if($keynametel!=''){
            $sql="select count(idcart) as total from cart where trangthai = '2' and teldh ='".$keynametel."'";
        }else if($keyname!=''){
            $sql="select count(idcart) as total from cart where trangthai = '2' and madh ='".$keyname."'";
        }else if($keynametel=='' && $keyname==''){
            $sql ="select count(idcart) as total from cart where trangthai = '2'";
        }
    }else if($sort=='dagiao'){
        if($keynametel!=''){
            $sql="select count(idcart) as total from cart where trangthai = '3' and teldh ='".$keynametel."'";
        }else if($keyname!=''){
            $sql="select count(idcart) as total from cart where trangthai = '3' and madh ='".$keyname."'";
        }else if($keynametel=='' && $keyname==''){
            $sql ="select count(idcart) as total from cart where trangthai = '3'";
        }
    }else{
        if($keynametel!=''){
            $sql="select count(idcart) as total from cart where teldh ='".$keynametel."'";
        }else if($keyname!=''){
            $sql="select count(idcart) as total from cart where madh ='".$keyname."'";
        }else if($keynametel=='' && $keyname==''){
            $sql ="select count(idcart) as total from cart";
        }
    }
    $listdh = pdo_query($sql);
    return $listdh;
}


function trangthaidh($nb){
    switch ($nb) {
        case '-1':
            $tb = 'Đã hủy';
            break;
        case '0':
            $tb = 'Đang chờ xác nhận';
            break;
        case '1':
            $tb = 'Đã xác nhận';
            break;
        case '2':
            $tb = 'Đang giao hàng';
            break;
        case '3':
            $tb = 'Đã giao hàng';
            break;
        default:
            $tb = 'Đang chờ xử lý';
            break;    
    }
    return $tb;
}

function listdh($madh,$sort,$tel,$start){
    if($tel!=''){
        if($sort == 'new'){
            $sql = "select idcart,totalprice,timedh,trangthai,madh,teldh from cart where teldh = ".$tel." order by idcart desc limit ".$start.", 10";
        }else if($sort == 'old'){
            $sql = "select idcart,totalprice,timedh,trangthai,madh,teldh from cart where teldh = ".$tel." order by idcart asc limit ".$start.", 10";
        }else if($sort == 'bihuy'){
            $sql = "select idcart,totalprice,timedh,trangthai,madh,teldh from cart where teldh = ".$tel." and trangthai = '-1' order by idcart desc limit ".$start.", 10";
        }else if($sort == 'cxn'){
            $sql = "select idcart,totalprice,timedh,trangthai,madh,teldh from cart where teldh = ".$tel." and trangthai = '0' order by idcart desc limit ".$start.", 10";
        }else if($sort == 'dxn'){
            $sql = "select idcart,totalprice,timedh,trangthai,madh,teldh from cart where teldh = ".$tel." and trangthai = '1' order by idcart desc limit ".$start.", 10";
        }else if($sort == 'dg'){
            $sql = "select idcart,totalprice,timedh,trangthai,madh,teldh from cart where teldh = ".$tel." and trangthai = '2' order by idcart desc limit ".$start.", 10";
        }else if($sort == 'dagiao'){
            $sql = "select idcart,totalprice,timedh,trangthai,madh,teldh from cart where teldh = ".$tel." and trangthai = '3' order by idcart desc limit ".$start.", 10";
        }
    }else if($madh!=''){
        $sql = "select idcart,totalprice,timedh,trangthai,madh,teldh from cart where madh = '".$madh."' order by idcart desc limit ".$start.", 10";
    }else if($tel=='' && $madh==''){
        if($sort == 'new'){
            $sql = "select idcart,totalprice,timedh,trangthai,madh,teldh from cart order by idcart desc limit ".$start.", 10";
        }else if($sort == 'old'){
            $sql = "select idcart,totalprice,timedh,trangthai,madh,teldh from cart order by idcart asc limit ".$start.", 10";
        }else if($sort == 'bihuy'){
            $sql = "select idcart,totalprice,timedh,trangthai,madh,teldh from cart where trangthai = '-1' order by idcart desc limit ".$start.", 10";
        }else if($sort == 'cxn'){
            $sql = "select idcart,totalprice,timedh,trangthai,madh,teldh from cart where trangthai = '0' order by idcart desc limit ".$start.", 10";
        }else if($sort == 'dxn'){
            $sql = "select idcart,totalprice,timedh,trangthai,madh,teldh from cart where trangthai = '1' order by idcart desc limit ".$start.", 10";
        }else if($sort == 'dg'){
            $sql = "select idcart,totalprice,timedh,trangthai,madh,teldh from cart where trangthai = '2' order by idcart desc limit ".$start.", 10";
        }else if($sort == 'dagiao'){
            $sql = "select idcart,totalprice,timedh,trangthai,madh,teldh from cart where trangthai = '3' order by idcart desc limit ".$start.", 10";
        }
    }
    $listdh = pdo_query($sql);
    return $listdh;
}

?>