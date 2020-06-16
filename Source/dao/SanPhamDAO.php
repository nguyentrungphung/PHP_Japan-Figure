<?php
    class SanPhamDAO extends Provider
    {
        public function GetAll()
        {
            $sql = "SELECT MaSanPham, TenSanPham, HinhURL, GiaSanPham, PhanTramGiamGia, NgayNhap, SoLuongTon, 
                    SoLuongBan, SoLuocXem, MoTa, BiXoa, MaLoaiSanPham, MaHangSanXuat 
                    FROM sanpham";
            $result = $this->ExecuteQuery($sql);

            $lstSanPham = array();
            
            while($row = mysqli_fetch_array($result))
            {
                extract($row);

                $sanpham = new SanPham();
                $sanpham->MaSanPham = $MaSanPham;
                $sanpham->TenSanPham = $TenSanPham;
                $sanpham->HinhURL = $HinhURL;
                $sanpham->GiaSanPham = $GiaSanPham;
                $sanpham->PhanTramGiamGia = $PhanTramGiamGia;
                $sanpham->NgayNhap = $NgayNhap;
                $sanpham->SoLuongTon = $SoLuongTon;
                $sanpham->SoLuongBan = $SoLuongBan;
                $sanpham->SoLuocXem = $SoLuocXem;
                $sanpham->MoTa = $MoTa;
                $sanpham->BiXoa = $BiXoa;
                $sanpham->MaLoaiSanPham = $MaLoaiSanPham;
                $sanpham->MaHangSanXuat = $MaHangSanXuat;

                $lstSanPham[] = $sanpham;
            }

            return $lstSanPham;
        }

        public function GetAllAvaiable()
        {
            $sql = "SELECT MaSanPham, TenSanPham, HinhURL, GiaSanPham, PhanTramGiamGia, NgayNhap, 
                SoLuongTon, SoLuongBan, SoLuocXem, MoTa, BiXoa, MaLoaiSanPham, MaHangSanXuat 
                FROM sanpham WHERE BiXoa = 0";
            $result = $this->ExecuteQuery($sql);

            $lstSanPham = array();
            
            while($row = mysqli_fetch_array($result))
            {
                extract($row);

                $sanpham = new SanPham();
                $sanpham->MaSanPham = $MaSanPham;
                $sanpham->TenSanPham = $TenSanPham;
                $sanpham->HinhURL = $HinhURL;
                $sanpham->GiaSanPham = $GiaSanPham;
                $sanpham->PhanTramGiamGia = $PhanTramGiamGia;
                $sanpham->NgayNhap = $NgayNhap;
                $sanpham->SoLuongTon = $SoLuongTon;
                $sanpham->SoLuongBan = $SoLuongBan;
                $sanpham->SoLuocXem = $SoLuocXem;
                $sanpham->MoTa = $MoTa;
                $sanpham->BiXoa = $BiXoa;
                $sanpham->MaLoaiSanPham = $MaLoaiSanPham;
                $sanpham->MaHangSanXuat = $MaHangSanXuat;

                $lstSanPham[] = $sanpham;
            }

            return $lstSanPham;
        }

        public function GetAllUnAvaiable()
        {
            $sql = "SELECT MaSanPham, TenSanPham, HinhURL, GiaSanPham, PhanTramGiamGia, NgayNhap, 
                SoLuongTon, SoLuongBan, SoLuocXem, MoTa, BiXoa, MaLoaiSanPham, MaHangSanXuat 
                FROM sanpham WHERE BiXoa = 1";
            $result = $this->ExecuteQuery($sql);

            $lstSanPham = array();

            while($row = mysqli_fetch_array($result))
            {
                extract($row);

                $sanpham = new SanPham();
                $sanpham->MaSanPham = $MaSanPham;
                $sanpham->TenSanPham = $TenSanPham;
                $sanpham->HinhURL = $HinhURL;
                $sanpham->GiaSanPham = $GiaSanPham;
                $sanpham->PhanTramGiamGia = $PhanTramGiamGia;
                $sanpham->NgayNhap = $NgayNhap;
                $sanpham->SoLuongTon = $SoLuongTon;
                $sanpham->SoLuongBan = $SoLuongBan;
                $sanpham->SoLuocXem = $SoLuocXem;
                $sanpham->MoTa = $MoTa;
                $sanpham->BiXoa = $BiXoa;
                $sanpham->MaLoaiSanPham = $MaLoaiSanPham;
                $sanpham->MaHangSanXuat = $MaHangSanXuat;

                $lstSanPham[] = $sanpham;
            }

            return $lstSanPham;
        }

        public function GetByID($id)
        {
            //SELECT HinhURL, TenSanPham, GiaSanPham, PhanTramGiamGia, SoLuocXem, SoLuongBan, MoTa, hsx.TenHangSanXuat FROM sanpham sp, hangsanxuat hsx WHERE MaSanPham = 10 and sp.MaHangSanXuat = hsx.MaHangSanXuat

            $sql = "SELECT MaSanPham, TenSanPham, HinhURL, GiaSanPham, PhanTramGiamGia, NgayNhap, SoLuongTon, 
            SoLuongBan, SoLuocXem, MoTa, sp.BiXoa, MaLoaiSanPham, sp.MaHangSanXuat, TenHangSanXuat 
            FROM sanpham sp, hangsanxuat hsx WHERE MaSanPham = $id and sp.MaHangSanXuat = hsx.MaHangSanXuat";
            $result = $this->ExecuteQuery($sql);



            if($row = mysqli_fetch_array($result))
            {
                extract($row);

                $sanpham = new SanPham();
                $sanpham->MaSanPham = $MaSanPham;
                $sanpham->TenSanPham = $TenSanPham;
                $sanpham->HinhURL = $HinhURL;
                $sanpham->GiaSanPham = $GiaSanPham;
                $sanpham->PhanTramGiamGia = $PhanTramGiamGia;
                $sanpham->NgayNhap = $NgayNhap;
                $sanpham->SoLuongTon = $SoLuongTon;
                $sanpham->SoLuongBan = $SoLuongBan;
                $sanpham->SoLuocXem = $SoLuocXem;
                $sanpham->MoTa = $MoTa;
                $sanpham->BiXoa = $BiXoa;
                $sanpham->MaLoaiSanPham = $MaLoaiSanPham;
                $sanpham->MaHangSanXuat = $TenHangSanXuat;
                return $sanpham;
            }

            return null;
        }

        public function GetByIDList($id)
        {
            $sql = "SELECT MaSanPham, TenSanPham, HinhURL, GiaSanPham, PhanTramGiamGia, NgayNhap, SoLuongTon, 
            SoLuongBan, SoLuocXem, MoTa, sp.BiXoa, MaLoaiSanPham, sp.MaHangSanXuat, TenHangSanXuat 
            FROM sanpham sp, hangsanxuat hsx WHERE MaSanPham = $id and sp.MaHangSanXuat = hsx.MaHangSanXuat";
            $result = $this->ExecuteQuery($sql);

            $lstSanPham = array();
            if($result == true) {
                if ($row = mysqli_fetch_array($result)) {
                    extract($row);

                    $sanpham = new SanPham();
                    $sanpham->MaSanPham = $MaSanPham;
                    $sanpham->TenSanPham = $TenSanPham;
                    $sanpham->HinhURL = $HinhURL;
                    $sanpham->GiaSanPham = $GiaSanPham;
                    $sanpham->PhanTramGiamGia = $PhanTramGiamGia;
                    $sanpham->NgayNhap = $NgayNhap;
                    $sanpham->SoLuongTon = $SoLuongTon;
                    $sanpham->SoLuongBan = $SoLuongBan;
                    $sanpham->SoLuocXem = $SoLuocXem;
                    $sanpham->MoTa = $MoTa;
                    $sanpham->BiXoa = $BiXoa;
                    $sanpham->MaLoaiSanPham = $MaLoaiSanPham;
                    $sanpham->MaHangSanXuat = $MaHangSanXuat;

                    $lstSanPham[] = $sanpham;
                    return $lstSanPham;
                }
            }

            return null;
        }

        public function GetByName($name)
        {
            str_replace(" ", "%", $name);
            $sql = "SELECT MaSanPham, TenSanPham, HinhURL, GiaSanPham, PhanTramGiamGia, NgayNhap, SoLuongTon, 
                    SoLuongBan, SoLuocXem, MoTa, BiXoa, MaLoaiSanPham, MaHangSanXuat 
                    FROM sanpham where TenSanPham like '%$name%'";
            $result = $this->ExecuteQuery($sql);

            $lstSanPham = array();
            
            while($row = mysqli_fetch_array($result))
            {
                extract($row);

                $sanpham = new SanPham();
                $sanpham->MaSanPham = $MaSanPham;
                $sanpham->TenSanPham = $TenSanPham;
                $sanpham->HinhURL = $HinhURL;
                $sanpham->GiaSanPham = $GiaSanPham;
                $sanpham->PhanTramGiamGia = $PhanTramGiamGia;
                $sanpham->NgayNhap = $NgayNhap;
                $sanpham->SoLuongTon = $SoLuongTon;
                $sanpham->SoLuongBan = $SoLuongBan;
                $sanpham->SoLuocXem = $SoLuocXem;
                $sanpham->MoTa = $MoTa;
                $sanpham->BiXoa = $BiXoa;
                $sanpham->MaLoaiSanPham = $MaLoaiSanPham;
                $sanpham->MaHangSanXuat = $MaHangSanXuat;

                $lstSanPham[] = $sanpham;
            }

            return $lstSanPham;
        }
        

        public function GetPriceByID($id)
        {
            $sql = "SELECT GiaSanPham, PhanTramGiamGia
                    FROM sanpham where MaSanPham=$id";
            $result = $this->ExecuteQuery($sql);

            
            
            if($row = mysqli_fetch_array($result))
            {
                extract($row);


                return $GiaSanPham * (100 - $PhanTramGiamGia)/100;
            }

            return 0;
        }
        public function GetMountByID($id)
        {
            $sql = "SELECT SoLuongTon
                    FROM sanpham where MaSanPham=$id";
            $result = $this->ExecuteQuery($sql);           
            
            if($row = mysqli_fetch_array($result))
            {
                extract($row);


                return $SoLuongTon;
            }

            return 0;
        }
        public function SetMountByID($id, $sl)
        {
            $sql = "UPDATE sanpham set SoLuongTon = $sl
                    where MaSanPham=$id";
            $result = $this->ExecuteQuery($sql);   
            return 0;
        }
        
        public function UpdateSLBanByID($id, $sl)
        {
            $sql = "UPDATE sanpham set SoLuongBan = SoLuongBan + $sl
                    where MaSanPham=$id";
            $result = $this->ExecuteQuery($sql);   
            return 0;
        }
        public function UpdateSLXemByID($id, $sl)
        {
            $sql = "UPDATE sanpham set SoLuocXem = SoLuocXem + $sl
                    where MaSanPham=$id";
            $result = $this->ExecuteQuery($sql);   
            return 0;
        }

        public function GetNewProduct()
        {
            $sql = 'SELECT MaSanPham, TenSanPham, HinhURL, GiaSanPham, PhanTramGiamGia 
                        FROM sanpham sp, loaisanpham l WHERE l.BiXoa=0 and sp.MaLoaiSanPham=l.MaLoaiSanPham and sp.BiXoa=0 ORDER BY NgayNhap DESC LIMIT 10';

            $result = $this->ExecuteQuery($sql);

            $lstSanPham = array();
            
            while($row = mysqli_fetch_array($result))
            {
                extract($row);

                $sanpham = new SanPham();
                $sanpham->MaSanPham = $MaSanPham;
                $sanpham->TenSanPham = $TenSanPham;
                $sanpham->HinhURL = $HinhURL;
                $sanpham->GiaSanPham = $GiaSanPham;
                $sanpham->PhanTramGiamGia = $PhanTramGiamGia;

                $lstSanPham[] = $sanpham;
            }

            return $lstSanPham;
        }

        public function GetSellingProduct()
        {
            $sql = 'SELECT MaSanPham, TenSanPham, HinhURL, GiaSanPham, PhanTramGiamGia 
                        FROM sanpham sp, loaisanpham l WHERE l.BiXoa=0 and sp.MaLoaiSanPham=l.MaLoaiSanPham and sp.BiXoa=0  ORDER BY SoLuongBan DESC LIMIT 10';
                

            $result = $this->ExecuteQuery($sql);

            $lstSanPham = array();
            
            while($row = mysqli_fetch_array($result))
            {
                extract($row);

                $sanpham = new SanPham();
                $sanpham->MaSanPham = $MaSanPham;
                $sanpham->TenSanPham = $TenSanPham;
                $sanpham->HinhURL = $HinhURL;
                $sanpham->GiaSanPham = $GiaSanPham;
                $sanpham->PhanTramGiamGia = $PhanTramGiamGia;

                $lstSanPham[] = $sanpham;
            }

            return $lstSanPham;
        }
       
        public function GetSameCategory($sanpham)
        {
            $sql = "SELECT MaSanPham, TenSanPham, HinhURL, GiaSanPham, PhanTramGiamGia 
                        FROM sanpham WHERE MaLoaiSanPham=$sanpham->MaLoaiSanPham AND BiXoa=0 LIMIT 5";
                
                
            $result = $this->ExecuteQuery($sql);

            $lstSanPham = array();
            
            while($row = mysqli_fetch_array($result))
            {
                extract($row);

                $sanpham = new SanPham();
                $sanpham->MaSanPham = $MaSanPham;
                $sanpham->TenSanPham = $TenSanPham;
                $sanpham->HinhURL = $HinhURL;
                $sanpham->GiaSanPham = $GiaSanPham;
                $sanpham->PhanTramGiamGia = $PhanTramGiamGia;

                $lstSanPham[] = $sanpham;
            }

            return $lstSanPham;
        }

        public function GetProductLQ($id)
        {      
            $sql = " SELECT MaLoaiSanPham FROM sanpham WHERE MaSanPham = $id";                      
            $query = $this->ExecuteQuery($sql);
            while ($row = $query->fetch_assoc()) {
                $ma = $row['MaLoaiSanPham'];
            }

            $sql = "SELECT MaSanPham, TenSanPham, HinhURL, GiaSanPham, PhanTramGiamGia 
                        FROM sanpham WHERE MaLoaiSanPham = $ma AND BiXoa=0 LIMIT 5";
                
                
            $result = $this->ExecuteQuery($sql);

            $lstSanPham = array();
            
            while($row = mysqli_fetch_array($result))
            {
                extract($row);

                $sanpham = new SanPham();
                $sanpham->MaSanPham = $MaSanPham;
                $sanpham->TenSanPham = $TenSanPham;
                $sanpham->HinhURL = $HinhURL;
                $sanpham->GiaSanPham = $GiaSanPham;
                $sanpham->PhanTramGiamGia = $PhanTramGiamGia;

                $lstSanPham[] = $sanpham;
            }

            return $lstSanPham;
        }

        public function GetByURL($url)
        {
            $sql = GetSqlQuery($url, true);      
           
            $result = $this->ExecuteQuery($sql);

            $lstSanPham = array();
            
            while($row = mysqli_fetch_array($result))
            {
                extract($row);

                $sanpham = new SanPham();
                $sanpham->MaSanPham = $MaSanPham;
                $sanpham->TenSanPham = $TenSanPham;
                $sanpham->HinhURL = $HinhURL;
                $sanpham->GiaSanPham = $GiaSanPham;
                $sanpham->PhanTramGiamGia = $PhanTramGiamGia;

                $lstSanPham[] = $sanpham;
            }

            return $lstSanPham;
        }

        public function GetNumberPageByURL($url)
        {
            $sql = GetSqlQuery($url, false);                    
            
            $result = $this->ExecuteQuery($sql);

            return ceil($result->num_rows/10);
        }

        public function Add($sanpham)
        {
            $sql = "INSERT INTO sanpham VALUES(null, '$sanpham->TenSanPham', '$sanpham->HinhURL', 
                $sanpham->GiaSanPham, $sanpham->PhanTramGiamGia, '$sanpham->NgayNhap', $sanpham->SoLuongTon, 
                $sanpham->SoLuongBan, $sanpham->SoLuocXem, '$sanpham->MoTa', $sanpham->BiXoa, $sanpham->MaLoaiSanPham, 
                $sanpham->MaHangSanXuat)";


            $this->ExecuteQuery($sql);
        }
        public function Edit($sanpham)
        {
            $sql = "UPDATE sanpham SET TenSanPham='$sanpham->TenSanPham', HinhURL='$sanpham->HinhURL', 
                GiaSanPham=$sanpham->GiaSanPham, PhanTramGiamGia=$sanpham->PhanTramGiamGia, 
                NgayNhap='$sanpham->NgayNhap', SoLuongTon=$sanpham->SoLuongTon, SoLuongBan=$sanpham->SoLuongBan, 
                SoLuocXem=$sanpham->SoLuocXem, MoTa='$sanpham->MoTa', BiXoa=$sanpham->BiXoa, 
                MaLoaiSanPham=$sanpham->MaLoaiSanPham, MaHangSanXuat=$sanpham->MaHangSanXuat
                 WHERE MaSanPham=$sanpham->MaSanPham";


           $this->ExecuteQuery($sql);

        }
        public function Delete($MaSanPham)
        {
            $sql = "DELETE FROM sanpham WHERE MaSanPham = $MaSanPham";


            $this->ExecuteQuery($sql);

        }

        public function SetDeleted($MaSanPham)
        {
            $sql = "UPDATE sanpham SET BiXoa=1 WHERE MaSanPham=$MaSanPham";

            $this->ExecuteQuery($sql);


        }
        public function UnsetDeleted($MaSanPham)
        {
            $sql = "UPDATE sanpham SET BiXoa=0 WHERE MaSanPham=$MaSanPham";


            $this->ExecuteQuery($sql);
        }
    }
?>