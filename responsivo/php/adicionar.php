<?php
require 'config.php';
if(isset($_POST['nome']) && empty($_POST['nome']) == false) {
	$nome = addslashes($_POST['nome']);
	$email = addslashes($_POST['email']);
	$telefone = addslashes($_POST['telefone']);
	$senha = md5(addslashes($_POST['senha']));

	$sql = "INSERT INTO usuarios SET nome = '$nome', email = '$email', telefone = '$telefone', senha = '$senha'";
	$pdo->query($sql);
	header("Location: ../index.php");
}
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script type="text/javascript" src="../js/script.js"></script>

</head>

<body style="background-color:#373f42;color:#FFF">
		<div style="max-width:250px;margin-top:100px;margin-left:400px">
			<div style="font-size: 25px" >Cadastro de Usuário</div><br/>
<form method="POST" style="font-size: 20px">
	<div  class="texto">Nome:</div>
	<input type="text" name="nome" class="texto2"/><br/><br/>
	<div class="texto">E-mail:</div><br/>
	<input type="text" name="email" class="texto2" /><br/><br/>
	Telefone:<br/>
	<input type="text" name="telefone" class="texto2" /><br/><br/>
	Senha:<br/>
	<input type="password" name="senha" class="texto2" /><br/><br/>
	<input type="submit" class="btn" value="Cadastrar" /> 
	


</form>
</div>
</body>