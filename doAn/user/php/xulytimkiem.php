<?php 
  $con = mysqli_connect("localhost", "root", "", "bolashop");
    mysqli_query($con, "set names 'utf8'");
$text_search=$_POST['data'];
$sql="SELECT * FROM sanpham WHERE Tensp like '%$text_search%'";
$query=mysqli_query($con,$sql);
$num=mysqli_num_rows($query);
if($num>0)
{
    while($row=mysqli_fetch_array($query))
    {
        echo "<div class='content-item' onclick='showChiTietSanPham(\"" . $row['Masp'] . "\")'>";
    echo "<div class='product-image'><img src='../../img/" . $row['Img'] . "' alt=''></div>";
    echo "<h3>" . $row["Tensp"] . "</h3>";
    echo "<p>Giá: " . $row['Giaban'] . " VND</p>";
    echo "</div>";
 
?>




<?php 

}
}
$soSanPhamTrenTrang = 12;
$sqlCount = "SELECT COUNT(*) AS total FROM sanpham WHERE Tensp LIKE '%$text_search%'";
$resultCount = mysqli_query($con, $sqlCount);
$rowCount = mysqli_fetch_assoc($resultCount);
$totalRecords = $rowCount['total'];
$totalPages = ceil($totalRecords / $soSanPhamTrenTrang);

echo "<div class='page-segment'>";
for ($i = 1; $i <= $totalPages; $i++) {
    echo "<li> <a href='?trang=$i'>$i</a> </li>";
}
echo "</div>";

// Đóng kết nối
mysqli_close($con);
?>
<script>
    function showChiTietSanPham(maSP) {
        showChiTietSanPham(maSP);
    }
</script>