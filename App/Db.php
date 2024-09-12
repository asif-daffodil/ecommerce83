<?php  
namespace App;

class Db {
    protected const DB_HOST = 'localhost';
    protected const DB_USER = 'root';
    protected const DB_PASS = '';
    protected const DB_NAME = 'ecommerce83';
    protected static $connProperty;

    public static function conn (): object|string
    {
        try{
            self::$connProperty = mysqli_connect(self::DB_HOST, self::DB_USER, self::DB_PASS, self::DB_NAME);
            if(!self::$connProperty){
                throw new \Exception("Error: Unable to connect to MySQL.");
            }
        }catch(\Exception $e){
            // mysqli error
            return $e->getMessage()." ".mysqli_connect_error();
        }
        return self::$connProperty;
    }
    private function __construct() {
        return ;
    }

    public function __destruct() {
        mysqli_close(self::$connProperty);
    }
}
