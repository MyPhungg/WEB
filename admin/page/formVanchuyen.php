<?php
include("../page/connectDB.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $maVanChuyen = $_POST['txtMavanchuyen'];
    $tenVanChuyen = $_POST['txtTenvanchuyen'];
    $phiVanChuyen = $_POST['txtPhivanchuyen'];

    $sql = "INSERT INTO vanchuyen (Mavc, Ten, Gia) VALUES ('$maVanChuyen', '$tenVanChuyen', '$phiVanChuyen')";

    if (mysqli_query($conn, $sql)) {
        echo "Dữ liệu đã được thêm vào cơ sở dữ liệu thành công";
    } else {
        echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

<html>
    <head>
        <meta charset="utf-8"/>
        <link href="../css/formthemKM.css?version=1.0" rel="stylesheet"/>
        <title>Form vận chuyển</title>
    </head>
    <body>
        <div class="form-km">
            <form class="formkhuyenmai" id="formkhuyenmai" method="get" action="">
                <h3>Vận chuyển</h3>
                <label for="txtMavanchuyen">Mã vận chuyển</label>
                <input type="text" name="txtMavanchuyen" value="" />

                <label for="txtTenvanchuyen">Tên vận chuyển</label>
                <input type="text" name="txtTenvanchuyen" value="" />

                <label for="txtPhivanchuyen">Phí vận chuyển</label>
                <input type="text" name="txtPhivanchuyen" value="" />

                

                <div class="group-btn">
                    <button type="button" id="delBtn" class="delBtn">Hủy</button>
                    <button type="reset" id="resetBtn" class="resetBtn">Đặt lại</button>
                    <button type="Submit" id="submitBtn" class="submitBtn">Lưu</button>
                </div>
            </form>
        </div>
    </body>
</html>