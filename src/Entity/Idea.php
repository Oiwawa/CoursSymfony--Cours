<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Idea
 * @package App\Entity
 * @ORM\Entity(repositoryClass="App\Repository\TP\IdeaRepository")
 * @ORM\Table(name="Idea")
 */
class Idea
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="id", type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="title", type="string", length=250)
     */
    private $title;

    /**
     * @ORM\Column(name="description", type="text", length=1000)
     */
    private $description;

    /**
     * @ORM\Column(name="author", type="string", length=250)
     */
    private $author;

    /**
     * @ORM\Column(name="is_published", type="boolean")
     */
    private $isPublished;

    /**
     * @ORM\Column(name="date_created", type="datetime")
     */
    private $dateCreated;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author): void
    {
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getIsPublished()
    {
        return $this->isPublished;
    }

    /**
     * @param mixed $isPublished
     */
    public function setIsPublished($isPublished): void
    {
        $this->isPublished = $isPublished;
    }

    /**
     * @return mixed
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * @param mixed $dateCreated
     */
    public function setDateCreated($dateCreated): void
    {
        $this->dateCreated = $dateCreated;
    }


}