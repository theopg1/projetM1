<?php
include "./Member.php";
include "../config/database.php";
class Moderator extends Member {
    function __construct($id) {
        parent::__construct($id);
        $this->role = "Moderator";
    }
    function memberList() {
        //
    }
    function mangaAnimeList() {
        //
    }
    function eraseMember($id) {
        //
    }
    function eraseMangaAnime($id) {
        //
    }
    function eraseComment($id) {
        //
    }
}
?>