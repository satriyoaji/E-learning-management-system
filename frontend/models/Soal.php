<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "soal".
 *
 * @property int $id_soal
 * @property int $id_bab_soal
 * @property string $deskripsi
 * @property string $judul_soal
 * @property string $soal
 * @property int $id_dosen_soal
 * @property string $waktu_upload
 *
 * @property Jawaban[] $jawabans
 * @property Bab $babSoal
 * @property Dosen $dosenSoal
 */
class Soal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'soal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_bab_soal', 'deskripsi', 'judul_soal', 'soal', 'id_dosen_soal', 'waktu_upload'], 'required'],
            [['id_bab_soal', 'id_dosen_soal'], 'integer'],
            [['deskripsi'], 'string'],
            [['waktu_upload'], 'safe'],
            [['judul_soal', 'soal'], 'string', 'max' => 200],
            [['id_bab_soal'], 'exist', 'skipOnError' => true, 'targetClass' => Bab::className(), 'targetAttribute' => ['id_bab_soal' => 'id_bab']],
            [['id_dosen_soal'], 'exist', 'skipOnError' => true, 'targetClass' => Dosen::className(), 'targetAttribute' => ['id_dosen_soal' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_soal' => 'Id Soal',
            'id_bab_soal' => 'Id Bab Soal',
            'deskripsi' => 'Deskripsi',
            'judul_soal' => 'Judul Soal',
            'soal' => 'Soal',
            'id_dosen_soal' => 'Id Dosen Soal',
            'waktu_upload' => 'Waktu Upload',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJawabans()
    {
        return $this->hasMany(Jawaban::className(), ['id_soal_jawaban' => 'id_soal']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBabSoal()
    {
        return $this->hasOne(Bab::className(), ['id_bab' => 'id_bab_soal']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDosenSoal()
    {
        return $this->hasOne(Dosen::className(), ['id' => 'id_dosen_soal']);
    }
}
