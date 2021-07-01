<?php
include_once './conexao.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Página de Cadastro</title>
    </head>
	<body>
		<h1 style="text-align:center">Página de Cadastro</h1>
		
		<form style="display:block;width:150px;margin:auto" action="" method="post">
			<label>Nome: </label><input type="text" name="nome" ><br><br>
			<label>E-mail: </label><input type="email" name="email"><br><br>
			<label>CPF: </label><input type="text" name="cpf" maxlength="11" minlength="11" size="11"><br><br>
			<label>Endereço: </label><input type="text" name="end" ><br><br>
			<label>Cidade: </label><input type="text" name="cidade" ><br><br>
			<label>UF: </label><input type="text" name="uf" maxlength="2" minlength="2" size="2"><br><br>
			<label>Senha: </label><input type="password" name="senha"><br><br>
			<input type="submit" value="Cadastrar" name="cadastrar"><input type="submit" formaction="index.php" value="Voltar">
			<?php
			if(!empty($_POST['cadastrar'])) {
				if(!empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['cpf']) && !empty($_POST['end']) && !empty($_POST['cidade']) && !empty($_POST['uf']) && !empty($_POST['senha'])) {
					$query = $u->createUser($_POST['email'],$_POST['nome'],$_POST['cpf'],$_POST['end'],$_POST['cidade'],$_POST['uf'],$_POST['senha']);
					if($query) {
						echo "<p style='color:green'>Cadastro efetuado com sucesso!</p>";
						} else {
						echo "<p style='color:red'>E-mail já cadastrado!</p>";
						}
					} else {
					echo "<p style='color:red'>Por favor, preencha todos os campos</p>";
					}
				}
			?>		
		</form>
	</body>
</html>
