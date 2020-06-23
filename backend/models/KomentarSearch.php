<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Komentar;

/**
 * KomentarSearch represents the model behind the search form of `backend\models\Komentar`.
 */
class KomentarSearch extends Komentar
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_komentar', 'id_artikel_komentar', 'id_user_komentar'], 'integer'],
            [['deskripsi'], 'safe'],
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
        $query = Komentar::find();

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
            'id_komentar' => $this->id_komentar,
            'id_artikel_komentar' => $this->id_artikel_komentar,
            'id_user_komentar' => $this->id_user_komentar,
        ]);

        $query->andFilterWhere(['like', 'deskripsi', $this->deskripsi]);

        return $dataProvider;
    }
}
