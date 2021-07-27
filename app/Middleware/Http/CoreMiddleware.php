<?php

declare(strict_types=1);

namespace App\Middleware\Http;

use App\Constants\ErrorCode;
use App\Utils\Response;
use Fig\Http\Message\StatusCodeInterface;
use Psr\Http\Message\ServerRequestInterface;

class CoreMiddleware extends \Hyperf\HttpServer\CoreMiddleware
{
    protected function handleNotFound(ServerRequestInterface $request)
    {
        $code = ErrorCode::HTTP_NOT_FOUND;
        $message = ErrorCode::getMessage($code);
        return Response::error($code, $message, StatusCodeInterface::STATUS_NOT_FOUND);
    }

    protected function handleMethodNotAllowed(array $methods, ServerRequestInterface $request)
    {
        $code = ErrorCode::HTTP_METHOD_NOT_ALLOW;
        $message = ErrorCode::getMessage($code);
        return Response::error($code, $message, StatusCodeInterface::STATUS_NOT_FOUND);
    }
}