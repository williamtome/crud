<?php
include 'contato.class.php';
$contact = new contato();

if (!empty($_POST['id'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $id = $_POST['id'];

    if (!empty($email)) {
    	$contact->edit($nome, $email, $id);    	
    }    
    
    header("Location: index.php");
}
