<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace app\models\forms;

use dektrium\user\Module;
use Yii;
use yii\base\Model;
use dektrium\user\models\RegistrationForm as BaseRegistrationForm;

/**
 * Registration form collects user input on registration process, validates it and creates new User model.
 *
 * @author Dmitry Erofeev <dmeroff@gmail.com>
 */
class RegistrationForm extends BaseRegistrationForm
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        $user = $this->module->modelMap['User'];

        return [
            // username rules
            /*
            'usernameLength'   => ['username', 'string', 'min' => 3, 'max' => 255],
            'usernameTrim'     => ['username', 'filter', 'filter' => 'trim'],
            'usernamePattern'  => ['username', 'match', 'pattern' => $user::$usernameRegexp],
            'usernameRequired' => ['username', 'required'],
            'usernameUnique'   => [
                'username',
                'unique',
                'targetClass' => $user,
                'message' => Yii::t('user', 'This username has already been taken')
            ],
            */
            'usernameDefault' => ['username', 'default', 'value' => 'username'],
            // email rules
            'emailTrim'     => ['email', 'filter', 'filter' => 'trim'],
            'emailRequired' => ['email', 'required'],
            'emailPattern'  => ['email', 'email'],
            'emailUnique'   => [
                'email',
                'unique',
                'targetClass' => $user,
                'message' => Yii::t('user', 'This email address has already been taken')
            ],
            // password rules
            'passwordRequired' => ['password', 'required', 'skipOnEmpty' => $this->module->enableGeneratingPassword],
            'passwordLength'   => ['password', 'string', 'min' => 6],
        ];
    }
}
