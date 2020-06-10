<?php require_once("entities/product.class.php"); ?>
<?php
    include_once("header-client.php");
	$prods=Product::list_product();
	?>

<div class="product-easy">
	<div class="container">
		
		<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
		<script type="text/javascript">
							$(document).ready(function () {
								$('#horizontalTab').easyResponsiveTabs({
									type: 'default', //Types: default, vertical, accordion           
									width: 'auto', //auto or any width like 600px
									fit: true   // 100% fit in a container
								});
							});
							
		</script>
		<div class="sap_tabs">
			<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
				<ul class="resp-tabs-list">
				
					<li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>Latest Designs</span></li> 
					<li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>Special Offers</span></li> 
					<li class="resp-tab-item" aria-controls="tab_item-2" role="tab"><span>Collections</span></li>
				</ul>				  	 
				<div class="resp-tabs-container">
					<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
						

<?php 
	foreach ($prods as $item) {
        
     


        // echo("<p>Ten san pham ".$item["ProductName"]."</p>");
        // echo("<p>Gia san pham ".$item["Price"]."</p>");
        // echo("<p>SL san pham ".$item["Quantity"]."</p>");
        // echo("<p>Mo ta san pham ".$item["Description"]."</p>");
		



		echo '<div class="col-md-3 product-men">';
		echo '<div class="men-pro-item simpleCart_shelfItem">';
		echo '<div class="men-thumb-item">';
		echo '<img max-width="220" max-hight="161" src="images/'.$item["Picture"].'" alt="" class="pro-image-front">';
		echo '<img max-width="220" max-hight="161" src="images/'.$item["Picture"].'" alt="" class="pro-image-back">';
		echo '<div class="men-cart-pro">';
		echo '<div class="inner-men-cart-pro">';
		echo '<a href="single.html" class="link-product-add-cart">Quick View</a>';
		echo '</div>';
		echo '</div>';
		echo '<span class="product-new-top">New</span>';
		echo '';
		echo '</div>';
		echo '<div class="item-info-product ">';
		echo '<h4><a href="single.html">'.$item["ProductName"].'</a></h4>';
		echo '<div class="info-product-price">';
		echo '<span class="item_price">'.$item["Price"].'</span>';
		echo '<del>'.$item["Price"].'</del>';
		echo '</div>';
		echo '<a href="#" class="item_add single-item hvr-outline-out button2">Add to cart</a>';
		echo '</div>';
		echo '</div>';
		echo '</div>';




        
    }?>
    
    

					<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
						<div class="col-md-3 product-men">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item">
									<img src="images/w1.png" alt="" class="pro-image-front">
									<img src="images/w1.png" alt="" class="pro-image-back">
										<div class="men-cart-pro">
											<div class="inner-men-cart-pro">
												<a href="single.html" class="link-product-add-cart">Quick View</a>
											</div>
										</div>
										<span class="product-new-top">New</span>
										
								</div>
								<div class="item-info-product ">
									<h4><a href="single.html">Wedges</a></h4>
									<div class="info-product-price">
										<span class="item_price">$45.99</span>
										<del>$69.71</del>
									</div>
									<a href="#" class="item_add single-item hvr-outline-out button2">Add to cart</a>									
								</div>
							</div>
						</div>
						
						<div class="clearfix"></div>						
					</div>
					<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-2">
						<div class="col-md-3 product-men">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item">
									<img src="images/g1.png" alt="" class="pro-image-front">
									<img src="images/g1.png" alt="" class="pro-image-back">
										<div class="men-cart-pro">
											<div class="inner-men-cart-pro">
												<a href="single.html" class="link-product-add-cart">Quick View</a>
											</div>
										</div>
										<span class="product-new-top">New</span>
										
								</div>
								<div class="item-info-product ">
									<h4><a href="single.html">Dresses</a></h4>
									<div class="info-product-price">
										<span class="item_price">$45.99</span>
										<del>$69.71</del>
									</div>
									<a href="#" class="item_add single-item hvr-outline-out button2">Add to cart</a>									
								</div>
							</div>
						</div>
						<div class="clearfix"></div>		
					</div>	
				</div>	
			</div>
		</div>
	</div>
</div>

    
    <?php
    include_once("footer-client.php");
    
?>


