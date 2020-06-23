<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Bab;

/**
 * BabSearch represents the model behind the search form of `backend\models\Bab`.
 */
class BabSearch extends Bab
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_bab', 'id_jenjang_bab', 'id_pelajaran_bab'], 'integer'],
            [['deskripsi', 'video'], 'safe'],
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
        $query = Bab::find();

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
            'id_bab' => $this->id_bab,
            'id_jenjang_bab' => $this->id_jenjang_bab,
            'id_pelajaran_bab' => $this->id_pelajaran_bab,
        ]);

        $query->andFilterWhere(['like', 'deskripsi', $this->deskripsi])
            ->andFilterWhere(['like', 'video', $this->video]);

        return $dataProvider;
    }
}
