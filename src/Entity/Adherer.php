<?php

namespace App\Entity;

use App\Repository\AdhererRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdhererRepository::class)
 */
class Adherer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Saison::class)
     */
    private $uneSaison;

    /**
     * @ORM\ManyToOne(targetEntity=Ceinture::class)
     */
    private $uneCeinture;

    /**
     * @ORM\ManyToOne(targetEntity=Adherent::class, inversedBy="lesAdhesions")
     */
    private $unAdherent;






    public function __construct()
    {
        $this->unAdherent = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUneSaison(): ?Saison
    {
        return $this->uneSaison;
    }

    public function setUneSaison(?Saison $uneSaison): self
    {
        $this->uneSaison = $uneSaison;

        return $this;
    }

    public function getUneCeinture(): ?Ceinture
    {
        return $this->uneCeinture;
    }

    public function setUneCeinture(?Ceinture $uneCeinture): self
    {
        $this->uneCeinture = $uneCeinture;

        return $this;
    }
	
	public function __toString()
    {
		return $this -> uneSaison -> getDateSaisonD() -> format('Y').' - '.$this -> uneSaison -> getDateSaisonF() -> format('Y').' '. $this -> uneCeinture -> getLibelleCeinture(). ' '.$this -> unAdherent -> getPrenom();
    }

    public function getUnAdherent(): ?Adherent
    {
        return $this->unAdherent;
    }

    public function setUnAdherent(?Adherent $unAdherent): self
    {
        $this->unAdherent = $unAdherent;

        return $this;
    }
}
