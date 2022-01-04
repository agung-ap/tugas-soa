<?php
declare(strict_types=1);

use App\Application\Actions\Branch\ListBranchAction;
use App\Application\Actions\Inventory\ListInventoryAction;
use App\Application\Actions\Product\ListProductsAction;
use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello world!');
        return $response;
    });

    $app->group('/users', function (Group $group) {
        $group->get('', ListUsersAction::class);
        $group->get('/{id}', ViewUserAction::class);
    });

    $app->group('/product', function (Group $group) {
        $group->get('', ListProductsAction::class);
    });

    $app->group('/inventory', function (Group $group) {
        $group->get('', ListInventoryAction::class);
    });

    $app->group('/branch', function (Group $group) {
        $group->get('', ListBranchAction::class);
    });
};
