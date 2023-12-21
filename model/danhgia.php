<?php
function adddg($idtk,$idsp,$noidung,$rate,$time){
    $sql="insert into danhgia(idtk,idsp,noidung,starrate,timedg) values ('$idtk','$idsp','$noidung','$rate','$time')";
    pdo_execute($sql);
}

function loadalldg($idsp,$sort){
    if($sort=="new"){
        $sql="select * from danhgia where idsp = '".$idsp."' order by iddg desc";
    }
    else if($sort=="old"){
        $sql="select * from danhgia where idsp = '".$idsp."' order by iddg asc";
    }
    else if($sort=="tichcuc"){
        $sql="select * from danhgia where idsp = '".$idsp."' and starrate in(3,4,5)";
    }
    else if($sort=="tieucuc"){
        $sql="select * from danhgia where idsp = '".$idsp."' and starrate in(1,2)";
    }
    $listdg = pdo_query($sql);
    return $listdg;
}

function avgrate($idsp){
    $sql = "select round(avg(starrate),1) as avgrate from danhgia where idsp=".$idsp;
    $avgrate = pdo_query($sql);
    return $avgrate;
}

function countdg($idsp){
    $sql = "select count(iddg) as countrate from danhgia where idsp=".$idsp;
    $coutdg = pdo_query($sql);
    return $coutdg;
}

function countdg1($idsp){
    $sql = "select count(iddg) as countrate1 from danhgia where starrate = '1' and idsp=".$idsp;
    $coutdg = pdo_query($sql);
    return $coutdg;
}
function countdg2($idsp){
    $sql = "select count(iddg) as countrate2 from danhgia where starrate = '2' and idsp=".$idsp;
    $coutdg = pdo_query($sql);
    return $coutdg;
}
function countdg3($idsp){
    $sql = "select count(iddg) as countrate3 from danhgia where starrate = '3' and idsp=".$idsp;
    $coutdg = pdo_query($sql);
    return $coutdg;
}
function countdg4($idsp){
    $sql = "select count(iddg) as countrate4 from danhgia where starrate = '4' and idsp=".$idsp;
    $coutdg = pdo_query($sql);
    return $coutdg;
}
function countdg5($idsp){
    $sql = "select count(iddg) as countrate5 from danhgia where starrate = '5' and idsp=".$idsp;
    $coutdg = pdo_query($sql);
    return $coutdg;
}
function checkdg($idtk,$idsp){
    $sql="select idtk from danhgia where idtk = '".$idtk."' and idsp=".$idsp;
    $ttdn = pdo_query_one($sql);
    return $ttdn;
}
function updatedg($rate,$noidung,$time,$idsp,$idtk,$edit){
    $sql="update danhgia set starrate = '".$rate."', noidung = '".$noidung."', timedg = '".$time."', chinhsua = '".$edit."' where idtk ='".$idtk."' and idsp ='".$idsp."' ";
    pdo_execute($sql);
}
function pagesearchdg($idsp,$idtk,$sort){
    if($sort == 'tichcuc'){
        if($idsp!='' && $idtk==''){
            $sql="select count(iddg) as total from danhgia where idsp = '".$idsp."' and starrate in (3,4,5)";            
        }else if($idtk!='' && $idsp==''){             
            $sql="select count(iddg) as total from danhgia where idtk = '".$idtk."' and starrate in (3,4,5)";
        }else if($idtk!='' && $idsp!=''){            
            $sql="select count(iddg) as total from danhgia where idtk = '".$idtk."' and idsp ='".$idsp."' and starrate in (3,4,5)";
        }else if($idtk=='' && $idsp==''){ 
            $sql="select count(idtk) as total from danhgia where starrate in (3,4,5)";        
        }
    }else if($sort == 'tieucuc'){
        if($idsp!='' && $idtk==''){
            $sql="select count(iddg) as total from danhgia where idsp = '".$idsp."' and starrate in (1,2)";            
        }else if($idtk!='' && $idsp==''){             
            $sql="select count(iddg) as total from danhgia where idtk = '".$idtk."' and starrate in (1,2)";
        }else if($idtk!='' && $idsp!=''){            
            $sql="select count(iddg) as total from danhgia where idtk = '".$idtk."' and idsp ='".$idsp."' and starrate in (1,2)";
        }else if($idtk=='' && $idsp==''){ 
            $sql="select count(idtk) as total from danhgia where starrate in (1,2)";        
        }
    }else{
        if($idsp!='' && $idtk==''){
            $sql="select count(iddg) as total from danhgia where idsp = '".$idsp."'";        
        }else if($idtk!='' && $idsp==''){             
            $sql="select count(iddg) as total from danhgia where idtk = '".$idtk."'";
        }else if($idtk!='' && $idsp!=''){            
            $sql="select count(iddg) as total from danhgia where idtk = '".$idtk."' and idsp =".$idsp;
        }else if($idtk=='' && $idsp==''){ 
            $sql="select count(idtk) as total from danhgia";        
        }
    }
    $listdg = pdo_query($sql);
    return $listdg;
}

function listdg($idsp,$idtk,$sort,$start){
    if(isset($idsp)&&($idsp!='')){
        if(!isset($idtk)||($idtk)==''){
            if($sort == 'new'){
               $sql = "select * from danhgia where idsp = '".$idsp."' order by iddg desc limit ".$start.", 10";
            }else if($sort == 'old'){
               $sql = "select * from danhgia where idsp = '".$idsp."' order by iddg asc limit ".$start.", 10";
            }else if($sort == 'tichcuc'){
               $sql = "select * from danhgia where idsp = '".$idsp."' and starrate in (3,4,5) order by iddg asc limit ".$start.", 10";
            }else if($sort == 'tieucuc'){
               $sql = "select * from danhgia where idsp = '".$idsp."' and starrate in (1,2) order by iddg desc limit ".$start.", 10";
            }
        }else{
            if($sort == 'new'){
               $sql = "select * from danhgia where idsp = '".$idsp."' and idtk = '".$idtk."' order by iddg desc limit ".$start.", 10";
            }else if($sort == 'old'){
               $sql = "select * from danhgia where idsp = '".$idsp."' and idtk = '".$idtk."' order by iddg asc limit ".$start.", 10";
            }else if($sort == 'tichcuc'){
               $sql = "select * from danhgia where idsp = '".$idsp."' and idtk = '".$idtk."' and starrate in (3,4,5) order by iddg asc limit ".$start.", 10";
            }else if($sort == 'tieucuc'){
               $sql = "select * from danhgia where idsp = '".$idsp."' and idtk = '".$idtk."' and starrate in (1,2) order by iddg desc limit ".$start.", 10";
            }
        }
    }else 
    if(isset($idtk)&&($idtk)!=''){
        if((!isset($idsp))||($idsp=='')){
            if($sort == 'new'){
               $sql = "select * from danhgia where idtk = '".$idtk."' order by iddg desc limit ".$start.", 10";
            }else if($sort == 'old'){
               $sql = "select * from danhgia where idtk = '".$idtk."' order by iddg asc limit ".$start.", 10";
            }else if($sort == 'tichcuc'){
               $sql = "select * from danhgia where idtk = '".$idtk."' and starrate in (3,4,5) order by iddg asc limit ".$start.", 10";
            }else if($sort == 'tieucuc'){
               $sql = "select * from danhgia where idtk = '".$idtk."' and starrate in (1,2) order by iddg desc limit ".$start.", 10";
            }
        }
    }else 
    if((!isset($idsp)&&!isset($idtk))||($idsp==''&&$idtk=='')){
        if($sort == 'new'){
           $sql = "select * from danhgia order by iddg desc limit ".$start.", 10";
        }else if($sort == 'old'){
           $sql = "select * from danhgia order by iddg asc limit ".$start.", 10";
        }else if($sort == 'tichcuc'){
           $sql = "select * from danhgia where starrate in (3,4,5) order by iddg asc limit ".$start.", 10";
        }else if($sort == 'tieucuc'){
           $sql = "select * from danhgia where starrate in (1,2) order by iddg asc limit ".$start.", 10";
        }
    }
    $listdg = pdo_query($sql);
    return $listdg;
}

function danhgiasp($idtk){
    $sql = "select hoten,avatar from taikhoan where idtk = ".$idtk;
    $dg = pdo_query($sql);
    return $dg;
}

?>