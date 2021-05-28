<?php

namespace App\Entity;

use App\Repository\TypeParentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeParentRepository::class)
 */
class TypeParent
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
    private $libelleParent;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleParent(): ?string
    {
        return $this->libelleParent;
    }

    public function setLibelleParent(string $libelleParent): self
    {
        $this->libelleParent = $libelleParent;

        return $this;
    }
	
	public function __toString()
	{
		return $this -> libelleParent;
	}
}
