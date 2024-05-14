<style>
    
    a{
        color: black;
        text-decoration: none;
    }
    .form_TTKhachHang{
        border: 2px solid black;
        padding: 20px;
    }
    .chuXam{
        color: #1f010193;
    }
    .ThongTinKhachHang{
        height: 400px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); 
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .ThongTinKhachHang-data1,.ThongTinKhachHang-data2{
        width: 30%;
    }
    .photo{
    width: 250px;
    height: 250px;
    background-color: #ddd;
    border-radius: 50%;
    overflow: hidden;
    position: relative;  
    margin: auto;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    }

    .ThongTinKhachHang input[type="text"],
    .ThongTinKhachHang input[type="password"] {
        width: 80%; /* Đặt chiều rộng của các trường nhập */
        margin-bottom: 10px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
    }
    .check-ThongTin{
        color: #D61EAD;
        text-decoration: none;
    }
    table {
        width: 100%;
        /* border-collapse: collapse; */
        border-collapse: separate;
        border-spacing: 0 40px;
    }
    tbody td{
        width: 50%;
        padding: 10px;
        border: 1px solid black;
    }
        .LuuND {
        background-color: #D61EAD;
        color: #fff;
        border: none;
        cursor: pointer;
        border-radius: 20px;
        width: 70%;
        padding: 15px 0;
        font-size: 16px;
        /* float: right; */
        margin-top: 30px;
        /* text-transform: uppercase; */
        /* align-self: center; */
    }

    select{
    width: 80%;
    margin-bottom: 10px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    }

    /* CSS khi nút được hover */
    .TaoND:hover {
        background-color: #A70087;
    }
</style>

<?php
// Kiểm tra xem id của người dùng đã được truyền qua URL chưa
if (isset($_GET['maND'])) {
    // Lấy id từ URL
    $id = $_GET['maND'];

    // Kết nối đến cơ sở dữ liệu và thực hiện truy vấn để lấy thông tin của người dùng
    $server ='localhost';
    $user ='root';
    $pass = '';
    $database = 'bolashop';

    $db = new mysqli($server, $user, $pass,$database);

    if($db) {
        mysqli_query($db,"SET NAMES 'utf8' ");
    } else {
        echo 'Kết nối database thất bại';
        exit; // Thoát khỏi script nếu không kết nối được với cơ sở dữ liệu
    }

    // Truy vấn để lấy thông tin của người dùng dựa trên id
    $sql = "SELECT * FROM nguoidung WHERE Manguoidung = '$id'";
    $result = $db->query($sql);

    // Kiểm tra xem có dữ liệu trả về từ truy vấn không
    if ($result->num_rows > 0) {
        // Lặp qua các dòng dữ liệu và hiển thị thông tin của người dùng trong các trường nhập liệu
        while ($row = $result->fetch_assoc()) {
            $ten = $row['Ten'];
            $sdt = $row['Sodienthoai'];
            $email = $row['Email'];
            $diachi = $row['Diachi'];
            $password = $row['Matkhau'];
            $status =$row['Loainguoidung'];
            $img = $row['img'];
            // Hiển thị form nhập liệu với các trường được điền sẵn thông tin của người dùng
            ?>
            <!DOCTYPE html>
            <html>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <body>
            <form id="SND" action="XLsuanguoidung.php" method="post">
            <h1>Sửa thông tin người dùng</h1>
            <p><a href="AHome.php">Trang chủ >> </a><span class="chuXam"><a href="AHome.php?chon=t&id=nguoidung">Người dùng >> </a>Sửa thông tin người dùng</span></p>
            <div class="ThongTinKhachHang">
                <div class="photo" style="background-image: url('../img/<?php echo $img; ?>');"></div>
                    <div class="ThongTinKhachHang-data1">
                    <p>Tên đăng nhập:</p>
                    <input type="text" name="id" id="id" value="<?php echo $id; ?>" readonly >
                    <p>Địa chỉ:</p>
                    <input type="text" name="address" id="address" value="<?php echo $diachi; ?>" >
                    <p>Mật khẩu:</p>
                    <input type="text" name="password" id="password" value="<?php echo $password; ?>" >
                    <p>Trạng thái:</p>
                    <?php if($status == 'KH'): ?>
                    
                        <select name="status" id="status">
                        <option value="KH" >Đã duyệt</option>
                        <option value="Q0" >Chưa duyệt</option>
                        </select>
                    
                    <?php else: ?>
                        <select name="status" id="status">
                        <option value="Q0" >Chưa duyệt</option>
                        <option value="KH" >Đã duyệt</option>
                        </select>
                    <?php endif; ?>
                </div>
                <div class="ThongTinKhachHang-data2">
                    <p>Họ tên:</p>
                    <input type="text" name="name" id="name" value="<?php echo $ten; ?>" >
                    <p>Số điện thoại:</p>
                    <input type="text" name="phone" id="phone" value="<?php echo $sdt; ?>" >
                    <p>Email:</p>
                    <input type="text" name="email" id="email" value="<?php echo $email; ?>" >

                    <input type="submit" class="LuuND"  value="Lưu">
                </div>
            </div>    
        </form>
        </body>
        </html>
        <script>
$(document).ready(function(){
    $("#SND").submit(function(event){
        event.preventDefault();

        

        var name = $("#name").val();
        var phone = $("#phone").val();
        var address = $("#address").val();
        var id = $("#id").val();
        var email = $("#email").val();
        var password = $("#password").val();
        var status = $("#status").val();

        
        $.ajax({
            type: 'POST',
            url: 'XLsuanguoidung.php',
            data: { name: name, phone: phone, address: address, id: id, email: email, password: password, status: status },
            dataType: 'json', 
            success: function(response){
                if(response.status === 'success'){
                    alert(response.message); 
                    window.location.href = "ANguoidung.php"; 
                } 
                else if(response.status === 'PASSWORD')
                {
                    alert(response.message); 
                    document.getElementsByName("password")[0].focus();
                }
                else if(response.status === 'EMAIL')
                {
                    alert(response.message); 
                    document.getElementsByName("email")[0].focus();
                }
                else if(response.status === 'ID')
                {
                    alert(response.message); 
                    document.getElementsByName("id")[0].focus();
                }
                else if(response.status === 'PHONE')
                {
                    alert(response.message); 
                    document.getElementsByName("phone")[0].focus();
                }
                else{
                    alert(response.message);
                }
            }
        });
    });
});   
</script>
        <?php
        }
    } else {
        // Hiển thị thông báo nếu không tìm thấy người dùng
        echo "Không tìm thấy người dùng.";
    }
} else {
    // Hiển thị thông báo nếu không có id được truyền qua URL
    echo "Không có id người dùng được cung cấp.";
}
?>

