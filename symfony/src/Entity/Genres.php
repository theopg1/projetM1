<?php

namespace App\Entity;

use App\Repository\GenresRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GenresRepository::class)
 */
class Genres
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $label;

    /**
     * @ORM\ManyToMany(targetEntity=Animanga::class, mappedBy="genres")
     */
    private $animangas;

    public function __construct()
    {
        $this->animangas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @return Collection|Animanga[]
     */
    public function getAnimangas(): Collection
    {
        return $this->animangas;
    }

    public function addAnimanga(Animanga $animanga): self
    {
        if (!$this->animangas->contains($animanga)) {
            $this->animangas[] = $animanga;
            $animanga->addGenre($this);
        }

        return $this;
    }

    public function removeAnimanga(Animanga $animanga): self
    {
        if ($this->animangas->removeElement($animanga)) {
            $animanga->removeGenre($this);
        }

        return $this;
    }

    public function __toString()
    {
        return (string)$this->getLabel();
    }
}
