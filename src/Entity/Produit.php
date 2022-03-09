<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProduitRepository::class)]
class Produit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $NomProduit;

    #[ORM\Column(type: 'decimal', precision: 5, scale: 2)]
    private $PrixProduit;

    #[ORM\Column(type: 'date')]
    private $DateCreationProduit;

    #[ORM\Column(type: 'integer')]
    private $QuantiteProduit;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomProduit(): ?string
    {
        return $this->NomProduit;
    }

    public function setNomProduit(string $NomProduit): self
    {
        $this->NomProduit = $NomProduit;

        return $this;
    }

    public function getPrixProduit(): ?string
    {
        return $this->PrixProduit;
    }

    public function setPrixProduit(string $PrixProduit): self
    {
        $this->PrixProduit = $PrixProduit;

        return $this;
    }

    public function getDateCreationProduit(): ?\DateTimeInterface
    {
        return $this->DateCreationProduit;
    }

    public function setDateCreationProduit(\DateTimeInterface $DateCreationProduit): self
    {
        $this->DateCreationProduit = $DateCreationProduit;

        return $this;
    }

    public function getQuantiteProduit(): ?int
    {
        return $this->QuantiteProduit;
    }

    public function setQuantiteProduit(int $QuantiteProduit): self
    {
        $this->QuantiteProduit = $QuantiteProduit;

        return $this;
    }
}
