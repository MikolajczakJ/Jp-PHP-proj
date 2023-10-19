<?php
$i=0;
$a = 10;
do {
    $val = pow($a,$i++);
    if($val<100){
        echo $val."\n";
    }
} while($val<=100)
?>