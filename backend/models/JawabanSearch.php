<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Jawaban;

/**
 * JawabanSearch represents the model behind the search form of `backend\models\Jawaban`.
 */
class JawabanSearch extends Jawaban
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_jawaban', 'id_soal_jawaban'], 'integer'],
            [['deskripsi', 'judul_jawaban', 'jawaban'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Jawaban::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_jawaban' => $this->id_jawaban,
            'id_soal_jawaban' => $this->id_soal_jawaban,
        ]);

        $query->andFilterWhere(['like', 'deskripsi', $this->deskripsi])
            ->andFilterWhere(['like', 'judul_jawaban', $this->judul_jawaban])
            ->andFilterWhere(['like', 'jawaban', $this->jawaban]);

        return $dataProvider;
    }
}
