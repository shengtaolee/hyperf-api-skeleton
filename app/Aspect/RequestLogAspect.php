<?php

declare(strict_types=1);

/**
 * RequestLogAspect.php
 * Create by phpstorm
 * Author: santo
 * Date: 2021-07-27
 */

namespace App\Aspect;


use App\Utils\App;
use App\Utils\Log;
use Hyperf\Di\Annotation\Aspect;
use Hyperf\Di\Aop\AbstractAspect;
use Hyperf\Di\Aop\ProceedingJoinPoint;
use Hyperf\HttpServer\Contract\RequestInterface;

/**
 * @Aspect()
 * Class RequestLogAspect
 * @package App\Aspect
 */
class RequestLogAspect extends AbstractAspect
{

    public $annotations = [
        \App\Annotation\RequestLog::class,
    ];

    public function process(ProceedingJoinPoint $proceedingJoinPoint)
    {
        $request = App::container()->get(RequestInterface::class);
        Log::info(
            sprintf('收到请求 %s', $request->getPathInfo()),
            [
                'request' => $request->all(),
                'headers' => $request->getHeaders(),
            ]
        );
        $result = $proceedingJoinPoint->process();
        return $result;
    }
}