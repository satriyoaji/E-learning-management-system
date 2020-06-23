<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "jawaban".
 *
 * @property int $id_jawaban
 * @property int $id_soal_jawaban
 * @property string $deskripsi
 * @property string $judul_jawaban
 * @property string $jawaban
 *
 * @property Soal $soalJawaban
 */
class Jawaban extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;
    public static function tableName()
    {
        return 'jawaban';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_soal_jawaban', 'deskripsi', 'judul_jawaban', 'jawaban'], 'required'],
            [['id_soal_jawaban'], 'integer'],
            [['deskripsi'], 'string'],
            [['file'], 'file'],
            [['judul_jawaban', 'jawaban'], 'string', 'max' => 200],
            [['id_soal_jawaban'], 'exist', 'skipOnError' => true, 'targetClass' => Soal::className(), 'targetAttribute' => ['id_soal_jawaban' => 'id_soal']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_jawaban' => 'Id Jawaban',
            'id_soal_jawaban' => 'Nama Soal',
            'deskripsi' => 'Deskripsi',
            'judul_jawaban' => 'Judul Jawaban',
            'jawaban' => 'Jawaban',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSoalJawaban()
    {
        return $this->hasOne(Soal::className(), ['id_soal' => 'id_soal_jawaban']);
    }
}
