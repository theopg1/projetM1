<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

class Moderator extends Member {
    function memberList() {
        $result = $this->db->query("SELECT * FROM users");

        $members = array();

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                //
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
                //
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