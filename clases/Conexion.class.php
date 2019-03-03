<?php
	abstract class Conexion {

		const DB_HOST = 'localhost';
		const DB_USER = "root";
		const DB_PASS = "";
		const DB_NAME = 'login_poo';

		private static $instance = null;

		private static function conectar() {

			try {
				if (self::$instance == null):
					$dsn = "mysql:host=" . self::DB_HOST . ";dbname=" . self::DB_NAME ."";
					self::$instance = new PDO($dsn, self::DB_USER, self::DB_PASS);
					self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				endif;
			} catch (PDOException $e) {
				echo "Error: " . $e->getMessage();
			}
			return self::$instance;
		}

		protected static function getDB() {
			return self::conectar();
		}
	}
?>