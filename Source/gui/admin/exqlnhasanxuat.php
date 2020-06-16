<?php
if(($_SESSION['admin'] != true) || ($_SESSION['statusLogin'] ==  'fail'))
{
    echo '<script> window.location = "index.php"; </script>';
}

if (isset($_POST['chucnang'])) {

    $HSX = new HangSanXuat();
    $HSX->MaHangSanXuat = $_POST['txtMaHSX'];
    $HSX->TenHangSanXuat = $_POST['txtTenHSX'];
    $HSX->LogoURL = $_POST['txtLogoHSX'];
    $HSX->BiXoa = $_POST['txtBiXoa'];


    $EXC = new HangSanXuatBUS();

    $TYPE = $_POST['chucnang'];

    if ($TYPE == 'EDIT') {
        $EXC->Edit($HSX);
        echo '<script> alert("Đã thay đổi thông tin hãng sản xuất"); </script>';
    } else if ($TYPE == 'DELETE') {
        $EXC->SetDelete($HSX->MaHangSanXuat);
        echo '<script> alert("Đã set trạng thái sang đã xóa"); </script>';
    } else if ($TYPE == 'ADD') {
        $EXC->Add($HSX);
        echo '<script> alert("Thêm hãng sản xuất mới thành công"); </script>';
    }
    echo '<script> window.location = "dashboard.php?p=3"; </script>';
}


?>

