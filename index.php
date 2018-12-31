<?php 
include 'contato.class.php';

$contato = new contato();

//$contato->create("william@email.com");
$contato->edit("William Weirich Tomé", "williamwt@gmail.com", 4);

$lista = $contato->getAll();
echo "<pre>";
print_r($lista);
echo "</pre>";