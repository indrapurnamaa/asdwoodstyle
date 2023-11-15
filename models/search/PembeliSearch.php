<?php

namespace app\models\search;

use app\libs\validators\FilterValidatorTrim;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\table\PembeliTable;

class PembeliSearch extends PembeliTable
{
    public $display;
    public $searchQuery;
    public $start_date;
    public $end_date;
    // public $dateRange;

    public function rules()
    {
        return [
            [['searchQuery', 'display'], 'safe'],
            // ['dateRange', 'string'],
            [['start_date','end_date'], 'date', 'format' => 'php:Y-m-d'],
            ['searchQuery', FilterValidatorTrim::class, 'filter' => 'trim'],
        ];
    }

    public function scenarios()
    {
        
        return Model::scenarios();
    }

 
    public function search($params)
    {
        $this->load($params);
        
        $query = PembeliTable::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination'=> [
                 'pageSize' => $this->display != null ? $this->display : 10,
            ],
            'sort'=> [
                'enableMultiSort'=> true,
            ],
        ]);

        $this->load($params);

        // Handling filter search
        $query
        ->andFilterWhere(['like', 'nama_pembeli', $this->searchQuery])
        ->orFilterWhere(['like', 'no_telp', $this->searchQuery])
        ->orFilterWhere(['like', 'alamat', $this->searchQuery]);


        return $dataProvider;
    }
}
