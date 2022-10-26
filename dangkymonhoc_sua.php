<div class="container">
    <div class="row">
        <div class="col-6">
            <?php
                $id = $_GET['id'];
                $sql = "SELECT * FROM dangkymonhoc inner join monhoc on monhoc.mamon = dangkymonhoc.mamon inner join sinhvien on sinhvien.masv = dangkymonhoc.masv where id = '$id' limit 1";
                $result = mysqli_query($conn, $sql);
            ?>
            <form method="post">
            <?php while($data = mysqli_fetch_array($result)) { ?>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Sinh viên</label>
                    <select class="form-control" id="exampleFormControlSelect1" required name="masv" readonly>
                    
                        <option value="<?php echo $data['masv']?>">
                            <?php echo $data['masv']?> - <?php echo $data['hoten']?>
                        </option>
                   
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect2">Môn học</label>
                    <select class="form-control" id="exampleFormControlSelect2" required name="mamon" readonly>
                   
                        <option value="<?php echo $data['mamon']?>">
                            <?php echo $data['mamon']?> - <?php echo $data['tenmon']?>
                        </option>
                    
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Năm học</label>
                    <input value="<?php echo $data['namhoc']?>" type="text" class="form-control" id="exampleFormControlTextarea1" required name="namhoc"></input>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect2">Học kì</label>
                    <select class="form-control" id="exampleFormControlSelect2" required name="hocki">
                        <option <?php echo ($data['hocki'] == 1 ? 'selected' : '');?> value="1">
                            1
                        </option>
                        <option <?php echo ($data['hocki'] == 2 ? 'selected' : '');?> value="2">
                            2
                        </option>
                        <option <?php echo ($data['hocki'] == 3 ? 'selected' : '');?> value="3">
                            3
                        </option>

                       
                    </select>
                </div>
                <?php }?>
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2" name="sua">Đăng ký</button>
            </form>
        </div>
    </div>
</div>

<?php


//Lấy giá trị POST từ form vừa submit
if (isset($_POST['sua'])) {
    if(isset($_POST["masv"])) { $masv = $_POST['masv']; }
    if(isset($_POST["mamon"])) { $mamon = $_POST['mamon']; }
    if(isset($_POST["namhoc"])) { $namhoc = $_POST['namhoc']; }
    if(isset($_POST["hocki"])) { $hocki = $_POST['hocki']; }

    echo $masv.'-'.$mamon.'-'.$namhoc.'-'.$hocki;

    $query_test = "SELECT * FROM dangkymonhoc WHERE masv='$masv' and mamon = '$mamon' and namhoc = '$namhoc' and hocki = '$hocki' limit 1";

    $result_test = mysqli_query($conn, $query_test);

    $count = mysqli_num_rows($result_test);

    if ($count == 1 ) {
        echo "Dữ liệu bị trùng";
    }else{
        $sql_update = "UPDATE dangkymonhoc
        SET namhoc = '$namhoc', hocki = '$hocki'
        WHERE id = '$id'";
        $result_update = mysqli_query($conn, $sql_update);
        header('location: index.php');

    }
    //echo $count;
    //Code xử lý, insert dữ liệu vào table
    // $sql = "INSERT INTO tin_xahoi (title, date, description, content)
    // VALUES ('$title', '$date', '$description', '$content')";

    // if ($connect->query($sql) === TRUE) {
    //     echo "Thêm dữ liệu thành công";
    // } else {
    //     echo "Error: " . $sql . "<br>" . $connect->error;
    // }
}

?>
