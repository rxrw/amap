<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/7
 * Time: 15:41
 */

namespace Reprover\Amap\Exceptions;


use Reprover\Amap\Exception;
use Throwable;

class CannotParseResponseException extends Exception
{
    public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}