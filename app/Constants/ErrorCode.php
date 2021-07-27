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
namespace App\Constants;

use Hyperf\Constants\AbstractConstants;
use Hyperf\Constants\Annotation\Constants;

/**
 * @Constants
 */
class ErrorCode extends AbstractConstants
{
    /**
     * @Message("Server Error！")
     */
    public const SERVER_ERROR = 500;

    /**
     * @Message("请求头不正确")
     */
    public const HEADER_JSON = 1001;

    /**
     * @Message("请求不存在！")
     */
    public const HTTP_NOT_FOUND = 1004;

    /**
     * @Message("请求方式错误!")
     */
    public const HTTP_METHOD_NOT_ALLOW = 1005;
}
