<?php

namespace App\Entity;

use App\Repository\FollowRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FollowRepository::class)
 */
class Follow
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=Users::class, inversedBy="follows")
     */
    private $follower;

    /**
     * @ORM\OneToOne(targetEntity=Users::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $followed;

    public function __construct()
    {
        $this->follower = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Users[]
     */
    public function getFollower(): Collection
    {
        return $this->follower;
    }

    public function addFollower(Users $follower): self
    {
        if (!$this->follower->contains($follower)) {
            $this->follower[] = $follower;
        }

        return $this;
    }

    public function removeFollower(Users $follower): self
    {
        $this->follower->removeElement($follower);

        return $this;
    }

    public function getFollowed(): ?Users
    {
        return $this->followed;
    }

    public function setFollowed(Users $followed): self
    {
        $this->followed = $followed;

        return $this;
    }
}
