<?php

namespace App\Entity;

use App\Repository\ArticlesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArticlesRepository::class)
 */
class Articles
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="boolean")
     */
    private $online;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $slug;

    /**
     * @ORM\Column(type="datetime")
     */
    private $edition;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbr_view;

    /**
     * @ORM\Column(type="integer")
     */
    private $report;

    /**
     * @ORM\ManyToOne(targetEntity=Categories::class, inversedBy="articles")
     */
    private $categorie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="articles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $auteur;

    /**
     * @ORM\OneToMany(targetEntity=Comments::class, mappedBy="article")
     */
    private $comments;

    /**
     * @ORM\OneToMany(targetEntity=Ranking::class, mappedBy="article")
     */
    private $rankings;

    public function __construct()
    {
        $this->comments = new ArrayCollection();
        $this->rankings = new ArrayCollection();
    }




    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getOnline(): ?bool
    {
        return $this->online;
    }

    public function setOnline(bool $online): self
    {
        $this->online = $online;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getEdition(): ?\DateTimeInterface
    {
        return $this->edition;
    }

    public function setEdition(\DateTimeInterface $edition): self
    {
        $this->edition = $edition;

        return $this;
    }

    public function getNbrView(): ?int
    {
        return $this->nbr_view;
    }

    public function setNbrView(int $nbr_view): self
    {
        $this->nbr_view = $nbr_view;

        return $this;
    }

    public function getReport(): ?int
    {
        return $this->report;
    }

    public function setReport(int $report): self
    {
        $this->report = $report;

        return $this;
    }

    public function getCategorie(): ?Categories
    {
        return $this->categorie;
    }

    public function setCategorie(?Categories $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getAuteur(): ?User
    {
        return $this->auteur;
    }

    public function setAuteur(?User $auteur): self
    {
        $this->auteur = $auteur;

        return $this;
    }

    /**
     * @return Collection|Comments[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comments $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setArticle($this);
        }

        return $this;
    }

    public function removeComment(Comments $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getArticle() === $this) {
                $comment->setArticle(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Ranking[]
     */
    public function getRankings(): Collection
    {
        return $this->rankings;
    }

    public function addRanking(Ranking $ranking): self
    {
        if (!$this->rankings->contains($ranking)) {
            $this->rankings[] = $ranking;
            $ranking->setArticle($this);
        }

        return $this;
    }

    public function removeRanking(Ranking $ranking): self
    {
        if ($this->rankings->removeElement($ranking)) {
            // set the owning side to null (unless already changed)
            if ($ranking->getArticle() === $this) {
                $ranking->setArticle(null);
            }
        }

        return $this;
    }


}
