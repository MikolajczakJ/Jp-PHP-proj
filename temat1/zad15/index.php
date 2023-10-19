
<?php
$licznik =0;
for ($i = 0; $i < 10; $i++) {
    $val = daj_liczbe();
    if($val%2==0){
        $licznik++;
    }
}
echo $licznik;
?>