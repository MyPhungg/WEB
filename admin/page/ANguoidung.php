<?php

    $server ='localhost';
    $user ='root';
    $pass = '';
    $database = 'bolashop';

    $db = new mysqli($server, $user, $pass,$database);

    if($db)
    {
        mysqli_query($db,"SET NAMES 'utf8' ");
    }
    else
    {
        echo 'ket noi that bai';
    }

    // $sql = "SELECT * FROM nguoidung Where Loainguoidung='KH' ";
    $sql = "SELECT * FROM nguoidung WHERE Loainguoidung != 'Q1'";
    $result = $db->query($sql);

    
    
?>



<!DOCTYPE html>
<html>

<head>
    <title>Danh sách người dùng</title>

    <link rel="stylesheet" href="../css/phieuxuat.css?version=1.0">
    <link rel="stylesheet" href="../css/chitiethoadon.css?version=1.0">
    <link rel="stylesheet" href="../css/dsnv.css?version=1.0">
    <!-- <link rel="stylesheet" href="style.css?version=1.0"> -->

    <style>
        

    </style>
</head>

<body>
    





    <div style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
        <div class="title">Người dùng</div>
        <div class="btn-ThemNV" onclick="window.location.href='themnguoidungmoi.php'"> + Thêm người dùng mới</div>
        <div style="clear: both;"></div>
        <input class="search" type="text" name="txtTimKiem" placeholder="Tìm kiếm...">
        <div><br></div>
        <div style="display: flex; justify-content: center;">
            <div class="table">
                <div class="table-title">
                    <div style="width: 30%; font-weight: bold;">Họ tên</div>
                    <div style="width: 20%; font-weight: bold;">Mã người dùng</div>
                    <div style="width: 20%; font-weight: bold;">Nhóm quyền</div>
                    <div style="width: 30%; font-weight: bold;">Trạng thái</div>
                </div>
                <div><br></div>
                <div><br></div>
                <div style="overflow-y: scroll;">
                    <?php
                    // Hiển thị dữ liệu từ kết quả truy vấn
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="table-items">';
                            echo '<div class="staff" >';
                            echo '<div class="avt"></div>';
                            echo '<div>' . $row['Ten'] . '</div>';
                            echo '</div>';
                            echo '<div style="width: 20%;">' . $row['Manguoidung'] . '</div>';
                            echo '<div style="width: 20%;">';
                            echo '<div class="button">' . $row['Loainguoidung'] . '</div>';
                            echo '</div>';
                            echo '<div class="staff" data-id="' . $row['Manguoidung'] . '">';//staff
                            echo '<select>';
                            if ($row['Loainguoidung'] == 'KH') {
                                echo '<option value="1">Đã duyệt</option>';
                                // echo '<option value="0">Chưa duyệt</option>';
                            } else {
                                echo '<option value="0">Chưa duyệt</option>'; 
                                // echo '<option value="1">Đã duyệt</option>';
                            }
                            echo '</select>';
                            echo '<button type="button" class="edit-btn">Sửa</button>';
                            echo '<button type="button" class="delete-btn" >X</button>';
                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo "Không có dữ liệu";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
//xoa người dùng
$(document).ready(function() {
    $('.delete-btn').click(function() {

        var id = $(this).closest('.staff').data('id');
        $.ajax({
            type: 'POST',
            url: 'xoanguoidung.php', 
            data: { id: id },
            success: function(response) { 
                             
                if(response = 'success')  
                {
                    alert ("Đã xóa người dùng có id là: " + id);
                    location.reload();  
                }            
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
});
//sửa người dùng
$(document).ready(function() {
    $('.edit-btn').click(function() {
        // Lấy id của người dùng
        var id = $(this).closest('.staff').data('id');
        
        // Chuyển hướng đến trang suanguoidung.php với tham số id
        window.location.href = 'suanguoidung.php?id=' + id;
    });
});


</script>

<!-- <!DOCTYPE html>
<html>

<head>
    <title>Danh sách nhân viên</title>
    <style>
        .employee-list {
            width: 500px;
            padding: 20px;
            background-color: #f5f5f5;
            border: 1px solid #ccc;
        }

        .employee-list h2 {
            color: #333;
        }

        .add-employee {
            background-color: #8b008b;
            color: #fff;
            border: none;
            padding: 8px 16px;
            cursor: pointer;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #fff;
            padding: 8px;
            border: 1px solid #ccc;
            margin-bottom: 8px;
        }

        .employee-info {
            display: flex;
            align-items: center;
        }

        .employee-info img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 8px;
        }

        .employee-actions button {
            background-color: #8b008b;
            color: #fff;
            border: none;
            padding: 4px 8px;
            cursor: pointer;
            margin-left: 8px;
        }

        .delete-btn {
            background-color: #ff0000;
        }

        .pagination {
            text-align: center;
            margin-top: 16px;
        }
    </style>
</head>
<body>
    <div class="employee-list">
        <h2>Nhân viên</h2>
        <button class="add-employee">+ Thêm nhân viên mới</button>
        <input type="text" placeholder="Tìm kiếm...">
        <ul>
          <li>
            <div class="employee-info">
              <img src="avatar.png" alt="Ảnh nhân viên">
              <span class="employee-name">Tên nhân viên</span>
              <span class="employee-id">NV001</span>
            </div>
            <div class="employee-actions">
              <button class="edit-btn">Phân quyền</button>
              <button class="delete-btn">Bình thường</button>
            </div>
          </li>
        </ul>
        <div class="pagination">1 - 5 of 40 < ></div>
      </div>
</body>
</html> -->