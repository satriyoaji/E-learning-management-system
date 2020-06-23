<?php

namespace frontend\controllers;
use \backend\models\Artikel;

class ArtikelController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $data = Artikel::find()->all();
        $param=[
            'data'=>$data
        ];
        return $this->render('index',$param);
    }

    public function actionList($id){
        $data = Artikel::findOne($id);
        $param=[
            'data'=>$data
        ];
        return $this->render('detail',$param);
    }

    
}
