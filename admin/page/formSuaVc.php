<html>
    <head>
        <meta charset="utf-8"/>
        <link href="../css/formthemKM.css?version=1.0" rel="stylesheet"/>
        <title>Form vận chuyển</title>
    </head>
    <body>
    <?php
       $con = mysqli_connect('localhost', 'root', '', 'bolashop');
        if(isset($_GET['idvc'])){
            $mavc = $_GET['idvc'];
            $sql="SELECT * FROM vanchuyen WHERE Mavc ='$mavd'";
            $query = mysqli_query($con, $sql);
            if(isset($_POST['submitBtn'])){
                $ma_vc = $_POST['Mavc'];
                $ten_vc = $_POST['Ten'];
               
                $phivc = $_POST['Gia'];
            
                // Sử dụng prepared statements để bảo vệ dữ liệu và tránh lỗi SQL injection
                $sql = "UPDATE vanchuyen SET Ten=?, Gia=? WHERE Mavc=?";
                $stmt = mysqli_prepare($con, $sql);
            
                // Kiểm tra lỗi khi chuẩn bị truy vấn
                if ($stmt) {
                    mysqli_stmt_bind_param($stmt, "sss", $ten_vc, $phivc, $ma_vc);
                    mysqli_stmt_execute($stmt);
            
                    // Kiểm tra xem có hàng được cập nhật hay không
                    if (mysqli_stmt_affected_rows($stmt) > 0) {
                        header('Location: AHome.php?chon=t&id=vanchuyen');
                        exit(); // Kết thúc kịch bản sau khi chuyển hướng
                    } else {
                        echo "Không thể cập nhật phương thức vận chuyển.";
                    }
                    mysqli_stmt_close($stmt);
                } else {
                    echo "Lỗi trong quá trình chuẩn bị truy vấn.";
                }
            } else {
                echo "Dữ liệu không được gửi đi.";
            }
            
        }
       mysqli_close($con);
        ?>
        <div class="form-km">
            <form class="formkhuyenmai" id="formkhuyenmai" method="get" action="">
            <h3>Vận chuyển</h3>
                <label for="txtMakh">Mã vận chuyển</label>
                <input type="text" name="Mavc" value="" />

                <label for="txtTenkh">Tên vận chuyển</label>
                <input type="text" name="Ten" value="" />

                <label for="txtSale">Phí vận chuyển</label>
                <input type="text" name="Gia" value="" />


                

                <div class="group-btn">
                    <button type="button" id="delBtn" class="delBtn">Hủy</button>
                    <button type="reset" id="resetBtn" class="resetBtn">Đặt lại</button>
                    <button type="Submit" id="submitBtn" class="submitBtn">Lưu</button>
                </div>
            </form>
        </div>
    </body>
</html>