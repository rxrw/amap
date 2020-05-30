<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/7
 * Time: 18:11
 */

namespace Reprover\Amap\Exceptions;


use Reprover\Amap\Exceptions\Exception;
use Throwable;

class InvalidArgumentException extends Exception
{
    public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}