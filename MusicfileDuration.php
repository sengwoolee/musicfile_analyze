<?php

require_once('getid3/getid3.php');

$dir = "../";
$dh  = opendir($dir);

while(false !== ($filename = readdir($dh))) {
   if($filename != '.' && $filename != '..')
   {
      $files[] = $filename;
   } 
}

foreach($files as $key => $val) {
   $getID3 = new getID3;
   $file = $getID3->analyze("../".$val);
   $durationinfo[] = $val."/".$file['playtime_seconds'];
}

$resulttxtfile = fopen('filedurationinfo.txt', 'w');


foreach($durationinfo as $key => $val) {
   fwrite($resulttxtfile, $val.chr(13).chr(10));
}

fclose($resulttxtfile);

?>
