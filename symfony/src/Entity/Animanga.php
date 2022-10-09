<?php

namespace App\Entity;

use App\Repository\AnimangaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=AnimangaRepository::class)
 */
class Animanga
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"name", "animanga", "top"})
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"animanga"})

     */
    
    private $originalTitle;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"animanga"})
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"animanga"})
     */
    private $synopsis;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     * @Groups({"animanga", "top"})
     */
    private $note;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Groups({"animanga"})
     */
    private $releaseDate;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     * @Groups({"animanga", "top"})
     */
    private $tomes;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     * @Groups({"animanga", "top"})
     */
    private $episodes;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"animanga"})
     */
    private $status;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"animanga", "top"})
     */
    private $image;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"animanga"})
     */
    private $lastModification;

    /**
     * @ORM\OneToMany(targetEntity=Avis::class, mappedBy="animanga", orphanRemoval=true)
     */
    private $feedbacks;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $genres;



    public function __construct()
    {
        $this->feedbacks = new ArrayCollection();
        $this->lastModification = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getOriginalTitle(): ?string
    {
        return $this->originalTitle;
    }

    public function setOriginalTitle(?string $originalTitle): self
    {
        $this->originalTitle = $originalTitle;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getSynopsis(): ?string
    {
        return $this->synopsis;
    }

    public function setSynopsis(?string $synopsis): self
    {
        $this->synopsis = $synopsis;

        return $this;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(?int $note): self
    {
        $this->note = $note;

        return $this;
    }



    public function getTomes(): ?int
    {
        return $this->tomes;
    }

    public function setTomes(?int $tomes): self
    {
        $this->tomes = $tomes;

        return $this;
    }

    public function getEpisodes(): ?int
    {
        return $this->episodes;
    }

    public function setEpisodes(?int $episodes): self
    {
        $this->episodes = $episodes;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getLastModification(): ?\DateTimeInterface
    {
        return $this->lastModification;
    }

    public function setLastModification(?\DateTimeInterface $lastModification): self
    {
        $this->lastModification = $lastModification;

        return $this;
    }

    /**
     * @return Collection|Avis[]
     */
    public function getFeedbacks(): Collection
    {
        return $this->feedbacks;
    }

    public function addFeedback(Avis $feedback): self
    {
        if (!$this->feedbacks->contains($feedback)) {
            $this->feedbacks[] = $feedback;
            $feedback->setAnimanga($this);
        }

        return $this;
    }

    public function removeFeedback(Avis $feedback): self
    {
        if ($this->feedbacks->removeElement($feedback)) {
            // set the owning side to null (unless already changed)
            if ($feedback->getAnimanga() === $this) {
                $feedback->setAnimanga(null);
            }
        }

        return $this;
    }



    public function __toString()
    {
        return $this->getTitle();
    }

    public function getReleaseDate(): ?string
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(?string $releaseDate): self
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    public function getGenres(): ?string
    {
        return $this->genres;
    }

    public function setGenres(?string $genres): self
    {
        $this->genres = $genres;

        return $this;
    }

}
