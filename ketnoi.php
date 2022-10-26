<?php
/* Cố gắng kết nối máy chủ MySQL. Giả sử bạn đang chạy MySQL
Máy chủ có cài đặt mặc định (user là 'root' và không có mật khẩu) */
$conn = mysqli_connect("localhost", "root", "", "dangkymonhoc11");
 
// Kiểm tra kết nối
if($conn === false){
    die("ERROR: Không thể kết nối. " . mysqli_connect_error());
}
 
// In thông tin Host
//echo "Kết nối thành công. Host: " . mysqli_get_host_info($link);

// Đóng kết nối
// mysqli_close($link);
?>