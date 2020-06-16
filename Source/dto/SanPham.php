<?php
class SanPham
{
    var $MaSanPham;
    var $TenSanPham;
    var $HinhURL;
    var $GiaSanPham;
    var $PhanTramGiamGia;
    var $NgayNhap;
    var $SoLuongTon;
    var $SoLuongBan;
    var $SoLuocXem;
    var $MoTa;
    var $BiXoa;
    var $MaLoaiSanPham;
    var $MaHangSanXuat;



    function __construct()
    {
        $this->MaSanPham = 0;
        $this->TenSanPham = "";
        $this->HinhURL = "";
        $this->GiaSanPham = 0;
        $this->PhanTramGiamGia = 0;
        $this->NgayNhap = 0;
        $this->SoLuongTon = 0;
        $this->SoLuongBan = 0;
        $this->SoLuocXem = 0;
        $this->MoTa = "";
        $this->BiXoa = 0;
        $this->MaLoaiSanPham = 0;
        $this->MaHangSanXuat = 0;
    }
}
?>