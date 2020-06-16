<?php
    class HangSanXuatDAO extends Provider
    {
        public function GetAll()
        {
            $sql = "SELECT MaHangSanXuat, TenHangSanXuat, LogoURL, BiXoa FROM HangSanXuat";
            $result = $this->ExecuteQuery($sql);
            $lstHangSanXuat = array();
            while ($row = mysqli_fetch_array($result))
            {
                extract($row);
                $hangsanxuat = new HangSanXuat();
                $hangsanxuat->MaHangSanXuat= $MaHangSanXuat;
                $hangsanxuat->TenHangSanXuat= $TenHangSanXuat;
                $hangsanxuat->LogoURL= $LogoURL;
                $hangsanxuat->BiXoa= $BiXoa;

                $lstHangSanXuat[] = $hangsanxuat;
            }
            return $lstHangSanXuat;
        }

        public function GetAllAvaiable()
        {
            $sql = "SELECT MaHangSanXuat, TenHangSanXuat, LogoURL, BiXoa FROM HangSanXuat WHERE BiXoa = 0";
            $result = $this->ExecuteQuery($sql);
            $lstHangSanXuat = array();
            while ($row = mysqli_fetch_array($result))
            {
                extract($row);
                $hangsanxuat = new HangSanXuat();
                $hangsanxuat->MaHangSanXuat= $MaHangSanXuat;
                $hangsanxuat->TenHangSanXuat= $TenHangSanXuat;
                $hangsanxuat->LogoURL= $LogoURL;
                $hangsanxuat->BiXoa= $BiXoa;

                $lstHangSanXuat[] = $hangsanxuat;
            }
            return $lstHangSanXuat;
        }

        public function GetAllUnAvaiable()
        {
            $sql = "SELECT MaHangSanXuat, TenHangSanXuat, LogoURL, BiXoa FROM HangSanXuat WHERE BiXoa = 1";
            $result = $this->ExecuteQuery($sql);
            $lstHangSanXuat = array();
            while ($row = mysqli_fetch_array($result))
            {
                extract($row);
                $hangsanxuat = new HangSanXuat();
                $hangsanxuat->MaHangSanXuat= $MaHangSanXuat;
                $hangsanxuat->TenHangSanXuat= $TenHangSanXuat;
                $hangsanxuat->LogoURL= $LogoURL;
                $hangsanxuat->BiXoa= $BiXoa;

                $lstHangSanXuat[] = $hangsanxuat;
            }
            return $lstHangSanXuat;
        }


        public  function CreateMaNSX()
        {
            $sql = "SELECT MaHangSanXuat FROM hangsanxuat ORDER BY MaHangSanXuat DESC LIMIT 1";

            $result = $this->ExecuteQuery($sql);

            $row = mysqli_fetch_array($result);
            extract($row);

            return $MaHangSanXuat + 1;
        }


        public function GetName()
        {
            $sql = "SELECT TenHangSanXuat FROM HangSanXuat WHERE BiXoa = 0";

            $result = $this->ExecuteQuery($sql);

            $lstHangSanXuat = array();
            while($row = mysqli_fetch_array($result))
            {
                extract($row);

                $lstHangSanXuat[] = $TenHangSanXuat;
            }

            return $lstHangSanXuat;
        }

        public function GetByName($TenHang)
        {
            $sql = "SELECT MaHangSanXuat, TenHangSanXuat, LogoURL, BiXoa FROM HangSanXuat WHERE TenHangSanXuat = '$TenHang'";

            $result = $this->ExecuteQuery($sql);

            $lstHangSanXuat = array();
            while($row = mysqli_fetch_array($result))
            {
                extract($row);
                $hangsanxuat = new HangSanXuat();
                $hangsanxuat->MaHangSanXuat= $MaHangSanXuat;
                $hangsanxuat->TenHangSanXuat= $TenHangSanXuat;
                $hangsanxuat->LogoURL= $LogoURL;
                $hangsanxuat->BiXoa= $BiXoa;

                $lstHangSanXuat[] = $hangsanxuat;
            }

            return $lstHangSanXuat;
        }
        public function GetByMa($MaHang)
        {
            $sql = "SELECT MaHangSanXuat, TenHangSanXuat, LogoURL, BiXoa FROM HangSanXuat WHERE MaHangSanXuat = '$MaHang'";

            $result = $this->ExecuteQuery($sql);
            $lstHangSanXuat = array();
            while($row = mysqli_fetch_array($result))
            {
                extract($row);
                $hangsanxuat = new HangSanXuat();
                $hangsanxuat->MaHangSanXuat= $MaHangSanXuat;
                $hangsanxuat->TenHangSanXuat= $TenHangSanXuat;
                $hangsanxuat->LogoURL= $LogoURL;
                $hangsanxuat->BiXoa= $BiXoa;

                $lstHangSanXuat[] = $hangsanxuat;
            }

            return $lstHangSanXuat;
        }
        public function Add($HangSX)
        {
            $sql = "INSERT INTO HangSanXuat VALUES('$HangSX->MaHangSanXuat','$HangSX->TenHangSanXuat','$HangSX->LogoURL',0)";
            $this->ExecuteQuery($sql);
        }

        public function Edit($HangSX)
        {
            $sql = "UPDATE HangSanXuat SET TenHangSanXuat='$HangSX->TenHangSanXuat', LogoURL='$HangSX->LogoURL', BiXoa=$HangSX->BiXoa
                 WHERE MaHangSanXuat=$HangSX->MaHangSanXuat";

            $this->ExecuteQuery($sql);
        }

        public function Delete($HangSX)
        {
            $sql = "DELETE FROM HangSanXuat WHERE MaHangSanXuat = $HangSX";
            $this->ExecuteQuery($sql);
        }

        public function SetDelete($HangSX)
        {
            $sql = "UPDATE HangSanXuat SET BiXoa = 1 WHERE MaHangSanXuat = $HangSX";
            $this->ExecuteQuery($sql);
        }

        public function UnSetDelete($HangSX)
        {
            $sql = "UPDATE MaHangSanXuat SET BiXoa = 0 WHERE MaHangSanXuat = $HangSX";
            $this->ExecuteQuery($sql);
        }
    }
?>