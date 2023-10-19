<?php
     do {
        if($a==1){
            echo "TAK";
            break;
        }
        elseif ($a%2==0) {
            $a/=2;
        } else {
            echo "NIE";
            break;
        }
     } while ($a > 0 );   
?>
