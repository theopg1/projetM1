<?php
class Member {
    private $id;
    private $username;
    private $email;
    private $password;
    private $profile_image;
    private $back_image;
    private $description;
    private $notes;
    private $comments;
    private $last_connection;
    private $role;


    function __construct($id) {
        $this->id = $id;
        $this->role = "Member";
    }


    function postComment($comment) {
        //
    }
    function modifyComment($id, $comment) {
        //
    }
    function eraseComment($id) {
        //
    }
    function postNote($note) {
        //
    }
    function modifyNote($id, $note) {
        //
    }
    function eraseNote($id) {
        //
    }

    function getId() { return $this->id; }
    function setId($id) { $this->id = $id; }
    function getUsername() { return $this->username; }
    function setUsername($username) { $this->username = $username; }
    function getEmail() { return $this->email; }
    function setEmail($email) { $this->email = $email; }
    function getPassword() { return $this->password; }
    function setPassword($password) {
        $this->password = $password;
    }
    function getProfileImage() { return $this->profile_image; }
    function setProfileImage($profile_image) { $this->profile_image = $profile_image; }
    function getBackImage() { return $this->back_image; }
    function setBackImage($back_image) { $this->back_image = $back_image; }
    function getDescription() { return $this->description; }
    function setDescrption($description) { $this->description = $description; }
    function getNotes() { return $this->notes; }
    function getComments() { return $this->comments; }
    function getLastConnection() { return $this->last_connection; }
    function setLastConnection($last_connection) { $this->last_connection = $last_connection; }
    function getRole() { return $this->role; }
}
?>