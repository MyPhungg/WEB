<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin khách hàng</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
    .form_TTKhachHang{
        border: 2px solid black;
        padding: 20px;
    }
    .chuXam{
        color: #1f010193;
    }
    .ThongTinKhachHang{
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); 
        display: flex;
        justify-content: space-between;
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

        .TaoND {
        background-color: #D61EAD;
        color: #fff;
        border: none;
        cursor: pointer;
        border-radius: 20px;
        width: 40%;
        padding: 15px 0;
        font-size: 16px;
        float: right;
        /* text-transform: uppercase; */
        /* align-self: center; */
    }

    /* CSS khi nút được hover */
    .TaoND:hover {
        background-color: #A70087;
    }
</style>
</head>
<body>
    <div class="form_TTKhachHang">
        <form id="TND" action="XLthemnguoidung.php" method="post">
            <h1>Thêm người dùng mới</h1>
            <p>Trang chủ >> <span class="chuXam">Người dùng -> Thêm người dùng mới</span></p>
            <div class="ThongTinKhachHang">
                <div class="photo">
                    <img src="" alt="ảnh">
                </div>
                    <div class="ThongTinKhachHang-data1">
                    <p>Tên đăng nhập:</p>
                    <input type="text" name="id" id="id">
                    <p>Địa chỉ:</p>
                    <input type="text" name="address" id="address" >
                    <p>Mật khẩu:</p>
                    <input type="password" name="password" id="password"  >
                </div>
                <div class="ThongTinKhachHang-data2">
                    <p>Họ tên:</p>
                    <input type="text" name="name" id="name" >
                    <p>Số điện thoại:</p>
                    <input type="text" name="phone" id="phone" >
                    <p>Email:</p>
                    <input type="text" name="email" id="email" >
                    <input type="submit" class="TaoND"  value="Tạo">
                </div>
            </div>
    
        </form>
    </div>
</body>
</html>
<script>
$(document).ready(function(){
    $("#TND").submit(function(event){
        event.preventDefault();

        

        var name = $("#name").val();
        var phone = $("#phone").val();
        var address = $("#address").val();
        var id = $("#id").val();
        var email = $("#email").val();
        var password = $("#password").val();

        
        $.ajax({
            type: 'POST',
            url: 'XLthemnguoidung.php',
            data: { name: name, phone: phone, address: address, id: id, email: email, password: password },
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