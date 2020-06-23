<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "semester".
 *
 * @property int $id_semester
 * @property int $id_jenjang_semester
 * @property string $semester
 *
 * @property Pelajaran[] $pelajarans
 * @property Jenjang $jenjangSemester
 */
class Semester extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'semester';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_jenjang_semester', 'semester'], 'required'],
            [['id_jenjang_semester'], 'integer'],
            [['semester'], 'string', 'max' => 2],
            [['id_jenjang_semester'], 'exist', 'skipOnError' => true, 'targetClass' => Jenjang::className(), 'targetAttribute' => ['id_jenjang_semester' => 'id_jenjang']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_semester' => 'Id Semester',
            'id_jenjang_semester' => 'Id Jenjang Semester',
            'semester' => 'Semester',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPelajarans()
    {
        return $this->hasMany(Pelajaran::className(), ['id_semester_pelajaran' => 'id_semester']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJenjangSemester()
    {
        return $this->hasOne(Jenjang::className(), ['id_jenjang' => 'id_jenjang_semester']);
    }
}
