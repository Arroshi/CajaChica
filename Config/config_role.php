<?php 

    $hide_u = "";
    $hide_a = "";
    if ($_SESSION['rol'] == '2') {
        $hide_p = "style='display:none;'";
    }else{
        $hide_p = "style='display:block;'";
    }

    if ($_SESSION['rol'] == '1') {
        $hide_a = "style='display:none;'";
    }


 ?>