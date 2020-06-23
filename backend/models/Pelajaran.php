<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pelajaran".
 *
 * @property int $id_pelajaran
 * @property int $id_semester_pelajaran
 * @property string $nama_pelajaran
 * @property string $url
 *
 * @property Bab[] $babs
 * @property Semester $semesterPelajaran
 */
class Pelajaran extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pelajaran';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_semester_pelajaran', 'nama_pelajaran', 'url'], 'required'],
            [['id_semester_pelajaran'], 'integer'],
            [['url'], 'string'],
            [['nama_pelajaran'], 'string', 'max' => 250],
            [['id_semester_pelajaran'], 'exist', 'skipOnError' => true, 'targetClass' => Semester::className(), 'targetAttribute' => ['id_semester_pelajaran' => 'id_semester']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pelajaran' => 'Id Pelajaran',
            'id_semester_pelajaran' => 'Id Semester Pelajaran',
            'nama_pelajaran' => 'Nama Pelajaran',
            'url' => 'Url',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBabs()
    {
        return $this->hasMany(Bab::className(), ['id_pelajaran_bab' => 'id_pelajaran']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSemesterPelajaran()
    {
        return $this->hasOne(Semester::className(), ['id_semester' => 'id_semester_pelajaran']);
    }
}
