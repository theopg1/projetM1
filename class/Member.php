<?php
include "../config/database.php";
class Member {
    protected int $id;
    protected string $username;
    protected string $email;
    protected string $password;
    protected string $profile_image;
    protected string $back_image;
    protected string $description;
    protected $notes;
    protected $comments;
    protected string $last_connection;
    protected string $role;

    protected $db;


    function __construct(int $id) {
        $this->id = $id;
        $this->role = "Member";

        $dbc = new Database();
        $this->db = $dbc->getMysqli();
    }


    function postComment(string $comment) {
        //
    }
    function modifyComment(int $id, string $comment) {
        //
    }
    function eraseComment(int $id) {
        //
    }
    function postNote(int $note) {
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
    function getNotes() { return $this->notes; }
    function getComments() { return $this->comments; }
    function getLastConnection() { return $this->last_connection; }
    function setLastConnection(string $last_connection) {
        $this->last_connection = $last_connection;
    }
    function getRole() { return $this->role; }
}
?>