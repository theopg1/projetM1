<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity(repositoryClass=MemberRepository::class)
 */
class Member {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $first_name;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $last_name;
    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $username;
    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $email;
    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $password;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $profile_image;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $back_image;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $description;
    //protected $notes;
    //protected $comments;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $last_connection;

    function postCommentById(int $id_animanga, string $comment) {
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
    function modifyNote(int $id, int $note) {
        //
    }
    function eraseNote(int $id) {
        //
    }

    function getId() : ?int { return $this->id; }
    function getUsername() : ?string { return $this->username; }
    function setUsername(string $username) : self {
        $this->username = $username;
        return $this;
    }
    function getFirstName() : ?string { return $this->first_name; }
    function setFirstName(string $first_name) : self {
        $this->first_name = $first_name;
        return $this;
    }
    function getLastName() : ?string { return $this->last_name; }
    function setLastName(string $last_name) : self {
        $this->last_name = $last_name;
        return $this;
    }
    function getEmail() : ?string { return $this->email; }
    function setEmail(string $email) : self {
        $this->email = $email;
        return $this;
    }
    function getPassword() : ?string { return $this->password; }
    function setPassword(string $password) : self {
        $this->password = $password;
        return $this;
    }
    function getProfileImage() : ?string { return $this->profile_image; }
    function setProfileImage(string $profile_image) : self {
        $this->profile_image = $profile_image;
        return $this;
    }
    function getBackImage() : ?string { return $this->back_image; }
    function setBackImage(string $back_image) : self {
        $this->back_image = $back_image;
        return $this;
    }
    function getDescription() : ?string { return $this->description; }
    function setDescrption(string $description) : self {
        $this->description = $description;
        return $this;
    }
    //function getNotes() { return $this->notes; }
    //function getComments() { return $this->comments; }
    function getLastConnection() : ?\DateTimeInterface { return $this->last_connection; }
    function getRole() { return $this->role; }
}
?>