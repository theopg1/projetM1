<?php
class Anime extends Animanga{

    private $number_of_episode;

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
        $number_of_episode
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
        $this->number_of_episode = $number_of_episode;
    }

    function getNumber_of_episode() { return $this->number_of_episode; }

}
?>