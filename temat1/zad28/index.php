<?php
function silnia($n){
    if($n<2){
        return 1;
    } else {
        $n --;
        return $n * silnia($n);
    }
}
?>