<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Soal;

/**
 * SoalSearch represents the model behind the search form of `backend\models\Soal`.
 */
class SoalSearch extends Soal
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_soal', 'id_bab_soal'], 'integer'],
            [['deskripsi', 'judul_soal', 'soal'], 'safe'],
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
        $query = Soal::find();

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
            'id_soal' => $this->id_soal,
            'id_bab_soal' => $this->id_bab_soal,
        ]);

        $query->andFilterWhere(['like', 'deskripsi', $this->deskripsi])
            ->andFilterWhere(['like', 'judul_soal', $this->judul_soal])
            ->andFilterWhere(['like', 'soal', $this->soal]);

        return $dataProvider;
    }
}
