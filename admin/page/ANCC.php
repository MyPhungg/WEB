<!DOCTYPE html>
<html>

<head>
    <title>Danh sách nhà cung cấp</title>

    <link rel="stylesheet" href="../css/phieuxuat.css?version=1.0">
    <link rel="stylesheet" href="../css/chitiethoadon.css?version=1.0">
    <link rel="stylesheet" href="../css/dsnv.css?version=1.0">
    <link rel="stylesheet" href="../css/ncc.css?version=1.0">
    <!-- <link rel="stylesheet" href="style.css?version=1.0"> -->

    <style>
        *, a{
            text-decoration: none;
            list-style:none;
        }
        .thaotac{
            width: 30%;
        }
       
    </style>
</head>
<?php
$conn = mysqli_connect('localhost', 'root', '', 'bolashop');
$sql = "SELECT * FROM nhacungcap";
$rs_ncc = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($rs_ncc);


if(isset($_POST["timkiem"])){
    $searchKey = trim($_POST["txtTimKiem"]);
    $sql_search = "SELECT * FROM nhacungcap WHERE Mancc LIKE '%$searchKey%' OR Ten LIKE '%$searchKey%'";
    $rs_ncc = mysqli_query($conn, $sql_search);
}


mysqli_close($conn);
?>
<body>
    <div id="wrapper-NCC">
        <!-- <h3>Nhà cung cấp</h3> -->
        <div id="themNCC">
            <div>
                <input type="button" id="x" value="X" onclick="closeThemNCC()">
                <div style="clear: both;"></div>

            </div>
            <div class="titleNCC">Mã nhà cung cấp: </div>
            <input type="text" id="maNCC">
            <div class="titleNCC">Tên nhà cung cấp: </div>
            <input type="text" id="tenNCC">
            <div class="btn">
                <div class="btn-huy">Hủy</div>
                <div> </div>
                <div class="btn-them">Thêm</div>
            </div>

        </div>
    </div>

    <div id="NCC">
        <div style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
            <div class="title">Nhà cung cấp</div>
            <div class="btn-ThemNV" ><a href="formNcc.php"> + Thêm nhà cung cấp</a></div>
            <div style="clear: both;"></div>
            <form action="" method="post">
                <input class="search" type="text" name="txtTimKiem" placeholder="Tìm kiếm...">
                <button type="submit" name="timkiem" >Tìm kiếm</button>
            </form>
            <div><br></div>
            <div style="display: flex; justify-content: center;">
                <div class="table">
                    <div class="table-title">
                        <div style="width: 20%; font-weight: bold;">Mã NCC</div>
                        <div style="width: 30%; font-weight: bold;">Tên NCC</div>
                        <div style="width: 20%; font-weight: bold;">Số điện thoại</div>
                        <div style="width: 30%; font-weight: bold;">Thao tác</div>
                    </div>
                    <div><br></div>
                    <div><br></div>
                    <div style="overflow-y: scroll;">
                    <?php foreach($rs_ncc as $key => $value) {?>
                        <div class="table-items">
                            
                            <div style="width: 20%;"><?php echo $value["Mancc"]; ?></div>
                            <div style="width: 30%;"><?php echo $value["Ten"]; ?></div>
                            <div style="width: 20%;"><?php echo $value["Sdt"]; ?></div>
                           
                            <div class="thaotac">
                                <button type="button"><a href="formSuaNcc.php?idncc=<?php echo $value["Mancc"] ?>">Sửa</a></button>
                                <button onclick="return delNcc('<?php echo $value['Ten']; ?>')" type="button"><a href="xoaNcc.php?idncc=<?php echo $value["Mancc"]; ?>">Xóa</a></button>
                            </div> 
                        </div>
                        <?php }?>
                    </div>


                </div>
            </div>

        </div>
    </div>
   
    <script>
        // function showThemNCC() {
        //     // Hiển thị lớp phủ và cửa sổ thêm nhà cung cấp
        //     document.getElementById('wrapper-NCC').style.display = 'flex';
        //     // document.getElementById('wrapper-NCC').style

        //     // Thêm lớp phủ làm mờ cho nội dung chính
        //     document.getElementById('NCC').classList.add('overlay');

        //     // Hiển thị cửa sổ thêm nhà cung cấp ở trung tâm
        //     // document.getElementById('themNCC').style.display = 'block';
        // }

        // function closeThemNCC() {
        //     // Ẩn lớp phủ và cửa sổ thêm nhà cung cấp
        //     document.getElementById('wrapper-NCC').style.display = 'none';

        //     // Gỡ bỏ lớp phủ làm mờ cho nội dung chính
        //     document.getElementById('NCC').classList.remove('overlay');
        // }
        function delNcc(name){
            return confirm("Bạn chắc chắn muốn xóa "+name+" ?");
        }
    </script>
</body>

</html>