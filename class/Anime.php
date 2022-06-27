<?php
class Anime extends Animanga{

    private $number_of_episode;

    function __construct($number_of_episode) {
        $this->number_of_episode = $number_of_episode;
    }

    function getNumber_of_episode() { return $this->number_of_episode; }

}
?>