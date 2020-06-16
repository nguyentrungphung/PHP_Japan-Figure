<?php 

    session_start();

    if(isset($_SESSION['statusLogin']) && $_SESSION['statusLogin'] == 'success' && isset($_SESSION['admin']) && $_SESSION['admin'] == true)
    {
        echo '<script type="text/javascript">window.location.href="dashboard.php";</script>';
    }

    include_once './gui/modules/function.php';

    include_once './dto/ChiTietDonHang.php';
    include_once './dto/HangSanXuat.php';
    include_once './dto/DonDatHang.php';
    include_once './dto/LoaiSanPham.php';
    include_once './dto/SanPham.php';
    include_once './dto/TaiKhoan.php';

    include_once './dao/Provider.php';
    include_once './dao/ChiTietDonHangDAO.php';
    include_once './dao/HangSanXuatDAO.php';
    include_once './dao/DonDatHangDAO.php';
    include_once './dao/LoaiSanPhamDAO.php';
    include_once './dao/SanPhamDAO.php';
    include_once './dao/TaiKhoanDAO.php';

    include_once './bus/ChiTietDonHangBUS.php';
    include_once './bus/DonDatHangBUS.php';
    include_once './bus/HangSanXuatBUS.php';
    include_once './bus/LoaiSanPhamBUS.php';
    include_once './bus/SanPhamBUS.php';
    include_once './bus/TaiKhoanBUS.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="./css/style.css" type="text/css" rel="stylesheet"/>
    <link href="./css/style-2.css" type="text/css" rel="stylesheet"/>
    <link href="./css/style_3.css" type="text/css" rel="stylesheet"/>
    <link href="./css/chitietsanpham.css" type="text/css" rel="stylesheet"/>
    <script src="./js/chitietsanpham.js"></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>

    <link rel="shortcut icon" type="image/png" href="./img/favicon.webp"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <!-- bootstrap  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Figure Shop</title>
</head>
<body>
    <div id="wrapper">
        <?php include_once('./gui/modules/goheadfoot.php') ?>
        
        <div id="header">           
            <div id="top-bar"> 
                <?php include_once('./gui/modules/top-bar.php') ?>
            </div>

            <div id="master-header">
                <?php include_once('./gui/modules/master-header.php') ?>   
            </div>
        </div>

        <div id="navigation">
            <div id="menu">
                <?php include_once('./gui/modules/menu.php') ?>
            </div> 

            <!-- <div id="menuHSX">
                <php include_once('./gui/modules/menuHSX.php') ?>
            </div> 
             -->
            <div id="banner">
                <?php include_once('./gui/modules/banner.php') ?>
            </div>
        </div>
        
        <div id="content">

            <?php
                if(isset($_GET['p']))
                {
                    switch($_GET['p'])
                    {
                        case 1:
                            include_once('./gui/pages/sanpham.php');
                            break;
                        case 2:
                            include_once('./gui/modules/exLogin.php');
                            break;
                        case 3:
                            include_once('./gui/pages/dangki.php');
                            break;
                        case 4:
                            include_once('./gui/pages/chitietsanpham.php'); 
                            break;
                        case 5:
                            include_once('./gui/pages/giohang.php'); 
                            break;
                        case 6:
                            include_once('./gui/modules/exRegister.php');
                            break;
                        case 7:
                            include_once('./gui/modules/exDatHang.php');
                            break;
                        case 8:
                            include_once('./gui/modules/exAdd-cart.php');
                            break;
                        case 9:
                            include_once('./gui/modules/exLogout.php');
                            break;
                        case 10:
                            include_once('./gui/pages/lichsudathang.php');
                            break;


                        default:
                            include_once('./gui/pages/index.php');
                            break;

                    }
                }
                else
                {
                    include_once('./gui/pages/index.php');
                }
            ?>

        </div>


        <div id="footer">
            <?php include_once('./gui/modules/footer.php') ?>
        </div>

    </div>

    <script src="./js/script.js"></script>
</body>
</html>


   