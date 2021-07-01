<?php
include_once './conexao.php';

$users = $u->searchAllUsers();
$news = $n->searchAllNews();

if(!empty($_POST['fu'])) {
	$query = $u->floodUsers();
	}

if(!empty($_POST['fn'])) {
	$query = $n->floodNews();
	}


if(!empty($_POST['lu'])) {
	$query = $u->sweepUsers();
	}

if(!empty($_POST['ln'])) {
	$query = $n->sweepNews();
	}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Área de testes</title>
    </head>
	<body>
		<div style="margin:10px;position:absolute;top:0;right:0">
			<a style="font-size:1.5em" href="./admin.php">Voltar</a>
			<a style="font-size:1.5em" href="./index.php">Sair</a>
		</div>
		<form action="" method="post">
			<h1 style="text-align:center"> Preencher Database</h1>
			<h2 style="text-align:center"> Estes 2 botões geram 50 registros automáticos para suas respectivas tabelas CADA vez que você os aperta. </h2>
			<input type="submit" value="Gerar Usuários" style="float:left;margin-left:20%" name="fu"> <input type="submit" style="float:right;margin-right:20%"value="Gerar Notícias" name="fn"><br><br>
			<h1 style="text-align:center"> Limpar Database</h3>
			<h2 style="text-align:center"> Estes 2 botões apagam TODOS os registros gerados pelos últimos 2 botões em suas respectivas tabelas.</h2> 
			<input type="submit" value="Limpar Usuários" style="float:left;margin-left:20%" name="lu"> <input type="submit" style="float:right;margin-right:20%"value="Limpar Notícias" name="ln">
		</form>
	</body>
</html>
	



