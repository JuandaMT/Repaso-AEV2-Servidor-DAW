<?php

namespace AEV2\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToMany;

class Department
{
    #[Id]
    #[GeneratedValue(strategy: "NONE")]
    #[Column(name: 'dept_no', type: 'integer', nullable: false, options: ['unsigned' => true])]
    private int $id; //unsigned

    #[Column(name: 'dnombre', type: 'string', length: 14)]
    private string $name;

    #[Column(name: 'loc', type: 'string', length: 14, nullable: true)]
    private ?string $location = null; //nullable

    #[Column(name: 'color', type: 'string', length: 20, nullable: true)]
    private ?string $color = null; //nullable

    /*
     * en un departamento hay muchos empleados
     * relación one to many con empleados
     * se debe de crear la colección de empleados en departamento
     * */

    #[OneToMany(TargetEntity: Employee::class, mappedBy: 'dept_no')]
    private Collection $employees;

    public function __construct()
    {
        $this->employees = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(?string $location): void
    {
        $this->location = $location;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): void
    {
        $this->color = $color;
    }

    public function getEmployees(): Collection
    {
        return $this->employees;
    }

    public function setEmployees(Collection $employees): void
    {
        $this->employees = $employees;
    }

}