<?php session_start(); 
 
if (isset($_SESSION['taikhoan'])){
    unset($_SESSION['taikhoan']); // xóa session login
}
header('location: dangnhap.php')
?>