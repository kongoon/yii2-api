<?php
/**
 * Created by HanumanIT Co.,Ltd.
 * User: kongoon
 * Date: 8/11/2018 AD
 * Time: 12:38
 */
namespace api\components;

trait TraitController
{
    /**
     *  Menampilkan url yang sedang aktif
     *
     *  @return string
     */
    public function baseUrl()
    {
        return \yii\helpers\Url::base(true);
    }
    /**
     *  Method debug biasa digunakan untuk penelusuran data
     *
     *  @param  stirng $data
     *  @param  boolean $tipe [TRUE = var_dump | FALSE = print_r]
     *  @param  boolean $die
     */
    public function debugCode($data = null, $tipe = false, $die = true)
    {
        echo '<pre>';
        $tipe ? var_dump($data) : print_r($data);
        echo '</pre>';
        $die ? die() : '';
    }
    /**
     * Parsing data xml ke JSON
     *
     * @param  xml $data
     * @return string JSON
     */
    public function xMlToJson($data)
    {
        $fileContents = ($data);
        $fileContents = str_replace(array("\n", "\r", "\t"), '', $fileContents);
        $fileContents = trim(str_replace('"', "'", $fileContents));
        $simpleXml    = simplexml_load_string($fileContents);
        return $simpleXml;
    }
}