<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Jenjang;

/**
 * JenjangSearch represents the model behind the search form of `backend\models\Jenjang`.
 */
class JenjangSearch extends Jenjang
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_jenjang'], 'integer'],
            [['nama_jenjang'], 'safe'],
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
        $query = Jenjang::find();

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
            'id_jenjang' => $this->id_jenjang,
        ]);

        $query->andFilterWhere(['like', 'nama_jenjang', $this->nama_jenjang]);

        return $dataProvider;
    }
}
