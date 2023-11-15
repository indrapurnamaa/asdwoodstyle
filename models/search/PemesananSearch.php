<?php

namespace app\models\search;

use app\libs\validators\FilterValidatorTrim;
use app\models\table\PemesananTable;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class PemesananSearch extends PemesananTable
{
    public $display;
    public $searchQuery;
    public $dateRange;
    public $start_date;
    public $end_date;
    public $status;


    public function rules()
    {
        return [
            [['searchQuery', 'display','status'], 'safe'],
            [['dateRange'], 'string'],
            [['start_date', 'end_date'], 'date', 'format' => 'yyyy-MM-dd'],
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
        
        $query = PemesananTable::find();
        $query->joinWith(['furniture','pembeli']);

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

        // if (!$this->validate()) {
        //     return $dataProvider;
        // }

        if ($this->dateRange) {
            $dates = explode(" to ", $this->dateRange);
            if (count($dates) === 2) {
                // It's a date range
                $startDate = trim($dates[0]);
                $endDate = trim($dates[1]);
                $query->andFilterWhere(['between', 'tanggal_pemesanan', $startDate, $endDate]);
            } else {
                // It's a single date
                $query->andFilterWhere(['DATE(tanggal_pemesanan)' => $dates[0]]);
            }
        }
        
        // Handling filter search
        $query
        ->andFilterWhere(['like', 'no_pemesanan', $this->searchQuery])
        ->orFilterWhere(['like', 'no_invoice', $this->searchQuery])
        ->orFilterWhere(['like', 'pembeli.nama_pembeli', $this->searchQuery])
        ->orFilterWhere(['like', 'furniture.nama_furniture', $this->searchQuery])
        ->orFilterWhere(['like', 'status', $this->searchQuery]);

        return $dataProvider;
    }
}
