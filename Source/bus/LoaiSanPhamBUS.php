<?php
    class LoaiSanPhamBUS extends Provider
    {
        var $loaisanphamDAO;
    
        public function __construct()
        {
            $this->loaisanphamDAO = new LoaiSanPhamDAO();
        }

        public function GetAll()
        {       
            return $this->loaisanphamDAO->GetAll();
        }
        
        public function GetAllAviAble()
        {
            return $this->loaisanphamDAO->GetAllAvaiable();
        }

        public function GetAllUnAviAble()
        {
            return $this->loaisanphamDAO->GetAllUnAvaiable();
        }

        public function CreateMaLSP()
        {
            return $this->loaisanphamDAO->CreateMaLSP();
        }

        public function GetName()
        {       
            return $this->loaisanphamDAO->GetName();
        }

        public function GetByName($name)
        {       
            return $this->loaisanphamDAO->GetByName($name);
        }
        
        public function GetByMa($MaLoai)
        {
            return $this->loaisanphamDAO->GetByMa($MaLoai);
        }      

        public function Add($LoaiLSP)
        {
            return $this->loaisanphamDAO->Add($LoaiLSP);
        }
        public function Edit($LoaiSP)
        {
            return $this->loaisanphamDAO->Edit($LoaiSP);
        }
        public function Delete($MaLSP)
        {
            return $this->loaisanphamDAO->Delete($MaLSP);
        }

        public function SetDelete($MaLSP)
        {
            return $this->loaisanphamDAO->SetDelete($MaLSP);
        }
        public function UnSetDelete($MaLSP)
        {
            return $this->loaisanphamDAO->UnsetDeleted($MaLSP);
        }
    }
?>