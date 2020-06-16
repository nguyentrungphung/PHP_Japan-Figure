<?php
    class ChiTietDonHangDAO extends Provider
    {
        public function GetAll()
        {
            $sql = "Select MaChiTietDonHang, Soluong, GiaBan from ChiTietDonHang";
            $result = $this->ExecuteQuery($sql);
            $lstChiTietDonHang = array();
            while ($row = mysqli_fetch_array($result))
            {
                extract($row);
                $chitietdonhang = new ChiTietDonHang();
                $chitietdonhang->MaChiTietDonHang= $MaChiTietDonHang;
                $chitietdonhang->SoLuong= $SoLuong;
                $chitietdonhang->GiaBan= $GiaBan;

                $lstChiTietDonHang[] = $chitietdonhang;
            }
            return $lstChiTietDonHang;
        }

        public function GetByMa($MaChiTietDonHang)
        {
            $sql = "Select MaChiTietDonHang, Soluong, GiaBan from ChiTietDonHang WHERE MaChiTietDonHang = $MaChiTietDonHang";

            $result = $this->ExecuteQuery($sql);

            while($row = mysqli_fetch_array($result))
            {
                extract($row);
                $chitietdonhang = new ChiTietDonHang();
                $chitietdonhang->MaChiTietDonHang= $MaChiTietDonHang;
                $chitietdonhang->SoLuong= $SoLuong;
                $chitietdonhang->GiaBan= $GiaBan;
                return $chitietdonhang;
            }

            return null;
        }

        public function Add($chitietdh)
        {
            $sql = "INSERT INTO ChiTietDonHang VALUES(null, '$chitietdh->SoLuong', '$chitietdh->GiaBan','$chitietdh->MaDonDatHang','$chitietdh->MaSanPham')";
            $this->ExecuteQuery($sql);
        }

        public function Edit($chitietdh)
        {
            $sql = "UPDATE ChiTietDonHang SET SoLuong = '$chitietdh->SoLuong', GiaBan='$chitietdh->GiaBan', 
            MaDonDatHang='$chitietdh->MaDonDatHang', MaSanPham='$chitietdh->MaSanPham' WHERE MaChiTietDonHang = $chitietdh->MaChiTietDonHang";
            $this->ExecuteQuery($sql);
        }

        public function Delete($machitietdh)
        {
            $sql = "DELETE FROM ChiTietDonHang WHERE MaChiTietDonHang = $machitietdh";
            $this->ExecuteQuery($sql);
        }


        public function GetHistory($userID)
        {
            $sql = "Select sp.MaSanPham, sp.TenSanPham, ct.SoLuong, sp.GiaSanPham, sp.PhanTramGiamGia, sp.HinhURL, tt.TenTinhTrang, dh.NgayLap 
                        from ChiTietDonHang ct, DonDatHang dh, SanPham sp, TinhTrang tt
                        where ct.MaDonDatHang = dh.MaDonDatHang and sp.MaSanPham = ct.MaSanPham and tt.MaTinhTrang = dh.MaTinhTrang
                        and dh.MaTaiKhoan = $userID 
                        order by (dh.NgayLap) desc";
            $result = $this->ExecuteQuery($sql);
            
            if($result==null || $result->num_rows == 0) return null;

            return $result;
        }

    }
?>