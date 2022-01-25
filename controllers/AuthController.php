<?php

namespace app\Controllers;

use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\Users;
use app\models\Login;
use app\core\Application;
use app\core\middlewares\AuthMiddleware;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
    }
    public function login(Request $request, Response $response)
    {
        $login = new Login();
        $this->setLayout('auth');

        if ($request->isPost()) {
            $login->loadData($request->getBody());
        }
        if ($login->validate() && $login->authenthicate()) {


            Application::$app->session->setFlash('success', 'Welcome Back.');
            $response->redirect('/');
        }
        return $this->render('login', ['model' => $login]);
    }

    public function register(Request $request, Response $response)
    {

        $user = new Users();

        $this->setLayout('auth');
        if ($request->isPost()) {

            $user->loadData($request->getBody());

            if ($user->validate() && $user->save()) {
                Application::$app->session->setFlash('success', 'Thanks for registration.');
                $response->redirect('/');
            }
            return $this->render('register', ['model' => $user]);
        }

        return $this->render('register', ['model' => $user]);
    }

    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        $response->redirect('/login');
    }

    public function profile()
    {
        return $this->render('profile');
    }
}
