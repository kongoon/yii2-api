<?php
/**
 * Created by HanumanIT Co.,Ltd.
 * User: kongoon
 * Date: 13/10/18
 * Time: 09:45
 */

namespace common\models;
use yii\base\Model;


class Bmi extends Model
{
    public $weight;
    public $height;

    public function rules()
    {
        return [
            [['weight', 'height'], 'required'],
            [['weight', 'height'], 'number']
        ];
    }

    public function attributeLabels()
    {
        return [
            'weight' => 'น้ำหนัก (กิโลกรัม)',
            'height' => 'ส่วนสูง (เมตร)'
        ];
    }
}