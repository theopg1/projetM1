<?php
include "./Member.php";
include "./Animanga.php";
include "./Anime.php";
include "./Manga.php";
class Moderator extends Member {
    function __toString() {
        $str = "Moderator " . $this->id . " {\r\n";
        $str .= "    First Name : " . $this->first_name . "\r\n";
        $str .= "    Username : " . $this->username . "\r\n";
        $str .= "    Last Name : " . $this->last_name . "\r\n";
        $str .= "    Email : " . $this->email . "\r\n\r\n";
        $str .= "    Description : " . $this->description . "\r\n";
        $str .= "}";

        return $str;
    }
    function memberList() {
        $result = $this->db->query("SELECT * FROM users");

        $members = array();

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $m = null;
                if ($row["ROLE"] == 1) {
                    $m = new Member($row);
                } else if ($row["ROLE"] == 2) {
                    $m = new Moderator($row);
                }
                $members[] = $m;
            }
        }

        foreach($members as $m) {
            echo $m;
        }
    }
    function mangaAnimeList() {
        $result = $this->db->query("SELECT * FROM animanga");

        $animangas = array();

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {

                $a = null;
                if ($row["TYPE"] == "Anime") {
                    $a = new Anime(
                        $row["ID"],
                        $row["TITLE"],
                        $row["ORIGINAL_TITLE"],
                        $row["TYPE"],
                        $row["SYNOPSIS"],
                        $row["NOTE"],
                        $row["GENRE"],
                        $row["STATUS"],
                        $row["IMAGE"],
                        $row["RELEASE_DATE"],
                        $row["EPISODES"]
                    );
                } else {
                    $a = new Manga(
                        $row["ID"],
                        $row["TITLE"],
                        $row["ORIGINAL_TITLE"],
                        $row["TYPE"],
                        $row["SYNOPSIS"],
                        $row["NOTE"],
                        $row["GENRE"],
                        $row["STATUS"],
                        $row["IMAGE"],
                        $row["RELEASE_DATE"],
                        $row["TOMES"]
                    );
                }
                $animangas[] = $a;
            }
        }

        foreach($animangas as $a) {
            echo $a;
        }
    }
    function eraseMemberById(int $id) {
        return $this->db->query("DELETE FROM users WHERE id=" . $id);
    }

    function eraseMemberByMember(Member $m) {
        return $this->db->query("DELETE FROM users WHERE id=" . $m->getId());
    }
    function eraseMangaAnimeById(int $id) {
        return $this->db->query("DELETE FROM animanga WHERE id=" . $id);
    }
    function eraseMangaAnimeByAnimanga(Animanga $am) {
        return $this->db->query("DELETE FROM animanga WHERE id=" . $am->getId());
    }
    function eraseMemberComment($id) {
        //
    }
}
?>