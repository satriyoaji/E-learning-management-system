<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Pelajaran;

/**
 * PelajaranSearch represents the model behind the search form of `backend\models\Pelajaran`.
 */
class PelajaranSearch extends Pelajaran
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pelajaran', 'id_semester_pelajaran'], 'integer'],
            [['nama_pelajaran'], 'safe'],
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
        $query = Pelajaran::find();

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
            'id_pelajaran' => $this->id_pelajaran,
            'id_semester_pelajaran' => $this->id_semester_pelajaran,
        ]);

        $query->andFilterWhere(['like', 'nama_pelajaran', $this->nama_pelajaran]);

        return $dataProvider;
    }
}
