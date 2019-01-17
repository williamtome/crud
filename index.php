<?php 
include 'contato.class.php';
$contact = new contato();
?>
<h1>Contatos</h1>

<a href="adicionar.php">[Adicionar]</a>

<br><br>

<table border="1" width="600">
	<tr>
		<th>ID</th>
		<th>Nome</th>
		<th>E-mail</th>
		<th>Ações</th>
	</tr>
	
	<?php
	$list = $contact->getAll();
	foreach ($list as $item):
	?>
	<tr>
		<td><?= $item['id']; ?></td>
		<td><?= $item['nome']; ?></td>
		<td><?= $item['email']; ?></td>
		<td>
			<a href="editar.php?id=<?= $item['id']; ?>">[Editar]</a>
			<a href="excluir.php?id=<?= $item['id']; ?>">[Excluir]</a>
		</td>
	</tr>
	<?php endforeach ?>
</table>