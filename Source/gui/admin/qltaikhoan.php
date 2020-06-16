<script type="text/javascript" src="./js/register.js"></script>
<div id="content-page">
    <div class="container">

        <div class="title-header">
            <span>Quản lý tài khoản</span>
        </div>

        <div id="table-quanly">
            <!--            FORM TÌM KIẾM ---------------------------------------------------------------------------------------------->
            <table id="table-menu">
                <tr>
                    <td>
                        <form action="#" method="POST">
                            <input id="searchLSP" type="text" placeholder="Loại sản phẩm..." required name='txtSearch'>
                            <input id="btsearchLSP" type='submit' value="Tìm Thông Tin" name='chucnang'>
                        </form>
                    </td>
                </tr>
                <td>
                </td>
                </tr>
                <tr>
                    <td>
                        <input id="searchDS3" type='button' value="Liệt Kê Tất Cả"
                               onclick="location.href='dashboard.php?p=4'">
                        <input id="searchDS1" type='button' value="Chưa Xóa"
                               onclick="location.href='dashboard.php?p=4&temp=0'">
                        <input id="searchDS2" type='button' value="Đã Xóa"
                               onclick="location.href='dashboard.php?p=4&temp=1'">
                    </td>
                </tr>
            </table>


            <table border="1px" cellspacing="0" id="table-list">
                <?php
                if (($_SESSION['admin'] != true) || ($_SESSION['statusLogin'] == 'fail')) {
                    echo '<script> window.location = "index.php"; </script>';
                }
                if (isset($_POST['chucnang'])) {
                    if ($_POST['chucnang'] == 'DETAIL') {
                        echo '<script> window.location = "#ChiTietTaiKhoan"; </script>';
                    }
                }
                // TIÊU ĐỀ CỦA BẢNG --------------------------------------------------------------------------------------------
                echo "<tr>
                    <th>STT</th>
                    <th>Mã Tài Khoản</th>
                    <th>Tên Đăng Nhập</th>
                    <th>Mật Khẩu</th>
                    <th>Tên Hiển Thị</th> 
                    <th>Loại Tài Khoản</th> 
                    <th>Chức Năng</th>

                </tr>";
                $Acc = new TaiKhoanBUS();
                $result = null;
                if (isset($_POST['txtSearch'])) {
                    // KẾT QUẢ TÌM KIẾM --------------------------------------------------------------------------------------------
                    $DK = $_POST['txtSearch'];
                    $result = $Acc->GetByIDList($DK);
                    if ($result == null) {
                        $result = $Acc->GetByUsernameList($DK);
                        if ($result == null) {
                            $result = $Acc->GetBySDT($DK);
                            if ($result == null) {
                                $result = $Acc->GetByEmailList($DK);
                            }
                        }
                    }
                } else if (isset($_GET['temp'])) {
                    $trangthai = $_GET['temp'];
                    if ($trangthai == '0') {
                        $result = $Acc->GetAllAvaiable();
                    } else {
                        $result = $Acc->GetAllUnAvaiable();
                    }
                } else {
                    $result = $Acc->GetAll();
                }
                $i = 1;


                // FORM XÓA SỬA --------------------------------------------------------------------------------------------
                if ($result != null) {
                    foreach ($result as $item) {
                        echo "<form action='#' method = 'POST'>
                                <tr>";
                        echo "<td class='stt'>$i</td>";
                        echo "<td>$item->MaTaiKhoan</td>";
                        echo "<td>$item->TenDangNhap</td>";
                        echo "<td>$item->MatKhau</td>";
                        echo "<td>$item->TenHienThi</td>";
                        if ($item->MaLoaiTaiKhoan == 1) {
                            echo "<td>Admin</td>";
                        } else {
                            echo "<td>Custumer</td>";
                        }
                        echo "<td>
                                        <input type ='hidden' value ='$item->MaTaiKhoan' name = 'MaTK'>
                                        <input type ='submit' value ='Detail' name = 'chucnang'>
                                    </td>
                        </form>";
                        $i++;
                    }
                }

                ?>
            </table>

            <!--            FORM Chi Tiết Sản Phẩm ---------------------------------------------------------------------------------------------->
            <?php
            if (isset($_POST['MaTK'])) {
                $MATAIKHOAN = $_POST['MaTK'];
                $TK = new TaiKhoanBUS();
                $TaiKhoanDuocChon = $TK->GetByID($MATAIKHOAN);
            }
            else
            {
                $TaiKhoanDuocChon = new TaiKhoan();
            }

                echo "<div class=\"title-header\" id='ChiTietTaiKhoan'>
                        <span>Thông tin chi tiết</span>
                    </div>
                         <div id='idDataInfoTK'>
                         <form action='dashboard.php?p=104' method='POST' onsubmit= 'return testRegister()'>
            <div id='frmregis'>
                <div><img src=\"./img/iconname.png\" ><input required type='text' name='txtTenHT'
                                                                    placeholder='Tên Hiển Thị' value='$TaiKhoanDuocChon->TenHienThi'></div>
                <div><img src=\"./img/iconuser.png\" ><input required type='text' name='txtTenDN' value='$TaiKhoanDuocChon->TenDangNhap' id=\"idusername\"
                                                                    placeholder='Tên đăng nhập'></div>
                <div><img src=\"./img/iconlock.png\" ><input required type='text' name='txtMK' value='$TaiKhoanDuocChon->MatKhau' id=\"idpassword\"
                                                                    placeholder='Mật khẩu'></div>
                <div><img src=\"./img/iconaddress.png\"><input required type='text' name='txtDC' value='$TaiKhoanDuocChon->DiaChi'
                                                                        placeholder='Địa chỉ'></div>
                <div><img src=\"./img/iconphone.png\" ><input required type='text' name='txtDT' value='$TaiKhoanDuocChon->DienThoai' id=\"iddienthoai\"
                                                                    placeholder='Điện thoại'></div>
                <div><img src=\"./img/iconemail.png\" ><input required type='email' name='txtEM' value='$TaiKhoanDuocChon->Email'  id=\"idemail\"
                                                                      placeholder='Email'></div>
                <div> 
                                        <select name ='txtBiXoa'>";
                if ($TaiKhoanDuocChon->BiXoa == 0) {
                    echo "<option value ='0' selected>Chưa Xóa</option>
                          <option value ='1'>Đã Xóa</option>";
                } else {
                    echo "<option value ='0'>Chưa Xóa</option>
                          <option value ='1' selected>Đã Xóa</option>";

                }
                echo " </select>
                                </div>
               
                <div> 
                                        <select name ='txtMaLTK'>";
                if ($TaiKhoanDuocChon->MaLoaiTaiKhoan == 1) {
                    echo "<option value ='1' selected>Admin</option>
                          <option value ='2'>Custumer</option>";
                } else {
                    echo "<option value ='1' >Admin</option>
                          <option value ='2' selected>Custumer</option>";

                }
                echo "</select> 
                </div>
                <div id='notborder'><input type ='hidden' value ='$TaiKhoanDuocChon->MaTaiKhoan' name = 'MaTK'></div>
                <div id='notborder'><input required type='submit' value='Add' name= 'chucnang'></div>
                <div id='notborder'><input required type='submit' value='Edit' name='chucnang'></div>
                <div id='notborder'><input required type='submit' value='Delete' name='chucnang'></div>
        </div>
        </form> 
                 </div>";
            
            ?>

        </div>
    </div>
</div>