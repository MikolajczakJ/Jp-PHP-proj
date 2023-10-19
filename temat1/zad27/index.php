<?php
function pole_prostokata($a,$b){
    if ($a<0 || $b<0) {
        return 0;
    } else {
        return $a * $b;
    }
}
?>