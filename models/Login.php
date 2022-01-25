<?php


namespace app\models;

use app\core\Model;
use app\core\Application;
use app\models\Users;

class Login extends Model
{

    public string $email = '';
    public string $password = '';

    public function __construct()
    {
        $this->user = new Users();
    }

    public function tableName(): string
    {
        return 'users';
    }

    public function rules(): array
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED],
        ];
    }

    public function authenthicate()
    {

        $this->user = $this->user->findOne(['email' => $this->email]);
        if (!$this->user->email) {
            $this->addError('email', 'User does not exist in our database.');
            return false;
        }

        if (!password_verify($this->password, $this->user->password)) {
            $this->addError('password', 'Password is incorrect');
            return false;
        }
        return Application::$app->login($this->user);
    }
}
