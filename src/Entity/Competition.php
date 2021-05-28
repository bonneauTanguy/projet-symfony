<?php

namespace App\Entity;

use App\Repository\CompetitionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompetitionRepository::class)
 */
class Competition
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
    private $libelleComp;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleComp(): ?string
    {
        return $this->libelleComp;
    }

    public function setLibelleComp(string $libelleComp): self
    {
        $this->libelleComp = $libelleComp;

        return $this;
    }
	
	public function __toString()
	{
		return $this -> libelleComp;
	}
}
