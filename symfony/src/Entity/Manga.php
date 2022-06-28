<?php
class Manga extends Animanga{
    private $number_of_volume;
    
    function __construct(
        $id, 
        $title,
        $original_title,
        $type,
        $synopsis,
        $note,
        $genres,
        $statuts,
        $image,
        $last_release,
        $number_of_volume
        ) 
    {

        parent::__construct(
            $id, 
            $title,
            $original_title,
            $type,
            $synopsis,
            $note,
            $genres,
            $statuts,
            $image,
            $last_release
        );
        $this->number_of_volume = $number_of_volume;
    }

    function getNumber_of_volume() { return $this->number_of_episode; }

}
?>