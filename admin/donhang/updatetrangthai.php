<?php
include "../../model/pdo.php";
$response = array();
if(isset($_POST['nb'])){
if ($_POST['nb'] === '1') {
    if (isset($_POST['id'])&&($_POST['id']>0)&&isset($_POST['step'])&&($_POST['step']>=-1)) {
        try {
            $conn = pdo_get_connection();
            $id = $_POST['id'];
            $step = $_POST['step'];
            $sql = "update cart set trangthai = :step + 1 where idcart = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':step', $step);
            $stmt->execute();
            header('Content-Type: application/json');
            echo json_encode($response);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}if($_POST['nb'] === '0') {
    if (isset($_POST['id'])&&($_POST['id']>0)&&isset($_POST['step'])&&($_POST['step']<=3)) {
        try {
            $conn = pdo_get_connection();
            $id = $_POST['id'];
            $step = $_POST['step'];
            $sql = "update cart set trangthai = :step - 1 where idcart = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':step', $step);
            $stmt->execute();
            header('Content-Type: application/json');
            echo json_encode($response);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } 
}}

$conn = null;
?>