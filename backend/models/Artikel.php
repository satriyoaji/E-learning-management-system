<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "artikel".
 *
 * @property int $id_artikel
 * @property int $id_user_artikel
 * @property string $judul_artikel
 * @property string $deskripsi
 * @property string $date
 * @property string $gambar
 *
 * @property Komentar[] $komentars
 * @property User[] $users 
 */
class Artikel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	public $file;
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
            [['judul_artikel', 'deskripsi', 'gambar'], 'required'],
            [['deskripsi', 'gambar'], 'string'],
            [['date'], 'safe'],
            [['judul_artikel'], 'string', 'max' => 200],
            [['file'], 'file'],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_artikel' => 'Id Artikel',
            'id_user_artikel' => 'Nama User',
            'judul_artikel' => 'Judul Artikel',
            'deskripsi' => 'Deskripsi',
            'date' => 'Date',
            'gambar' => 'Gambar',
			'file' => 'Gambar'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKomentars()
    {
        return $this->hasMany(Komentar::className(), ['id_artikel_komentar' => 'id_artikel']);
    }
}
