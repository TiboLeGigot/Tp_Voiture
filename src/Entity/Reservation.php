<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReservationRepository")
 */
class Reservation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateDebut;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\NatureDeplacement", inversedBy="reservations")
     */
    private $nature;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Stationnement", inversedBy="reservations")
*/
    private $lieu;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $destination;

    /**
     * @ORM\Column(type="integer")
     */
    private $km;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Utilisateur", inversedBy="reservations")
     */
    private $conducteur;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $commentaire;

    public function __construct()
    {
        $this->conducteur = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getNature(): ?NatureDeplacement
    {
        return $this->nature;
    }

    public function setNature(string $nature): self
    {
        $this->nature = $nature;

        return $this;
    }

    public function getLieu(): ?Stationnement
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getDestination(): ?string
    {
        return $this->destination;
    }

    public function setDestination(string $destination): self
    {
        $this->destination = $destination;

        return $this;
    }

    public function getKm(): ?int
    {
        return $this->km;
    }

    public function setKm(int $km): self
    {
        $this->km = $km;

        return $this;
    }

    /**
     * @return Collection|Utilisateur[]
     */
    public function getConducteur(): Collection
    {
        return $this->conducteur;
    }

    public function addConducteur(Utilisateur $conducteur): self
    {
        if (!$this->conducteur->contains($conducteur)) {
            $this->conducteur[] = $conducteur;
        }

        return $this;
    }

    public function removeConducteur(Utilisateur $conducteur): self
    {
        if ($this->conducteur->contains($conducteur)) {
            $this->conducteur->removeElement($conducteur);
        }

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(?string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }
}
