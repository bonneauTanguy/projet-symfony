<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategorieRepository::class)
 */
class Categorie
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
    private $libelleCateg;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleCateg(): ?string
    {
        return $this->libelleCateg;
    }

    public function setLibelleCateg(string $libelleCateg): self
    {
        $this->libelleCateg = $libelleCateg;

        return $this;
    }
	
	public function __toString()
	{
		return $this->libelleCateg;
	}
}
