<?php

namespace App\Entity;

use App\Repository\CertificatRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CertificatRepository::class)
 */
class Certificat
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
    private $dateCertif;

    /**
     * @ORM\ManyToOne(targetEntity=Competition::class)
     */
    private $uneCompetition;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateCertif(): ?\DateTimeInterface
    {
        return $this->dateCertif;
    }

    public function setDateCertif(\DateTimeInterface $dateCertif): self
    {
        $this->dateCertif = $dateCertif;

        return $this;
    }

    public function getUneCompetition(): ?Competition
    {
        return $this->uneCompetition;
    }

    public function setUneCompetition(?Competition $uneCompetition): self
    {
        $this->uneCompetition = $uneCompetition;

        return $this;
    }
	
	public function __toString()
	{

		return $this -> dateCertif ->format('Y-m-d');
	}
}
