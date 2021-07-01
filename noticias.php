<?php 
session_start();
include_once './conexao.php';

$id = $u->searchUser($_SESSION['id']);
$allnews = $n->searchAllNews();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Noticias</title>
    </head>
	<body>
		<h1 style="text-align:center">Painel de Notícias</h1>
		
		<div style="margin:10px;position:absolute;top:0;right:0">
			<a style="font-size:1.5em" href="./user.php">Home</a>
			<a style="font-size:1.5em" href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Voltar</a>
			<a style="font-size:1.5em" href="./index.php">Sair</a>
		</div>
	
	<?php
	$indexes = 5 * $_GET['page'];
		for($x = ($indexes - 5); $x < $indexes; $x++) {
			if($x > (count($allnews) - 1)) {
					break;
			} else {
				$date = $allnews[$x]['data'];
				$new_date = date('d-m-Y',strtotime($date));
				echo '<div style="position:relative;width:66%;height:300px;margin:auto;border:1px solid black">
				<h3 style="text-align:center">'.$allnews[$x]['titulo'].' <span style="float:right;margin-right:10px">'.$new_date.'</span></h3>
				<img src="'.$allnews[$x]['imagem'].'" style="display:inline-block;width:300px;height:200px;margin:10px;float:left">
				<p>'.$allnews[$x]['resumo'].'</p>
				<a href="#" style="position:absolute;bottom:0;right:0;margin:10px">Saiba mais</a>
				</div>';
			}
		}
	?>
	<?php
		$pages = ceil(count($allnews)/5);
		echo '<div style="width:200px;margin:auto">';
		for($x = 1; $x <= $pages; $x++) {
			if($_GET['page'] <= 4 && $pages > 5) {
				echo '<a href="?page=1" style="margin:5px">1</a>
				<a href="?page=2" style="margin:5px">2</a>
				<a href="?page=3" style="margin:5px">3</a>
				<a href="?page=4" style="margin:5px">4</a>
				<a href="?page=5" style="margin:5px">5</a>
				... <a href="?page='.$pages.'" style="margin:5px">'.$pages.'</a>';
				break;
			} elseif($_GET['page'] > 4 && $_GET['page'] < ($pages - 2) && $pages > 5) {
				echo '<a href="?page=1" style="margin:5px">1</a>...
					<a href="?page='.($_GET['page'] - 2).'" style="margin:5px">'.($_GET['page'] - 2).'</a>
					<a href="?page='.($_GET['page'] - 1).'" style="margin:5px">'.($_GET['page'] - 1).'</a>
					<a href="?page='.($_GET['page']).'" style="margin:5px">'.($_GET['page']).'</a>
					<a href="?page='.($_GET['page'] + 1).'" style="margin:5px">'.($_GET['page'] + 1).'</a>
					<a href="?page='.($_GET['page'] + 2).'" style="margin:5px">'.($_GET['page'] + 2).'</a>
					... <a href="?page='.$pages.'" style="margin:5px">'.$pages.'</a>';
					break;
				} elseif($_GET['page'] >= ($pages - 2) && $pages > 5) {
					echo '<a href="?page=1" style="margin:5px">1</a> ... 
						<a href="?page='.($pages -3).'" style="margin:5px">'.($pages -3).'</a>
						<a href="?page='.($pages -2).'" style="margin:5px">'.($pages -2).'</a>
						<a href="?page='.($pages -1).'" style="margin:5px">'.($pages -1).'</a>
						<a href="?page='.$pages.'" style="margin:5px">'.$pages.'</a>';
					break;
				} else {
					echo '<a style="margin: 5px" href="?page='.$x.'">'.$x.'</a>';
				}
		}
		echo '</div>';
	?>	
	</body>
</html>