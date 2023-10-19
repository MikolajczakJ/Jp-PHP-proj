<?php
$min = 2147483647;
foreach ($tablica as $key => $value) {
    if ($min>$key) {
        $min = $key;
    }
}
echo $min;
?>