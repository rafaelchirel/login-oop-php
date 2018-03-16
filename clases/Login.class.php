<?php

class Login extends Conexion {

	private $email;
	private $password;

	public function setEmail($email){
		$this->email = $email;
	}
	public function setPassword($password){
		$this->password = $password;
	}
	public function getEmail(){
		return $this->email;
	}
	public function getPassword(){
		return $this->password;
	}

	public function logar(){
		$pdo = self::getDB();

		$logar = $pdo->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
		$logar->bindValue(1, $this->getEmail());
		$logar->bindValue(2, $this->getPassword());
		$logar->execute();
		if ($logar->rowCount() == 1):
			$data = $logar->fetch(PDO::FETCH_OBJ);
			$_SESSION['name'] = $data->name;
			$_SESSION['login'] = true;
			return true;
		else:
			return false;
		endif;
	}

	public static function deslogar() {
		unset($_SESSION['login']);
		session_destroy();
		header("Location: /login-poo-php");
	}
}

?>
