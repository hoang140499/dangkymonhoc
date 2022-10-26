<?php  
include('ketnoi.php');
if (isset($_POST['xoa'])) {
    foreach($_POST['ids'] as $id){
        echo $id;
        $sql = "DELETE FROM dangkymonhoc WHERE id = '$id'";  
        $query = mysqli_query($conn, $sql);
    }  
}
header('location: index.php')
 
 ?>