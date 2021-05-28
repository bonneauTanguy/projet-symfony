<?php

namespace App\Entity;

use App\Repository\TelephoneRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TelephoneRepository::class)
 */
class Telephone
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $numero;

    /**
     * @ORM\ManyToOne(targetEntity=TypeParent::class)
     */
    private $unTypeParent;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): self
    {
        $this->numero = $numero;

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
		return $this->numero;
	}
}
