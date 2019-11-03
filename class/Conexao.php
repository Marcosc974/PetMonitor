<?php
/*
 * Marcos Cordeiro Soares
 */
class Conexao {

    public static $conn;

    public static function conectar() {
        try {
            if (!isset(self::$conn)) {
                self::$conn = new PDO("mysql:host=localhost;dbname=petmonitor;charset=utf8","root","");
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            return self::$conn;
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }

}
