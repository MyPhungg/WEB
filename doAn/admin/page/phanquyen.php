<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">>
    <link rel="stylesheet" href="style.css?version=1.0">
    <link rel="stylesheet" href="../css/phanquyen.css">
    <title>Phân quyền</title>
    
</head>
<body>
  
    <div class="permission-group">
        <h2>Thêm/sửa nhóm quyền</h2>
        <div class="permission-group__input">
          <p>Tên nhóm quyền</p>
          <input type="text" id="txtNhomquyen"/>
        </div>
        <div class="permission-group__table">
          <div class="table-header">
            <div class="table-row">
              <div class="table-cell">Danh mục chức năng</div>
              <div class="table-cell">Xem</div>
              <div class="table-cell">Tạo mới</div>
              <div class="table-cell">Cập nhật</div>
              <div class="table-cell">Xóa</div>
            </div>
          </div>
          
          <div class="table-body">
          <?php
            $con = mysqli_connect("localhost", "root", "", "bolashop");
            $sql="SELECT *  from chucnang";
            $rs = mysqli_query($con,$sql);
            mysqli_close($con);
            while ($row = mysqli_fetch_array($rs)) {
              echo '<div class="table-row">
              <div class="table-cell">'.$row["Tenchucnang"].'</div>
              <div class="table-cell"><input type="checkbox" checked /></div>
              <div class="table-cell"><input type="checkbox" checked /></div>
              <div class="table-cell"><input type="checkbox" checked /></div>
              <div class="table-cell"><input type="checkbox" checked /></div>
            </div>';
            }
            ?>
            <!-- <div class="table-row">
              <div class="table-cell">Quản lý khách hàng</div>
              <div class="table-cell"><input type="checkbox" checked /></div>
              <div class="table-cell"><input type="checkbox" checked /></div>
              <div class="table-cell"><input type="checkbox" checked /></div>
              <div class="table-cell"><input type="checkbox" checked /></div>
            </div> -->
            <!-- Các dòng khác tương tự -->
          </div>
        </div>
        <div class="permission-group__actions">
          <button type="submit" class="btn btn--primary">Cập nhật</button>
          <button class="btn btn--danger">Hủy bỏ</button>
        </div>
      </div>
</body>

</html>