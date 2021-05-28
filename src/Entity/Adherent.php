<?php

namespace App\Entity;

use App\Repository\AdherentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdherentRepository::class)
 */
class Adherent
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
    private $numLicence;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="date")
     */
    private $dateNaiss;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rue;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $cp;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sexe;

    /**
     * @ORM\ManyToOne(targetEntity=Certificat::class)
     */
    private $unCertificat;

    /**
     * @ORM\ManyToMany(targetEntity=PersonneConfiance::class)
     */
    private $desPersonnesConf;

    /**
     * @ORM\ManyToOne(targetEntity=Categorie::class)
     */
    private $uneCateg;

    /**
     * @ORM\ManyToMany(targetEntity=Nom::class, inversedBy="n")
     */
    private $desNoms;

    /**
     * @ORM\ManyToOne(targetEntity=Passeport::class)
     */
    private $unPass;

    /**
     * @ORM\ManyToMany(targetEntity=Adherer::class)
     */
    private $lesAdherer;

    /**
     * @ORM\ManyToMany(targetEntity=Mail::class)
     */
    private $lesMails;

    /**
     * @ORM\ManyToMany(targetEntity=Telephone::class)
     */
    private $lesTel;

    /**
     * @ORM\OneToMany(targetEntity=Adherer::class, mappedBy="unAdherent")
     */
    private $lesAdhesions;



    public function __construct()
    {
        $this->desPersonnesConf = new ArrayCollection();
        $this->desNoms = new ArrayCollection();
        $this->lesAdherer = new ArrayCollection();
        $this->lesMails = new ArrayCollection();
        $this->lesTel = new ArrayCollection();
        $this->lesAdhesions = new ArrayCollection();
        $this->adherers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumLicence(): ?string
    {
        return $this->numLicence;
    }

    public function setNumLicence(string $numLicence): self
    {
        $this->numLicence = $numLicence;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateNaiss(): ?\DateTimeInterface
    {
        return $this->dateNaiss;
    }
	
	public function getSDateNaiss(): ?string
	{
		return $this -> dateNaiss -> format ('Y-m-d');
	}

    public function setDateNaiss(\DateTimeInterface $dateNaiss): self
    {
        $this->dateNaiss = $dateNaiss;

        return $this;
    }

    public function getRue(): ?string
    {
        return $this->rue;
    }

    public function setRue(string $rue): self
    {
        $this->rue = $rue;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCp(): ?string
    {
        return $this->cp;
    }

    public function setCp(string $cp): self
    {
        $this->cp = $cp;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getUnCertificat(): ?Certificat
    {
        return $this->unCertificat;
    }

    public function setUnCertificat(?Certificat $unCertificat): self
    {
        $this->unCertificat = $unCertificat;

        return $this;
    }

    /**
     * @return Collection|PersonneConfiance[]
     */
    public function getDesPersonnesConf(): Collection
    {
        return $this->desPersonnesConf;
    }

    public function addDesPersonnesConf(PersonneConfiance $desPersonnesConf): self
    {
        if (!$this->desPersonnesConf->contains($desPersonnesConf)) {
            $this->desPersonnesConf[] = $desPersonnesConf;
        }

        return $this;
    }

    public function removeDesPersonnesConf(PersonneConfiance $desPersonnesConf): self
    {
        $this->desPersonnesConf->removeElement($desPersonnesConf);

        return $this;
    }

    public function getUneCateg(): ?Categorie
    {
        return $this->uneCateg;
    }

    public function setUneCateg(?Categorie $uneCateg): self
    {
        $this->uneCateg = $uneCateg;

        return $this;
    }

    /**
     * @return Collection|Nom[]
     */
    public function getDesNoms(): Collection
    {
        return $this->desNoms;
    }

    public function addDesNom(Nom $desNom): self
    {
        if (!$this->desNoms->contains($desNom)) {
            $this->desNoms[] = $desNom;
        }

        return $this;
    }

    public function removeDesNom(Nom $desNom): self
    {
        $this->desNoms->removeElement($desNom);

        return $this;
    }

    public function getUnPass(): ?Passeport
    {
        return $this->unPass;
    }

    public function setUnPass(?Passeport $unPass): self
    {
        $this->unPass = $unPass;

        return $this;
    }

    /**
     * @return Collection|Adherer[]
     */
    public function getLesAdherer(): Collection
    {
        return $this->lesAdherer;
    }

    public function addLesAdherer(Adherer $lesAdherer): self
    {
        if (!$this->lesAdherer->contains($lesAdherer)) {
            $this->lesAdherer[] = $lesAdherer;
        }

        return $this;
    }

    public function removeLesAdherer(Adherer $lesAdherer): self
    {
        $this->lesAdherer->removeElement($lesAdherer);

        return $this;
    }

    /**
     * @return Collection|Mail[]
     */
    public function getLesMails(): Collection
    {
        return $this->lesMails;
    }

    public function addLesMail(Mail $lesMail): self
    {
        if (!$this->lesMails->contains($lesMail)) {
            $this->lesMails[] = $lesMail;
        }

        return $this;
    }

    public function removeLesMail(Mail $lesMail): self
    {
        $this->lesMails->removeElement($lesMail);

        return $this;
    }

    /**
     * @return Collection|Telephone[]
     */
    public function getLesTel(): Collection
    {
        return $this->lesTel;
    }

    public function addLesTel(Telephone $lesTel): self
    {
        if (!$this->lesTel->contains($lesTel)) {
            $this->lesTel[] = $lesTel;
        }

        return $this;
    }

    public function removeLesTel(Telephone $lesTel): self
    {
        $this->lesTel->removeElement($lesTel);

        return $this;
    }


	
	public function __toString()
    {
		return $this -> prenom;
    }

    /**
     * @return Collection|Adherer[]
     */
    public function getLesAdhesions(): Collection
    {
        return $this->lesAdhesions;
    }

    public function addLesAdhesion(Adherer $lesAdhesion): self
    {
        if (!$this->lesAdhesions->contains($lesAdhesion)) {
            $this->lesAdhesions[] = $lesAdhesion;
            $lesAdhesion->setUnAdherent($this);
        }

        return $this;
    }

    public function removeLesAdhesion(Adherer $lesAdhesion): self
    {
        if ($this->lesAdhesions->removeElement($lesAdhesion)) {
            // set the owning side to null (unless already changed)
            if ($lesAdhesion->getUnAdherent() === $this) {
                $lesAdhesion->setUnAdherent(null);
            }
        }

        return $this;
    }
	

	public function getDerSaison():String
	{
		$derSaison = '';
		$derSaison = $adhesion->getUneSaison()->getDateSaisonD();
		foreach ($adhesion as $this->lesAdhesions)
		{
			if( $int < $adhesion->getUneSaison()->getDateSaisonD())
			{
				$int = $adhesion->getUneSaison()->getDateSaisonD();
			}
		}
		return $derSaison;
	}

}
