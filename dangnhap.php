<! DOCTYPE html>  
<html lang="en" >  
<head>  
  <meta charset="UTF-8">  
  <title> Bootstrap 4 Login Form Example  
</title>  
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">  
</head>  
<style>  
body {  
  background: #28a745 !important;  
  font-family: 'Muli', sans-serif;  
}  
h1 {  
  color: #fff;  
  padding-bottom: 2rem;  
  font-weight: bold;  
}  
a {  
  color: #333;  
}  
a:hover {  
  color: #E8D426;  
  text-decoration: none;  
}  
.form-control:focus {  
    color: #000;  
    background-color: #fff;  
    border: 2px solid #E8D426;  
    outline: 0;  
    box-shadow: none;  
}  
.btn {  
  background: #28a745;  
  border: #E8D426;  
}  
.btn:hover {  
  background: #28a745;  
  border: #E8D426;  
}  
</style>  
<body>  
<div class="pt-5">  
  <h1 class="text-center"> Form đăng nhập </h1>  
<div class="container">  
                <div class="row">  
                    <div class="col-md-5 mx-auto">  
                        <div class="card card-body">  
                          <?php
                            if (isset($_GET['loi'])) { ?>
                            <label for="" class="text-danger"><?php echo $_GET['loi']?></label>
                          <?php
                            }
                          ?>
                          <label for="">dfgdf</label>
                      <form id="submitForm" action="#" method="post" data-parsley-validate="" data-parsley-errors-messages-disabled="true" novalidate="" _lpchecked="1">  
<input type="hidden" name="_csrf" value="7635eb83-1f95-4b32-8788-abec2724a9a4">  
                   <div class="form-group required">  
              <lSabel for="username"> Tài khoản </lSabel>  
             <input required type="text" class="form-control text-lowercase" id="username" required="" name="taikhoan" value="">  
               </div>                      
       <div class="form-group required">  
    <label class="d-flex flex-row align-items-center" for="password"> Mật khẩu  
     <a class="ml-auto border-link small-xl" href="#"> Forget Password? </a> </label>  
<input type="password" class="form-control" required="" id="password" name="matkhau" value="" required>  
       </div>  
     <div class="form-group mt-4 mb-4">  
        <div class="custom-control custom-checkbox">  
            <input type="checkbox" class="custom-control-input" id="remember-me" name="remember-me" data-parsley-multiple="remember-me">  
   <label clss="custom-control-label" for="remember-me"> Remember me? </label>  
                </div>  
              </div>  
         <div class="form-group pt-1">  
      <button class="btn btn-primary btn-block" type="submit" name="dangnhap"> Đăng nhập </button>  
                  </div>  
               </form>  
             <p class="small-xl pt-3 text-center">  
       <span class="text-muted"> Not a member? </span>  
        <a href="#"> Sign up </a>  
                        </p>  
                        </div>  
                    </div>  
                </div>  
            </div>  
</div>  
</body>  
</html>  

<?php
//Khai báo sử dụng session
session_start();
//Khai báo utf-8 để hiển thị được tiếng việt
header('Content-Type: text/html; charset=UTF-8');
//Xử lý đăng nhập
if (isset($_POST['dangnhap']))
{
//Kết nối tới database
include('ketnoi.php');
  
//Lấy dữ liệu nhập vào
$taikhoan = ($_POST['taikhoan']);
$matkhau = md5($_POST['matkhau']);
  
  
//Kiểm tra tên đăng nhập có tồn tại không
$query = "SELECT * FROM nguoidung WHERE taikhoan='$taikhoan' and matkhau = '$matkhau'";

$result = mysqli_query($conn, $query) or die( mysqli_error($conn));

$count = mysqli_num_rows($result);

echo $count;
  
if ($count == 1) {
  $_SESSION['taikhoan'] = $taikhoan;
  header('location: index.php');
}
else{
  header('location: dangnhap.php?loi=Tài khoản và mật khẩu không đúng');
}
//Lưu tên đăng nhập
// $_SESSION['taikhoan'] = $taikhoan;
// echo "Xin chào <b>" .$taikhoan . "</b>. Bạn đã đăng nhập thành công. <a href=''>Thoát</a>";
// die();
// $connect->close();
}
?>

