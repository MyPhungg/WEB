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

    </style>
</head>

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
            <div class="btn-ThemNV" onclick="showThemNCC()"> + Thêm nhà cung cấp</div>
            <div style="clear: both;"></div>
            <input class="search" type="text" name="txtTimKiem" placeholder="Tìm kiếm...">
            <div><br></div>
            <div style="display: flex; justify-content: center;">
                <div class="table">
                    <div class="table-title">
                        <div style="width: 20%; font-weight: bold;">Mã NCC</div>
                        <div style="width: 30%; font-weight: bold;">Tên NCC</div>
                        <div style="width: 20%; font-weight: bold;">Ngày hợp tác</div>
                        <div style="width: 30%; font-weight: bold;">Thao tác</div>
                    </div>
                    <div><br></div>
                    <div><br></div>
                    <div style="overflow-y: scroll;">
                        <div class="table-items">
                            <div style="width: 20%;">NCC001</div>
                            <div style="width: 30%;">Gucci</div>
                            <div style="width: 20%;">29/03/2024</div>
                            <div class="staff">
                                <button type="button">Sửa</button>
                                <button type="button">X</button>
                            </div>
                        </div>
                        <div class="table-items">
                            <div style="width: 20%;">NCC001</div>
                            <div style="width: 30%;">Gucci</div>
                            <div style="width: 20%;">29/03/2024</div>
                            <div class="staff">
                                <button type="button">Sửa</button>
                                <button type="button">X</button>
                            </div>
                        </div>
                        <div class="table-items">
                            <div style="width: 20%;">NCC001</div>
                            <div style="width: 30%;">Gucci</div>
                            <div style="width: 20%;">29/03/2024</div>
                            <div class="staff">
                                <button type="button">Sửa</button>
                                <button type="button">X</button>
                            </div>
                        </div>
                        <div class="table-items">
                            <div style="width: 20%;">NCC001</div>
                            <div style="width: 30%;">Gucci</div>
                            <div style="width: 20%;">29/03/2024</div>
                            <div class="staff">
                                <button type="button">Sửa</button>
                                <button type="button">X</button>
                            </div>
                        </div>
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
    </script>
</body>

</html>