<?php

namespace AEV2\Entity;

use AEV2\Repository\OrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;

#[Entity(RepositoryClass: OrderRepository::class)]
#[Table(name: 'pedido')]
class Order
{
    #[Id]
    #[GeneratedValue(strategy: "NONE")]
    #[Column(name: 'pedido_num', type: 'smallint', options: ['unsigned' => true])]
    private int $order_num;

    #[Column(name: 'pedido_fecha', type: 'date', nullable: true)]
    private ?\DateTime $order_date = null;

    #[Column(name: 'pedido_tipo', type: 'string', length: 1, nullable: true)]
    private ?string $order_type = null;

    #[Column(name: 'fecha_envio', type: 'date', nullable: true)]
    private ?\DateTime $ship_date = null;

    #[Column(name: 'total', type: 'decimal', precision: 8, scale: 2, options: ['unsigned' => true])]
    private ?float $total = null;

    /*
     * [ManyToOne]
     * Un cliente puede hacer muchos pedidos
     * */
    #[ManyToOne(TargetEntity: Client::class, inversedBy: 'orders')]
    #[JoinColumn(name: 'cliente_cod', referencedColumnName: 'cliente_cod', nullable: false, options: ['unsigned' => true])]
    private int $client;

    /*
     * [OneToMany]
     * Un pedido puede tener muchos detalles
     * */
    #[OneToMany(TargetEntity: Detail::class, mappedBy: 'order')]
    private Collection $details;

    public function __construct()
    {
        $this->details = new ArrayCollection();
    }

    public function getOrderNum(): int
    {
        return $this->order_num;
    }

    public function setOrderNum(int $order_num): void
    {
        $this->order_num = $order_num;
    }

    public function getOrderDate(): ?\DateTime
    {
        return $this->order_date;
    }

    public function setOrderDate(?\DateTime $order_date): void
    {
        $this->order_date = $order_date;
    }

    public function getOrderType(): ?string
    {
        return $this->order_type;
    }

    public function setOrderType(?string $order_type): void
    {
        $this->order_type = $order_type;
    }

    public function getShipDate(): ?\DateTime
    {
        return $this->ship_date;
    }

    public function setShipDate(?\DateTime $ship_date): void
    {
        $this->ship_date = $ship_date;
    }

    public function getTotal(): ?float
    {
        return $this->total;
    }

    public function setTotal(?float $total): void
    {
        $this->total = $total;
    }

    public function getClient(): int
    {
        return $this->client;
    }

    public function setClient(int $client): void
    {
        $this->client = $client;
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