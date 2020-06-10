<?php
    require_once("entities/product.class.php");
    require_once("entities/category.class.php"); 
?>
<?php
    ob_start();
    include_once("header-client.php");
    if(!isset($_GET["id"])){
        //Đường dẫn xem chi tiết sản phẩm không đúng dẫn tới trang not found
        header('Location: not_found.php');
        
    }
    else{
        $id = $_GET["id"];
        @$prods= reset(Product::get_product($id)); //lấy giá trị đầu tiên của đối tượng
        $prods_relate = Product::list_product_relate($prods["CateID"],$id); //hàm lấy sản phẩm liên quan
        
    }
    $cates = Category::list_category();
    
    
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
    <div class="col-sm-9 panel panel-info">
        <h3 class="panel-heading">Chi tiết sản phẩm</h3><br>
        <div class="row">
            <div class="col-sm-6">
            <?php echo '<img  class="img-responsive" style="width:100%" alt="Image" src="images/'.$prods["Picture"].'">';?>
            </div>
                <!-- in thông tin chi tiết sản phẩm -->
                <div style="padding-left:10px">
                    <h3 class="text-info">
                        <?php echo $prods["ProductName"]; ?>
                    </h3>
                    <p>
                        Giá: <?php echo $prods["Price"]; ?>
                    </p>
                    <p>
                        Mô tả: <?php echo $prods["Description"]; ?>
                    </p>
                    <p>
                        <button type="button" class="btn btn-danger">Mua hàng</button>
                    </p>
                </div>
            </div>
        </div>
    <h3 class="panel-heading">Sản phẩm liên quan</h3>
    <div class="row">
        <?php
            foreach($prods_relate as $item){
        ?>
        <div class="col-sm-4">
        <?php echo '<img  class="img-responsive" style="width:100%" alt="Image" src="images/'.$item["Picture"].'">';?>
               <p class="text-danger"><?php echo $item["ProductName"]; ?></p>
               
               <p class="text-info"><?php echo $item["Price"]; ?></p>
               <p>
                   <button type="button" class="btn btn-primary" onclick="location.href='/Figure_shop/shopping_cart.php?id=<?php echo $item["ProductID"]; ?>'">Mua hàng</button>
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