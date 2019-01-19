<?php
include 'contato.class.php';
$contact = new contato();

if(!empty($_GET['id'])){
    $contact_id = $_GET['id'];
    $contact->delete($contact_id);
}

header("Location: index.php");

