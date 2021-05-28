<?php

namespace App\Entity;

use App\Repository\CeintureRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CeintureRepository::class)
 */
class Ceinture
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
    private $libelleCeinture;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleCeinture(): ?string
    {
        return $this->libelleCeinture;
    }

    public function setLibelleCeinture(string $libelleCeinture): self
    {
        $this->libelleCeinture = $libelleCeinture;

        return $this;
    }
	
	public function __toString()
	{
		return $this -> libelleCeinture;
	}
}
