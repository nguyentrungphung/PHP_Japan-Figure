<?php

    class DonDatHangDAO extends Provider
    {
        public  function GetAll()
        {
            $sql = "SELECT MaDonDatHang, NgayLap, TongThanhTien, tk.TenDangNhap, MaTinhTrang
            FROM dondathang ddh, taikhoan tk 
            WHERE tk.MaTaiKhoan = ddh.mataikhoan";

            $result = $this->ExecuteQuery($sql);

            $lstDonDatHang = array();
            while($row = mysqli_fetch_array($result))
            {
                extract($row);
                $dondathang = new DonDatHang();
                $dondathang->MaDonDatHang = $MaDonDatHang;
                $dondathang->NgayLap = $NgayLap;
                $dondathang->TongThanhTien = $TongThanhTien;
                $dondathang->MaTaiKhoan = $TenDangNhap;
                $dondathang->MaTinhTrang = $MaTinhTrang;

                $lstDonDatHang[] = $dondathang;
            }

            return $lstDonDatHang;
        }

        public function GetByMa($MaDonDH)
        {
            $sql = "SELECT MaDonDatHang, NgayLap, TongThanhTien, MaTaiKhoan, MaTinhTrang FROM DonDatHang WHERE MaDonDatHang = '$MaDonDH'";

            $result = $this->ExecuteQuery($sql);

            $lstDonDatHang = array();
            while($row = mysqli_fetch_array($result))
            {
                extract($row);
                $dondathang = new DonDatHang();
                $dondathang->MaDonDatHang = $MaDonDatHang;
                $dondathang->NgayLap = $NgayLap;
                $dondathang->TongThanhTien = $TongThanhTien;
                $dondathang->MaTaiKhoan = $MaTaiKhoan;
                $dondathang->MaTinhTrang = $MaTinhTrang;

                $lstDonDatHang[] = $dondathang;
            }

            return $lstDonDatHang;
        }
        
        public function Add($DonDH)
        {           
            $sql = "INSERT INTO DonDatHang (MaDonDatHang, NgayLap, TongThanhTien, MaTaiKhoan, MaTinhTrang) 
                    VALUES('$DonDH->MaDonDatHang', '$DonDH->NgayLap','$DonDH->TongThanhTien','$DonDH->MaTaiKhoan', $DonDH->MaTinhTrang)";
            $this->ExecuteQuery($sql);
        }

        public function AddByName($DonDH) {
            $sql = "INSERT INTO DonDatHang (MaDonDatHang, NgayLap, TongThanhTien, MaTaiKhoan, MaTinhTrang) 
            VALUES('$DonDH->MaDonDatHang', '$DonDH->NgayLap','$DonDH->TongThanhTien','$DonDH->MaTaiKhoan', $DonDH->MaTinhTrang)";
            $this->ExecuteQuery($sql);
        }
        
        public function Edit($DonDH)
        {
            $sql = "UPDATE dondathang SET NgayLap = '$DonDH->NgayLap', TongThanhTien = $DonDH->TongThanhTien, MaTaiKhoan = $DonDH->MaTaiKhoan, MaTinhTrang = $DonDH->MaTinhTrang
             WHERE MaDonDatHang = '$DonDH->MaDonDatHang'";
            $this->ExecuteQuery($sql);
        }

        public function EditMaTinhTrang($MaDDH, $MaTinhTrang)
        {
            $sql = "UPDATE dondathang SET MaTinhTrang = $MaTinhTrang
             WHERE MaDonDatHang = '$MaDDH'";
            $this->ExecuteQuery($sql);
        }

        public function Delete($DonDH)
        {
            $sql = "DELETE FROM DonDatHang WHERE MaDonDatHang = '$DonDH'";
            $this->ExecuteQuery($sql);
        }

        public function Create_MaDatHang()
        {
            $sql = "SELECT MaDonDatHang FROM dondathang ORDER BY MaDonDatHang DESC LIMIT 1";
            $query = $this->ExecuteQuery($sql);
            while ($row = $query->fetch_assoc()) {
                $ma = $row['MaDonDatHang'];
            }
            $temp = substr($ma, 3);
            
            switch ($temp)
            {
                case $temp >= 0 and $temp <= 9:
                    $matang = (string)($temp + 1);
                    $madondathang = 'DDH00000' .$matang;
                    break;
                case $temp >= 9 and $temp <= 99:
                    $matang = (string)($temp + 1);
                    $madondathang = 'DDH0000' .$matang;
                    break;
                case $temp >= 99 and $temp <= 999:
                    $matang = (string)($temp + 1);
                    $madondathang = 'DDH000' .$matang;
                    break;
                case $temp >= 999 and $temp <= 9999:
                    $matang = (string)($temp + 1);
                    $madondathang = 'DDH00' .$matang;
                    break;
                case $temp >= 9999 and $temp <= 99999:
                    $matang = (string)($temp + 1);
                    $madondathang = 'DDH0' .$matang;
                    break;
                case $temp >= 99999 and $temp <= 999999:
                    $matang = (string)($temp + 1);
                    $madondathang = 'DDH' .$matang;
                    break;
                default:
                    echo 'Sai!!!';
                    break;
            }          
            return $madondathang;
        }

        public function GetAllUnAvaiable()
        {
            $sql = "SELECT MaDonDatHang, NgayLap, TongThanhTien, MaTaiKhoan, MaTinhTrang
            FROM dondathang ddh WHERE MaTinhTrang = 4";

            $result = $this->ExecuteQuery($sql);

            $lstDonDatHang = array();
            while($row = mysqli_fetch_array($result))
            {
                extract($row);
                $dondathang = new DonDatHang();
                $dondathang->MaDonDatHang = $MaDonDatHang;
                $dondathang->NgayLap = $NgayLap;
                $dondathang->TongThanhTien = $TongThanhTien;
                $dondathang->MaTaiKhoan = $MaTaiKhoan;
                $dondathang->MaTinhTrang = $MaTinhTrang;

                $lstDonDatHang[] = $dondathang;
            }

            return $lstDonDatHang;
        }

        public function GetAllAvaiable()
        {
            $sql = "SELECT MaDonDatHang, NgayLap, TongThanhTien, MaTaiKhoan, MaTinhTrang
            FROM dondathang ddh WHERE MaTinhTrang != 4";

            $result = $this->ExecuteQuery($sql);

            $lstDonDatHang = array();
            while($row = mysqli_fetch_array($result))
            {
                extract($row);
                $dondathang = new DonDatHang();
                $dondathang->MaDonDatHang = $MaDonDatHang;
                $dondathang->NgayLap = $NgayLap;
                $dondathang->TongThanhTien = $TongThanhTien;
                $dondathang->MaTaiKhoan = $MaTaiKhoan;
                $dondathang->MaTinhTrang = $MaTinhTrang;

                $lstDonDatHang[] = $dondathang;
            }

            return $lstDonDatHang;
        }

        public function SetDelete($MaDDH)
        {
            $sql = "UPDATE dondathang SET MaTinhTrang = 4 WHERE MaDonDatHang = '$MaDDH'";
            $this->ExecuteQuery($sql);
        }

        public  function Statistical()
        {
            $sql = "SELECT cast(dh.NgayLap AS DATE), COUNT(dh.MaDonDatHang) 
                    FROM dondathang dh
                    GROUP BY cast(dh.NgayLap AS DATE)";

            $result = $this->ExecuteQuery($sql);

            $lst = array();
            while($row = mysqli_fetch_array($result))
            {
                $lst[ date("d/m/Y", strtotime($row[0])) ] = $row[1];
            }

            return $lst;
        }
    }
?>