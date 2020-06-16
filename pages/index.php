
<div id="content-page"> 
    <div class="container">

        <div class="product-area">
            <div class="title-header">
                <span>SẢN PHẨM MỚI NHẤT</span>
            </div>

            <?php
                
                $sanphamBUS = new SanPhamBUS();
                $lstSanpham = $sanphamBUS->GetNewProduct();

                foreach ($lstSanpham as $key => $value ) {
                    echo createBoxProduct($value);
                }
            ?>

        </div>

        <div id="hr"></div>
        <div id="page-index"></div>

        <div class="product-area">
            <div class="title-header">
                <span>SẢN PHẨM BÁN CHẠY NHẤT</span>
            </div>

            <?php
                
                $sanphamBUS = new SanPhamBUS();
                $lstSanpham = $sanphamBUS->GetSellingProduct();

                foreach ($lstSanpham as $key => $value ) {
                    echo createBoxProduct($value);
                }
            ?>

        </div>
    </div>
</div>