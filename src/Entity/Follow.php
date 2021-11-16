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
     * @ORM\ManyToMany(targetEntity=User::class, inversedBy="follows")
     */
    private $follower;

    /**
     * @ORM\OneToOne(targetEntity=User::class, cascade={"persist", "remove"})
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
     * @return Collection|User[]
     */
    public function getFollower(): Collection
    {
        return $this->follower;
    }

    public function addFollower(User $follower): self
    {
        if (!$this->follower->contains($follower)) {
            $this->follower[] = $follower;
        }

        return $this;
    }

    public function removeFollower(User $follower): self
    {
        $this->follower->removeElement($follower);

        return $this;
    }

    public function getFollowed(): ?User
    {
        return $this->followed;
    }

    public function setFollowed(User $followed): self
    {
        $this->followed = $followed;

        return $this;
    }
}
