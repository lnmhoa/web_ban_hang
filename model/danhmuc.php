<?php 

function loadalldm(){
    $sql="select * from danhmuc where 1 order by iddm desc";
    $listdm = pdo_query($sql);
    return $listdm;
}

function loadalldmhome(){
    $sql="select * from danhmuc where 1 order by namedm desc";
    $listdm = pdo_query($sql);
    return $listdm;
}

function loadonedm($iddm){
    $sql = "select * from danhmuc where iddm=".$iddm;
    $dm = pdo_query_one($sql) ;
    return $dm;
}

function loadnamedm($iddm){
    $sql = "select * from danhmuc where iddm=".$iddm;
    $dm = pdo_query_one($sql) ;
    extract($dm);
    return $namedm;
}

function adddm($namedm,$imgdm){
    $sql="insert into danhmuc(namedm,imgdm) values ('$namedm','$imgdm')";
    pdo_execute($sql);
}

function updatedm($namedm,$iddm,$imgdm){
    if($imgdm!=""){
        $sql="update danhmuc set namedm ='".$namedm."', imgdm ='".$imgdm."' where iddm=".$iddm;
    }else{
        $sql="update danhmuc set namedm ='".$namedm."' where iddm=".$iddm;
    }
    pdo_execute($sql);
}

function pagesearchdm($keyname){
    if($keyname!=""){
        $sql="select count(iddm) as total from danhmuc where namedm like '%".$keyname."%'";
    }
    else{
        $sql ="select count(iddm) as total from danhmuc";
    }
    $listdm = pdo_query($sql);
    return $listdm;
}

function listdm($sort,$search,$start){
    if($sort == 'new'){
        $sql ="select * from danhmuc where namedm like '%".$search."%' order by iddm desc limit ".$start.", 10";
    }else if($sort == 'old'){
        $sql ="select * from danhmuc where namedm like '%".$search."%' order by iddm asc limit ".$start.", 10";
    }else if($sort == 'az'){
        $sql ="select * from danhmuc where namedm like '%".$search."%' order by namedm asc limit ".$start.", 10";
    }else if($sort == 'za'){
        $sql ="select * from danhmuc where namedm like '%".$search."%' order by namedm desc limit ".$start.", 10";
    }
    $listdm = pdo_query($sql);
    return $listdm;
}


?>