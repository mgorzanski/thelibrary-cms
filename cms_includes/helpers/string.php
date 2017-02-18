<?php

function new_string() {
$table = '1234567890qwertyuiopasdfghjkklzxcvbnm'; 
$id = ''; 
for ($i=0; $i<21; $i++)
{ 
    $id .= $table[rand()%(strlen($table))]; 
}
return $id;
}
?>