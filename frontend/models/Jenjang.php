<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "jenjang".
 *
 * @property int $id_jenjang
 * @property string $nama_jenjang
 * @property string $url
 *
 * @property Bab[] $babs
 * @property Murid[] $murs
 * @property Semester[] $semesters
 */
class Jenjang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jenjang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_jenjang', 'url'], 'required'],
            [['url'], 'string'],
            [['nama_jenjang'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_jenjang' => 'Id Jenjang',
            'nama_jenjang' => 'Nama Jenjang',
            'url' => 'Url',
        ];
    }

    public function getTypeOptions()
    {
      return CHtml::listData(Type::model()->findAll(),'id_jenjang','nama_jenjang');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBabs()
    {
        return $this->hasMany(Bab::className(), ['id_jenjang_bab' => 'id_jenjang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMurs()
    {
        return $this->hasMany(Murid::className(), ['id_murid_jenjang' => 'id_jenjang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSemesters()
    {
        return $this->hasMany(Semester::className(), ['id_jenjang_semester' => 'id_jenjang']);
    }
}
