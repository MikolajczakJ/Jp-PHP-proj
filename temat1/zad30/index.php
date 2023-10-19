<?php
function nie_lubimy_ujemnych($tablica){
    foreach ($tablica as $key => $value) {
        if ($value<0) {
            unset($tablica[$key]);
        }
    }
    return $tablica;
}
?>