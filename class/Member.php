<?php
include "./Animanga.php";
include "./DatabaseSingleton.php";
class Member {
    protected int $id;
    protected string $first_name;
    protected string $last_name;
    protected string $username;
    protected string $email;
    protected string $password;
    protected $profile_image;
    protected $back_image;
    protected $description;
    //protected $notes;
    //protected $comments;
    protected string $last_connection;


    function __construct($row) {
        $this->id = $row["ID"];
        $this->first_name = $row["FIRST_NAME"];
        $this->last_name = $row["LAST_NAME"];
        $this->username = $row["USERNAME"];
        $this->email = $row["EMAIL"];
        $this->password = $row["PASSWORD"];
        $this->profile_image = $row["PROFIL_PICTURE"];
        $this->back_image = $row["BACKGROUND_PICTURE"];
        $this->description = $row["DESCRIPTION"];

        $dbc = new DatabaseSingleton();
        $this->db = $dbc->getDatabase();
    }

    function __destruct() {
        $this->db->close();
    }

    function __toString() {
        $str = "Member " . $this->id . " {\r\n";
        $str .= "    First Name : " . $this->first_name . "\r\n";
        $str .= "    Username : " . $this->username . "\r\n";
        $str .= "    Last Name : " . $this->last_name . "\r\n";
        $str .= "    Email : " . $this->email . "\r\n\r\n";
        $str .= "    Description : " . $this->description . "\r\n";
        $str .= "}";

        return $str;
    }


    function postCommentById(int $id_animanga, string $comment) {
        //
    }
    function postCommentByAnimanga(Animanga $animanga, string $comment) {
        //
    }
    function modifyComment(int $id, string $comment) {
        //
    }
    function eraseComment(int $id) {
        //
    }
    function postNoteById(int $id_animanga, int $note) {
        //
    }
    function postNoteByAnimanga(Animanga $animanga, int $note) {
        //
    }
    function modifyNote(int $id, int $note) {
        //
    }
    function eraseNote(int $id) {
        //
    }

    function getId() { return $this->id; }
    function getUsername() { return $this->username; }
    function setUsername(string $username) {
        $this->username = $username;
        $this->db->query("UPDATE users SET username='" . $username . "' WHILE id=" . $this->id);
    }
    function getEmail() { return $this->email; }
    function setEmail(string $email) {
        $this->email = $email;
        $this->db->query("UPDATE users SET email='" . $email . "' WHILE id=" . $this->id);
    }
    function getPassword() { return $this->password; }
    function setPassword(string $password) {
        $this->password = $password;
        $this->db->query("UPDATE users SET password='" . $password . "' WHILE id=" . $this->id);
    }
    function getProfileImage() { return $this->profile_image; }
    function setProfileImage(string $profile_image) {
        $this->profile_image = $profile_image;
        $this->db->query("UPDATE users SET profile_picture='" . $profile_image . "' WHILE id=" . $this->id);
    }
    function getBackImage() { return $this->back_image; }
    function setBackImage(string $back_image) {
        $this->back_image = $back_image;
        $this->db->query("UPDATE users SET background_picture='" . $back_image . "' WHILE id=" . $this->id);
    }
    function getDescription() { return $this->description; }
    function setDescrption(string $description) {
        $this->description = $description;
        $this->db->query("UPDATE users SET description='" . $description . "' WHILE id=" . $this->id);
    }
    //function getNotes() { return $this->notes; }
    //function getComments() { return $this->comments; }
    function getLastConnection() { return $this->last_connection; }
    function connected() {
        $this->last_connection = date("Y-m-d\ZH:i:s");
        $this->db->query("UPDATE users SET connection='" . $this->last_connection . "' WHILE id=" . $this->id);
    }
    function getRole() { return $this->role; }
}
?>