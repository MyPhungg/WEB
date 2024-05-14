<html>
    <head>
        <meta charset="utf-8"/>
        <link href="../css/formthemKM.css?version=1.0" rel="stylesheet"/>
        <title>Form thương hiệu</title>
    </head>
    <body>
        <div class="form-km">
            <form class="formkhuyenmai" id="formkhuyenmai" method="get" action="">
                <h3>Thương hiệu</h3>
                <label for="txtMakh">Mã thương hiệu</label>
                <input type="text" name="txtMakh" value="" placeholder="Nhập vào mã khuyến mãi..."/>

                <label for="txtTenkh">Tên thương hiệu</label>
                <input type="text" name="txtTenkh" value="" placeholder="Nhập vào tên mã khuyến mãi..."/>

                <label>Nhà cung cấp</label>
                <select id="Ncc">
                    <option value="maNcc1" selected>NCC 1</option>
                    <option value="maNcc2">NCC 2</option>
                </select>

                <div class="group-btn">
                    <button type="button" id="delBtn" class="delBtn">Hủy</button>
                    <button type="reset" id="resetBtn" class="resetBtn">Đặt lại</button>
                    <button type="Submit" id="submitBtn" class="submitBtn">Lưu</button>
                </div>
            </form>
        </div>
    </body>
</html>