<?php
declare(strict_types=1);

namespace App\Application\Actions\User;

use App\Application\Actions\Action;
use App\Domain\User\ProductInterface;
use App\Infrastructure\Repositories\User\UserInterface;
use Psr\Log\LoggerInterface;

abstract class UserAction extends Action
{
    /**
     * @var ProductInterface
     */
    protected $user;

    /**
     * @param LoggerInterface $logger
     * @param UserInterface $user
     */
    public function __construct(
        LoggerInterface $logger,
        UserInterface $user
    ) {
        parent::__construct($logger);
        $this->user = $user;
    }
}
