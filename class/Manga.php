<?php
class Manga extends Animanga{
    private $number_of_volume;
    
    function __construct($number_of_volume) {
        $this->number_of_volume = $number_of_volume;
    }

    function getNumber_of_volume() { return $this->number_of_episode; }

}
?>