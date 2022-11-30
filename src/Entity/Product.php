<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nameProduct = null;

    #[ORM\Column(length: 255)]
    private ?string $imgProduct = null;

    #[ORM\Column(length: 255)]
    private ?string $descriptionProduct = null;

    #[ORM\Column]
    private ?float $priceProduct = null;

    #[ORM\ManyToOne(inversedBy: 'products')]
    private ?Category $category = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameProduct(): ?string
    {
        return $this->nameProduct;
    }

    public function setNameProduct(string $nameProduct): self
    {
        $this->nameProduct = $nameProduct;

        return $this;
    }

    public function getImgProduct(): ?string
    {
        return $this->imgProduct;
    }

    public function setImgProduct(string $imgProduct): self
    {
        $this->imgProduct = $imgProduct;

        return $this;
    }

    public function getDescriptionProduct(): ?string
    {
        return $this->descriptionProduct;
    }

    public function setDescriptionProduct(string $descriptionProduct): self
    {
        $this->descriptionProduct = $descriptionProduct;

        return $this;
    }

    public function getPriceProduct(): ?float
    {
        return $this->priceProduct;
    }

    public function setPriceProduct(float $priceProduct): self
    {
        $this->priceProduct = $priceProduct;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }
}
