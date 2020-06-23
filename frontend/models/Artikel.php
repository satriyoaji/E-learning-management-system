<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "artikel".
 *
 * @property int $id_artikel
 * @property int $id_user_artikel
 * @property string $deskripsi
 * @property string $date
 *
 * @property User $userArtikel
 * @property Komentar[] $komentars
 */
class Artikel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'artikel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user_artikel', 'deskripsi'], 'required'],
            [['id_user_artikel'], 'integer'],
            [['deskripsi'], 'string'],
            [['date'], 'safe'],
            [['id_user_artikel'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user_artikel' => 'id_user']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_artikel' => 'Id Artikel',
            'id_user_artikel' => 'Id User Artikel',
            'deskripsi' => 'Deskripsi',
            'date' => 'Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserArtikel()
    {
        return $this->hasOne(User::className(), ['id_user' => 'id_user_artikel']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKomentars()
    {
        return $this->hasMany(Komentar::className(), ['id_artikel_komentar' => 'id_artikel']);
    }
}
