<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "jawaban".
 *
 * @property int $id_jawaban
 * @property int $id_soal_jawaban
 * @property int $id_pelajaran_jawaban
 * @property int $id_file_jawaban
 * @property string $deskripsi
 *
 * @property File $fileJawaban
 * @property Soal $soalJawaban
 * @property Pelajaran $pelajaranJawaban
 */
class Jawaban extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
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
            [['id_soal_jawaban', 'id_pelajaran_jawaban', 'id_file_jawaban', 'deskripsi'], 'required'],
            [['id_soal_jawaban', 'id_pelajaran_jawaban', 'id_file_jawaban'], 'integer'],
            [['deskripsi'], 'string'],
            [['id_file_jawaban'], 'exist', 'skipOnError' => true, 'targetClass' => File::className(), 'targetAttribute' => ['id_file_jawaban' => 'id_file']],
            [['id_soal_jawaban'], 'exist', 'skipOnError' => true, 'targetClass' => Soal::className(), 'targetAttribute' => ['id_soal_jawaban' => 'id_soal']],
            [['id_pelajaran_jawaban'], 'exist', 'skipOnError' => true, 'targetClass' => Pelajaran::className(), 'targetAttribute' => ['id_pelajaran_jawaban' => 'id_pelajaran']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_jawaban' => 'Id Jawaban',
            'id_soal_jawaban' => 'Id Soal Jawaban',
            'id_pelajaran_jawaban' => 'Id Pelajaran Jawaban',
            'id_file_jawaban' => 'Id File Jawaban',
            'deskripsi' => 'Deskripsi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFileJawaban()
    {
        return $this->hasOne(File::className(), ['id_file' => 'id_file_jawaban']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSoalJawaban()
    {
        return $this->hasOne(Soal::className(), ['id_soal' => 'id_soal_jawaban']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPelajaranJawaban()
    {
        return $this->hasOne(Pelajaran::className(), ['id_pelajaran' => 'id_pelajaran_jawaban']);
    }
}
