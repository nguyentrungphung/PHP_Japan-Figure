<?php

    if(!isset($_SESSION['statusLogin']) || $_SESSION['statusLogin'] == 'fail')
    {
        echo '<script type="text/javascript">alert("Bạn cần đăng nhập để thực hiện chức năng này")</script>';
        echo '<script type="text/javascript">window.location.href="index.php?p=5";</script>';
    }
    else if(isset($_SESSION['cart']) && $_SESSION['cart'] != null)
    {
        $ddhBUS = new DonDatHangBUS();
        $ctddhBUS = new ChiTietDonHangBUS();
        $spBUS = new SanPhamBUS();

        $ddh = new DonDatHang();
        $ddh->MaDonDatHang = $ddhBUS->Create_MaDatHang();
        $ddh->NgayLap = getDatetimeNow();
        $ddh->TongThanhTien = 0;
        $ddh->MaTaiKhoan = $_SESSION['userID'];
        $ddh->MaTinhTrang = 1;
        $ddhBUS->Add($ddh);
        $tongtien = 0;

        foreach($_SESSION['cart'] as $key => $value)
        {
            $slton = $spBUS->GetMountByID($key);
            if($slton >= $value)
            {
                $ctddh = new ChiTietDonHang();
                $ctddh->SoLuong = $value;
                $ctddh->GiaBan = $spBUS->GetPriceByID($key);
                $ctddh->MaDonDatHang = $ddh->MaDonDatHang;
                $ctddh->MaSanPham = $key;

                $ctddhBUS->Add($ctddh);

                $spBUS->SetMountByID($key, $slton - $value);
                $spBUS->UpdateSLBanByID($key, $value);
                $tongtien += $ctddh->SoLuong * $ctddh->GiaBan;
            }
        }
        
        $ddh->TongThanhTien = $tongtien;
        $ddhBUS->Edit($ddh);
        
        unset($_SESSION['tongtien']);
        unset($_SESSION['cart']);
        echo '<script type="text/javascript">alert("Đặt hàng thành công")</script>';
        echo '<script type="text/javascript">window.location.href="index.php?p=10";</script>';
    }
    
?>