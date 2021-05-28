<?php

namespace App\Entity;

use App\Repository\PasseportRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PasseportRepository::class)
 */
class Passeport
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
    private $libellePass;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibellePass(): ?string
    {
        return $this->libellePass;
    }

    public function setLibellePass(string $libellePass): self
    {
        $this->libellePass = $libellePass;

        return $this;
    }
	public function __toString()
	{
		return $this -> libellePass;
	}
}
