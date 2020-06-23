<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "bab".
 *
 * @property int $id_bab
 * @property int $id_jenjang_bab
 * @property int $id_pelajaran_bab
 * @property int $id_dosen_bab
 * @property string $deskripsi
 * @property string $video
 * @property string $dates
 *
 * @property Jenjang $jenjangBab
 * @property Pelajaran $pelajaranBab
 * @property Dosen $dosenBab
 * @property Soal[] $soals
 */
class Bab extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
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
            [['id_jenjang_bab', 'id_pelajaran_bab', 'id_dosen_bab', 'deskripsi', 'video', 'dates'], 'required'],
            [['id_jenjang_bab', 'id_pelajaran_bab', 'id_dosen_bab'], 'integer'],
            [['dates'], 'safe'],
            [['deskripsi', 'video'], 'string', 'max' => 200],
            [['id_jenjang_bab'], 'exist', 'skipOnError' => true, 'targetClass' => Jenjang::className(), 'targetAttribute' => ['id_jenjang_bab' => 'id_jenjang']],
            [['id_pelajaran_bab'], 'exist', 'skipOnError' => true, 'targetClass' => Pelajaran::className(), 'targetAttribute' => ['id_pelajaran_bab' => 'id_pelajaran']],
            [['id_dosen_bab'], 'exist', 'skipOnError' => true, 'targetClass' => Dosen::className(), 'targetAttribute' => ['id_dosen_bab' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_bab' => 'Id Bab',
            'id_jenjang_bab' => 'Id Jenjang Bab',
            'id_pelajaran_bab' => 'Id Pelajaran Bab',
            'id_dosen_bab' => 'Id Dosen Bab',
            'deskripsi' => 'Deskripsi',
            'video' => 'Video',
            'dates' => 'Dates',
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
    public function getDosenBab()
    {
        return $this->hasOne(Dosen::className(), ['id' => 'id_dosen_bab']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSoals()
    {
        return $this->hasMany(Soal::className(), ['id_bab_soal' => 'id_bab']);
    }
}
