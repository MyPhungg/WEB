<html>
    <head>
        <meta charset="utf-8"/>
        <link href="../css/formthemKM.css?version=1.0" rel="stylesheet"/>
        <title>Form vận chuyển</title>
    </head>
    <body>
        <div class="form-km">
            <form class="formkhuyenmai" id="formkhuyenmai" method="get" action="">
                <h3>Vận chuyển</h3>
                <label for="txtMakh">Mã vận chuyển</label>
                <input type="text" name="txtMakh" value="" />

                <label for="txtTenkh">Tên vận chuyển</label>
                <input type="text" name="txtTenkh" value="" />

                <label for="txtSale">Phí vận chuyển</label>
                <input type="text" name="txtSale" value="" />

                

                <div class="group-btn">
                    <button type="button" id="delBtn" class="delBtn">Hủy</button>
                    <button type="reset" id="resetBtn" class="resetBtn">Đặt lại</button>
                    <button type="Submit" id="submitBtn" class="submitBtn">Lưu</button>
                </div>
            </form>
        </div>
    </body>
</html>