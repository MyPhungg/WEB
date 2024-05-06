<?php
include("../page/connectDB.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $maQuyen = $_POST['txtMaquyen'];
    $tenQuyen = $_POST['txtTenquyen'];
    $Mota = $_POST['txtMota'];

    $sql = "INSERT INTO quyen (Maquyen, Tenquyen, Mota) VALUES ('$maQuyen', '$tenQuyen', '$Mota')";

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
        <title>Form Quyền</title>
    </head>
    <body>
        <div class="form-km">
            <form class="formkhuyenmai" id="formkhuyenmai" method="get" action="">
                <h3>Quyền</h3>
                <label for="txtMakh">Mã Quyền/label>
                <input type="text" name="txtMakh" value="" />

                <label for="txtTenkh">Tên Quyền</label>
                <input type="text" name="txtTenkh" value=""/>

                <label for="txtMota">Mô tả</label>
                <input type="text" name="txtMota" value="" placeholder="Nhập vào mô tả..."/>

                <div class="group-btn">
                    <button type="button" id="delBtn" class="delBtn">Hủy</button>
                    <button type="reset" id="resetBtn" class="resetBtn">Đặt lại</button>
                    <button type="Submit" id="submitBtn" class="submitBtn">Lưu</button>
                </div>
            </form>
        </div>
    </body>
</html>