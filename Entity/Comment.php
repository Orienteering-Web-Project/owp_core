<?php

namespace Owp\OwpCore\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\CommentBundle\Entity\Comment as BaseComment;
use FOS\CommentBundle\Model\SignedCommentInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Owp\OwpCore\Entity\User;

/**
 * @ORM\Entity
 * @ORM\ChangeTrackingPolicy("DEFERRED_EXPLICIT")
 * @ORM\HasLifecycleCallbacks()
 */
class Comment extends BaseComment implements SignedCommentInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Thread of this comment
     *
     * @var Thread
     * @ORM\ManyToOne(targetEntity="Owp\OwpCore\Entity\Thread")
     */
    protected $thread;

    /**
     * @ORM\ManyToOne(targetEntity="Owp\OwpCore\Entity\User")
     * @ORM\JoinColumn(nullable=true)
     */
    protected $createBy;

    public function getAuthorName(): string
    {
        return $this->createBy ? $this->createBy->getUsername() : 'anonymous';
    }

    public function getAuthor(): ?User
    {
        return $this->createBy;
    }

    public function setAuthor(UserInterface $user): self
    {
        $this->createBy = $user;

        return $this;
    }
}
