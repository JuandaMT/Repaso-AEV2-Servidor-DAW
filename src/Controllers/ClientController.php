<?php

namespace AEV2\Controllers;

use AEV2\Core\EntityManager;
use AEV2\Entity\Client;
use AEV2\Repository\ClientRepository;
use AEV2\Views\ClientView;

class ClientController
{

    private EntityManager $entityManager;
    private ClientRepository $clientRepository;

    public function __construct()
    {
        $this->entityManager = new EntityManager();
        $this->clientRepository = $this->entityManager->getEntityManager()->getRepository(Client::class);
    }

    public function list()
    {
        $clients = $this->clientRepository->findAll();
        $view = new ClientView();
        $view->getClients($clients);
    }
}