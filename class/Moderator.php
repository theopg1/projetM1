<?php
include "./Member.php";
include "../config/database.php";
class Moderator extends Member {
    function __construct($id) {
        $this->id = $id;
        $this->role = "Moderator";

        $dbc = new Database();
        $db = $dbc->getMysqli();
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