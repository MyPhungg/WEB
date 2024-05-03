<!DOCTYPE html>
<html>

<head>
    <title>Chi tiết hóa đơn</title>
    <link rel="stylesheet" href="../css/chitiethoadon.css" />
    <link rel="stylesheet" href="../css/dsnv.css" />
    <link rel="stylesheet" href="../css/phieuxuat.css" />
    <link rel="stylesheet" href="style.css?version=1.0">
</head>

<body>
    <div>
        <div class="title">Chi tiết đơn hàng</div>
        <div class="title">Thống kê >> Chi tiết đơn hàng</div>
        <div id="flex-container">
            <div class="left">
                <div class="left-element">
                    <div class="status">
                        <div class="status-info">Tình trạng đơn hàng</div>
                        <div class="btn-done">Done</div>
                    </div>
                    <div><br></div>
                    <div class="table">
                        <div class="table-title">
                            <div style="width: 30%; font-weight: bold;">Sản phẩm</div>
                            <div style="width: 20%; font-weight: bold;">Đơn giá</div>
                            <div style="width: 20%; font-weight: bold;">Số lượng</div>
                            <div style="width: 30%; font-weight: bold;">Thành tiền</div>
                        </div>
                        <!-- <div style="height: 40px;"> <br></div> -->
                        <div><br></div>
                        <div><br></div>
                        <div class="table-items">
                            <div class="staff">
                                <div class="avt-sp"></div>
                                <div>Tên sản phẩm</div>
                            </div>
                            <div style="width: 20%;">100,000 VNĐ</div>
                            <div style="width: 20%;">2</div>
                            <div style="width: 30%;">200,000 VNĐ</div>
                        </div>
                        <div class="table-items">
                            <div class="staff">
                                <div class="avt-sp"></div>
                                <div>Tên sản phẩm</div>
                            </div>
                            <div style="width: 20%;">100,000 VNĐ</div>
                            <div style="width: 20%;">2</div>
                            <div style="width: 30%;">200,000 VNĐ</div>
                        </div>
                        <div class="table-items">
                            <div class="staff">
                                <div class="avt-sp"></div>
                                <div>Tên sản phẩm</div>
                            </div>
                            <div style="width: 20%;">100,000 VNĐ</div>
                            <div style="width: 20%;">2</div>
                            <div style="width: 30%;">200,000 VNĐ</div>
                        </div>
                        <div class="table-items">
                            <div class="staff">
                                <div class="avt-sp"></div>
                                <div>Tên sản phẩm</div>
                            </div>
                            <div style="width: 20%;">100,000 VNĐ</div>
                            <div style="width: 20%;">2</div>
                            <div style="width: 30%;">200,000 VNĐ</div>
                        </div>
                        <div class="horizontal-line"></div>
                        <div class="page">
                            < 1 2 3 ... >
                        </div>
                    </div>
                </div>
            </div>
            <div class="right">
                <div class="right-element">
                    <div class="cus-info">
                        <div class="avata"></div>
                        <div class="cus-info-name">
                            <div>Võ Lê Hoàng Tân</div>
                            <div style="font-weight: 400;">Thành phố Hồ Chí Minh</div>
                        </div>
                        <div class="btn-chitiet">Chi tiết</div>
                    </div>
                    <div class="address">
                        <div class="address-title">Địa chỉ giao hàng</div>
                        <div class="address-content">273 An Dương Vương, Phường 3, Quận 5, Thành phố Hồ Chí Minh</div>
                        <div class="address-sdt">0336-528-761</div>
                    </div>
                    <div class="order-info">
                        <div class="order-title">Thông tin đơn hàng</div>
                        <div class="order-content">
                            <div class="align-left">Tạm tính: </div>
                            <div class="align-right">800,000 VNĐ</div>
                        </div>
                        <div class="order-content">
                            <div class="align-left">Phí vận chuyển: </div>
                            <div class="align-right">20,000 VNĐ</div>
                        </div>
                        <div class="horizontal-line"></div>
                        <div class="order-content">
                            <div class="align-left">Tổng cộng: </div>
                            <div class="order-price">820,000 VNĐ</div>
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
    <title>Chi tiết hóa đơn</title>
    <style>
        .order-detail-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            font-family: Arial, sans-serif;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .breadcrumb {
            color: #666;
            margin-bottom: 10px;
            font-size: 14px;
        }

        .breadcrumb-separator {
            margin: 0 5px;
        }

        .order-status {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .status-label {
            font-weight: bold;
            font-size: 16px;
        }

        .done-btn {
            background-color: #8b008b;
            color: #fff;
            border: none;
            padding: 8px 16px;
            cursor: pointer;
            font-size: 14px;
            border-radius: 5px;
        }

        .customer-info {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            background-color: #f5f5f5;
            padding: 10px;
            border-radius: 5px;
        }

        .customer-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .customer-details {
            flex: 1;
        }

        .customer-name {
            font-weight: bold;
            margin-right: 10px;
            font-size: 16px;
        }

        .customer-location {
            font-size: 14px;
            color: #666;
        }

        .detail-btn {
            background-color: #8b008b;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            font-size: 14px;
            border-radius: 5px;
        }

        .address-info {
            background-color: #f5f5f5;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .address-info h3 {
            margin-top: 0;
        }

        .order-items {
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .item-header {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            background-color: #f5f5f5;
            padding: 10px;
            font-weight: bold;
            border-bottom: 1px solid #ccc;
        }

        .item-row {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            border-bottom: 1px solid #ccc;
            padding: 10px;
        }

        .item-name {
            font-weight: bold;
        }

        .order-summary {
            background-color: #f5f5f5;
            padding: 10px;
            border-radius: 5px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
        }

        .total .summary-value {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="order-detail-container">
        <div class="breadcrumb">
            <span>Thống kê</span> <span class="breadcrumb-separator">>></span> <span>Chi tiết hóa đơn</span>
        </div>
        <div class="order-status">
            <span class="status-label">Tình trạng đơn hàng</span>
            <button class="done-btn">Done</button>
        </div>
        <div class="customer-info">
            <img src="avatar.png" alt="Customer Avatar" class="customer-avatar" />
            <div class="customer-details">
                <span class="customer-name">Vo Le Hoang Tan</span>
                <span class="customer-location">Thanh pho Ho Chi Minh</span>
            </div>
            <button class="detail-btn">Chi tiết</button>
        </div>
        <div class="address-info">
            <h3>Địa chỉ giao hàng</h3>
            <p>273 An Duong Vuong, Phuong 3, Quan 5, Thanh pho Ho Chi minh</p>
            <p>0336-528-761</p>
        </div>
        <div class="order-items">
            <div class="item-header">
                <span>Sản phẩm</span>
                <span>Đơn giá</span>
                <span>Số lượng</span>
                <span>Thành tiền</span>
            </div>
            <div class="item-row">
                <span class="item-name">Tên sản phẩm</span>
                <span class="item-price">100,000 VND</span>
                <span class="item-quantity">2</span>
                <span class="item-total">200,000 VND</span>
            </div>
            
        </div>
        <div class="order-summary">
            <h3>Thông tin đơn hàng</h3>
            <div class="summary-row">
                <span class="summary-label">Tạm tính:</span>
                <span class="summary-value">800,000 VND</span>
            </div>
            <div class="summary-row">
                <span class="summary-label">Phí vận chuyển:</span>
                <span class="summary-value">20,000 VND</span>
            </div>
            <div class="summary-row total">
                <span class="summary-label">Tổng cộng:</span>
                <span class="summary-value">820,000 VND</span>
            </div>
        </div>
    </div>
</body>

</html> -->