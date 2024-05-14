<!DOCTYPE html>
<html>

<head>
    <title>Danh sách thương hiệu</title>

    <link rel="stylesheet" href="../css/phieuxuat.css">
    <link rel="stylesheet" href="../css/chitiethoadon.css">
    <link rel="stylesheet" href="../css/dsnv.css">
    <!-- <link rel="stylesheet" href="style.css?version=1.0"> -->

    <style>

    </style>
</head>

<body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <div style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
        <div class="title">Danh sách thương hiệu</div>
        <div class="btn-ThemNV" onclick="window.location.href='AHome.php?chon=t&id=thuonghieu&loai=them'"> + Thêm thương hiệu</div>
        <div style="clear: both;"></div>
        <input class="search" type="text" name="txtTimKiem" placeholder="Tìm kiếm...">
        <div><br></div>
        <div style="display: flex; justify-content: center;">
            <div class="table">
                <div class="table-title">
                    <div style="width: 35%; font-weight: bold;">Mã thương hiệu</div>
                    <div style="width: 35%; font-weight: bold;">Tên thương hiệu</div>
                    <div style="width: 30%; font-weight: bold;">Thao tác</div>
                    <div><br></div>
                    <div><br></div>
                    <div style="overflow-y: scroll;"></div>
                </div>
                <div><br></div>
                <div><br></div>
                <div style="overflow-y: scroll;">
                    <?php
                    $server = 'localhost';
                    $user = 'root';
                    $pass = '';
                    $database = 'bolashop';

                    $db = new mysqli($server, $user, $pass, $database);

                    if ($db) {
                        mysqli_query($db, "SET NAMES 'utf8'");
                    } else {
                        echo 'Kết nối thất bại';
                        exit();
                    }

                    $sql = "SELECT * FROM thuonghieu";
                    $result = $db->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="table-items">';
                            echo '<div style="width: 35%;">' . $row['Mathuonghieu'] . '</div>';
                            echo '<div style="width: 35%;">' . $row['tenThuonghieu'] . '</div>';
                            echo '<div style="width: 30%;">';
                            echo '<div style="display: flex; flex-direction: row;justify-content: space-evenly;align-items: center;" data-id="' . $row['Mathuonghieu'] . '">';
                            echo '<button type="button" class="edit-btn" style="background-color: ##D61EAD; border: solid 0.5px #D61EAD; color: black;">Sửa</button>';
                            echo '<button type="button" class="DLT" style="background-color: white; border: solid 0.5px #D61EAD; color: black;">Xóa</button>';
                            echo '</div>'; // staff
                            echo '</div>'; // table-items
                            echo '</div>'; // container
                        }
                    } else {
                        echo '<div>Không có dữ liệu</div>';
                    }

                    $db->close();
                    ?>
                </div>

                <div class="horizontal-line"></div>
                <div class="page">
                </div>

            </div>
        </div>

    </div>
</body>

</html>
<script>
//xóa thương hiệu
$(document).ready(function() {
    $('.DLT').click(function() {
        var id = $(this).parents('.staff').data('id');
        $.ajax({
            type: 'POST',
            url: 'xoathuonghieu.php', 
            data: { id: id },
            success: function(response) { 
                if(response === 'success') {
                    alert("Đã xóa thương hiệu có id là: " + id);
                    location.reload();  
                } else {
                    alert("Có lỗi xảy ra: " + response);
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });

    $('.edit-btn').click(function() {
        var id = $(this).parents('.staff').data('id');
        console.log(id);
        window.location.href = 'suanguoidung.php?maTH=' + id;
    });
});
// sửa
// $(document).ready(function() {
//     $('.edit-btn').click(function() {
//         // Lấy id của thương hiệu
//         var id = $(this).closest('.staff').data('id');
//         console.log(id);
//         // Chuyển hướng đến trang suathuonghieu.php với tham số id
//         // window.location.href = 'suathuonghieu.php?maTH=' + id;//AHome.php?chon=t&id=thuonghieu&loai=sua&maTH=
//     });
// });


</script>
