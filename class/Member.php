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


    function __construct(
        int $id,
        string $first_name,
        string $last_name,
        string $username,
        string $email,
        string $password,
        string $profile_image = null,
        string $back_image = null,
        string $description = null
    ) {
        $this->id = $id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->profile_image = $profile_image;
        $this->back_image = $back_image;
        $this->description = $description;

        $dbc = new DatabaseSingleton();
        $this->db = $dbc->getDatabase();
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
    }
    function getEmail() { return $this->email; }
    function setEmail(string $email) {
        $this->email = $email;
    }
    function getPassword() { return $this->password; }
    function setPassword(string $password) {
        $this->password = $password;
    }
    function getProfileImage() { return $this->profile_image; }
    function setProfileImage(string $profile_image) {
        $this->profile_image = $profile_image;
    }
    function getBackImage() { return $this->back_image; }
    function setBackImage(string $back_image) {
        $this->back_image = $back_image;
    }
    function getDescription() { return $this->description; }
    function setDescrption(string $description) {
        $this->description = $description;
    }
    //function getNotes() { return $this->notes; }
    //function getComments() { return $this->comments; }
    function getLastConnection() { return $this->last_connection; }
    function setLastConnection(string $last_connection) {
        $this->last_connection = $last_connection;
    }
    function getRole() { return $this->role; }
}
?>