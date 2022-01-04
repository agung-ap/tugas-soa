<?php

namespace App\Application\Actions\Branch;

use App\Domain\DomainException\DomainRecordNotFoundException;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Exception\HttpBadRequestException;

class ListBranchAction extends BranchAction
{

    protected function action(): Response
    {
        $branch = $this->branch->findAll();

        return $this->respondWithData($branch);
    }
}