<?php

namespace Owp\OwpCore\Model;

Trait PromoteTrait
{
    /**
     * @ORM\Column(name="promote", type="boolean", nullable=true)
     */
    protected $promote;

    public function isPromote(): ?bool
    {
        return $this->promote;
    }

    public function setPromote(bool $promote): self
    {
        $this->promote = $promote;

        return $this;
    }
}
