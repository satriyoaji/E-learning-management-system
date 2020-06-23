<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "file".
 *
 * @property int $id_file
 * @property string $deskripsi
 * @property string $nama_file
 * @property string $file_extension
 * @property string $path
 *
 * @property Bab[] $babs
 * @property Jawaban[] $jawabans
 * @property Soal[] $soals
 */
class File extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'file';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['deskripsi', 'nama_file', 'file_extension', 'path'], 'required'],
            [['deskripsi'], 'string'],
            [['nama_file', 'path'], 'string', 'max' => 255],
            [['file_extension'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_file' => 'Id File',
            'deskripsi' => 'Deskripsi',
            'nama_file' => 'Nama File',
            'file_extension' => 'File Extension',
            'path' => 'Path',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBabs()
    {
        return $this->hasMany(Bab::className(), ['id_file_bab' => 'id_file']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJawabans()
    {
        return $this->hasMany(Jawaban::className(), ['id_file_jawaban' => 'id_file']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSoals()
    {
        return $this->hasMany(Soal::className(), ['id_file_soal' => 'id_file']);
    }
}
