<?php
/**
 * Created by HanumanIT Co.,Ltd.
 * User: kongoon
 * Date: 8/11/2018 AD
 * Time: 12:51
 */
namespace api\models\forms;

use yii\base\Model;
use api\models\User;
/**
 * @SWG\Definition(
 *   definition="NewUser",
 *   type="object",
 *   required={"name", "username", "email", "password"}
 * )
 */
class RegisterForm extends Model
{
    /**
     * @SWG\Property();
     * @var string
     */
    public $name;
    /**
     * @SWG\Property();
     * @var string
     */
    public $username;
    /**
     * @SWG\Property();
     * @var string
     */
    public $email;
    /**
     * @SWG\Property();
     * @var string
     */
    public $password;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['name', 'required'],
            ['name', 'string', 'max' => 100],
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\api\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\api\models\User', 'message' => 'This email address has already been taken.'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }
    /**
     * Register user.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function register()
    {
        if (!$this->validate()) {
            return null;
        }
        $user = new User();
        $user->username = $this->username;
        $user->name = $this->name;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        return $user->save() ? $user : null;
    }
}