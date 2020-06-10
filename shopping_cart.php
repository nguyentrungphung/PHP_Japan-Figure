<?php 
include_once("header-client.php"); ?>
<?php
    require_once("entities/product.class.php");
    require_once("entities/category.class.php");
    $cates = Category::list_category();
    //khởi động session
    @session_start(); 
    //hiển thị lỗi
    error_reporting(E_ALL);
    ini_set('display_errors','1');
    //thêm mới sản phẩm vào giỏ hàng
    if(isset($_GET["id"])){
        $pro_id = $_GET["id"];
        //biến xác nhận sản phẩm đã tồn tại trong giỏ hàng hay chưa
        //was_found = true thì sản phẩm đã có trong giỏ hàng, tăng số lượng lên 1
        //was_found = false sản phẩm chưa có trong giỏ hàng, thêm sản phẩm vào giỏ hàng, mặc định số lượng là 1
        $was_found = false;
        $i=0;
        //kiểm tra session được khởi tạo hay chưa
        if(!isset($_SESSION["cart_items"]) || count($_SESSION["cart_items"])<1)
        {
            $_SESSION["cart_items"] = array(0 => array("pro_id" => $pro_id,"quantity" => 1));
        }
        else 
        {
            //giỏ hàng đã được khởi tạo
            //duyệt tất cả sản phẩm có trong giỏ hàng
            //nếu đã tồn tại sản phẩm thì tăng số lượng lên 1
            //nếu chưa tồn tại thì thêm mới sản phẩm vào giỏ hàng với số lượng là 1
            foreach ($_SESSION["cart_items"] as $item) {
                $i++;
                //while(list($key,$value) = each($item))
                foreach($item as $key => $value)
                {
                    if ($key=="pro_id" && $value==$pro_id) {
                        //sản phẩm đã tồn tại trong giỏ hàng, tăng số lượng lên 1
                        array_splice($_SESSION["cart_items"],$i-1,1,array(array("pro_id" =>$pro_id,"quantity" =>
                        $item["quantity"]+1)));
                        $was_found=true;
                    }
                }
            }
            if($was_found==false)
            {
                array_push($_SESSION["cart_items"], array("pro_id" => $pro_id, "quantity" =>1 ));
            }
        }
        //header("location: shopping_cart.php");
        
        }
?>
    <!-- thông tin trong shopping cart -->
<div class="container text-center">
    <div class="col-sm-3">
    <h3>Danh mục</h3>
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
        <h3>Thông tin giỏ hàng</h3><br>
        <table class="table table-condensed">
            <thead>
             <tr>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Thành tiền</th>
             </tr>
            </thead>
            <tbody>
                <?php 
                    $total_money=0;
                    if(isset($_SESSION["cart_items"]) && count($_SESSION["cart_items"])>0)
                    {
                        foreach($_SESSION["cart_items"] as $item)
                        {
                            $id = $item["pro_id"];
                            $product = Product::get_product($id);
                            $prod = reset($product);
                            $total_money +=$item["quantity"]*$prod["Price"];
                            echo "<tr><td>".$prod["ProductName"]."</td><td><img style='width:90px; height:80px' src=images/".$prod["Picture"].">
                            </td><td>".$item["quantity"]."</td><td>".$prod["Price"]."</td><td>".$prod["Price"]."</td><tr>";
                        }
                        echo "<tr> <td colspan=5><p class='text-right text-danger'>Tổng tiền: ".$total_money."</p></td> </tr>";
                        echo "<tr> <td colspan=3><p class='text-right'><a class='btn btn-primary' href='/Figure_shop/list_product.php'>Tiếp tục mua hàng</a></p></td><td colspan=2><p class='text-right'><a class='btn btn-primary' href='/Figure_shop/thanhtoan.php'>Thanh toán</a></p></td></tr>";
                       
                    }
                    else
                    {
                        echo "Không có sản phẩm nào trong giỏ hàng";
                    }
                ?>
            </tbody>
            </table>
        </div>
</div>
<!-- hiển thị shopping cart -->
<?php
    include_once("footer-client.php");
?>