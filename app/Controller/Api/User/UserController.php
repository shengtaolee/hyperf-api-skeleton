<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace App\Controller\Api\User;

use App\Annotation\RequestLog;
use App\Exception\ServiceException;
use App\Utils\Response;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;

class UserController
{
    /**
     * @RequestLog()
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @return \Psr\Http\Message\ResponseInterface`
     */
    public function index(RequestInterface $request, ResponseInterface $response)
    {
        return Response::success();
    }

    public function register(RequestInterface $request, ResponseInterface $response)
    {

    }
}
