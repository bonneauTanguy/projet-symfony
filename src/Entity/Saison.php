<?php

namespace App\Entity;

use App\Repository\SaisonRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SaisonRepository::class)
 */
class Saison
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $dateSaisonD;

    /**
     * @ORM\Column(type="date")
     */
    private $dateSaisonF;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateSaisonD(): ?\DateTimeInterface
    {
        return $this->dateSaisonD;
    }

    public function setDateSaisonD(\DateTimeInterface $dateSaisonD): self
    {
        $this->dateSaisonD = $dateSaisonD;

        return $this;
    }

    public function getDateSaisonF(): ?\DateTimeInterface
    {
        return $this->dateSaisonF;
    }

    public function setDateSaisonF(\DateTimeInterface $dateSaisonF): self
    {
        $this->dateSaisonF = $dateSaisonF;

        return $this;
    }
	
	public function __toString()
	{
		return $this -> dateSaisonD->format('Y').' - '.$this -> dateSaisonF->format('Y');
	}
}
