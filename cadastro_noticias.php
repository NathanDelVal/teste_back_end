<?php
session_start();
include_once './conexao.php';

if($_SESSION['auth'] != 2) {
	header ('location: '.$_SESSION['page'].'');
}

$_SESSION['page'] = $_SERVER['PHP_SELF'];

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastro de Notícias</title>
    </head>
	<body>
		<h1 style="text-align:center">Página de Cadastro de Notícias</h1>
		
		<form style="display:block;width:200px;margin:auto" action="" method="post">
			<label>Título: </label><textarea id="titulo" name="titulo" rows="2" cols="50"></textarea><br><br>
			<label>Resumo: </label><textarea id="resumo" name="resumo" rows="4" cols="50"></textarea><br><br>
			<label>Data: </label><input type="date" name="data"><br><br>
			<label>Conteúdo: </label><textarea id="conteudo" name="conteudo" rows="5" cols="50"></textarea><br><br>
			<label>Destaque: </label><input type="radio" id="sim" name="destaque" value="1"><label for="sim">Sim</label><input type="radio" name="destaque" value="0" id="nao"><label for="nao">Não</label><br><br>		
			<label>Imagem: </label><input type="file" name="imagem">
			<input type="submit" value="cadastrar" name="cadastrar"><a href="./admin.php">Voltar</a><br><br>
			<?php
				if(!empty($_POST['cadastrar'])) {
					$query = $n->createNews($_POST['titulo'],$_POST['resumo'],$_POST['conteudo'],$_POST['destaque'],$_POST['data']);
					/*if($query) {
						echo '<p style="color:green">Cadastrado com sucesso!</p>';
					} else {
						echo "aaaaa";
					}*/
					var_dump($query);
				}
			?>
	</body>
</html>