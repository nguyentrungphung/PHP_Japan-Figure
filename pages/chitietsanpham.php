
<div id="content-page"> 

    <div class="container"> 

        <div id="containerContent">
            <?php  
                $id = $_GET["id"];
                $sanphamBUS = new SanPhamBUS();
                $sanphamBUS->UpdateSLXemByID($id,1);
                $sp = $sanphamBUS->GetByID($id);  

                if ($sp == null)
                {
                    echo '<script type="text/javascript">history.go(-1);</script>';
                }
                else 
                {
                    echo createChitietSanPham($sp);
                }
            ?>
        </div>

        <div class="product-area">
            <div class="title-header">
                <span>CÁC SẢN PHẨM LIÊN QUAN</span>
            </div>


            <?php            
                $id = $_GET["id"];
                $spBUS = new SanPhamBUS();
                $lstSp = $spBUS->GetProductLQ($id);

                if ($lstSp == null)
                {
                    echo('<p>Không tìm thấy sản phẩm nào phù hợp</p>');
                }
                else 
                {
                    foreach($lstSp as $key => $value)
                    {
                        echo createBoxProduct($value);
                    }
                }
            ?>
        </div>

    </div>

</div>
