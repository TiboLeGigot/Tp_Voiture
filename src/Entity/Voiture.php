<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VoitureRepository")
 */
class Voiture
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $immatriculation;

    /**
     * @ORM\Column(type="boolean")
     */
    private $dispo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $carburant;

    /**
     * @ORM\Column(type="integer")
     */
    private $kilometrage;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Stationnement", inversedBy="voitures")
     */
    private $stationnement;

    public function getId()
    {
        return $this->id;
    }

    public function getImmatriculation(): ?int
    {
        return $this->immatriculation;
    }

    public function setImmatriculation(int $immatriculation): self
    {
        $this->immatriculation = $immatriculation;

        return $this;
    }

    public function getDispo(): ?bool
    {
        return $this->dispo;
    }

    public function setDispo(bool $dispo): self
    {
        $this->dispo = $dispo;

        return $this;
    }

    public function getCarburant(): ?string
    {
        return $this->carburant;
    }

    public function setCarburant(string $carburant): self
    {
        $this->carburant = $carburant;

        return $this;
    }

    public function getKilometrage(): ?int
    {
        return $this->kilometrage;
    }

    public function setKilometrage(int $kilometrage): self
    {
        $this->kilometrage = $kilometrage;

        return $this;
    }

    public function getStationnement()
    {
        return $this->stationnement;
    }

    public function setStationnement(Stationnement $stationnement): self
    {
        $this->stationnement = $stationnement;
    }
}
