<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Chào <?php echo $_SESSION['taikhoan']?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-link active" href="index.php">Trang chủ <span class="sr-only">(current)</span></a>
      <a class="nav-link" href="dangxuat.php" onclick="return confirm('Bạn muốn đăng xuất?')">Đăng xuất</a>
      <!-- <a class="nav-link" href="#">Pricing</a>
      <a class="nav-link disabled">Disabled</a> -->
    </div>
  </div>
</nav>