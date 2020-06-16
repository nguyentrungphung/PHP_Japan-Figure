<?php
if(($_SESSION['admin'] != true) || ($_SESSION['statusLogin'] ==  'fail'))
{
    echo '<script> window.location = "index.php"; </script>';
}

if (isset($_POST['chucnang'])) {

    $EXC = new DonDatHangBUS();
   
    
    $TYPE = $_POST['chucnang'];

    if ($TYPE == 'Edit') {
        $EXC->EditMaTinhTrang($_POST['txtMaDDH'], $_POST['txtMaTinhTrang']);
        echo '<script> alert("Đã thay đổi thông tin đơn đặt hàng"); </script>';
    } else if ($TYPE == 'DELETE') {
        $EXC->SetDelete($_POST['txtMaDDH']);
        echo '<script> alert("Đã xóa đơn đặt hàng thành công"); </script>';
    } else if ($TYPE == 'ADD') {
        $DDH = new DonDatHang();
        $DDH->MaDonDatHang = $_POST['txtMaDDH'];
        $DDH->NgayLap = $_POST['txtNgayLap'];
        $DDH->TongThanhTien = $_POST['txtTongThanhTien'];
        $DDH->MaTaiKhoan = $_POST['txtMaTaiKhoan'];
        $DDH->MaTinhTrang = $_POST['txtMaTinhTrang'];
        $DDH->MaDonDatHang =  $EXC->Create_MaDatHang();
        
        $userBUS = new TaiKhoanBUS();
        $user = $userBUS->GetByUsername($DDH->MaTaiKhoan);

        if($user != null)
        {
            $DDH->MaTaiKhoan = $user->MaTaiKhoan;
            $EXC->Add($DDH);
            echo '<script> alert("Thêm đơn đặt hàng thành công"); </script>';
        }
        else
        {
            echo '<script> alert("Tài khoản không tồn tại"); </script>';
        }
    }
    echo '<script> window.location = "dashboard.php?p=5"; </script>';
}


?>

