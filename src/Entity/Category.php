<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Idea::class, mappedBy="categorie")
     */
    private $idea;

    public function __construct()
    {
        $this->idea = new ArrayCollection();
    }

    public function __toString()
    {
    return $this->name;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Idea[]
     */
    public function getIdea(): Collection
    {
        return $this->idea;
    }

    public function addIdea(Idea $idea): self
    {
        if (!$this->idea->contains($idea)) {
            $this->idea[] = $idea;
            $idea->setCategorie($this);
        }

        return $this;
    }

    public function removeIdea(Idea $idea): self
    {
        if ($this->idea->removeElement($idea)) {
            // set the owning side to null (unless already changed)
            if ($idea->getCategorie() === $this) {
                $idea->setCategorie(null);
            }
        }

        return $this;
    }
}
