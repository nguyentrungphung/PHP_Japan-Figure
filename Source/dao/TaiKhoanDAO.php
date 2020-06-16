<?php

    class TaiKhoanDAO extends Provider
    {
        public function GetAll()
        {
            $sql = "SELECT  MaTaiKhoan, TenDangNhap, MatKhau, TenHienThi ,DiaChi, DienThoai, Email, BiXoa, MaLoaiTaiKhoan FROM taikhoan";
            $result = $this->ExecuteQuery($sql);

            $lstAccount = array();

            while($row = mysqli_fetch_array($result))
            {
                extract($row);
                $taikhoan = new TaiKhoan();
                $taikhoan->MaTaiKhoan =  $MaTaiKhoan;
                $taikhoan->TenDangNhap = $TenDangNhap;
                $taikhoan->MatKhau = $MatKhau;
                $taikhoan->TenHienThi = $TenHienThi;
                $taikhoan->DiaChi = $DiaChi;
                $taikhoan->DienThoai  = $DienThoai;
                $taikhoan->Email = $Email;
                $taikhoan->BiXoa = $BiXoa;
                $taikhoan->MaLoaiTaiKhoan = $MaLoaiTaiKhoan;

                $lstAccount[] = $taikhoan;
            }

            return $lstAccount;
        }

        public function GetAllAvaiable()
        {
            $sql = "SELECT  MaTaiKhoan, TenDangNhap, MatKhau, TenHienThi ,DiaChi, DienThoai, Email, BiXoa, MaLoaiTaiKhoan 
                        FROM taikhoan WHERE BiXoa=0";
            $result = $this->ExecuteQuery($sql);

            $lstAccount = array();

            while($row = mysqli_fetch_array($result))
            {
                extract($row);
                $taikhoan = new TaiKhoan();
                $taikhoan->MaTaiKhoan =  $MaTaiKhoan;
                $taikhoan->TenDangNhap = $TenDangNhap;
                $taikhoan->MatKhau = $MatKhau;
                $taikhoan->TenHienThi = $TenHienThi;
                $taikhoan->DiaChi = $DiaChi;
                $taikhoan->DienThoai  = $DienThoai;
                $taikhoan->Email = $Email;
                $taikhoan->BiXoa = $BiXoa;
                $taikhoan->MaLoaiTaiKhoan = $MaLoaiTaiKhoan;

                $lstAccount[] = $taikhoan;
            }

            return $lstAccount;
        }

        public function GetAllUnAvaiable()
        {
            $sql = "SELECT  MaTaiKhoan, TenDangNhap, MatKhau, TenHienThi ,DiaChi, DienThoai, Email, BiXoa, MaLoaiTaiKhoan 
                        FROM taikhoan WHERE BiXoa=1";
            $result = $this->ExecuteQuery($sql);

            $lstAccount = array();

            while($row = mysqli_fetch_array($result))
            {
                extract($row);
                $taikhoan = new TaiKhoan();
                $taikhoan->MaTaiKhoan =  $MaTaiKhoan;
                $taikhoan->TenDangNhap = $TenDangNhap;
                $taikhoan->MatKhau = $MatKhau;
                $taikhoan->TenHienThi = $TenHienThi;
                $taikhoan->DiaChi = $DiaChi;
                $taikhoan->DienThoai  = $DienThoai;
                $taikhoan->Email = $Email;
                $taikhoan->BiXoa = $BiXoa;
                $taikhoan->MaLoaiTaiKhoan = $MaLoaiTaiKhoan;

                $lstAccount[] = $taikhoan;
            }

            return $lstAccount;
        }
        
        public function GetByUsername($username)
        {
            $sql = "SELECT  MaTaiKhoan, TenDangNhap, MatKhau, TenHienThi ,DiaChi, DienThoai, Email, BiXoa, MaLoaiTaiKhoan 
                    FROM taikhoan WHERE TenDangNhap = '$username'";
            $result = $this->ExecuteQuery($sql);

            

            if($result->num_rows > 0)
            {
                $row = mysqli_fetch_array($result);
                extract($row);
                $taikhoan = new TaiKhoan();
                $taikhoan->MaTaiKhoan =  $MaTaiKhoan;
                $taikhoan->TenDangNhap = $TenDangNhap;
                $taikhoan->MatKhau = $MatKhau;
                $taikhoan->TenHienThi = $TenHienThi;
                $taikhoan->DiaChi = $DiaChi;
                $taikhoan->DienThoai  = $DienThoai;
                $taikhoan->Email = $Email;
                $taikhoan->BiXoa = $BiXoa;
                $taikhoan->MaLoaiTaiKhoan = $MaLoaiTaiKhoan;

                return $taikhoan;
            }

            return null;
        }

        public function GetByUsernameList($username)
        {
            $sql = "SELECT  MaTaiKhoan, TenDangNhap, MatKhau, TenHienThi ,DiaChi, DienThoai, Email, BiXoa, MaLoaiTaiKhoan 
                    FROM taikhoan WHERE TenDangNhap = '$username'";
            $result = $this->ExecuteQuery($sql);



            $lstAccount = array();
            if($result == true)
            {
                while($row = mysqli_fetch_array($result))
                {
                    extract($row);
                    $taikhoan = new TaiKhoan();
                    $taikhoan->MaTaiKhoan =  $MaTaiKhoan;
                    $taikhoan->TenDangNhap = $TenDangNhap;
                    $taikhoan->MatKhau = $MatKhau;
                    $taikhoan->TenHienThi = $TenHienThi;
                    $taikhoan->DiaChi = $DiaChi;
                    $taikhoan->DienThoai  = $DienThoai;
                    $taikhoan->Email = $Email;
                    $taikhoan->BiXoa = $BiXoa;
                    $taikhoan->MaLoaiTaiKhoan = $MaLoaiTaiKhoan;

                    $lstAccount[] = $taikhoan;
                    return $lstAccount;
                }
            }


            return null;
        }

        public function GetBySDT($sdt)
        {
            $sql = "SELECT  MaTaiKhoan, TenDangNhap, MatKhau, TenHienThi ,DiaChi, DienThoai, Email, BiXoa, MaLoaiTaiKhoan 
                    FROM taikhoan WHERE DienThoai = '$sdt'";
            $result = $this->ExecuteQuery($sql);



            $lstAccount = array();
            if($result == true)
            {
                while($row = mysqli_fetch_array($result))
                {
                    extract($row);
                    $taikhoan = new TaiKhoan();
                    $taikhoan->MaTaiKhoan =  $MaTaiKhoan;
                    $taikhoan->TenDangNhap = $TenDangNhap;
                    $taikhoan->MatKhau = $MatKhau;
                    $taikhoan->TenHienThi = $TenHienThi;
                    $taikhoan->DiaChi = $DiaChi;
                    $taikhoan->DienThoai  = $DienThoai;
                    $taikhoan->Email = $Email;
                    $taikhoan->BiXoa = $BiXoa;
                    $taikhoan->MaLoaiTaiKhoan = $MaLoaiTaiKhoan;

                    $lstAccount[] = $taikhoan;

                }
                return $lstAccount;
            }


            return null;
        }

        public function GetByEmail($email)
        {
            $sql = "SELECT  MaTaiKhoan, TenDangNhap, MatKhau, TenHienThi ,DiaChi, DienThoai, Email, BiXoa, MaLoaiTaiKhoan 
                    FROM taikhoan WHERE Email = '$email'";
            $result = $this->ExecuteQuery($sql);




            if($result == true)
            {
                while($row = mysqli_fetch_array($result))
                {
                    extract($row);
                    $taikhoan = new TaiKhoan();
                    $taikhoan->MaTaiKhoan =  $MaTaiKhoan;
                    $taikhoan->TenDangNhap = $TenDangNhap;
                    $taikhoan->MatKhau = $MatKhau;
                    $taikhoan->TenHienThi = $TenHienThi;
                    $taikhoan->DiaChi = $DiaChi;
                    $taikhoan->DienThoai  = $DienThoai;
                    $taikhoan->Email = $Email;
                    $taikhoan->BiXoa = $BiXoa;
                    $taikhoan->MaLoaiTaiKhoan = $MaLoaiTaiKhoan;

                    return $taikhoan;

                }
            }


            return null;
        }

        public function GetByID($MaTaiKhoan)
        {
            $sql = "SELECT  MaTaiKhoan, TenDangNhap, MatKhau, TenHienThi ,DiaChi, DienThoai, Email, BiXoa, MaLoaiTaiKhoan 
                    FROM taikhoan WHERE MaTaiKhoan = $MaTaiKhoan";
            $result = $this->ExecuteQuery($sql);

            if($result == true)
            {
                while($row = mysqli_fetch_array($result))
                {
                    extract($row);
                    $taikhoan = new TaiKhoan();
                    $taikhoan->MaTaiKhoan =  $MaTaiKhoan;
                    $taikhoan->TenDangNhap = $TenDangNhap;
                    $taikhoan->MatKhau = $MatKhau;
                    $taikhoan->TenHienThi = $TenHienThi;
                    $taikhoan->DiaChi = $DiaChi;
                    $taikhoan->DienThoai  = $DienThoai;
                    $taikhoan->Email = $Email;
                    $taikhoan->BiXoa = $BiXoa;
                    $taikhoan->MaLoaiTaiKhoan = $MaLoaiTaiKhoan;


                    return $taikhoan;
                }
            }


            return null;
        }

        public function GetByIDList($MaTaiKhoan)
        {
            $sql = "SELECT  MaTaiKhoan, TenDangNhap, MatKhau, TenHienThi ,DiaChi, DienThoai, Email, BiXoa, MaLoaiTaiKhoan 
                    FROM taikhoan WHERE MaTaiKhoan = $MaTaiKhoan";
            $result = $this->ExecuteQuery($sql);



            $lstAccount = array();
            if($result == true)
            {
                while($row = mysqli_fetch_array($result))
                {
                    extract($row);
                    $taikhoan = new TaiKhoan();
                    $taikhoan->MaTaiKhoan =  $MaTaiKhoan;
                    $taikhoan->TenDangNhap = $TenDangNhap;
                    $taikhoan->MatKhau = $MatKhau;
                    $taikhoan->TenHienThi = $TenHienThi;
                    $taikhoan->DiaChi = $DiaChi;
                    $taikhoan->DienThoai  = $DienThoai;
                    $taikhoan->Email = $Email;
                    $taikhoan->BiXoa = $BiXoa;
                    $taikhoan->MaLoaiTaiKhoan = $MaLoaiTaiKhoan;

                    $lstAccount[] = $taikhoan;
                    return $lstAccount;
                }
            }


            return null;
        }

        public function GetByEmailList($email)
        {
            $sql = "SELECT  MaTaiKhoan, TenDangNhap, MatKhau, TenHienThi ,DiaChi, DienThoai, Email, BiXoa, MaLoaiTaiKhoan 
                    FROM taikhoan WHERE Email like '%$email%'";
            $result = $this->ExecuteQuery($sql);



            $lstAccount = array();
            if($result == true)
            {
                while($row = mysqli_fetch_array($result))
                {
                    extract($row);
                    $taikhoan = new TaiKhoan();
                    $taikhoan->MaTaiKhoan =  $MaTaiKhoan;
                    $taikhoan->TenDangNhap = $TenDangNhap;
                    $taikhoan->MatKhau = $MatKhau;
                    $taikhoan->TenHienThi = $TenHienThi;
                    $taikhoan->DiaChi = $DiaChi;
                    $taikhoan->DienThoai  = $DienThoai;
                    $taikhoan->Email = $Email;
                    $taikhoan->BiXoa = $BiXoa;
                    $taikhoan->MaLoaiTaiKhoan = $MaLoaiTaiKhoan;

                    $lstAccount[] = $taikhoan;

                }
                return $lstAccount;
            }


            return null;
        }

        public function Add($taikhoan)
        {
            $sql = "INSERT INTO taikhoan VALUES(NULL,'$taikhoan->TenDangNhap', 
                                                      '$taikhoan->MatKhau',
                                                      '$taikhoan->TenHienThi',
                                                      '$taikhoan->DiaChi',
                                                      '$taikhoan->DienThoai',
                                                      '$taikhoan->Email',
                                                       $taikhoan->BiXoa,
                                                        $taikhoan->MaLoaiTaiKhoan)";
            
            $this->ExecuteQuery($sql);
        }

        public function Edit($taikhoan)
        {
            $sql = "UPDATE taikhoan SET TenDangNhap = '$taikhoan->TenDangNhap',
                                        MatKhau = '$taikhoan->MatKhau',
                                         TenHienThi = N'$taikhoan->TenHienThi',
                                        DiaChi = N'$taikhoan->DiaChi',
                                            DienThoai = '$taikhoan->DienThoai',
                                              Email =  '$taikhoan->Email',
                                          BiXoa = $taikhoan->BiXoa,
                                        MaLoaiTaiKhoan = $taikhoan->MaLoaiTaiKhoan
                    WHERE MaTaiKhoan = $taikhoan->MaTaiKhoan";

            $this->ExecuteQuery($sql);
        }

        public function Delete($taikhoan)
        {
            $sql = "DELETE FROM taikhoan WHERE TenDangNhap = '$taikhoan->TenDangNhap'";

            $this->ExecuteQuery($sql);
        }

        public function SetDeleted($TenUser)
        {
            $sql = "UPDATE taikhoan SET BiXoa = 1 WHERE TenDangNhap = '$TenUser'";

            $this->ExecuteQuery($sql);
        }

        public function UnSetDeleted($TenUser)
        {
            $sql = "UPDATE taikhoan SET BiXoa = 0 WHERE TenDangNhap = '$TenUser'";

            $this->ExecuteQuery($sql);
        }
    }
?>