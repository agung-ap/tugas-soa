<?php
declare(strict_types=1);

namespace App\Application\Actions\Product;

use App\Application\Actions\Action;
use App\Infrastructure\Repositories\Product\ProductInterface;
use Psr\Log\LoggerInterface;

abstract class ProductAction extends Action
{
    /**
     * @var ProductInterface
     */
    protected $product;

    /**
     * @param LoggerInterface $logger
     * @param ProductInterface $product
     */
    public function __construct(
        LoggerInterface $logger,
        ProductInterface $product
    ) {
        parent::__construct($logger);
        $this->product = $product;
    }
}