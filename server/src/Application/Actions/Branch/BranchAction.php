<?php

namespace App\Application\Actions\Branch;

use App\Application\Actions\Action;
use App\Infrastructure\Repositories\Branch\BranchInterface;
use Psr\Log\LoggerInterface;

abstract class BranchAction extends Action
{

    /**
     * @var BranchInterface
     */
    protected $branch;

    /**
     * @param LoggerInterface $logger
     * @param BranchInterface $branch
     */
    public function __construct(
        LoggerInterface $logger,
        BranchInterface $branch
    ) {
        parent::__construct($logger);
        $this->branch = $branch;
    }
}