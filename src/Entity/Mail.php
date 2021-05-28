<?php

namespace App\Entity;

use App\Repository\MailRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MailRepository::class)
 */
class Mail
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mail;

    /**
     * @ORM\ManyToOne(targetEntity=TypeParent::class)
     */
    private $unTypeParent;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getUnTypeParent(): ?TypeParent
    {
        return $this->unTypeParent;
    }

    public function setUnTypeParent(?TypeParent $unTypeParent): self
    {
        $this->unTypeParent = $unTypeParent;

        return $this;
    }
	
	public function __toString()
	{
		return $this->mail;
	}
}
