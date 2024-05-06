<?php

include("../page/connectDB.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $maNCC = $_POST["txtMancc"];
    $tenNCC = $_POST["txtTenncc"];
    $diaChiNCC = $_POST["txtDiachi"];
    $soDienThoaiNCC = $_POST["txtSdt"];

    $sql = "INSERT INTO nhacungcap (Mancc, Ten, Diachi, Sdt)
    VALUES ('$maNCC', '$tenNCC', '$diaChiNCC', '$soDienThoaiNCC')";

    if ($conn->query($sql) === TRUE) {
        echo "";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
<html>

<head>
    <meta charset="utf-8" />
    <link href="../css/formthemKM.css?version=1.0" rel="stylesheet" />
    <title>Form Nhà cung cấp</title>
</head>

<body>
    <div class="form-km">
        <form class="formkhuyenmai" id="formkhuyenmai" method="post" action="">
            <h3>Nhà cung cấp</h3>
            <label for="txtMakh">Mã nhà cung cấp</label>
            <input type="text" name="txtMancc" value="" />

            <label for="txtTenkh">Tên nhà cung cấp</label>
            <input type="text" name="txtTenncc" value="" />
            <label for="txtTenkh">Địa chỉ nhà cung cấp</label>
            <input type="text" name="txtDiachi" value="" />
            <label for="txtTenkh">Số điện thoại nhà cung cấp</label>
            <input type="text" name="txtSdt" value="" />

            <div class="group-btn">
                <button type="button" id="delBtn" class="delBtn">Hủy</button>
                <button type="reset" id="resetBtn" class="resetBtn">Đặt lại</button>
                <button type="Submit" id="submitBtn" class="submitBtn">Lưu</button>
            </div>
        </form>
    </div>
</body>

</html>