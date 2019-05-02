<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Page;

/**
 * Description of PageSearch
 *
 * @author stepanov
 */
class PageSearch extends Page
{

    public function rules ()
    {
        return [
            [ [ 'page_type_id' ], 'integer' ],
        ];
    }

    public function scenarios ()
    {
        return Model::scenarios();
    }

    public function search ($params)
    {
        $query = Page::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params, '') && $this->validate())) {
            return $dataProvider;
        }

        // изменяем запрос добавляя в его фильтрацию
        $query->andFilterWhere([ 'page_type_id' => $this->page_type_id ]);

        return $dataProvider;
    }

}
