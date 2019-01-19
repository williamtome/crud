<?php
include 'contato.class.php';
$contact = new contato();

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $info = $contact->getInfo($id);
    if (empty($info['email'])) {
        header("Location: index.php");
        exit;
    }
} else {
    header("Location: index.php");
    exit;
}
?>
<h1>Editar Contato</h1>
<form method="POST" action="editar_submit.php">
    <input type="hidden" name="id" value="<?= $info['id']; ?>">
    
    Nome: <br>
    <input type="text" name="nome" value="<?= $info['nome']; ?>"><br><br>

    E-mail: <br>
    <input type="email" name="email" value="<?= $info['email']; ?>"><br><br>

    <input type="submit" value="Salvar">
</form>

