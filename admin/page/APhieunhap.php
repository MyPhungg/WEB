<!DOCTYPE html>
<html>

<head>
    <title>Danh sách phiếu nhập</title>

    <link rel="stylesheet" href="../css/phieuxuat.css?version=1.0">
    <link rel="stylesheet" href="../css/chitiethoadon.css?version=1.0">
    <link rel="stylesheet" href="../css/dsnv.css?version=1.0">
    <link rel="stylesheet" href="../css/ncc.css?version=1.0">
    <!-- <link rel="stylesheet" href="style.css?version=1.0"> -->

    <style>
        a {
            color: white;
            direction: none;
        }

        .status-phieunhap {
            width: 20%;
            display: flex;
            flex-direction: row;
            justify-content: space-evenly;
            align-items: center;
        }

        #phieunhap {
            display: block;
        }

        .title-ctpn {
            display: flex;
            flex-direction: row;
            font-weight: bold;
        }

        /* .btn-ThemPN {
            /* float: right; 
            width: 100%;
            padding: 5px;
            background-color: #D61EAD;
            color: white;
            border-radius: 20px;
            text-align: center;
        } */

        /*sửa viền*/
        .wrapper-ctpn {
            /*border: solid 0.5px rgb(152, 152, 152);*/
            width: 90%;
            margin-top: 10px;
            margin-left: 5%;
            /* box-shadow: 0 7px 7px 0 rgb(87, 87, 87); */
            border-radius: 20px;
            padding-bottom: 40px;
        }

        .top {
            display: flex;
            flex-direction: row;
            width: 100%;
        }

        /*sửa*/
        .top-left {
            display: flex;
            flex-direction: column;
            width: 100%;
            margin-left: 30px;
        }

        /**/
        .top-items {
            margin: 5px;
            width: 80%;
        }

        .btn-Xem {
            margin: 5px;
            width: 80%;
            padding: 5px;
            background-color: #D61EAD;
            color: white;
            border-radius: 20px;
            text-align: center;
        }

        .btn-ThemPN {
            margin: 5px;
            width: 80%;
            padding: 5px;
            background-color: #D61EAD;
            color: white;
            border-radius: 20px;
            text-align: center;
        }

        /*sửa btn */
        .btn-HoanTat {
            float: right;
            margin-right: 40px;
            width: 20%;
            padding: 5px;
            background-color: #D61EAD;
            color: white;
            border-radius: 20px;
            text-align: center;
            margin-top: 20px;
        }

        #chiTietPhieuNhap {
            margin: 10%;
            display: none;
        }

        #themPN {
            display: none;
            width: 100%;
            height: 100%;
        }

        #addPN {
            display: none;
            position: absolute;
            top: 0;
            left: 0;
            width: 80%;
            border: solid 0.5px black;
            margin: 10%;
            z-index: 1000;
            background-color: white;


        }

        .soluong {
            width: 20%;
            display: flex;
            flex-direction: row;
            justify-content: space-evenly;
            align-items: center;
        }

        /*thêm mới*/
        select {
            width: 125px;
            padding: 10px 12px;

            color: #000000;
            border-radius: 15px;
        }

        select:focus {
            border: #D61EAD 2px solid;
        }

        .total-price {
            font-size: 20px;
            margin-top: 15px;
            margin-left: 100px;

        }
    </style>
</head>

<body>

    <form id="addPN">
        <div id="themPN">
            <!-- <div class="title-ctpn">
                <div>Phiếu nhập >> </div>
                <div> Thêm phiếu nhập mới</div>
            </div> -->

            <!-- </div> -->
            <div class="wrapper-ctpn">
                <div class="top">
                    <div class="top-left">
                        <!--sửa-->
                        <div class="top-items">Mã sản phẩm</div>
                        <select>
                            <option value="1" id="id-Sp" selected>1</option>
                            <option value="1" id="id-Sp" selected>1</option>
                            <option value="1" id="id-Sp" selected>1</option>
                        </select>
                        <button class="btn-ThemPN">+ Thêm</button>


                    </div>
                    <!--sửa-->
                    <div class="top-left">
                        <div class="top-items">Phiếu nhập</div>
                        <select>
                            <option value="1" id="id-Sp" selected>1-CTY1</option>
                            <option value="1" id="id-Sp" selected>1-CTY2</option>
                            <option value="1" id="id-Sp" selected>1-CTY3</option>
                        </select>
                        <button class="btn-ThemPN">+ Thêm sản phẩm mới</button>

                    </div>
                    <div class="top-left">
                        <div class="top-items">Mã nhà cung cấp</div>
                        <select>
                            <option value="1" id="id-Sp" selected>1-CTY1</option>
                            <option value="1" id="id-Sp" selected>1-CTY2</option>
                            <option value="1" id="id-Sp" selected>1-CTY3</option>
                        </select>

                    </div>
                    <!--sửa-->
                    <div class="top-left">
                        <div class="top-items">Đơn giá</div>
                        <input type="text" class="top-items" name="txtMaNCC">
                        <!-- <button class="btn-Xem">Xem thông tin</button> -->
                    </div>
                    <div class="top-left">
                        <div class="top-items">Số lượng</div>
                        <input type="text" class="top-items" name="txtMaNV">
                    </div>
                </div>
                <div style="display: flex; justify-content: center;">
                    <div class="table">
                        <div class="table-title">
                            <div style="width: 20%; font-weight: bold;">Mã sản phẩm</div>
                            <div style="width: 30%; font-weight: bold;">Sản phẩm</div>
                            <div style="width: 30%; font-weight: bold;">Đơn giá</div>
                            <div style="width: 20%; font-weight: bold;">Số lượng</div>

                        </div>
                        <div><br></div>
                        <div><br></div>
                        <div style="overflow-y: scroll;">
                            <div class="table-items">
                                <div style="width: 20%;">SP001</div>
                                <div class="staff">
                                    <div class="avt-sp"></div>
                                    <div>Len milk cotton</div>
                                </div>
                                <div style="width: 30%;">15000 VNĐ
                                </div>
                                <div class="soluong">
                                    <input type="text" value="1" style="text-align: center;width: 60%;">
                                    <button type="button">X</button>

                                </div>
                            </div>
                            <div class="table-items">
                                <div style="width: 20%;">SP001</div>
                                <div class="staff">
                                    <div class="avt-sp"></div>
                                    <div>Len milk cotton</div>
                                </div>
                                <div style="width: 30%;">15000 VNĐ
                                </div>
                                <div class="soluong">
                                    <input type="text" value="1" style="text-align: center;width: 60%;">
                                    <button type="button">X</button>

                                </div>
                            </div>
                            <div class="table-items">
                                <div style="width: 20%;">SP001</div>
                                <div class="staff">
                                    <div class="avt-sp"></div>
                                    <div>Len milk cotton</div>
                                </div>
                                <div style="width: 30%;">15000 VNĐ
                                </div>
                                <div class="soluong">
                                    <input type="text" value="1" style="text-align: center;width: 60%;">
                                    <button type="button">X</button>

                                </div>
                            </div>
                            <div class="table-items">
                                <div style="width: 20%;">SP001</div>
                                <div class="staff">
                                    <div class="avt-sp"></div>
                                    <div>Len milk cotton</div>
                                </div>
                                <div style="width: 30%;">15000 VNĐ
                                </div>
                                <div class="soluong">
                                    <input type="text" value="1" style="text-align: center;width: 60%;">
                                    <button type="button">X</button>

                                </div>
                            </div>
                        </div>
                    </div>


                </div>

                <!--sửa: đem ra ngoài div-->
                <div id="end-themPN">
                    <div class="total-price"><b>Tổng Tiền:</b>
                        <input type="text" name="txtTongtien" id="txtTongtien">
                        VND
                    </div>
                    <div style="display: flex; flex-direction: row; justify-content:right;">
                        <!--  onclick="closeThemPhieuNhap()"><a href="AHome.php?chon=t&id=phieunhap"
                 onclick="closeThemPhieuNhap()"><a href="AHome.php?chon=t&id=phieunhap"-->
                        <button class="btn-HoanTat">Hủy</button>
                        <button class="btn-HoanTat">Hoàn tất</button>

                    </div>
                </div>
                <!-- <div class="return"><a href="#"><<  Quay lại</a></div> -->
            </div>
    </form>

    </div>
    <div id="chiTietPhieuNhap">
        <div class="title-ctpn">
            <div>Phiếu nhập >> </div>
            <div> Chi tiết phiếu nhập</div>
        </div>
        <div class="btn-ThemPN" onclick="">Sửa</div>
        <div style="clear: both;"></div>

        <!-- </div> -->
        <div class="wrapper-ctpn">
            <div class="top">
                <div class="top-left">
                    <div class="top-items">Mã phiếu nhập</div>
                    <input type="text" class="top-items" name="txtMaPN">
                </div>
                <div class="top-left">
                    <div class="top-items">Mã nhà cung cấp</div>
                    <input type="text" class="top-items" name="txtMaNCC">
                    <button class="btn-Xem">Xem thông tin</button>
                </div>
                <div class="top-left">
                    <div class="top-items">Mã nhân viên nhập hàng</div>
                    <input type="text" class="top-items" name="txtMaNV">
                    <button class="btn-Xem">Xem thông tin</button>
                </div>
                <div class="top-left">
                    <div class="top-items">Ngày tạo</div>
                    <input type="text" class="top-items" name="txtNgaytao">
                </div>
                <div class="top-left">
                    <div class="top-items">Tổng tiền</div>
                    <input type="text" class="top-items" name="txtMaNV">
                </div>
            </div>
            <div style="display: flex; justify-content: center;">
                <div class="table">
                    <div class="table-title">
                        <div style="width: 30%; font-weight: bold;">Sản phẩm</div>
                        <div style="width: 20%; font-weight: bold;">Mã sản phẩm</div>
                        <div style="width: 30%; font-weight: bold;">Đơn giá</div>
                        <div style="width: 20%; font-weight: bold;">Số lượng</div>

                    </div>
                    <div><br></div>
                    <div><br></div>
                    <div style="overflow-y: scroll;">
                        <div class="table-items">
                            <div class="staff">
                                <div class="avt-sp"></div>
                                <div>Len milk cotton</div>
                            </div>
                            <div style="width: 20%;">SP001</div>
                            <div style="width: 30%;">15000 VNĐ
                            </div>
                            <div style="width: 20%;">
                                <input type="text" value="1" readonly style="text-align: center;width: 90%;">
                            </div>
                        </div>
                        <div class="table-items">
                            <div class="staff">
                                <div class="avt-sp"></div>
                                <div>Len milk cotton</div>
                            </div>
                            <div style="width: 20%;">SP001</div>
                            <div style="width: 30%;">15000 VNĐ
                            </div>
                            <div style="width: 20%;">
                                <input type="text" value="1" readonly style="text-align: center;width: 90%;">
                            </div>
                        </div>
                        <div class="table-items">
                            <div class="staff">
                                <div class="avt-sp"></div>
                                <div>Len milk cotton</div>
                            </div>
                            <div style="width: 20%;">SP001</div>
                            <div style="width: 30%;">15000 VNĐ
                            </div>
                            <div style="width: 20%;">
                                <input type="text" value="1" readonly style="text-align: center;width: 90%;">
                            </div>
                        </div>
                        <div class="table-items">
                            <div class="staff">
                                <div class="avt-sp"></div>
                                <div>Len milk cotton</div>
                            </div>
                            <div style="width: 20%;">SP001</div>
                            <div style="width: 30%;">15000 VNĐ
                            </div>
                            <div style="width: 20%;">
                                <input type="text" value="1" readonly style="text-align: center;width: 90%;">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div id="phieunhap">
        <div style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
            <div class="title">Phiếu nhập</div>
            <div class="btn-ThemNV" onclick="showThemPhieuNhap()"> + Thêm phiếu nhập</div>
            <div style="clear: both;"></div>
            <input class="search" type="text" name="txtTimKiem" placeholder="Tìm kiếm...">
            <div><br></div>
            <div style="display: flex; justify-content: center;">
                <div class="table">
                    <div class="table-title">
                        <div style="width: 20%; font-weight: bold;">Mã phiếu nhập</div>
                        <div style="width: 20%; font-weight: bold;">Mã nhân viên</div>
                        <div style="width: 20%; font-weight: bold;">Mã NCC</div>
                        <div style="width: 20%; font-weight: bold;">Ngày tạo</div>
                        <div style="width: 20%; font-weight: bold;">Thao tác</div>
                    </div>
                    <div><br></div>
                    <div><br></div>
                    <div style="overflow-y: scroll;">
                        <!-- hàm showChiTiet chưa dùng được -->
                        <div class="table-items" onclick="showChiTiet()"> 
                            <div style="width: 20%;">PN001</div>
                            <div style="width: 20%;">NV001</div>
                            <div style="width: 20%;">NCC001</div>
                            <div style="width: 20%;">29/03/2024</div>
                            <div class="status-phieunhap">
                                <!-- <div>Bình thường</div> -->
                                <button type="button">X</button>
                            </div>
                        </div>
                        <div class="table-items">
                            <div style="width: 20%;">PN001</div>
                            <div style="width: 20%;">NV001</div>
                            <div style="width: 20%;">NCC001</div>
                            <div style="width: 20%;">29/03/2024</div>
                            <div class="status-phieunhap">
                                <!-- <div>Bình thường</div> -->
                                <button type="button">X</button>
                            </div>
                        </div>
                        <div class="table-items">
                            <div style="width: 20%;">PN001</div>
                            <div style="width: 20%;">NV001</div>
                            <div style="width: 20%;">NCC001</div>
                            <div style="width: 20%;">29/03/2024</div>
                            <div class="status-phieunhap">
                                <!-- <div>Bình thường</div> -->
                                <button type="button">X</button>
                            </div>
                        </div>
                        <div class="table-items">
                            <div style="width: 20%;">PN001</div>
                            <div style="width: 20%;">NV001</div>
                            <div style="width: 20%;">NCC001</div>
                            <div style="width: 20%;">29/03/2024</div>
                            <div class="status-phieunhap">
                                <!-- <div>Bình thường</div> -->
                                <button type="button">X</button>
                            </div>
                        </div>
                    </div>
                   

                </div>
            </div>

        </div>
    </div>
    <script>
        function showThemPhieuNhap() {
            var a = document.getElementById('themPN');
            var b = document.getElementById('addPN');
            a.style.display = "block";
            b.style.display = "block";

        }

        function closeThemPhieuNhap() {
            var a = document.getElementById('themPN');
            var b = document.getElementById('addPN');
            a.style.display = "none";
            b.style.display = "none";
        }

        function showChiTiet() {
            document.getElementById('chiTietPhieuNhap').style.display = "block";
            document.getElementById('phieunhap').style.display = "none";
        }
    </script>
</body>

</html>