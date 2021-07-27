<?php

declare(strict_types=1);

/**
 * RequestLogAnnotation.php
 * Create by phpstorm
 * Author: santo
 * Date: 2021-07-27
 */

namespace App\Annotation;


use Hyperf\Di\Annotation\AbstractAnnotation;

/**
 * @Annotation
 * @Target({"METHOD"})
 * Class RequestLog
 * @package App\Annotation
 */
class RequestLog extends AbstractAnnotation
{

}