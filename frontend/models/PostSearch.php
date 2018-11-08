<?php
/**
 * Created by HanumanIT Co.,Ltd.
 * User: kongoon
 * Date: 13/10/18
 * Time: 16:24
 */

namespace frontend\models;
use common\models\PostOld;
use yii\data\ActiveDataProvider;

class PostSearch extends PostOld
{

    public function search($params)
    {
        $query = PostOld::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);

        if($this->load($params)){
            $query->filterWhere(['like', 'name', $this->name]);
        }

        return $dataProvider;
    }
}