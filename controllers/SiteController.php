<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\core\Application;

class SiteController extends Controller
{

    public function home()
    {

        $params = [
            'name' => Application::$app->user->firstname
        ];

        return $this->render('home', $params);
    }
    public function contact()
    {
        return $this->render('contact');
    }

    public function handleContact(Request $request)
    {
        $body = $request->getBody();

        return $body;
    }
}
