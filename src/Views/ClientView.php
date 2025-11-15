<?php

namespace AEV2\Views;


class ClientView
{
    const HTML = __DIR__ . '/../../templates/all_clients.html';

    public function getClients(array $customers): void
    {
        require self::HTML;
    }
}