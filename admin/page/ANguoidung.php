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
        <div class="title">Nhân viên</div>
        <div class="btn-ThemNV"> + Thêm người dùng mới</div>
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
                    <div class="table-items">
                        <div class="staff">
                            <div class="avt"></div>
                            <div>Võ Lê Hoàng Tân</div>
                        </div>
                        <div style="width: 20%;">NV001</div>
                        <div style="width: 20%;">
                            <div class="button">abc</div>
                        </div>
                        <div class="staff">
                            <select>
                                <option value="1">Đã duyệt</option>
                                <option value="1">Chưa duyệt</option>
                            </select>
                            <button type="button">Sửa</button>
                            <button type="button">X</button>
                        </div>
                    </div>
                    <div class="table-items">
                        <div class="staff">
                            <div class="avt"></div>
                            <div>Võ Lê Hoàng Tân</div>
                        </div>
                        <div style="width: 20%;">NV001</div>
                        <div style="width: 20%;">
                            <div class="button">abc</div>
                        </div>
                        <div class="staff">
                            <select>
                                <option value="1">Đã duyệt</option>
                                <option value="1">Chưa duyệt</option>
                            </select>
                            <button type="button">Sửa</button>
                            <button type="button">X</button>
                        </div>
                    </div>
                    <div class="table-items">
                        <div class="staff">
                            <div class="avt"></div>
                            <div>Võ Lê Hoàng Tân</div>
                        </div>
                        <div style="width: 20%;">NV001</div>
                        <div style="width: 20%;">
                            <div class="button">abc</div>
                        </div>
                        <div class="staff">
                            <select>
                                <option value="1">Đã duyệt</option>
                                <option value="1">Chưa duyệt</option>
                            </select>
                            <button type="button">Sửa</button>
                            <button type="button">X</button>
                        </div>
                    </div>
                    <div class="table-items">
                        <div class="staff">
                            <div class="avt"></div>
                            <div>Võ Lê Hoàng Tân</div>
                        </div>
                        <div style="width: 20%;">NV001</div>
                        <div style="width: 20%;">
                            <div class="button">abc</div>
                        </div>
                        <div class="staff">
                            <select>
                                <option value="1">Đã duyệt</option>
                                <option value="1">Chưa duyệt</option>
                            </select>
                            <button type="button">Sửa</button>
                            <button type="button">X</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>


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