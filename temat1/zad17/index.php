<?php
$counter = 0;
do {
$val = daj_liczbe();
if($val <0){
    $counter++;
}
} while($val != "STOP");
echo $counter;
?>
