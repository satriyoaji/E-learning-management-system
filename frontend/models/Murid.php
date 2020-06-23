<?php

namespace frontend\models;
use yii\base\NotSupportedException;
use frontend\models\Jenjang;
use Yii;

/**
 * This is the model class for table "murid".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property int $id_murid_jenjang
 * @property string $foto
 *
 * @property Jenjang $muridJenjang
 */
class Murid extends \yii\db\ActiveRecord
{
    private $_username;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'murid';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'email'], 'required'],
            [['id_murid_jenjang'], 'integer'],
            [['username', 'password', 'foto'], 'string', 'max' => 255],
            [['email'], 'string', 'max' => 100],
            [['id_murid_jenjang'], 'exist', 'skipOnError' => true, 'targetClass' => Jenjang::className(), 'targetAttribute' => ['id_murid_jenjang' => 'id_jenjang']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'email' => 'Email',
            'id_murid_jenjang' => 'Id Murid Jenjang',
            'foto' => 'Foto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMuridJenjang()
    {
        return $this->hasOne(Jenjang::className(), ['id_jenjang' => 'id_murid_jenjang']);
    }


}
