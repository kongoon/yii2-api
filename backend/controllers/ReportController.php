<?php

namespace backend\controllers;
use Yii;
use yii\data\ArrayDataProvider;

class ReportController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionReport1()
    {
        $sql = "
        SELECT pt.name, 
            COUNT(p.id) AS cnt
        FROM post p 
        LEFT JOIN post_type pt ON pt.id = p.post_type_id
        GROUP BY p.post_type_id
        ";
        $data = Yii::$app->db->createCommand($sql)->queryAll();

        $dataProvider = new ArrayDataProvider([
            'allModels' => $data,
            'pagination' => false
        ]);

        $content = $this->renderPartial('_pdf', [
            'dataProvider' => $dataProvider
        ]);

        $defaultConfig = (new \Mpdf\Config\ConfigVariables())->getDefaults();
        $fontDirs = $defaultConfig['fontDir'];
        $defaultFontConfig = (new \Mpdf\Config\FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];
        $mpdf = new \Mpdf\Mpdf([
            'orientation' => 'L',
            'fontDir' => array_merge($fontDirs, [
                Yii::getAlias('@webroot').'/fonts',
            ]),
            'fontdata' => $fontData + [
                    'phetsarath' => [
                        'R' => 'PhetsarathOT.ttf',
                        //'I' => 'THSarabunNew Italic.ttf',
                        //'B' => 'THSarabunNew Bold.ttf',
                    ]
                ],
            'default_font' => 'phetsarath'
        ]);

        $style = file_get_contents(Yii::getAlias('@webroot').'/css/bootstrap.min.css');
        $mpdf->SetHTMLFooter('{PAGENO} จาก {nbpg}');
        $mpdf->WriteHTML($style, 1);
        $mpdf->WriteHTML($content, 2);

        $mpdf->AddPage('P','',1,'','off');
        $mpdf->SetHTMLFooter('{PAGENO} จาก {nbpg}');
        $mpdf->WriteHTML($style, 1);
        $mpdf->WriteHTML($content, 2);

        $mpdf->AddPage('L','',1,'','off');
        $mpdf->SetHTMLFooter('{PAGENO} จาก {nbpg}');
        $mpdf->WriteHTML($style, 1);
        $mpdf->WriteHTML($content, 2);

        $mpdf->Output();

    }

    public function actionReport2()
    {
        return $this->render('report2');
    }

    public function actionReport3()
    {
        return $this->render('report3');
    }

}
