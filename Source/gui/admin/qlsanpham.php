<div id="content-page">
    <div class="container">

        <div class="title-header">
            <span>Quản lý sản phẩm</span>
        </div>

        <div id="table-quanly">
            <!--            FORM TÌM KIẾM ---------------------------------------------------------------------------------------------->
            <table id="table-menu">
                <tr>
                    <td>
                        <form action="#" method="POST">
                            <input id="searchLSP" type="text" placeholder="Thông Tin Sản phẩm..." required
                                   name='txtSearch'>
                            <input id="btsearchLSP" type='submit' value="Tìm Sản Phẩm" name='chucnang'>
                        </form>
                    </td>
                </tr>
                <td>
                </td>
                </tr>
                <tr>
                    <td>
                        <input id="searchDS3" type='button' value="Liệt Kê Tất Cả"
                               onclick="location.href='dashboard.php?p=1'">
                        <input id="searchDS1" type='button' value="Chưa Xóa"
                               onclick="location.href='dashboard.php?p=1&temp=0'">
                        <input id="searchDS2" type='button' value="Đã Xóa"
                               onclick="location.href='dashboard.php?p=1&temp=1'">
                    </td>
                </tr>
            </table>


            <table border="1px" cellspacing="0" id="table-list">
                <?php
                if (isset($_POST['chucnang'])) {
                    if ($_POST['chucnang'] == 'DETAIL' || $_POST['chucnang'] == 'UpLoad') {
                        echo '<script> window.location = "#ChiTietSanPham"; </script>';
                    } else if ($_POST['chucnang'] == 'DELETE') {
                        echo '<script> window.location = "dashboard.php?p=101"; </script>';
                    }
                }
                //KIỂM TRA TRẠNG THÁI ĐĂNG NHẬP -----------------------------------------------------------------
                if (($_SESSION['admin'] != true) || ($_SESSION['statusLogin'] == 'fail')) {
                    echo '<script> window.location = "index.php"; </script>';
                }
                // TIÊU ĐỀ CỦA BẢNG --------------------------------------------------------------------------------------------
                echo "<tr>
                    <th>STT</th>
                    <th>Mã Sản Phẩm</th>
                    <th>Tên Sản Phẩm</th>
                    <th class='hinhsp'>Hình Ảnh</th> 
                    <th>Giá Cả</th>
                    <th>Số Lượng Tồn</th> 
                    <th>Chức Năng</th>

                </tr>";
                $SPBUS = new SanPhamBUS();
                $result = null;
                // KẾT QUẢ TÌM KIẾM --------------------------------------------------------------------------------------------
                if (isset($_POST['txtSearch'])) {
                    $DK = $_POST['txtSearch'];
                    $result = $SPBUS->GetByIDList($DK);
                    if ($result == null) {
                        $result = $SPBUS->GetByName($DK);
                    }
                } else if (isset($_GET['temp'])) {
                    $trangthai = $_GET['temp'];
                    if ($trangthai == '0') {
                        $result = $SPBUS->GetAllAvaiable();
                    } else {
                        $result = $SPBUS->GetAllUnAvaiAble();
                    }
                } else {
                    $result = $SPBUS->GetAll();
                }
                $i = 1;

                // Button DETAIL - DELETE --------------------------------------------------------------------------------------------
                if ($result != null) {
                    foreach ($result as $item) {
                        echo "<form action='#' method = 'POST'>
                                <tr>";
                        echo "<td class='stt'>$i</td>";
                        echo "<td>
                                   $item->MaSanPham
                                </td>";
                        echo "<td>
                                    $item->TenSanPham
                                </td>";
                        echo "<td class='hinhsp' padding = '0px'>
                                    <img src='$item->HinhURL'/>
                                </td>";
                        echo "<td>" . number_format($item->GiaSanPham) . "đ</td>";
                        echo "<td>
                                   $item->SoLuongTon
                                </td>";
                        echo "<td id ='btadd'>
                                        <input type ='hidden' value ='$item->MaSanPham' name = 'MaSP'>
                                        <input type ='submit' value ='Detail' name = 'chucnang'>
                                </td>";
                        echo "</tr>
                        </form>";
                        $i++;
                    }
                }

                ?>
            </table>


            <!--            FORM Chi Tiết Sản Phẩm ---------------------------------------------------------------------------------------------->
            <?php
            $loaisanpham = new LoaiSanPhamBUS();
            $hangsanxuat = new HangSanXuatBUS();

            $DS_LSP = $loaisanpham->GetAll();
            $DS_HSX = $hangsanxuat->GetAll();


            
            $URLImages = null;
            $MASANPHAM = null;
            if (isset($_POST['MaSP']) && $_POST['MaSP']!=null) {
                $MASANPHAM = $_POST['MaSP'];
                $SanPhamBUS = new SanPhamBUS();
                $SanPhamDuocChon = $SanPhamBUS->GetByID($MASANPHAM);
            }
            else
            {
                $SanPhamDuocChon = new SanPham();
            }
                echo "<div class=\"title-header\" id='ChiTietSanPham'>
                        <span>Chi Tiết sản phẩm</span>
                    </div>";
                    
                    echo "<div id='frmAddSanPham'>
                            <div id='idUpAnhSanPham'>";
                                if (isset($_POST['chucnang'])) 
                                {
                                    if ($_POST['chucnang'] == 'UpLoad') {
                                        $name = $_FILES["txtURLAnh"]["name"];
                                        $URLImages = "./images/$name";
                                        move_uploaded_file($_FILES["txtURLAnh"]["tmp_name"], $URLImages);
                                        echo "<img height='198px' width='198px' src=$URLImages alt='Ảnh sản phẩm'>";
                                    } else {
                                        echo "<img height='198px' width='198px' src='$SanPhamDuocChon->HinhURL' alt='Ảnh sản phẩm'>";
                                    }
                                }

                            echo " 
                                <form enctype='multipart/form-data' method='post' action='dashboard.php?p=1'>
                                    <input type='hidden' name='MaSP' value='$MASANPHAM' />
                                    <input required type ='file' name = 'txtURLAnh'>
                                    <input type='submit' name='chucnang' value='UpLoad' style='border:1px solid black;border-radius:5px;blackground-color:#efefef;color:black'>
                                </form>
                            </div>";
                        
                        
                    
                        echo"<div id='INFO_SP'>";
                            echo"<form method='post' action='dashboard.php?p=101'>";
                            
                                echo "<div>
                                    <span>Tên sản phẩm:</span>
                                    <input required type ='text' name = 'txtTenSP' placeholder ='Tên Sản Phẩm' value='$SanPhamDuocChon->TenSanPham'>
                                </div>";

                                echo "<div>
                                    <span>Giá Tiền (VNĐ):</span>
                                    <input required type ='number' name = 'txtGiaSP' value='$SanPhamDuocChon->GiaSanPham' min='1000' max='99999999' step='1000'>
                                </div>";

                                echo "<div>
                                    <span>Tỉ Lệ Giảm Giá:</span>
                                    <input required type ='number' name = 'txtPTGG' value='$SanPhamDuocChon->PhanTramGiamGia' min='1' max='100'>
                                </div>";

                                echo "<div>
                                    <span>Ngày Nhập:</span>
                                    <input required type ='datetime' name = 'txtNgayNhap' value ='$SanPhamDuocChon->NgayNhap'>
                                </div>";

                                echo "<div>
                                    <span>Số Lượng Tồn:</span>
                                    <input required type ='number' name = 'txtSLT' value='$SanPhamDuocChon->SoLuongTon' min='0'>
                                </div>";

                                echo "<div>
                                    <span>Số Lượng Bán:</span>
                                    <input required type ='number' name = 'txtSLB' value='$SanPhamDuocChon->SoLuongBan' min='0'>
                                </div>";

                                echo "<div>
                                    <span>Số Lượt Xem:</span>
                                    <input required type ='number' name = 'txtSLX' value='$SanPhamDuocChon->SoLuocXem' min='0'>
                                </div>";

                                echo "<div>
                                    <span>Trạng Thái:</span>
                                    <select name='txtBiXoa'>
                                        <option value ='0' ".(($SanPhamDuocChon->BiXoa == 0)? "selected" : "").">Chưa Xóa</option>
                                        <option value ='1' ".(($SanPhamDuocChon->BiXoa != 0)? "selected" : "")." >Đã Xóa</option>
                                    </select>
                                </div>";

                                echo "<div>
                                    <span>Loại Sản Phẩm:</span>
                                    <select name='txtMaLSP'>";
                                        foreach ($DS_LSP as $item) 
                                        {
                                            if ($SanPhamDuocChon->MaLoaiSanPham == $item->MaLoaiSanPham)
                                                echo " <option value = '$item->MaLoaiSanPham' selected>$item->TenLoaiSanPham</option>";
                                            else
                                                echo " <option value = '$item->MaLoaiSanPham'>$item->TenLoaiSanPham</option>";
                                        }
                                echo"</select >
                                </div>";

                                echo "<div>
                                    <span>Hãng Sản Xuất:</span>
                                    <select name='txtHSX'>";
                                        foreach ($DS_HSX as $item) 
                                        {
                                            if ($SanPhamDuocChon->MaHangSanXuat == $item->MaHangSanXuat)
                                                echo " <option value = '$item->MaHangSanXuat' selected>$item->TenHangSanXuat</option>";
                                            else
                                                echo " <option value = '$item->MaHangSanXuat'>$item->TenHangSanXuat</option>";
                                        }
                                echo"</select>
                                </div>";

                                echo "<div>
                                    <span>Mô Tả:</span>
                                    <textarea rows='5' cols='25' name = 'txtMoTa' placeholder ='Mô Tả'>$SanPhamDuocChon->MoTa</textarea>
                                </div>";

                                
                                if ($URLImages != null) {
                                    echo "<input type='hidden' name='txtURLAnh' value= $URLImages>";
                                } else {
                                    echo "<input type='hidden' name='txtURLAnh' value='$SanPhamDuocChon->HinhURL'>";
                                }

                                echo "<input type='hidden' name='txtMaSP' value= '$SanPhamDuocChon->MaSanPham'>";
                                echo" <div id='chucnang-area'>
                                        <input type='submit' style='color:black; background:#6461fd;border:none;'name='chucnang' value='Add'>
                                        <input type='submit' style='color:black; background:aqua;border:none; ' name='chucnang' value='Edit'>
                                        <input type ='submit' style='color:black; background:red; border:none;' name = 'chucnang' value ='Delete'>
                                    </div>";
                             echo "</form>
                        </div>";
                    echo "</div>";
            
            ?>
        </div>
    </div>
</div>