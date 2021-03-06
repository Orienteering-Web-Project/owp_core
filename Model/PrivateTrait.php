<?php

namespace Owp\OwpCore\Model;

Trait PrivateTrait
{
    /**
     * @ORM\Column(name="private", type="boolean", nullable=true)
     */
    protected $private;

    public function isPrivate(): ?bool
    {
        return $this->private;
    }

    public function setPrivate(bool $private): self
    {
        $this->private = $private;

        return $this;
    }
}
