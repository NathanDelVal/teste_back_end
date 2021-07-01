<?php
session_start();
include_once './conexao.php';

$id = $u->searchUser($_GET['update']);
$session_id = $u->searchUser($_SESSION['id']);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Alterar Dados</title>
    </head>
	<body>
		<h1 style="text-align:center">Atualizar Dados</h1>
		<h3 style="text-align:center"> Para visualizar as alterações, dê refresh na página após clicar no botão "alterar". </h3>
		
		<form style="display:block;width:150px;margin:auto" action="" method="post">
			<label>Nome: </label><input type="text" name="nome" value="<?php echo $id['nome']; ?>"><br><br>
			<label>E-mail: </label><input type="email" name="email" value="<?php echo $id['email']; ?>"><br><br>
			<label>CPF: </label><input type="text" name="cpf" maxlength="11" minlength="11" size="10" value="<?php echo $id['cpf']; ?>"><br><br>
			<label>Endereço: </label><input type="text" name="end" value="<?php echo $id['end']; ?>"><br><br>
			<label>Cidade: </label><input type="text" name="cidade" value="<?php echo $id['cidade']; ?>"><br><br>
			<label>UF: </label><input type="text" name="uf" maxlength="2" minlength="2" size="1" value="<?php echo $id['uf']; ?>"><br><br>
			<label>Senha: </label><input type="password" name="senha" ><br><br>
			<input type="submit" value="Alterar" name="alterar"><a href="<?php if($session_id['admin'] == 1) {echo './admin.php';} else {echo'./user.php';}?>">Voltar</a><br><br>
			<?php
				if(!empty($_POST['alterar'])) {
					$counter = 0;
					$data = filter_input_array(INPUT_POST,FILTER_DEFAULT);
					foreach($data as $k => $v) {
						if(!empty($v)) {
							$res = $u->updateUser($k,$v,$_GET['update']);
							$counter++;
						}
					}
					if($counter < 2) {
						echo "<p style='color:red'>Por favor, preencha algum campo</p>";
						header('Refresh: 3;');
					} else {
						echo "<p style='color:green'>Dados atualizados com sucesso!";
					}
				}
			?>
		</form>			
		
	</body>
</html>