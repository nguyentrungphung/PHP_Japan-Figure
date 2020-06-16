<?php

    class LoaiSanPhamDAO extends Provider
    {
        public  function GetAll()
        {
            $sql = "SELECT MaLoaiSanPham, TenLoaiSanPham, BiXoa FROM loaisanpham";

            $result = $this->ExecuteQuery($sql);

            $lstLoaiSanPham = array();
            while($row = mysqli_fetch_array($result))
            {
                extract($row);
                $loaisanpham = new LoaiSanPham();
                $loaisanpham->MaLoaiSanPham = $MaLoaiSanPham;
                $loaisanpham->TenLoaiSanPham = $TenLoaiSanPham;
                $loaisanpham->BiXoa = $BiXoa;

                $lstLoaiSanPham[] = $loaisanpham;
            }

            
            return $lstLoaiSanPham;
        }

        public  function GetAllAvaiable()
        {
            $sql = "SELECT MaLoaiSanPham, TenLoaiSanPham, BiXoa FROM loaisanpham WHERE BiXoa = 0";

            $result = $this->ExecuteQuery($sql);

            $lstLoaiSanPham = array();
            if($result == true)
            {
                while($row = mysqli_fetch_array($result))
                {
                    extract($row);
                    $loaisanpham = new LoaiSanPham();
                    $loaisanpham->MaLoaiSanPham = $MaLoaiSanPham;
                    $loaisanpham->TenLoaiSanPham = $TenLoaiSanPham;
                    $loaisanpham->BiXoa = $BiXoa;

                    $lstLoaiSanPham[] = $loaisanpham;
                }
                return $lstLoaiSanPham;
            }
            return null;
        }

        public  function GetAllUnAvaiable()
        {
            $sql = "SELECT MaLoaiSanPham, TenLoaiSanPham, BiXoa FROM loaisanpham WHERE BiXoa = 1";

            $result = $this->ExecuteQuery($sql);

            $lstLoaiSanPham = array();
            if($result == true)
            {
                while($row = mysqli_fetch_array($result))
                {
                    extract($row);
                    $loaisanpham = new LoaiSanPham();
                    $loaisanpham->MaLoaiSanPham = $MaLoaiSanPham;
                    $loaisanpham->TenLoaiSanPham = $TenLoaiSanPham;
                    $loaisanpham->BiXoa = $BiXoa;

                    $lstLoaiSanPham[] = $loaisanpham;
                }
                return $lstLoaiSanPham;
            }
            return null;
        }

        public  function GetName()
        {
            $sql = "SELECT TenLoaiSanPham FROM loaisanpham WHERE BiXoa = 0";

            $result = $this->ExecuteQuery($sql);

            $lstLoaiSanPham = array();
            while($row = mysqli_fetch_array($result))
            {
                extract($row);

                $lstLoaiSanPham[] = $TenLoaiSanPham;
            }

            
            return $lstLoaiSanPham;
        }

        public  function CreateMaLSP()
        {
            $sql = "SELECT MaLoaiSanPham FROM loaisanpham ORDER BY MaLoaiSanPham DESC LIMIT 1";

            $result = $this->ExecuteQuery($sql);

            $row = mysqli_fetch_array($result);
            extract($row);

            return $MaLoaiSanPham + 1;
        }

        public function GetByName($TenLoai)
        {
            $sql = "SELECT MaLoaiSanPham, TenLoaiSanPham, BiXoa FROM loaisanpham WHERE TenLoaiSanPham = '$TenLoai'";

            $result = $this->ExecuteQuery($sql);

            $lstLoaiSanPham = array();
            if($result->num_rows !=0) {
                while ($row = mysqli_fetch_array($result)) {
                    extract($row);
                    $loaisanpham = new LoaiSanPham();
                    $loaisanpham->MaLoaiSanPham = $MaLoaiSanPham;
                    $loaisanpham->TenLoaiSanPham = $TenLoaiSanPham;
                    $loaisanpham->BiXoa = $BiXoa;

                    $lstLoaiSanPham[] = $loaisanpham;
                }
                return $lstLoaiSanPham;
            }

            return null;
        }
        public function GetByMa($MaLoai)
        {
            $sql = "SELECT MaLoaiSanPham, TenLoaiSanPham, BiXoa FROM loaisanpham WHERE MaloaiSanPham = $MaLoai";

            $result = $this->ExecuteQuery($sql);


            $lstLoaiSanPham = array();
            if($result == true)
            {
                while($row = mysqli_fetch_array($result))
                {
                    extract($row);
                    $loaisanpham = new LoaiSanPham();
                    $loaisanpham->MaLoaiSanPham = $MaLoaiSanPham;
                    $loaisanpham->TenLoaiSanPham = $TenLoaiSanPham;
                    $loaisanpham->BiXoa = $BiXoa;

                    $lstLoaiSanPham[] = $loaisanpham;
                    return $lstLoaiSanPham;
                }
            }


            return null;
        }
        public function Add($LoaiSP)
        {
            $sql = "INSERT INTO loaisanpham VALUES('$LoaiSP->MaLoaiSanPham','$LoaiSP->TenLoaiSanPham',$LoaiSP->BiXoa)";
            $this->ExecuteQuery($sql);
        }

        public function Edit($LoaiSP)
        {
            $sql = "UPDATE loaisanpham SET TenLoaiSanPham = '$LoaiSP->TenLoaiSanPham', BiXoa = $LoaiSP->BiXoa WHERE MaLoaiSanPham = $LoaiSP->MaLoaiSanPham";
            $this->ExecuteQuery($sql);
        }

        public function Delete($MaLSP)
        {
            $sql = "DELETE FROM loaisanpham WHERE MaLoaiSanPham = $MaLSP";
            $this->ExecuteQuery($sql);
        }

        public function SetDelete($MaLSP)
        {
            $sql = "UPDATE loaisanpham SET BiXoa = 1 WHERE MaLoaiSanPham = $MaLSP";
            $this->ExecuteQuery($sql);
        }
        public function UnSetDelete($MaLSP)
        {
            $sql = "UPDATE loaisanpham SET BiXoa = 0 WHERE MaLoaiSanPham = $MaLSP";
            $this->ExecuteQuery($sql);
        }

    }
?>