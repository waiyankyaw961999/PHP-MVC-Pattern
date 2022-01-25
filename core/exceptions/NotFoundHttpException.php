<?php


namespace app\core\exceptions;


class NotFoundHttpException extends \Exception
{
    protected $message = 'Page Not Found';
    protected $code = 404;
}
