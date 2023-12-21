<?php

function addtk($tel,$password,$time){
    $sql="insert into taikhoan(tel,password,timedk) values ('$tel','$password','$time')";
    pdo_execute($sql);
}

function checktkdn($tel,$password){
    $sql="select * from taikhoan where tel = '".$tel."' and password = '".$password."'";
    $ttdn = pdo_query_one($sql);
    return $ttdn;
}

function checktkdntel($tel){
    $sql="select tel from taikhoan where tel = '".$tel."'";
    $ttdntel = pdo_query_one($sql);
    return $ttdntel;
}

function checktkdk($tel){
    $sql="select * from taikhoan where tel = '".$tel."'";
    $ttdk = pdo_query_one($sql);
    return $ttdk;
}

function checkttquenmk($tel,$email){
    $sql="select tel from taikhoan where tel = '".$tel."' and email = '".$email."'";
    $ttdk = pdo_query_one($sql);
    return $ttdk;
}

function updatettquenmk($tel,$email,$password){
    $sql="update taikhoan set password ='".$password."' where tel ='".$tel."' and email ='".$email."'";
    pdo_execute($sql);
}

function updatetk($name,$phone,$password,$email,$address,$id,$avatar){
    if($avatar!=""){
        $sql="update taikhoan set hoten ='".$name."', tel ='".$phone."', password ='".$password."', email ='".$email."', address ='".$address."', avatar ='".$avatar."'  where idtk=".$id;
    }else{
        $sql="update taikhoan set hoten ='".$name."', tel ='".$phone."', password ='".$password."', email ='".$email."', address ='".$address."'  where idtk=".$id;
    }
    pdo_execute($sql);
}

function loadalltkadmin(){
    $sql="select * from taikhoan where 1 and role <> 2 order by idtk desc";
    $listsp = pdo_query($sql);
    return $listsp;
}

function updatetkadmin($password, $role, $id){
    $sql="update taikhoan set password = '".$password."', role = '".$role."' where idtk =".$id;
    pdo_execute($sql);
}

function loadonetk($idtk){
    $sql = "select * from taikhoan where idtk=".$idtk;
    $tk = pdo_query_one($sql) ;
    return $tk;
}

function pagesearchtk($keyname){
    if($keyname!=''){
        $sql="select count(idtk) as total from taikhoan where tel like '%".$keyname."%' and role <> 2";
    }else{
        $sql ="select count(idtk) as total from taikhoan where role <> 2";
    }
    $listtk = pdo_query($sql);
    return $listtk;
}

function pagetksort($sort){
    if($sort=='old'){
        $sql="select count(idtk) as total from taikhoan where role <> 2 order by idtk asc";
    }else if($sort=='new'){
        $sql="select count(idtk) as total from taikhoan where role <> 2 order by idtk desc";
    }else if($sort=='chd'){
        $sql="select count(idtk) as total from taikhoan where role = 1 and role <> 2";
    }else if($sort=='tkbk'){
        $sql="select count(idtk) as total from taikhoan where role = 0 and role <> 2";
    }
    $listtk = pdo_query($sql);
    return $listtk;
}

function listtk($tel,$sort,$start){
    if($tel!=''){
        if($sort == 'new'){
            $sql = "select * from taikhoan where tel = '".$tel."' and role <> 2 order by idtk desc limit ".$start.", 10";
        }else if($sort == 'old'){
            $sql = "select * from taikhoan where tel = '".$tel."' and role <> 2  order by idtk asc limit ".$start.", 10";
        }else if($sort == 'chd'){
            $sql = "select * from taikhoan where tel = '".$tel."' and role <> 2 and role = 1 order by idtk desc limit ".$start.", 10";
        }else if($sort == 'tkbk'){
            $sql = "select * from taikhoan where tel = '".$tel."' and role <> 2 and role = 0 order by idtk desc limit ".$start.", 10";
        }
    }else{
        if($sort == 'new'){
            $sql = "select * from taikhoan where role <> 2 order by idtk desc limit ".$start.", 10";
        }else if($sort == 'old'){
            $sql = "select * from taikhoan where role <> 2  order by idtk asc limit ".$start.", 10";
        }else if($sort == 'chd'){
            $sql = "select * from taikhoan where role <> 2 and role = 1 order by idtk desc limit ".$start.", 10";
        }else if($sort == 'tkbk'){
            $sql = "select * from taikhoan where role <> 2 and role = 0 order by idtk desc limit ".$start.", 10";
        }
    }
    $listtk = pdo_query($sql);
    return $listtk;
}

?>