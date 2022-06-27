<?php
include "./Member.php";
class Moderator extends Member {
    function __construct() {
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