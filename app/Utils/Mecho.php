<?php

declare(strict_types=1);

/**
 * Mecho.php
 * Create by phpstorm
 * Author: santo
 * Date: 2021-07-27
 */

namespace App\Utils;


class Mecho
{
    public static function line($data)
    {
        $output = '';
        if (is_array($data)) {
            $output = print_r($data, true);
        } else if ($data instanceof \Throwable) {
            $output = $data->__toString();
        } else {
            $output = $data;
        }

        echo $output . PHP_EOL;
    }
}