<?php
namespace frontend\models;

use yii\base\Model;
use yii\db\Query;
use frontend\models\Murid;
use frontend\models\Dosen;
/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $role;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\frontend\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 4, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\frontend\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['role', 'required'],
            ['role', 'string', 'max' => 6],

            // [['id_murid_jenjang'], 'exist', 'skipOnError' => true, 'targetClass' => Jenjang::className(), 'targetAttribute' => ['id_murid_jenjang' => 'id_jenjang']],
        ];
    }

    // function getTypeOptions()
    // {
    //     return CHtml::listData(Type::model()->findAll(),'id_jenjang','nama_jenjang');
    // }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        if ($this->role == 'murid' || $this->role == 'Student') {
            $student = new Murid();
            $student->username = $this->username;
            $student->password = $this->password;
            $student->email = $this->email;
            // $student->id_murid_jenjang = $this->id_jenjang;
            $student->save();
        } elseif ($this->role == 'dosen' || $this->role == 'Lecturer') {
            $lecturer = new Dosen();
            $lecturer->username = $this->username;
            $lecturer->password = $this->password;
            $lecturer->email = $this->email;
            // $lecturer->id_murid_jenjang = $this->id_jenjang;
            $lecturer->save();
        }
        
        return $user->save() ? $user : null;
    }
}
