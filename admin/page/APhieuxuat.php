<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Phiếu xuất</title>
    <link rel="stylesheet" href="../css/thongke.css">
    <link rel="stylesheet" href="../css/chitiethoadon.css">
    <link rel="stylesheet" href="../css/phieuxuat.css">
    <link rel="stylesheet" href="../css/dsnv.css">
    <link rel="stylesheet" href="style.css?version=1.0">


</head>

<body>
    <div style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
        <div id="title">Thống kê</div>
        <div id="grid-container">
            <div class="grid-items">
                <div class="text-top-left">Số sản phẩm đã bán</div>
                <div class="number-center-left">120</div>
                <div class="text-center-right">Sản phẩm</div>
            </div>
            <div class="grid-items">
                <div class="text-top-left">Tổng doanh thu</div>
                <div class="number-center-left">36,450,000</div>
                <div class="text-center-right">VNĐ</div>
            </div>
            <div class="grid-items">
                Ngày bắt đầu:
                <input type="date" id="start-date" />
                Ngày kết thúc:
                <input type="date" id="end-date" />
                <button type="button" class="filter-btn">Lọc</button>
            </div>

        </div>
        <div id="title">Danh sách hóa đơn</div>

        <div id="wrapper">
            <div class="table">
                <div class="table-title">
                    <div style="width: 20%; font-weight: bold;">Khách hàng</div>
                    <div style="width: 20%; font-weight: bold;">Ngày mua</div>
                    <div style="width: 20%; font-weight: bold;">Số hóa đơn</div>
                    <div style="width: 20%; font-weight: bold;">Tổng tiền</div>
                    <div style="width: 20%; font-weight: bold;">Trạng thái</div>
                </div>
                <div><br></div>
                <div><br></div>
                <div style="overflow-y: scroll;">
                    <div class="table-items">
                        <div class="customer">
                            <div class="avt"></div>
                            <div>KH001</div>
                        </div>
                        <div style="width: 20%;">29/03/2004</div>
                        <div style="width: 20%;">12011252_donhang</div>
                        <div style="width: 20%;">120210</div>
                        <div class="btn">
                            <select>
                                <option id="status" value="1">Hoàn thành</option>
                                <option id="status" value="1">Đang giao hàng</option>
                                <option id="status" value="1">Đã chuyển hàng</option>
                            </select>
                            <button type="button">Sửa</button>
                        </div>
                    </div>
                    <div class="table-items">
                        <div class="customer">
                            <div class="avt"></div>
                            <div>KH001</div>
                        </div>
                        <div style="width: 20%;">29/03/2004</div>
                        <div style="width: 20%;">12011252_donhang</div>
                        <div style="width: 20%;">120210</div>
                        <div class="btn">
                            <select>
                                <option id="status" value="1">Hoàn thành</option>
                                <option id="status" value="1">Đang giao hàng</option>
                                <option id="status" value="1">Đã chuyển hàng</option>
                            </select>
                            <button type="button">Sửa</button>
                        </div>
                    </div>
                    <div class="table-items">
                        <div class="customer">
                            <div class="avt"></div>
                            <div>KH001</div>
                        </div>
                        <div style="width: 20%;">29/03/2004</div>
                        <div style="width: 20%;">12011252_donhang</div>
                        <div style="width: 20%;">120210</div>
                        <div class="btn">
                            <select>
                                <option id="status" value="1">Hoàn thành</option>
                                <option id="status" value="1">Đang giao hàng</option>
                                <option id="status" value="1">Đã chuyển hàng</option>
                            </select>
                            <button type="button">Sửa</button>
                        </div>
                    </div>
                    <div class="table-items">
                        <div class="customer">
                            <div class="avt"></div>
                            <div>KH001</div>
                        </div>
                        <div style="width: 20%;">29/03/2004</div>
                        <div style="width: 20%;">12011252_donhang</div>
                        <div style="width: 20%;">120210</div>
                        <div class="btn">
                            <select>
                                <option id="status" value="1">Hoàn thành</option>
                                <option id="status" value="1">Đang giao hàng</option>
                                <option id="status" value="1">Đã chuyển hàng</option>
                            </select>
                            <button type="button">Sửa</button>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <div class="return"><a href="#">
                << Quay lại</a>
        </div>
    </div>


</body>

</html>