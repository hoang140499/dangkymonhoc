<div class="container">
  <div class="row">
    <div class="col-12 text-center">
        <h2>Danh sách đăng ký môn học</h2>
    </div>
    
    <div class="col-12">
        <form action="" method="get">
            <div class="input-group mb-3">
                <input name="keyma" type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Tìm kiếm theo mã môn</button>
                </div>
            </div>
        </form>
        <form action="" method="get">
            <div class="input-group mb-3">
                <input name="keyten" type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Tìm kiếm theo tên môn</button>
                </div>
            </div>
        </form>
    </div>

    <?php
        if (isset($_GET['keyma'])) {
            $keyma = $_GET['keyma'];
            $sql = "SELECT * FROM dangkymonhoc inner join monhoc on monhoc.mamon = dangkymonhoc.mamon inner join sinhvien on sinhvien.masv = dangkymonhoc.masv where monhoc.mamon like '%$keyma%' ";
            $result = mysqli_query($conn, $sql);
        }
        else if (isset($_GET['keyten'])) {
            $keyten = $_GET['keyten'];
            $sql = "SELECT * FROM dangkymonhoc inner join monhoc on monhoc.mamon = dangkymonhoc.mamon inner join sinhvien on sinhvien.masv = dangkymonhoc.masv where monhoc.tenmon like '%$keyten%' ";
            $result = mysqli_query($conn, $sql);
        }
        else{
            $sql = "SELECT * FROM dangkymonhoc inner join monhoc on monhoc.mamon = dangkymonhoc.mamon inner join sinhvien on sinhvien.masv = dangkymonhoc.masv";
            $result = mysqli_query($conn, $sql);
        }
        
    ?>
    
    <div class="col-12">
    <a class="btn btn-outline-secondary" href="index.php?action=them" id="button-addon2">Đăng ký</a>
    <form action="dangkymonhoc_xoa.php" method="post">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">STT</th>
                    <th scope="col">Mã sinh viên</th>
                    <th scope="col">Họ tên </th>
                    <th scope="col">Mã môn</th>
                    <th scope="col">Số tín chỉ</th>
                    <th scope="col">Năm học</th>
                    <th scope="col">Học kì</th>
                    <th scope="col">**</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; while($data = mysqli_fetch_array($result)) { ?>
                <tr>
                    <th scope="row"><input name="ids[]" value="<?php echo $data['id'] ?>" type="checkbox"></th>
                    <td><?php echo $i?></td>
                    <td><?php echo $data['masv']?></td>
                    <td><?php echo $data['hoten']?></td>
                    <td><?php echo $data['mamon']?> (<?php echo $data['tenmon']?>)</td>
                    <td><?php echo $data['sotinchi']?></td>
                    <td><?php echo $data['namhoc']?></td>
                    <td><?php echo $data['hocki']?></td>
                    <td><a href="index.php?action=sua&id=<?php echo $data['id']?>">Sửa</a></td>
                </tr>
                <?php $i++; }?>
            </tbody>
        </table>
        <button onclick="return confirm('Bạn chắc chứ')" class="btn btn-outline-danger" type="submit" id="button-addon2" name="xoa">Xóa</button>
    </form>
    </div>

  </div>
</div>