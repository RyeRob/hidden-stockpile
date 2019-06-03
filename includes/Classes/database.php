<?php
class Database
{
    private static $user = 'delanh_stockpile';
    private static $pass = '{Z{*@(-Fd(qy';
    private static $dsn = 'mysql:host=198.46.191.78; dbname=delanh_hiddenstockpile';

    // private static $user = 'root';
    // private static $pass = '';
    // private static $dsn = 'mysql:host=localhost; dbname=hiddenstockpile';
    private static $dbcon;

    private function __construct()
    { }
    public static function getDb()
    {
        if (!isset(self::$dbcon)) {
            try {
                self::$dbcon = new PDO(self::$dsn, self::$user, self::$pass);
                self::$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                $errorMessage = $e->getMessage();
                // include 'error.php';
                echo $errorMessage;
                exit();
            }
        }
        return self::$dbcon;
    }
}
Database::getDb();
