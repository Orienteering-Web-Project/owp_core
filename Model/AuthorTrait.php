<?php

namespace Owp\OwpCore\Model;

use Owp\OwpCore\Entity\User;

Trait AuthorTrait
{
    /**
     * @ORM\ManyToOne(targetEntity="Owp\OwpCore\Entity\User")
     * @ORM\JoinColumn(nullable=true)
     */
    protected $createBy;

    /**
     * @ORM\ManyToOne(targetEntity="Owp\OwpCore\Entity\User")
     * @ORM\JoinColumn(nullable=true)
     */
    protected $updateBy;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $createAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $updateAt;

    public function getCreateBy(): ?User
    {
        return $this->createBy;
    }

    public function setCreateBy(User $user): self
    {
        $this->createBy = $user;

        return $this;
    }

    public function getCreateAt(): ?\DateTimeInterface
    {
        return $this->createAt;
    }

    /**
     * @ORM\PrePersist
     */
    public function setCreateAt(): self
    {
        $this->createAt = new \DateTime();

        return $this;
    }

    public function getUpdateAt(): ?\DateTimeInterface
    {
        return $this->updateAt;
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function setUpdateAt(): self
    {
        $this->updateAt = new \DateTime();

        return $this;
    }

    public function getUpdateBy(): ?User
    {
        return $this->updateBy;
    }

    public function setUpdateBy(User $user): self
    {
        $this->updateBy = $user;

        return $this;
    }
}
