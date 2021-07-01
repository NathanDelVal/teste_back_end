<?php
session_start();
include_once './conexao.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Página de Notícias</title>
    </head>
    <body>
        <h1>Bem-vindo</h1>
        <form name="cad-usuario" method="POST" action="">
            <label>E-mail: </label>
            <input type="text" name="id" id="id" placeholder="Digite seu e-mail"><br><br>

            <label>Senha: </label>
            <input type="password" name="senha" id="senha" placeholder="Digite sua senha"><br><br>
			
			<input type="submit" value="Login" name="CadLogin">
            <input type="submit" value="Cadastrar" formaction="cadastro.php" name="CadUsuario">
			<?php
			if(!empty($_POST['CadLogin'])) {
			if(!empty($_POST['id']) && !empty($_POST['senha'])) {
				$res = $u->searchUser($_POST['id']);
				if($res) {
					if($_POST['senha'] == $res['senha']) {
						$_SESSION['id'] = $_POST['id'];
						if($res['admin'] == 1) {
							header('location: admin.php');
						} else {
							header('location: user.php');
						}
					} else {
						echo "<p style='color:red'>Senha incorreta!</p>";
					}
				} else {
				echo "<p style='color:red'>Usuário não cadastrado!</p>";
				}
			} else {
				echo "<p style='color:red'>Por favor, preencha todos os campos</p>";
			}
		}
			?>
        </form>
    </body>
</html>
