<?php

namespace AEV2\Repository;

use Doctrine\ORM\EntityRepository;

class ClientRepository extends EntityRepository
{
    public function getAll(): array
    {
        return $this->findAll();
    }
}