<?php 
    require_once("entities/product.class.php");
    require_once("entities/category.class.php"); 
?>
<?php
    include_once("header-client.php");
    if(!isset($_GET["cateid"])){
        $prods=Product::list_product();
    }
    else{
        $cateid = $_GET["cateid"];
        $prods=Product::list_product_by_cateid($cateid);
    }
	$cates = category::list_category();

?>
<div class="container text-center">
    <div class="col-sm-3 panel panel-danger">
        <h3 class="panel-heading">Danh mục</h3>
        <ul class = "list-group">
            <?php
             foreach($cates as $item){
                echo "<li class='list-group-item'><a href=/Figure_shop/list_product.php?cateid=".$item["CateID"].">".$item["CategoryName"]."</a>
                </li>";
            }
            ?>
        </ul>
    </div>
    <div class="col-sm-9">
        <h3>Sản phẩm theo loại</h3><br>
        <div class="row">
            <?php
                foreach($prods as $item){
            ?>
            <div class="col-sm-4">
                <?php echo $item["ProductID"];?>
                <?php echo '<img  class="img-responsive" style="width:100%" alt="Image" src="images/'.$item["Picture"].'">';?>
                <?php echo "<a href=/Figure_shop/product_detail.php?id=".$item["ProductID"].">".$item["ProductName"]."</a>";?> 
                <p  class="text-info"><?php echo $item["Price"]; ?></p>
                <p>
                    <button type="button" class="btn btn-primary" 
                    onclick="location.href='/Figure_shop/shopping_cart.php?id=<?php echo $item["ProductID"]; ?>'">Mua hàng</button>
                    
                </p>
              
            </div>
            <?php 
                }
            ?>
        </div>
    </div>
    </div>
    <?php
    include_once("footer-client.php");
?>
