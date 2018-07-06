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
		<div style="margin-left:500px;margin-top:200px;max-width:350px;font-size:25px">
PAGINA DE LOGIN <br/>

			<form method="POST" >

				Usuário:
				<input style = "font-size:25px"; type="email" name = "email" autofocus placeholder="email" /><br/><br/>

				Senha:
				<input style = "font-size:25px"; type="password" name = "senha" maxlength="4" /><br/><br/>
				
				<input type="submit" class="btn" value = "Entrar" /><br/><br/>
				
			</form>
		</div>	
</body>



