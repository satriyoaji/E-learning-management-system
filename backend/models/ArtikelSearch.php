<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Artikel;

/**
 * ArtikelSearch represents the model behind the search form of `backend\models\Artikel`.
 */
class ArtikelSearch extends Artikel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_artikel', 'id_user_artikel'], 'integer'],
            [['judul_artikel', 'deskripsi', 'date', 'gambar'], 'safe'],
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
        $query = Artikel::find();

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
            'id_artikel' => $this->id_artikel,
            'id_user_artikel' => $this->id_user_artikel,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'judul_artikel', $this->judul_artikel])
            ->andFilterWhere(['like', 'deskripsi', $this->deskripsi])
            ->andFilterWhere(['like', 'gambar', $this->gambar]);

        return $dataProvider;
    }
}
