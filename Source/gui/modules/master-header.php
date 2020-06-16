<div class="container p-0">
   
    <div id="lookup-area">
        <form name="frmLookup" method="GET" action="index.php">
            <input type="hidden" name="p" value="1" />
            <input type="text" name="tensp" placeholder="Tên sản phẩm" style=" border-bottom-left-radius: 5px;
        border-top-left-radius: 5px;" />
            <input type="submit" value="Tìm kiếm" style=" border-bottom-right-radius: 5px;
        border-top-right-radius: 5px;border-left:none;" />
        </form>
    </div>
    <div id="logo-area">
        <a href="index.php"><img src="./img/logoFigure.webp" alt="logo" /></a>
    </div>
    <div id="cart-area">
        <button ><i class="far fa-heart" style="padding-right:15px"></i></button>
        <button onclick="location.href='index.php?p=5'"><i class="fas fa-shopping-cart" style="padding-right:15px"></i></button>
    </div>
</div>