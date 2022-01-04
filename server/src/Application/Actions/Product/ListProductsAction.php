<?php

namespace App\Application\Actions\Product;

use Psr\Http\Message\ResponseInterface as Response;

class ListProductsAction extends ProductAction
{

    protected function action(): Response
    {
        $product = $this->product->findAll();

        return $this->respondWithData($product);
    }
}