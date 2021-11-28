<?php

function fatorial($num) {
$fatorial = 1;

if ($num == 0 ){
    return 1;
} else {
    while ($num > 0) {

        ($fatorial = $fatorial * $num);
        $num--;
        
    }
}

return $fatorial;
}

print_r(fatorial(5));
?>