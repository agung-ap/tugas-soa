<?php

namespace App\Application\Actions\Inventory;

use Psr\Http\Message\ResponseInterface as Response;

class ListInventoryAction extends InventoryAction
{

    protected function action(): Response
    {
        $inventory = $this->inventory->findAll();

        return $this->respondWithData($inventory);
    }
}