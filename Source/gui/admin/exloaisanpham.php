<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 12/6/2018
 * Time: 7:59 PM
 */
if(($_SESSION['admin'] != true) || ($_SESSION['statusLogin'] ==  'fail'))
{
    echo '<script> window.location = "index.php"; </script>';
}

if (isset($_POST['chucnang'])) {

    $LSP = new LoaiSanPham();

    $EXC = new LoaiSanPhamBUS();

    $TYPE = $_POST['chucnang'];

    if ($TYPE == 'EDIT') {
        
         $LSP->MaLoaiSanPham = $_POST['txtMaLSP'];
         $LSP->TenLoaiSanPham = $_POST['txtTenLSP'];
         $LSP->BiXoa = $_POST['txtBiXoa'];
        $EXC->Edit($LSP);
        echo '<script> alert("Đã thay đổi thông tin loại sản phẩm"); </script>';
    } 
    else if ($TYPE == 'DELETE') 
    {
        $EXC->SetDelete($_POST['txtMaLSP']);
        echo '<script> alert("Đã set trạng thái sang đã xóa"); </script>';
    } 
    else if ($TYPE == 'ADD') 
    {
        
        $LSP->TenLoaiSanPham = $_POST['txtTenLSP'];
        $LSP->BiXoa = $_POST['txtBiXoa'];
        $EXC->Add($LSP);
        echo '<script> alert("Thêm loại sản phẩm mới thành công"); </script>';
    }
    echo '<script> window.location = "dashboard.php?p=2"; </script>';
}


?>

