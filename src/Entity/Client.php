<?php

namespace AEV2\Entity;

use AEV2\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;

#[Entity(RepositoryClass: ClientRepository::class)]
#[Table(name: 'cliente')]
class Client
{
    #[Id]
    #[GeneratedValue(strategy: "NONE")]
    #[Column(name: 'cliente_cod', type: 'integer')]
    private int $client_cod;

    #[Column(name: 'nombre', type: 'string', length: 45)]
    private string $name;

    #[Column(name: 'direc', type: 'string', length: 40)]
    private string $address;

    #[Column(name: 'ciudad', type: 'string', length: 30)]
    private string $city;

    #[Column(name: 'estado', type: 'string', length: 2, nullable: true)]
    private ?string $state = null;

    #[Column(name: 'cod_postal', type: 'string', length: 9)]
    private string $zip_code;

    #[Column(name: 'area', type: 'smallint', length: 3, nullable: true)]
    private int $area;

    #[Column(name: 'telefono', type: 'string', length: 9, nullable: true)]
    private string $phone_number;

    #[Column(name: 'limite_credito', type: 'decimal', precision: 9, scale: 2, options: ['unsigned' => true])]
    private float $credit_limit;

    #[Column(name: 'observaciones', type: 'string')]
    private string $observations;

    #[ManyToOne(targetEntity: Employee::class, inversedBy: 'clients')]
    #[JoinColumn(name: 'repr_cod', referencedColumnName: 'emp_no', nullable: true)]
    private ?Employee $repr_cod = null;

    #[OneToMany(targetEntity: Order::class, mappedBy: 'client')]
    private Collection $orders;

   public function __construct()
   {
       $this->orders = new ArrayCollection();
   }


    public function getClientCod(): int
    {
        return $this->client_cod;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(?string $state): void
    {
        $this->state = $state;
    }

    public function getZipCode(): string
    {
        return $this->zip_code;
    }

    public function setZipCode(string $zip_code): void
    {
        $this->zip_code = $zip_code;
    }

    public function getArea(): int
    {
        return $this->area;
    }

    public function setArea(int $area): void
    {
        $this->area = $area;
    }

    public function getPhoneNumber(): string
    {
        return $this->phone_number;
    }

    public function setPhoneNumber(string $phone_number): void
    {
        $this->phone_number = $phone_number;
    }

    public function getCreditLimit(): float
    {
        return $this->credit_limit;
    }

    public function setCreditLimit(float $credit_limit): void
    {
        $this->credit_limit = $credit_limit;
    }

    public function getObservations(): string
    {
        return $this->observations;
    }

    public function setObservations(string $observations): void
    {
        $this->observations = $observations;
    }

    public function getReprCod(): ?Employee
    {
        return $this->repr_cod;
    }

    public function setReprCod(?Employee $repr_cod): void
    {
        $this->repr_cod = $repr_cod;
    }


}