<?php


    class SanPhamBUS extends Provider
    {
        var $sanphamDAO;
    
        public function __construct()
        {
            $this->sanphamDAO = new SanPhamDAO();
        }

        public function GetAll()
        {
            return $this->sanphamDAO->GetAll();
        }

        public function GetAllAvaiable()
        {
            return $this->sanphamDAO->GetAllAvaiable();
        }

        public function GetAllUnAvaiable()
        {
            return $this->sanphamDAO->GetAllUnAvaiable();
        }

        public function GetByID($id)
        {
            return $this->sanphamDAO->GetByID($id);
        }

        public function GetByIDList($id)
        {
            return $this->sanphamDAO->GetByIDList($id);
        }
        
        public function GetByName($name)
        {
            return $this->sanphamDAO->GetByName($name);
        }

        public function GetPriceByID($id)
        {
            return $this->sanphamDAO->GetPriceByID($id);
        }
        
        public function GetMountByID($id)
        {
            return $this->sanphamDAO->GetMountByID($id);
        }
        public function SetMountByID($id, $sl)
        {
            return $this->sanphamDAO->SetMountByID($id, $sl);
        }
        public function UpdateSLBanByID($id, $sl)
        {
            return $this->sanphamDAO->UpdateSLBanByID($id, $sl);
        }
        public function UpdateSLXemByID($id, $sl)
        {
            return $this->sanphamDAO->UpdateSLXemByID($id, $sl);
        }

        public function GetNewProduct()
        {
            return $this->sanphamDAO->GetNewProduct();
        }

        public function GetSellingProduct()
        {
            return $this->sanphamDAO->GetSellingProduct();
        }
       
        public function GetProductLQ($id)
        {
            return $this->sanphamDAO->GetProductLQ($id);
        }

        public function GetSameCategory($sanpham)
        {
            return $this->sanphamDAO->GetSameCategory($sanpham);
        }

        public function GetByURL($url)
        {
            return $this->sanphamDAO->GetByURL($url);
        }

        public function GetNumberPageByURL($url)
        {
            return $this->sanphamDAO->GetNumberPageByURL($url);
        }

        public function Add($sanpham)
        {
            return $this->sanphamDAO->Add($sanpham);
        }
        public function Edit($sanpham)
        {
            return $this->sanphamDAO->Edit($sanpham);

        }
        public function Delete($MaSanPham)
        {
            return $this->sanphamDAO->Delete($MaSanPham);
        }

        public function SetDeleted($MaSanPham)
        {
            return $this->sanphamDAO->SetDeleted($MaSanPham);
        }
        public function UnsetDeleted($MaSanPham)
        {
            return $this->sanphamDAO->UnsetDeleted($MaSanPham);
        }
    }
?>