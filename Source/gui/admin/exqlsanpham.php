<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 12/10/2018
 * Time: 8:30 PM
 */
if(($_SESSION['admin'] != true) || ($_SESSION['statusLogin'] ==  'fail'))
{
    echo '<script> window.location = "index.php"; </script>';
}

$SANPHAM = new SanPham();
$SANPHAM->MaSanPham = $_POST['txtMaSP'];
$SANPHAM->TenSanPham = $_POST['txtTenSP'];
$SANPHAM->GiaSanPham = $_POST['txtGiaSP'];
$SANPHAM->PhanTramGiamGia = $_POST['txtPTGG'];
$SANPHAM->NgayNhap = $_POST['txtNgayNhap'];
$SANPHAM->SoLuongTon = $_POST['txtSLT'];
$SANPHAM->SoLuongBan = $_POST['txtSLB'];
$SANPHAM->SoLuocXem = $_POST['txtSLX'];
$SANPHAM->MoTa = $_POST['txtMoTa'];
$SANPHAM->BiXoa = $_POST['txtBiXoa'];
$SANPHAM->HinhURL = $_POST['txtURLAnh'];
$SANPHAM->MaLoaiSanPham = $_POST['txtMaLSP'];
$SANPHAM->MaHangSanXuat = $_POST['txtHSX'];


    $EXC = new SanPhamBUS();

    $TYPE = $_POST['chucnang'];

    if ($TYPE == 'EDIT') {
        $EXC->Edit($SANPHAM);
        echo '<script> alert("Đã thông tin sản phẩm"); </script>';
    } else if ($TYPE == 'ADD') {
        $EXC->Add($SANPHAM);
        echo '<script> alert("Thêm sản phẩm mới thành công"); </script>';
    }
    else if ($TYPE == 'DELETE')
    {
        $EXC->SetDeleted($SANPHAM->MaSanPham);
        echo '<script> alert("Đã set tình trạng đã xóa"); </script>';
    }

    echo '<script> window.location = "dashboard.php?p=1"; </script>';

?>
