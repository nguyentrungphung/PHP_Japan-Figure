
<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 12/4/2018
 * Time: 11:20 AM
 */


    if(isset($_POST["submit"]))
    {
        $taikhoanBUS = new TaiKhoanBUS();

        $account = new TaiKhoan();
        $account->TenDangNhap = $_POST["txtusername"];
        $account->TenHienThi = $_POST["txtname"];
        $account->MatKhau = $_POST["txtpassword"];
        $account->DiaChi = $_POST["txtdiachi"];
        $account->DienThoai = $_POST["txtdienthoai"];
        $account->Email = $_POST["txtemail"];
        $account->MaLoaiTaiKhoan = 2;
        $account->BiXoa = 0;

        if($account->MatKhau != $_POST["txtcfpw"])
        {
            echo '<script type="text/javascript">alert("Nhập lại mật khẩu không chính xác.")</script>';
        }
        else
        {
            $taikhoanBUS->Add($account);
            echo '<script> window.location = "index.php"; </script>';
        return;
        }
        echo '<script> window.location = "index.php?p=3"; </script>';
        return;
    }

?>