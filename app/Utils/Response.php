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

use Fig\Http\Message\StatusCodeInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;

class Response
{
    public static function success($data = [])
    {
        return self::response($data);
    }

    public static function error($code, $message, $statusCode = StatusCodeInterface::STATUS_OK)
    {
        return self::response([], $code, $message, $statusCode);
    }

    public static function response($data = [], $code = 0, $message = 'ok', $statusCode = StatusCodeInterface::STATUS_OK)
    {
        $response = App::container()->get(ResponseInterface::class);

        $result['code'] = $code;
        $result['message'] = $message;
        if (! empty($data)) {
            $result['data'] = $data;
        }

        return $response->json($result)->withStatus($statusCode);
    }
}
