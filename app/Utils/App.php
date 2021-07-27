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

namespace App\Utils;

use App\Exception\ServiceException;
use Hyperf\Logger\LoggerFactory;
use Hyperf\Utils\ApplicationContext;
use Hyperf\Utils\Context;
use Hyperf\Utils\Coroutine;
use Psr\Container\ContainerInterface;

class App
{
    public static function container(): ContainerInterface
    {
        return ApplicationContext::getContainer();
    }

    public static function getRequestId(): string|null
    {
        return Context::get('request_id');
    }

    public static function setRequestId($requestId): void
    {
        Context::set('request_id', $requestId);
    }
}
