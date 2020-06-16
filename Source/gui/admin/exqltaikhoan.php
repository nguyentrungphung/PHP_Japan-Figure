<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 12/11/2018
 * Time: 1:35 PM
 */
if(($_SESSION['admin'] != true) || ($_SESSION['statusLogin'] ==  'fail'))
{
    echo '<script> window.location = "index.php"; </script>';
}

if(isset($_POST["chucnang"]))
{

    $EXC = new TaiKhoanBUS();

    $account = new TaiKhoan();
    $account->MaTaiKhoan = $_POST["MaTK"];
    $account->TenDangNhap = $_POST["txtTenDN"];
    $account->TenHienThi = $_POST["txtTenHT"];
    $account->MatKhau = $_POST["txtMK"];
    $account->DiaChi = $_POST["txtDC"];
    $account->DienThoai = $_POST["txtDT"];
    $account->Email = $_POST["txtEM"];
    $account->BiXoa = $_POST["txtBiXoa"];
    $account->MaLoaiTaiKhoan = $_POST["txtMaLTK"];

    

    $TYPE = $_POST['chucnang'];

    if ($TYPE == 'EDIT')
    {
        $OldAcc = $EXC->GetByID($_POST["MaTK"]);
        if($OldAcc->MatKhau != $account->MatKhau)
        {
            /*Mã hóa mật khẩu*/
            $account->MatKhau = md5($account->MatKhau);
        }
        $EXC->Edit($account);
    }
    else if ($TYPE == 'ADD')
    { 
        $EXC->Add($account);
    }
    else if ($TYPE == 'DELETE')
    {
        $EXC->SetDeleted($account->TenDangNhap);
        echo '<script> alert("Đã set tình trạng đã xóa"); </script>';
    }
}
echo '<script> window.location = "dashboard.php?p=4"; </script>';

?>
