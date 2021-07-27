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

namespace App\Exception\Handler;

use App\Constants\ErrorCode;
use App\Exception\BusinessException;
use App\Exception\ServiceException;
use App\Utils\App;
use App\Utils\Log;
use App\Utils\Response;
use Fig\Http\Message\StatusCodeInterface;
use Hyperf\Database\Model\ModelNotFoundException;
use Hyperf\ExceptionHandler\ExceptionHandler;
use Hyperf\HttpMessage\Exception\NotFoundHttpException;
use Hyperf\Logger\LoggerFactory;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class AppExceptionHandler extends ExceptionHandler
{
    /**
     * @var Log
     */
    protected $logger;

    public function __construct(Log $logger)
    {
        $this->logger = $logger;
    }

    public function handle(Throwable $throwable, ResponseInterface $response)
    {
        $code = 1000;
        $message = 'ok';
        $statusCode = StatusCodeInterface::STATUS_OK;

        if ($throwable instanceof BusinessException) {
            $code = $throwable->getCode();
            $message = $throwable->getMessage();
        } else {
            $code = ErrorCode::SERVER_ERROR;
            $message = '服务器内部错误!';
            $statusCode = StatusCodeInterface::STATUS_INTERNAL_SERVER_ERROR;
            $this->log($throwable);
        }

        return Response::error($code, $message, $statusCode);
//        return $response->withHeader('Server', 'Hyperf')->withStatus(500)->withBody(new SwooleStream('Internal Server Error.'));
    }

    public function isValid(Throwable $throwable): bool
    {
        return true;
    }

    protected function log(Throwable $throwable): void
    {
        Log::error($throwable->__toString());
//        $this->logger->error(sprintf('RequestId[%s], %s in %s line:%s', App::getRequestId(),
//            $throwable->getMessage(), $throwable->getFile(), $throwable->getLine()));
//        $this->logger->error($throwable->getTraceAsString());
    }
}
