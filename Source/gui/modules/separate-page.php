<?php 

    $spBUS = new SanPhamBUS();
    $totalPage = $spBUS->GetNumberPageByURL("$_SERVER[REQUEST_URI]");
    if($totalPage > 1)
    {
        echo '<div id="separate-page">
            <ul>';

            $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $pos = stripos($actual_link, "&page=");
            $pageNow = 1;

            if($pos) 
            {
                $pageNow = substr($actual_link, $pos+6);
                $actual_link = substr($actual_link, 0, $pos);
            }

            for($i = 1; $i <= $totalPage; $i++)
            {
                if($i == $pageNow) echo '<li><a class="pageNow">'.$i.'</a></li>';
                else echo '<li><a href="'.$actual_link.'&page='.$i.'">'.$i.'</a></li>';
            }
              
        echo' </ul>
        </div>';
    }
?>