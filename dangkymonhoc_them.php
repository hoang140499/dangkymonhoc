<div class="container">
    <div class="row">
        <div class="col-6">
            <?php
                $sql_sv = "SELECT * FROM sinhvien";
                $result_sv = mysqli_query($conn, $sql_sv);

                $sql_mh = "SELECT * FROM monhoc";
                $result_mh = mysqli_query($conn, $sql_mh);
            ?>
            <form method="post">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Sinh viên</label>
                    <select class="form-control" id="exampleFormControlSelect1" required name="masv">
                    <?php while($data_sv = mysqli_fetch_array($result_sv)) { ?>
                        <option value="<?php echo $data_sv['masv']?>">
                            <?php echo $data_sv['masv']?> - <?php echo $data_sv['hoten']?>
                        </option>
                    <?php }?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect2">Môn học</label>
                    <select class="form-control" id="exampleFormControlSelect2" required name="mamon">
                    <?php while($data_mh = mysqli_fetch_array($result_mh)) { ?>
                        <option value="<?php echo $data_mh['mamon']?>">
                            <?php echo $data_mh['mamon']?> - <?php echo $data_mh['tenmon']?>
                        </option>
                    <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Năm học</label>
                    <input type="text" class="form-control" id="exampleFormControlTextarea1" required name="namhoc"></input>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect2">Học kì</label>
                    <select class="form-control" id="exampleFormControlSelect2" required name="hocki">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select>
                </div>
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2" name="them">Đăng ký</button>
            </form>
        </div>
    </div>
</div>

<?php


//Lấy giá trị POST từ form vừa submit
if (isset($_POST['them'])) {
    if(isset($_POST["masv"])) { $masv = $_POST['masv']; }
    if(isset($_POST["mamon"])) { $mamon = $_POST['mamon']; }
    if(isset($_POST["namhoc"])) { $namhoc = $_POST['namhoc']; }
    if(isset($_POST["hocki"])) { $hocki = $_POST['hocki']; }

    //echo $masv.'-'.$mamon.'-'.$namhoc.'-'.$hocki;

    $query_test = "SELECT * FROM dangkymonhoc WHERE masv='$masv' and mamon = '$mamon' and namhoc = '$namhoc' and hocki = '$hocki' limit 1";

    $result_test = mysqli_query($conn, $query_test);

    $count = mysqli_num_rows($result_test);

    if ($count == 1 ) {
        echo "Dữ liệu bị trùng";
    }else{
        $sql = "INSERT INTO dangkymonhoc (masv, mamon, namhoc, hocki)
        VALUES ('$masv', '$mamon', '$namhoc', '$hocki')";
        $result = mysqli_query($conn, $sql);
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
