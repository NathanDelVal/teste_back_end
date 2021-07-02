<?php
session_start();
include_once './conexao.php';

if($_SESSION['auth'] != 2) {
	header ('location: '.$_SESSION['page'].'');
}

$_SESSION['page'] = $_SERVER['PHP_SELF'];


$id = $u->searchUser($_SESSION['id']);
$allnews = $n->searchAllNews();
$allusers = $u->searchAllUsers();


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Noticias</title>
		<link rel="stylesheet" href="./tables.css">
    </head>
	<body>
		<h1 style="text-align:center">Área do Administrador</h1>
		
		<a style="position:absolute;left:0;top:0;margin-left:10px"href="./cadastro_noticias.php">Cadastrar Notícias</a>
		
		<div style="margin:10px;position:absolute;top:0;right:0">
			<a href="./flood.php">Gerar Registros</a>
			<a href="./index.php?logout=1">Sair</a>
		</div><br><br>
		
		
			<div style="border:1px solid black;width:66%;margin:auto">
				<div style="float:right;width:49%;margin:0">
					<form action="" method="post">
						<h3 style="text-align:center;border:1px solid red">Notícias</h3>
						<label>Buscar: </label><input type="text" name="query" size="20" />
						<label for="campo">Por: </label>
						<select name="campo" id="campo" size="1">
							<option value="">--Campo--</option>
							<option value="titulo">Título</option>
							<option value="resumo">Resumo</option>
							<option value="conteudo">Conteudo</option>
							<option value="data">Data</option>
							<option value="destaque">Destacados</option>
						</select>
						<input type="submit" value="Pesquisar" name="news" /><br><br>
					</form>
			<?php
				if(!empty($_POST['news'])) {
					echo '<table>
						<th colspan="2">Resultados da Pesquisa</th>';
					if(empty($_POST['campo'])) {
						$queried_news = $n->searchNews('titulo',$_POST['query']);
						foreach($queried_news as $x) {
							echo '<tr>
								<td width="70%">'.$x['titulo'].'</td><td width="30%"><a href="updatenews.php?update='.$x['titulo'].'">Editar</a><a href="?deleteNews='.$x['titulo'].'">Apagar</a></td>
								</tr>';
						}
					} else {
						$queried_news = $n->searchNews($_POST['campo'],$_POST['query']);
						foreach($queried_news as $x) {
						echo '<tr>
								<td width="70%">'.$x[$_POST['campo']].'</td><td width="30%"><a href="updatenews.php?update='.$x['titulo'].'">Editar</a><a href="?deleteNews='.$x['titulo'].'">Apagar</a></td>
							</tr>';
						}
					}
					echo '</table>';
				}
				if(!empty($_GET['deleteNews'])) {
					$query = $n->deleteNews($_GET['deleteNews']);
				}
			?>
				</div>
				<div style="float:left;width:49%;margin:0">
					<form action="" method="post">
						<h3 style="text-align:center;border:1px solid red">Usuários</h3>
						<label>Buscar: </label><input type="text" name="query" size="20" />
						<label for="campo">Por: </label>
						<select name="campo" id="campo" size="1">
							<option value="">--Campo--</option>
							<option value="email">E-mail</option>
							<option value="nome">Nome</option>
							<option value="end">Endereço</option>
							<option value="cpf">CPF</option>
							<option value="uf">UF</option>
							<option value="cidade">Cidade</option>
						</select>
						<input type="submit" value="Pesquisar" name="user" /><br><br>
					</form>
					 <?php
						if(!empty($_POST['user'])) {
							echo '<table>
							<th colspan="2">Resultados da Pesquisa</th>';
							if(empty($_POST['campo'])) {
								$queried_users = $u->searchUsers('email',$_POST['query']);
								foreach($queried_users as $x) {
									if($x['admin'] == 1) {
										continue;
									}
									echo '<tr>
										<td width="70%">'.$x['email'].'</td><td width="30%"><a href="update.php?update='.$x['email'].'">Editar</a><a href="?deleteUsers='.$x['email'].'">Apagar</a></td>
										</tr>';
									}
							} else {
								$queried_users = $u->searchUsers($_POST['campo'],$_POST['query']);
								foreach($queried_users as $x) {
									if($x['admin'] == 1) {
										continue;
									}
									echo '<tr>
										<td width="70%">'.$x[$_POST['campo']].'</td><td width="30%"><a href="update.php?update='.$x['email'].'">Editar</a><a href="?deleteUsers='.$x['email'].'">Apagar</a></td>
										</tr>';
									}
								}
							echo '</table>';
						}
						if(!empty($_GET['deleteUsers'])) {
							$query = $u->deleteUser($_GET['deleteUsers']);
						}
					 ?>
				</div>
			</div>
	</body>
</html>