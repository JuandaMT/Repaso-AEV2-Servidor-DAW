<?php

namespace AEV2\Entity;

use AEV2\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;

#[Entity(RepositoryClass: ProductRepository::class)]
#[Table(name: 'producto')]
class Product
{
    #[Id]
    #[GeneratedValue(strategy: "NONE")]
    #[Column(name: 'prod_num', type: 'integer', options: ['unsigned' => true])]
    private int $prod_num;

    #[OneToMany(targetEntity: Detail::class, mappedBy: 'prod_num')]
    private Collection $details;

    public function __construct()
    {
        $this->details = new ArrayCollection();
    }

    public function getProdNum(): int
    {
        return $this->prod_num;
    }

    public function setProdNum(int $prod_num): void
    {
        $this->prod_num = $prod_num;
    }

    public function getDetails(): Collection
    {
        return $this->details;
    }

    public function setDetails(Collection $details): void
    {
        $this->details = $details;
    }

}