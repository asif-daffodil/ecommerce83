<?php  
namespace App;

class Db {
    protected const DB_HOST = 'localhost';
    protected const DB_USER = 'root';
    protected const DB_PASS = '';
    protected const DB_NAME = 'ecommerce83';

    public $conn;
    public function __construct() {
        try{
            $this->conn = mysqli_connect(self::DB_HOST, self::DB_USER, self::DB_PASS, self::DB_NAME);
            if(!$this->conn){
                throw new \Exception("Error: Unable to connect to MySQL.");
            }
        }catch(\Exception $e){
            echo $e->getMessage();
        }
    }

    public function __destruct() {
        mysqli_close($this->conn);
    }
}

?>