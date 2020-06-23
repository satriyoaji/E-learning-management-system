<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "dosen".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property int $id_dosen_jenjang
 * @property string $foto
 *
 * @property Bab[] $babs
 * @property Jenjang $dosenJenjang
 * @property Soal[] $soals
 */
class DosenBaru extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dosen';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'email'], 'required'],
            [['id_dosen_jenjang'], 'integer'],
            [['username', 'password', 'foto'], 'string', 'max' => 255],
            [['email'], 'string', 'max' => 100],
            [['id_dosen_jenjang'], 'exist', 'skipOnError' => true, 'targetClass' => Jenjang::className(), 'targetAttribute' => ['id_dosen_jenjang' => 'id_jenjang']],
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
            'id_dosen_jenjang' => 'Id Dosen Jenjang',
            'foto' => 'Foto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBabs()
    {
        return $this->hasMany(Bab::className(), ['id_dosen_bab' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDosenJenjang()
    {
        return $this->hasOne(Jenjang::className(), ['id_jenjang' => 'id_dosen_jenjang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSoals()
    {
        return $this->hasMany(Soal::className(), ['id_dosen_soal' => 'id']);
    }
}
