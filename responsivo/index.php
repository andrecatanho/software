<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/script.js"></script>

</head>

<?php
require 'php/config.php';

session_start();

if(isset($_SESSION['id']) && empty($_SESSION['id']) == false) {

} else {
	header("Location: php/login.php");
}

?>
<body style="background-color:#373f42;color:#FFF">
		<div style="max-width:100px;margin-top:100px;margin-left:300px">
<table style="width:700px;height:250px">
	<tr class="texto" align="center">
		<th>Nome</th>
		<th>E-mail</th>
		<th>Telefone</th>
		<th>Ações</th>
	</tr><br/>
	<input type="button" class="btn" value="Novo Usuário" onClick="Adicionar()" ><br/><br/>

	<?php
	$sql = "SELECT * FROM usuarios";
	$sql = $pdo->query($sql);
	if($sql->rowCount() >0) {
		foreach ($sql->fetchAll() as $usuario) {
			echo '<tr align="center">';
			echo '<td>'.$usuario['nome'].'</td>';
			echo '<td>'.$usuario['email'].'</td>';
			echo '<td>'.$usuario['telefone'].'</td>';
			
			echo'<td><a href="php/editar.php?id='.$usuario['id'].'"><img width="25" src="imagens/editar.jpg "></a>  <a href="php/excluir.php?id='.$usuario['id'].'" onclick="return confirm(\'Tem certeza que deseja excluir?\');"><img width="25" src="imagens/excluir.jpg"></a></td>';
            
            echo '</tr>';

    	}
	}
	?>
</table>	
</div>
</body>
</html>