
<?php 

// <div id="lookup-advance-title" onclick="hideShowLookUpAdvance()">Tìm kiếm nâng cao</div>
    $content = '<div class="container" style=" padding: 0 !important;">
   
        <form action="index.php" method="get" name="lookup-advance" id="frmLookupAdvance">';
    
    
    $content .= '<input type="hidden" name="p" value="1" />';
    
    $lstLoaiSpBUS = new LoaiSanPhamBUS();
    $lstHangSxBUS = new HangSanXuatBUS();

    $listLoaiSp = $lstLoaiSpBUS->GetName();
    $listHangSx = $lstHangSxBUS->GetName();
    // thay doi 
    $content .= createGroupCheckbox('', 'loaisp', $listLoaiSp);
    // $content .= createGroupCheckbox('Thương hiệu', 'nhasx', $listHangSx);


    $content .= '<div class="group-price-range"> 
                    <span>Giá tối thiểu</span><input type="number" min="0" max="10000000" step="500000" name="giamin" value="'.((isset($_GET['giamin']))?$_GET['giamin']:'').'" /> 
                    <span>Giá tối đa</span><input type="number" min="0" max="10000000" step="500000" name="giamax"  value="'.((isset($_GET['giamax']))?$_GET['giamax']:'').'"/> 
                </div> 
                <input  type="submit" value="Tìm kiếm" /> 
            </form> 
        </div>';

    echo $content;   
?>



<script typy="text/javascript">
    var formLookup = document.getElementById("frmLookupAdvance");
    function hideShowLookUpAdvance()
    {
        if(formLookup.style.display == 'none')
            formLookup.style.display = 'block';
        else
        formLookup.style.display = 'none';
    }
</script>
