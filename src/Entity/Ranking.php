<?php

namespace App\Entity;

use App\Repository\RankingRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RankingRepository::class)
 */
class Ranking
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Articles::class, inversedBy="rankings")
     */
    private $article;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="rankings")
     */
    private $user;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="integer")
     */
    private $rankings;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArticle(): ?Articles
    {
        return $this->article;
    }

    public function setArticle(?Articles $article): self
    {
        $this->article = $article;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

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

    public function getRankings(): ?int
    {
        return $this->rankings;
    }

    public function setRankings(int $rankings): self
    {
        $this->rankings = $rankings;

        return $this;
    }
}
