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

namespace App\Middleware\Http;

use App\Constants\ErrorCode;
use App\Exception\BusinessException;
use App\Utils\App;
use App\Utils\Log;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\Utils\Coroutine;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class BeforeMiddleware implements MiddlewareInterface
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @var RequestInterface
     */
    protected $request;

    public function __construct(ContainerInterface $container, RequestInterface $request)
    {
        $this->container = $container;
        $this->request = $request;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        if (! $this->isJson()) {
            throw new BusinessException(ErrorCode::HEADER_JSON);
        }

        $this->generateRequestId();

        return $handler->handle($request);
    }

    protected function isJson(): bool
    {
        return $this->request->hasHeader('Content-Type')
            && $this->request->header('Content-Type') === 'application/json';
    }

    /**
     * 生成请求的唯一标识id，用于追踪请求过程
     */
    protected function generateRequestId(): void
    {
        if (! Coroutine::inCoroutine()) {
            throw new ServiceException('当前不在协程环境中!');
        }
        $randomString = uniqid() . Coroutine::id() . microtime(true);
        $requestId = md5($randomString);
        App::setRequestId($requestId);
    }
}
