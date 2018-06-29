<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script type="text/javascript" src="../js/script.js"></script>
</head>
<?php
session_start();

if(isset($_POST['email']) && empty($_POST['email']) == false) {
	$email = addslashes($_POST['email']);
	$senha = md5(addslashes($_POST['senha']));

	$dsn = "mysql:dbname=blog;host=127.0.0.1";
	$dbuser = "root";
	$dbpass = "";

	try {
		$db = new PDO($dsn, $dbuser, $dbpass);

		$sql = $db->query("SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'");

		if($sql->rowCount() > 0) {

			$dado = $sql->fetch();

			$_SESSION['id'] = $dado['id'];

			header("Location: ../index.php");

		} else {
			echo "Usuário não Cadastrado!!!";
		}
	
	} catch(PDOException $e) {
		echo "Falhou: ".$e->getMessage();
	}
}

?>
<body style="background-color:#373f42;color:#FFF">
		<div style="max-width:350px;margin-top:200px;margin-left:500px;font-size:30px">
PAGINA DE LOGIN <br/><br/>

			<form method="POST">

				E-mail:
				<input type="email" name = "email"/><br/><br/>

				Senha:
				<input type="password" name = "senha"/><br/><br/>
				
				<input type="submit" class="btn" value = "Entrar" /><br/><br/>
				
				

			</form>
		</div>	
</body>



