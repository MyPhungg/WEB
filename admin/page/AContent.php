<?php
if (isset($_GET['chon']) && isset($_GET['id'])) {
    if ($_GET['id'] == 'thongke') {
        include_once('./AThongke.php');
    } else if ($_GET['id'] == 'sanpham') {
        include_once('./ASanpham.php');
    } else if ($_GET['id'] == 'phieunhap') {
        include_once('./APhieunhap.php');
    } else if ($_GET['id'] == 'donhang') {
        include_once('./APhieuxuat.php');
    } else if ($_GET['id'] == 'nhacungcap') {
        include_once('./ANCC.php');
    } else if ($_GET['id'] == 'nguoidung') {
        include_once('./ANguoidung.php');
    } else if ($_GET['id'] == 'quyen') {
        include_once('./AQuyen.php');
    } else if ($_GET['id'] == 'khuyenmai') {
        include_once('./AKhuyenmai.php');
    } else if ($_GET['id'] == 'vanchuyen') {
        include_once('./AVanchuyen.php');
    } else if ($_GET['id'] == 'thuonghieu') {
        include_once('./AThuonghieu.php');
    }
}
