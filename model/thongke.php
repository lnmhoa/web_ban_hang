<?php

function checkcart(){
    $sql ="select * from cart";
    $cart = pdo_query($sql);
    return $cart;
}

function checktk(){
    $sql ="select * from tk";
    $tk = pdo_query($sql);
    return $tk;
}

function dttheongaythang($month,$year){
    $sql = "select day(timedh),sum(totalprice) from cart where month(timedh) ='".$month."' and year(timedh)='".$year."' group by day(timedh) order by timedh asc";
    $listdh = pdo_query($sql);
    return $listdh;
}

function dttheothangnam($year){
    $sql = "select month(timedh),sum(totalprice) from cart where year(timedh)='".$year."' group by month(timedh) order by timedh asc";
    $listdh = pdo_query($sql);
    return $listdh;
}

function tktheongaythang($month,$year){
    $sql = "select day(timedk),count(idtk) from taikhoan where month(timedk) ='".$month."' and year(timedk)='".$year."' and role <> 2 group by day(timedk) order by timedk asc";
    $listdk = pdo_query($sql);
    return $listdk;
}

function tktheothangnam($year){
    $sql = "select month(timedk),count(idtk) from taikhoan where year(timedk)='".$year."' and role <> 2 group by month(timedk) order by timedk asc";
    $listdk = pdo_query($sql);
    return $listdk;
}

function tkhd(){
    $sql = "select count(idtk) from taikhoan where role <> 2 and role = 1 order by timedk asc";
    $listdk = pdo_query($sql);
    return $listdk;
}

function tkkhoa(){
    $sql = "select count(idtk) from taikhoan where role <> 2 and role = 0 order by timedk asc";
    $listdk = pdo_query($sql);
    return $listdk;
}

function dhtctheongay($month,$year){
    $sql = "select day(timedh),count(idcart) from cart where month(timedh) = '".$month."' and year(timedh) = '".$year."' and trangthai in(0,1,2,3) group by day(timedh) order by timedh asc";
    $list = pdo_query($sql);
    return $list;
}

function dhtctheonam($year){
    $sql = "select day(timedh),count(idcart) from cart where year(timedh) = '".$year."' and trangthai in(0,1,2,3) order by timedh asc";
    $list = pdo_query($sql);
    return $list;
}

function dhktctheongay($month,$year){
    $sql = "select day(timedh),count(idcart) from cart where month(timedh) = '".$month."' and year(timedh) = '".$year."' and trangthai = -1 group by day(timedh) order by timedh asc";
    $list = pdo_query($sql);
    return $list;
}

function dhktctheonam($year){
    $sql = "select day(timedh),count(idcart) from cart where year(timedh) = '".$year."' and trangthai = -1 order by timedh asc";
    $list = pdo_query($sql);
    return $list;
}

function lastmonth(){
    $sql = "select month(timedh) from cart order by timedh desc limit 1";
    $month = pdo_query($sql);
    return $month;
}

function lastyear(){
    $sql = "select year(timedh) from cart order by idcart desc limit 1";
    $year = pdo_query($sql);
    return $year;
}

function allmonth(){
    $sql = "select distinct month(timedh) from cart order by timedh asc";
    $month = pdo_query($sql);
    return $month;
}

function allyear(){
    $sql = "select distinct year(timedh) from cart order by timedh asc";
    $month = pdo_query($sql);
    return $month;
}

function lastmonthtk(){
    $sql = "select month(timedk) from taikhoan order by timedk desc limit 1";
    $month = pdo_query($sql);
    return $month;
}

function lastyeartk(){
    $sql = "select year(timedk) from taikhoan order by idtk desc limit 1";
    $year = pdo_query($sql);
    return $year;
}

function allmonthtk(){
    $sql = "select distinct month(timedk) from taikhoan order by timedk asc";
    $month = pdo_query($sql);
    return $month;
}

function allyeartk(){
    $sql = "select distinct year(timedk) from taikhoan order by timedk asc";
    $month = pdo_query($sql);
    return $month;
}

function viewweb(){
    $sql = "update infoweb set view = view + 1";
    pdo_execute($sql);
}

function sodm(){
    $sql = "select count(iddm) from danhmuc";
    $dm = pdo_query($sql);
    return $dm;
}

function sosp(){
    $sql = "select sum(quantity) from sanpham";
    $sp = pdo_query($sql);
    return $sp;
}

function soview(){
    $sql = "select view from infoweb";
    $view = pdo_query($sql);
    return $view;
}

function sodg(){
    $sql = "select count(iddg) from danhgia";
    $dg = pdo_query($sql);
    return $dg;
}

function iddm(){
    $sql = "select namedm,iddm from danhmuc";
    $dm = pdo_query($sql);
    return $dm;
}

function slsp($iddm){
    $sql = "select sum(quantity) from sanpham where iddm = '".$iddm."'";
    $sp = pdo_query($sql);
    return $sp;
}

?>
