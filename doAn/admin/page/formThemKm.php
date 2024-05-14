<html>
    <head>
        <meta charset="utf-8"/>
        <link href="../css/formthemKM.css?version=1.0" rel="stylesheet"/>
        <title>Form thêm khuyến mãi</title>
    </head>
    <body>
        <div class="form-km">
            <form class="formkhuyenmai" id="formkhuyenmai" method="get" action="">
                <h3>Khuyến mãi</h3>
                <label for="txtMakh">Mã khuyến mãi</label>
                <input type="text" name="txtMakh" value="" placeholder="Nhập vào mã khuyến mãi..."/>

                <label for="txtTenkh">Tên khuyến mãi</label>
                <input type="text" name="txtTenkh" value="" placeholder="Nhập vào tên mã khuyến mãi..."/>

                <label for="startDate">Ngày bắt đầu</label>
                <input type="date" name="startDate" id="startDate" value=""/>

                <label for="endDate">Ngày kết thúc</label>
                <input type="date" name="endDate" id="endDate" value="" />

                <label for="txtSale">Mức giảm</label>
                <input type="text" name="txtSale" value="" />

                <label for="txtMota">Mô tả</label>
                <input type="text" name="txtMota" value="" placeholder="Nhập vào mô tả khuyến mãi..."/>

                <div class="group-btn">
                    <button type="button" id="delBtn" class="delBtn">Hủy</button>
                    <button type="reset" id="resetBtn" class="resetBtn">Đặt lại</button>
                    <button type="Submit" id="submitBtn" class="submitBtn">Lưu</button>
                </div>
            </form>
        </div>
    </body>
</html>