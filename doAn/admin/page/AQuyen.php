<!DOCTYPE html>
<html>

<head>
    <title>Danh sách quyền</title>

    <link rel="stylesheet" href="../css/phieuxuat.css">
    <link rel="stylesheet" href="../css/chitiethoadon.css">
    <link rel="stylesheet" href="../css/dsnv.css">
    <link rel="stylesheet" href="style.css?version=1.0">

    <style>

    </style>
</head>
<?php
?>
<?php
$servername = "localhost";
$user = "root";
$password = "";
$dbname = "bolashop";

$conn = new mysqli($servername, $user, $password, $dbname);
$sql="SELECT * FROM quyen";
$query=mysqli_query($conn, $sql);
mysqli_close($conn);
?>
<body>
    <div style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
        <div class="title">Danh sách quyền</div>
        <div class="btn-ThemNV"><a href="phanquyen.php"> + Thêm quyền</a></div>
        <div style="clear: both;"></div>
        <input class="search" type="text" name="txtTimKiem" placeholder="Tìm kiếm...">
        <div><br></div>
        <div style="display: flex; justify-content: center;">
            <div class="table">
                <div class="table-title">
                    <div style="width: 20%; font-weight: bold;">Mã quyền</div>
                    <div style="width: 20%; font-weight: bold;">Tên quyền</div>
                    <div style="width: 40%; font-weight: bold;">Mô tả</div>
                    <div style="width: 20%; font-weight: bold;">Thao tác</div>

                </div>
                <div><br></div>
                <div><br></div>
                <div style="overflow-y: scroll;">
                <?php foreach($query as $key => $value) { ?>
                    <div class="table-items">
                        <div style="width: 20%;">
                            <div><?php echo $value["Maquyen"]; ?></div>
                        </div>
                        <div style="width: 20%;"><?php echo $value["Tenquyen"]; ?></div>
                        <div style="width: 40%;">abc</div>
                        <div style="width: 20%;">
                            <button type="button"
                                style="background-color: white; border: solid 0.5px #D61EAD; color: black;">Sửa</button>
                            <button type="button">Xóa</button>
                        </div>
                    </div>
                    <?php }?>
                </div>

                <div class="horizontal-line"></div>
                <div class="page">
                    < 1 2 3 ...>
                </div>

            </div>
        </div>

    </div>
</body>

</html>