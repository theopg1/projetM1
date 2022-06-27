<?php
include "./Member.php";
class Moderator extends Member {
    function __construct(
        int $id,
        string $username,
        string $email,
        string $password,
        string $profile_image,
        string $back_image,
        string $description
    ) {
        parent::__construct($id, $username, $email, $password, $profile_image, $back_image, $description);
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