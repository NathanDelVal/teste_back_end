<?php
/*
//Conexao com porta
$pdo = new PDO("mysql:host=$host;port=$port;dbname=".$dbname, $user, $pass);

//Conexao sem a porta
$pdo = new PDO("mysql:host=$host;dbname=".$dbname, $user, $pass);

*/

class User {
	private $pdo;
	
	public function __construct($dbname,$host,$user,$pass,$port) {
		$this->pdo = new PDO("mysql:dbname=".$dbname.";port=".$port.";host=".$host,$user,$pass);
	}
	
	public function searchUser($email) {
		$res = array();
		$query = $this->pdo->query("SELECT * FROM users WHERE email='".$email."'");
		$res = $query->fetch(PDO::FETCH_ASSOC);
		return $res;
	}
	
	public function searchUsers($campo,$string) {
		$res = array();
		$query = $this->pdo->query('SELECT * FROM users WHERE '.$campo.' LIKE "%'.$string.'%"');
		$res = $query->fetchAll(PDO::FETCH_ASSOC);
		return $res;
	}
	
	public function updateUser($campo,$valor,$id) {
		$query = $this->pdo->query('UPDATE users SET '.$campo.'="'.$valor.'" WHERE email="'.$id.'"');
		return $query;
	}
	
	public function createUser($email,$nome,$cpf,$end,$cidade,$uf,$senha) {
		$query = $this->pdo->query('INSERT INTO users(email,nome,cpf,end,cidade,uf,senha) VALUES("'.$email.'","'.$nome.'","'.$cpf.'","'.$end.'","'.$cidade.'","'.$uf.'","'.$senha.'")');
		return $query;
	}
	
	public function searchAllUsers() {
		$res = array();
		$query = $this->pdo->query('SELECT * FROM users');
		$res = $query->fetchAll(PDO::FETCH_ASSOC);
		return $res;
	}
	public function floodUsers() {
		$users = count($this->searchAllUsers());
		for($x = ($users + 1); $x <= ($users + 50); $x++) {
		$query = $this->pdo->query('INSERT INTO users(email, senha, nome, cpf, end, cidade, uf) VALUES ("xxx'.$x.'@gmail.com", "xxx'.$x.'@gmail.com", "blablabla", "'.mt_rand(10000000000, 99999999999).'", "blebleble", "bliblibli","RJ")');
		}
	}
	
	public function sweepUsers() {
		$users = $this->searchAllUsers();
		foreach($users as $x) {
			if(is_int(stripos($x['email'],'xxx'))) {
				$query = $this->pdo->query('DELETE FROM users WHERE email="'.$x['email'].'"');
				}
			}
		}
		
	public function deleteUser($user) {
			$query = $this->pdo->query('DELETE FROM users WHERE email LIKE "%'.$user.'%"');
		}
	}

$u = new User("teste","127.0.0.1","root","",'3306');

class News {
	private $pdo;
	
	public function __construct($dbname,$host,$user,$pass,$port) {
		$this->pdo = new PDO("mysql:dbname=".$dbname.";port=".$port."host=".$host,$user,$pass);
	}
	
	public function deleteNews($news) {
		$query = $this->pdo->query('DELETE FROM news WHERE titulo LIKE "%'.$news.'%"');
	}
	
	public function searchHighlights() {
		$query = $this->pdo->query('SELECT * FROM news WHERE destaque = "1"');
		$res = $query->fetchAll(PDO::FETCH_ASSOC);
		return $res;
	}
	
	public function searchNews($campo, $string) {
		$res = array();
		$query = $this->pdo->query('SELECT * FROM news WHERE '.$campo.' LIKE "%'.$string.'%"');
		$res = $query->fetchAll(PDO::FETCH_ASSOC);
		return $res;
	}
	public function searchAllNews() {
		$query = $this->pdo->query('SELECT * FROM news');
		$res = $query->fetchAll(PDO::FETCH_ASSOC);
		return $res;
	}
	
	public function floodNews() {
		$news = count($this->searchAllNews());
			for($x = ($news + 1); $x <= ($news + 50); $x++) {
			$year = strval(mt_rand(1970, date('Y')));
			$month = '';
			$day = '';
			if($year == date('Y')) {
				$month = strval(mt_rand(1, date('m')));
			} else {
			$month = strval(mt_rand(1, 12));
			}
			switch($month) {
				case '1':
				case '3':
				case '5':
				case '7':
				case '8':
				case '10':
				case '12':
					$day = strval(mt_rand(1, 31));
					break;
				case '4':
				case '6':
				case '9':
				case '11':
					$day = strval(mt_rand(1, 30));
					break;
				case '2':
					$day = strval(mt_rand(1, 28));
					break;
			}
			$date = $year.'-'.$month.'-'.$day;
			$users = $this->searchAllNews();
			$query = $this->pdo->query('INSERT INTO news(titulo,data,resumo,conteudo) VALUES ("news '.$x.'", "'.$date.'", "news '.$x.'", "news '.$x.'")');
		}
	}
	
	public function sweepNews() {
		$news = $this->searchAllNews();
		foreach($news as $x) {
			if(is_int(stripos($x['titulo'],'news'))) {
				$query = $this->pdo->query('DELETE FROM news WHERE titulo="'.$x['titulo'].'"');
				}
			}
		}
	}


$n = new News('teste','127.0.0.1','root','','3306');

?>