<?php

function updateyoutube($link){
    $sql = "update infoweb set urlyoutube = '".$link."'";
    pdo_execute($sql);
}

function updatefacebook($link){
    $sql = "update infoweb set urlfacebook = '".$link."'";
    pdo_execute($sql);
}

function updatetwitter($link){
    $sql = "update infoweb set urltwitter = '".$link."'";
    pdo_execute($sql);
}

function updatephone($tel){
    $sql = "update infoweb set tel = '".$tel."'";
    pdo_execute($sql);
}

function updateemail($email){
    $sql = "update infoweb set email = '".$email."'";
    pdo_execute($sql);
}

function infoweb(){
    $sql = "select * from infoweb";
    $info = pdo_query($sql);
    return $info;
}

function addbanner($name){
    $sql = "insert into banner(name) values ('".$name."')";
    pdo_execute($sql);
}

?>