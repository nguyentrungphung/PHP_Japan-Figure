<!-- <div id="breadcrumb">
    <php include_once('./gui/modules/breadcrumb.php'); ?>
</div> -->

<div id="lookup-advance">
    <?php include_once('./gui/modules/lookup-advance.php') ?>
</div>


<div id="content-page"> 
    <div class="container">

        <div class="product-area">
            <div class="title-header">
                <span>DANH SÁCH SẢN PHẨM</span>
            </div>

            <?php include_once './gui/modules/orderby.php'; ?>

            <?php           
                $spBUS = new SanPhamBUS();
                $lstSp = $spBUS->GetByURL($_SERVER['REQUEST_URI']);

                if($lstSp == null)
                {
                    echo('<p>Không tìm thấy sản phẩm nào phù hợp</p>');
                }
                else {
                    foreach($lstSp as $key => $value)
                    {
                        echo createBoxProduct($value);
                    }
                }
            ?>

        </div>

       

        <div id="hr"></div>
          
        <?php 
            include_once './gui/modules/separate-page.php'; 
        ?>
        
    </div>
</div>