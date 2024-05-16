<?php
require_once('../../db_connect.php');
require_once("../../role_check.php");

$conn = new Database();

$userAuth = new userAuth($conn);
$isDelete = $userAuth->checkDeletePermission("7");

if (!$isDelete) {
  header("Location: ../page/Aquyen.php");
  exit();
}

$idToDelete = $_GET['id'];
$sql = "DELETE FROM chitietquyen WHERE Maquyen =' $idToDelete'";
$sql = "DELETE FROM quyen WHERE Maquyen = '$idToDelete'";

$conn->query($sql);

$conn->close();

session_start();
$_SESSION["role_msg"] = "Xóa quyền thành công";
header("Location: ../page/Aquyen.php");
exit();
