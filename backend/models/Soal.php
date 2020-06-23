<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "soal".
 *
 * @property int $id_soal
 * @property int $id_bab_soal
 * @property string $deskripsi
 * @property string $judul_soal
 * @property string $soal
 *
 * @property Jawaban[] $jawabans
 * @property Bab $babSoal
 */
class Soal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;
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
            [['id_bab_soal', 'deskripsi', 'judul_soal', 'soal'], 'required'],
            [['id_bab_soal'], 'integer'],
            [['deskripsi'], 'string'],
            [['file'], 'file'],
            [['judul_soal', 'soal'], 'string', 'max' => 200],
            [['id_bab_soal'], 'exist', 'skipOnError' => true, 'targetClass' => Bab::className(), 'targetAttribute' => ['id_bab_soal' => 'id_bab']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_soal' => 'Id Soal',
            'id_bab_soal' => 'Nama Bab',
            'deskripsi' => 'Deskripsi',
            'judul_soal' => 'Judul Soal',
            'soal' => 'Soal',
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
}
