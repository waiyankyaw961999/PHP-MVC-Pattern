<?php

namespace app\core;

use app\core\Request;
use app\core\Response;
use app\core\Application;
use app\core\exceptions\NotFoundHttpException;
use app\core\View;

class Router
{

    // public Request $request;
    public Response $response;

    protected array $routes = [];

    public function __construct(Request $request, Response $response)
    {
        $this->view = new View();
        $this->request = $request;
        $this->response = $response;
    }
    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }
    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }


    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->method();

        $callback = $this->routes[$method][$path] ?? false;
        if (!$callback) {
            $this->response->setStatusCode(404);
            throw new NotFoundHttpException();
        }
        if (is_string($callback)) {
            return $this->view->render($callback);
        }
        if (is_array($callback)) {

            $controller = new $callback[0];
            $controller->action = $callback[1];
            Application::$app->controller = $controller;
            foreach ($controller->getMiddlewares() as $middleware) {
                $middleware->execute();
            }
            $callback[0] = $controller;
        }

        return call_user_func($callback, $this->request, $this->response);
    }
}
