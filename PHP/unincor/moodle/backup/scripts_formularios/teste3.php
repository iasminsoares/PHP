<?php

function getCSV($name) {
  $file = fopen($name, "r");
  $result = array();
  $i = 0;
  while (!feof($file)):
     if (substr(($result[$i] = fgets($file)), 0, 10) !== ';;;;;;;;') :
        $i++;
     endif;
  endwhile;
  fclose($file);
  //return $result;

  foreach($result as $key => $valor){
    echo $key.' = '.$valor;
}
}

$foo = getCSV('1_5100552012240519481.csv');

print_r($foo);