<?php  
namespace App;
use App\Db;

class Slider {
    private function __construct() {
        return ;
    }

    public static function getSlider() {
        $sql = "SELECT * FROM sliders";
        $result = Db::conn()->query($sql);
        $sliders = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $sliders;
    }
}