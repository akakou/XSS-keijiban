<?php 

$file_name = dirname(__File__) . '/message.txt';
$file = fopen($file_name, 'w');

@fwrite($file, '');

fclose($file);
echo 'reset !'; 
