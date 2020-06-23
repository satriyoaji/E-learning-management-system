<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "bab".
 *
 * @property int $id_bab
 * @property int $id_jenjang_bab
 * @property int $id_pelajaran_bab
 * @property string $deskripsi
 * @property string $video
 *
 * @property Jenjang $jenjangBab
 * @property Pelajaran $pelajaranBab
 * @property Soal[] $soals
 */
class Bab extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	public $file;
    public static function tableName()
    {
        return 'bab';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_jenjang_bab', 'id_pelajaran_bab', 'deskripsi', 'video'], 'required'],
            [['id_jenjang_bab', 'id_pelajaran_bab'], 'integer'],
            [['deskripsi', 'video'], 'string', 'max' => 200],
			[['file'], 'file'],
            [['id_jenjang_bab'], 'exist', 'skipOnError' => true, 'targetClass' => Jenjang::className(), 'targetAttribute' => ['id_jenjang_bab' => 'id_jenjang']],
            [['id_pelajaran_bab'], 'exist', 'skipOnError' => true, 'targetClass' => Pelajaran::className(), 'targetAttribute' => ['id_pelajaran_bab' => 'id_pelajaran']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_bab' => 'Id Bab',
            'id_jenjang_bab' => 'Nama Jenjang',
            'id_pelajaran_bab' => 'Nama Pelajaran',
            'deskripsi' => 'Nama Bab',
            'video' => 'Modul',
            'file' => 'Modul',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJenjangBab()
    {
        return $this->hasOne(Jenjang::className(), ['id_jenjang' => 'id_jenjang_bab']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPelajaranBab()
    {
        return $this->hasOne(Pelajaran::className(), ['id_pelajaran' => 'id_pelajaran_bab']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSoals()
    {
        return $this->hasMany(Soal::className(), ['id_bab_soal' => 'id_bab']);
    }
}
