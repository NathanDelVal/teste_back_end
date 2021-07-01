<?php 
session_start();
include_once './conexao.php';

$id = $u->searchUser($_SESSION['id']);
$highlights = $n->searchHighlights();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Página do Cliente</title>
    </head>
    <body>
	
	<h1 style="text-align:center">Seja bem-vindo(a), <?php 
		$first_name = explode(" ",$id['nome']);
		echo strtoupper($first_name[0]);
	?></h1><br>
	<div style="margin:10px;position:absolute;top:0;right:0">
		<a style="font-size:1.5em" href="./update.php?update=<?php echo $_SESSION['id']; ?>">Alterar dados</a>
		<a style="font-size:1.5em" href="./index.php">Sair</a>
	</div>
	
	<h2 style="text-align:center">Destaques</h2>
	
	<?php
		foreach($highlights as $x) {
				$date = $x['data'];
				$new_date = date('d-m-Y',strtotime($date));
				echo '<div style="position:relative;width:66%;height:300px;margin:auto;border:1px solid black">
				<h3 style="text-align:center">'.$x['titulo'].' <span style="float:right;margin-right:10px">'.$new_date.'</span></h3>
				<img src="'.$x['imagem'].'" style="display:inline-block;width:300px;height:200px;margin:10px;float:left">
				<p>'.$x['resumo'].'</p>
				<a href="#" style="position:absolute;bottom:0;right:0;margin:10px">Saiba mais</a>
				</div>';
		}
	?>
	<br>
	<a style="display:block;width:150px;margin:auto" href="noticias.php?page=1"><h3>Veja mais notícias</h3></a>
	</body>
</html>