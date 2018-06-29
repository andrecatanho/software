<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script type="text/javascript" src="../js/script.js"></script>
</head>

<body style="background-color:#373f42;color:#FFF">
		<div style="max-width:700px;margin-top:100px;margin-left:400px">
	
<?php
require 'config.php';

$id = 0;
if(isset($_GET['id']) && empty($_GET['id']) == false) {
	$id = addslashes($_GET['id']);
}

if(isset($_POST['nome']) && empty($_POST['nome']) == false) {
	$nome = addslashes($_POST['nome']);
	$email = addslashes($_POST['email']);
	$telefone = addslashes($_POST['telefone']);

	$sql = "UPDATE usuarios SET nome = '$nome', email = '$email', telefone = '$telefone' WHERE id = '$id'";
	$sql =$pdo->query($sql);

	header("Location: ../index.php");
}

$sql = "SELECT * FROM usuarios WHERE id = '$id'";
$sql = $pdo->query($sql);
if($sql->rowCount() > 0) {
	$dado = $sql->fetch();
} else {
	header("Location: index.php");	
}
?>

		
			<div style="font-size: 25px" >Editar Usuário</div><br/>

<form method="POST">

	<div  class="texto">Nome:</div>
	<input type="text" name="nome"  class="texto2" value="<?php echo $dado['nome'];?>"/><br/><br/>
	<div class="texto">E-mail:</div>
	<input type="text" name="email" class="texto2" value="<?php echo $dado['email'];?>"/><br/><br/>
	<div class="texto">Telefone:</div>
	<input type="text" name="telefone" class="texto2" value="<?php echo $dado['telefone'];?>"/><br/><br/>
	<input type="submit" class="btn" value="Atualizar" /> 

</form>
</div>
</div>
</body>