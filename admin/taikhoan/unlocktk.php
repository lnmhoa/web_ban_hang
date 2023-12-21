<?php
include "../../model/pdo.php";
 if(isset($_POST['id'])&&($_POST['id']>0)){
try {
    $conn = pdo_get_connection();
    $id = $_POST['id'];
    $sql = "update taikhoan set role = 1 where idtk = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    echo $id;
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}}

$conn = null;
?>