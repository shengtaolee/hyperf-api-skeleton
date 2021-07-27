<?php

declare(strict_types=1);

/**
 * Log.php
 * Create by phpstorm
 * Author: santo
 * Date: 2021-07-27
 */

namespace App\Utils;

use App\Exception\ServiceException;
use Hyperf\Logger\LoggerFactory;
use Hyperf\Utils\Context;
use Monolog\Logger;

/**
 * @method static debug($messsage, $data = [])
 * @method static info($messsage, $data = [])
 * @method static notice($messsage, $data = [])
 * @method static warning($messsage, $data = [])
 * @method static error($messsage, $data = [])
 * @method static critical($messsage, $data = [])
 * @method static alert($messsage, $data = [])
 * @method static emergency($messsage, $data = [])
 *
 * Class Log
 * @package App\Utils
 */
class Log
{
    const LEVELS = [
        'DEBUG',
        'INFO',
        'NOTICE',
        'WARNING',
        'ERROR',
        'CRITICAL',
        'ALERT',
        'EMERGENCY',
    ];

    public static function __callStatic(string $name, array $arguments)
    {
        $level = strtoupper($name);
        if (! in_array($level, self::LEVELS)) {
            throw new ServiceException('当前日志级别不存在！');
        }

        $logger = App::container()->get(LoggerFactory::class)->get('system');

        $message = $arguments[0];
        $request = $arguments[1] ?? [];
        $data = [];
        if (App::getRequestId()) {
            $data['request_id'] = App::getRequestId();
        }

        $logger->$level($message, array_merge($data, $request));
    }
}