<?php
include 'contato.class.php';
$contact = new contato();

if ($_POST['email']) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $contact->create($email, $nome);
    header("Location: index.php");
}
