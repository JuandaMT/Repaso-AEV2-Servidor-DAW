<?php

namespace AEV2\Entity;

use AEV2\Repository\DetailRepository;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;

#[Entity(RepositoryClass: DetailRepository::class)]
#[Table(name: 'detalle')]
class Detail
{
    #[Id]
    #[GeneratedValue(strategy: "NONE")]
    #[ManyToOne(TargetEntity: Order::class, inversedBy: 'details')]
    #[JoinColumn(name: 'pedido_num', referencedColumnName: 'pedido_num', nullable: false)]
    private int $order_num;

    #[Id]
    #[GeneratedValue(strategy: "NONE")]
    #[Column(name: 'pedido_num', type: 'integer', options: ['unsigned' => true])]
    private int $detail_num;

    #[ManyToOne(TargetEntity: Product::class, inversedBy: 'details')]
    #[JoinColumn(name: 'prod_num', referencedColumnName: 'prod_num', nullable: false)]
    private Product $prod_num;


    #[Column(name: 'precio_venta', type: 'decimal', precision: 8, scale: 2, nullable: true, options: ['unsigned' => true])]
    private ?float $sell_price = null;

    #[Column(name: 'cantidad', type: 'integer', nullable: true)]
    private ?int $quantity = null;


    #[Column(name: 'importe', type: 'integer', precision: 8, scale: 2, nullable: true)]
    private ?float $amount = null;

    public function getOrderNum(): int
    {
        return $this->order_num;
    }

    public function setOrderNum(int $order_num): void
    {
        $this->order_num = $order_num;
    }

    public function getDetailNum(): int
    {
        return $this->detail_num;
    }

    public function setDetailNum(int $detail_num): void
    {
        $this->detail_num = $detail_num;
    }

    public function getProdNum(): Product
    {
        return $this->prod_num;
    }

    public function setProdNum(Product $prod_num): void
    {
        $this->prod_num = $prod_num;
    }

    public function getSellPrice(): ?float
    {
        return $this->sell_price;
    }

    public function setSellPrice(?float $sell_price): void
    {
        $this->sell_price = $sell_price;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(?int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(?float $amount): void
    {
        $this->amount = $amount;
    }

}