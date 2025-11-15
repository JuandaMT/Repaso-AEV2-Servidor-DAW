<?php

namespace AEV2\Entity;

use AEV2\Repository\EmployeeRepository;
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

#[Entity(RepositoryClass: EmployeeRepository::class)]
#[Table(name: 'emp')]
class Employee
{
    #[Id]
    #[GeneratedValue(strategy: "NONE")]
    #[Column(name: 'emp_no', type: 'integer', options: ['unsigned' => true])]
    private int $emp_no;  //unsigned

    #[Column(name: 'apellidos', type: 'string', length: 10, nullable: false)]
    private string $last_name;

    #[Column(name: 'oficio', type: 'string', length: 10, nullable: true)]
    private ?string $job = null;

    #[Column(name: 'fecha_alta', type: 'date', nullable: true)]
    private ?\Datetime $hireDate = null;

    #[Column(name: 'salario', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $salary = null; //unsigned
    #[Column(name: 'comision', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $comission = null;  //unsigned

    /*
     * FK de departamento
     * [ManyToOne]
     * Muchos empleados pertenecen a un departamento
     * */
    #[ManyToOne(TargetEntity: Department::class, inversedBy: 'employees')]
    #[JoinColumn(name: 'dept_no', referencedColumnName: 'dept_no', nullable: false)]
    private Department $dept_no;  //unsigned

    /*
     * Muchos empleados tienen un jefe
     * #[ManyToOne]
     * */
    #[ManyToOne(targetEntity: Employee::class, inversedBy: 'subordinates')]
    #[JoinColumn(name: 'jefe', referencedColumnName: 'emp_no', nullable: true)]
    private ?int $manager;

    /*
     * Un empleado es jefe de muchos empleados
     * relación one to many
     * */
    #[OneToMany(TargetEntity: Employee::class, mappedBy: 'manager')]
    private ?Collection $subordinates = null;


    /*
     * Hacer la relación con client
     * un empleado tiene muchos clientes
     * relación [OneToMany]
     * */

    #[OneToMany(targetEntity: Client::class, mappedBy: 'repr_cod')]
    private Collection $Clients;

    public function __construct()
    {
        $this->clients = new ArrayCollection();
        $this->subordinates = new ArrayCollection();

    }

    public function getEmpNo(): int
    {
        return $this->emp_no;
    }

    public function setEmpNo(int $emp_no): void
    {
        $this->emp_no = $emp_no;
    }

    public function getLastName(): string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): void
    {
        $this->last_name = $last_name;
    }

    public function getJob(): ?string
    {
        return $this->job;
    }

    public function setJob(?string $job): void
    {
        $this->job = $job;
    }

    public function getHireDate(): ?\Datetime
    {
        return $this->hireDate;
    }

    public function setHireDate(?\Datetime $hireDate): void
    {
        $this->hireDate = $hireDate;
    }

    public function getSalary(): ?int
    {
        return $this->salary;
    }

    public function setSalary(?int $salary): void
    {
        $this->salary = $salary;
    }

    public function getComission(): ?int
    {
        return $this->comission;
    }

    public function setComission(?int $comission): void
    {
        $this->comission = $comission;
    }

    public function getDeptNo(): Department
    {
        return $this->dept_no;
    }

    public function setDeptNo(Department $dept_no): void
    {
        $this->dept_no = $dept_no;
    }

    public function getManager(): ?int
    {
        return $this->manager;
    }

    public function setManager(?int $manager): void
    {
        $this->manager = $manager;
    }

    public function getSubordinates(): ?Collection
    {
        return $this->subordinates;
    }

    public function setSubordinates(?Collection $subordinates): void
    {
        $this->subordinates = $subordinates;
    }

    public function getClients(): Collection
    {
        return $this->Clients;
    }

    public function setClients(Collection $Clients): void
    {
        $this->Clients = $Clients;
    }

}