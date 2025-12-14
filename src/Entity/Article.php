<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 2000)]
    private ?string $description = null;

    /**
     * @var Collection<int, Blogger>
     */
    #[ORM\ManyToMany(targetEntity: Blogger::class)]
    private Collection $bloggerName;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $dateAdded = null;

    public function __construct()
    {
        $this->bloggerName = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Blogger>
     */
    public function getBloggerName(): Collection
    {
        return $this->bloggerName;
    }

    public function addBloggerName(Blogger $bloggerName): static
    {
        if (!$this->bloggerName->contains($bloggerName)) {
            $this->bloggerName->add($bloggerName);
        }

        return $this;
    }

    public function removeBloggerName(Blogger $bloggerName): static
    {
        $this->bloggerName->removeElement($bloggerName);

        return $this;
    }

    public function getDateAdded(): ?\DateTime
    {
        return $this->dateAdded;
    }

    public function setDateAdded(\DateTime $dateAdded): static
    {
        $this->dateAdded = $dateAdded;
        return $this;
    }
}
