<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "komentar".
 *
 * @property int $id_komentar
 * @property int $id_artikel_komentar
 * @property int $id_user_komentar
 * @property string $deskkripsi
 *
 * @property Artikel $artikelKomentar
 * @property User $userKomentar
 */
class Komentar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'komentar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_artikel_komentar', 'id_user_komentar', 'deskkripsi'], 'required'],
            [['id_artikel_komentar', 'id_user_komentar'], 'integer'],
            [['deskkripsi'], 'string'],
            [['id_artikel_komentar'], 'exist', 'skipOnError' => true, 'targetClass' => Artikel::className(), 'targetAttribute' => ['id_artikel_komentar' => 'id_artikel']],
            [['id_user_komentar'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user_komentar' => 'id_user']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_komentar' => 'Id Komentar',
            'id_artikel_komentar' => 'Id Artikel Komentar',
            'id_user_komentar' => 'Id User Komentar',
            'deskkripsi' => 'Deskkripsi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArtikelKomentar()
    {
        return $this->hasOne(Artikel::className(), ['id_artikel' => 'id_artikel_komentar']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserKomentar()
    {
        return $this->hasOne(User::className(), ['id_user' => 'id_user_komentar']);
    }
}
