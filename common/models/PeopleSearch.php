<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\People;

/**
 * PeopleSearch represents the model behind the search form of `common\models\People`.
 */
class PeopleSearch extends People
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status', 'id_thirdtypes'], 'integer'],
            [['document', 'name', 'direction', 'city', 'phone'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }


    
    public function buscartipo($data, $id){
        $modelbuscar=Thirdtypes::findOne($data->id_thirdtypes);
        $content=$modelbuscar->name;
        return $content;
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
        $query = People::find();

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
            'id' => $this->id,
            'status' => $this->status,
            'id_thirdtypes' => $this->id_thirdtypes,
        ]);

        $query->andFilterWhere(['like', 'document', $this->document])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'direction', $this->direction])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'phone', $this->phone]);

        return $dataProvider;
    }
}
