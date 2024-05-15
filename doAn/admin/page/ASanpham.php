<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/thongke.css?version=1.0">
    <link rel="stylesheet" href="../css/chitiethoadon.css?version=1.0">
    <link rel="stylesheet" href="../css/phieuxuat.css?version=1.0">
    <link rel="stylesheet" href="../css/dsnv.css?version=1.0">
    <link rel="stylesheet" href="../css/ncc.css?version=1.0">
    <link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/middle.css?version=1.0">
    <style>
        .btn_sua_sp {
            background: #D61EAD;
            color: #ffffff;
            border: 0.2px solid rgba(0, 0, 0, 0.6);
            margin-right: 55px;
            bottom: 40px;
            border-radius: 4px;
        }

        .btn_sua_sp:hover {
            background-color: #0056b3;
            /* Màu nền khi hover */
        }

        .item-actions {
            display: flex;
            align-items: center;
            padding-left: 300px;
            padding-top: 15px;
        }

        .delete-btn-sp {
            border: 0.2px solid rgba(0, 0, 0, 0.6);
            margin-left: 35px;
        }
    </style>
</head>

<body>
    <form action="" name="quanli_sp" method="get" class="ql_sp">
        <h1>Sản phẩm</h1>
        <div class="header-form-qlsp">
            <div class="text-thuonghieu">

            </div>
            <div class="btn-ThemNV" onclick="redirectToForm()"> + Thêm sản phẩm</div>
            <label for="">Tìm kiếm</label>
            <input type="text" id="searchInput" class="ip_timkiemsp" placeholder="Tìm kiếm">

        </div>
        <div class="content_form-qlsp">
            <div class="header-content-qlsp">
                <label for="">Sản phẩm</label>
                <label for="">Đơn giá</label>
                <label for="">Số lượng</label>
                <label for="">***</label>
            </div>

            <div class="content-item">
                <?php
                include("../page/connectDB.php");
                $sql_sanpham = mysqli_query($conn, "SELECT * FROM sanpham ORDER BY Masp ASC");
                while ($row_sanpham = mysqli_fetch_array($sql_sanpham)) {

                    echo '<div class="item" id="item-' . $row_sanpham["Masp"] . '">';
                    echo '<img src="../../img/' . $row_sanpham["Img"] . '" alt="">';
                    echo '<label class="item-tensp">' . $row_sanpham["Tensp"] . '</label>';
                    echo '<label class="item-dongia">' . $row_sanpham["Giaban"] . ' VND</label>';
                    echo '<label class="item-soluong">' . $row_sanpham["Soluongconlai"] . '</label>';
                    echo '<div class="item-actions">';
                    echo '<a href="AHome.php?chon=t&id=sanpham&loai=sua&Masp=' . $row_sanpham["Masp"] . '" class="btn_sua_sp">Sửa</a>';
                    echo '<button type="button" class="delete-btn-sp" onclick="deleteItem(\'' . $row_sanpham["Masp"] . '\')">Xóa</button>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>

            </div>
            <div class="page"> </div>
        </div>
        <script>
            function deleteItem(masp) {
                if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')) {
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', 'xulyxoasanpham.php', true);
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    xhr.onload = function() {
                        if (xhr.status === 200 && xhr.responseText.trim() === 'Xóa sản phẩm thành công!') {
                            alert('Xóa sản phẩm thành công!');
                            var element = document.getElementById('item-' + masp);
                            if (element) {
                                element.parentNode.removeChild(element);
                            }
                        } else {
                            alert('Đã xảy ra lỗi khi xóa sản phẩm: ' + xhr.responseText);
                        }
                    };
                    xhr.onerror = function() {
                        console.error('Đã xảy ra lỗi khi gửi yêu cầu AJAX');
                    };
                    xhr.send('Masp=' + encodeURIComponent(masp));
                }
            }



            function redirectToForm() {
                window.location.href = 'AHome.php?chon=t&id=sanpham&loai=them   ';
            }
        </script>
    </form>
</body>

</html>