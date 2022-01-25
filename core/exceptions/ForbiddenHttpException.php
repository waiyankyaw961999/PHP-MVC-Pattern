<?php


namespace app\core\exceptions;


class ForbiddenHttpException extends \Exception
{
    protected $message = 'You don\'t have permission to access this page';
    protected $code = 403;
}
