<?php
include "../../model/pdo.php";
if(isset($_POST['id'])&&($_POST['id']>0)){
try {
    $conn = pdo_get_connection();
    $id = $_POST['id'];
    $sql = "delete from sanpham where idsp = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}}

$conn = null;
?>