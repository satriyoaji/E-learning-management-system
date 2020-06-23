<?php

namespace frontend\controllers;
use backend\models\Pelajaran;
use backend\models\Jenjang;
use backend\models\Semester;
use backend\models\Bab;
use backend\models\Soal;
use frontend\models\Dosen;
use \frontend\models\SoalForm;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Session;
use yii\web\Controller;
use yii\base\Model;
use Yii;


// $id_pelajaran = $_GET['id'];

class CourseController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'semester', 'detail', 'newbab', 'newsoal', 'uploadbab', 'uploadsoal'],
                'rules' => [
                    [
                        'actions' => ['index', 'semester', 'detail', 'newbab', 'newsoal', 'uploadbab', 'uploadsoal'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
    public function actionIndex()
    {
        $data = Pelajaran::find()->all();
        $param=[
            'data'=>$data
        ];
        return $this->render('index',$param);
    }

    public function actionDetail($id){
        $data = Pelajaran::findOne($id);
        $param=[
            'data'=>$data
        ];
        return $this->render('detail',$param);
    }

    public function actionSemester($username){
        $data = Jenjang::findOne($username);
        $param=[
            'data'=>$data
        ];
        return $this->render('semester',$param);
    }

    public function actionDownloadbab($id){
        if (Yii::$app->user->isGuest) {
            return $this->goBack();
        }

        $data_file = Bab::find()->where(['id_bab' => $id])->one();
        $file = Yii::$app->basePath. '/web/' . $data_file->video;

        if (file_exists($file)) {
           Yii::$app->response->sendFile($file);
        }
    }

    public function actionDownloadsoal($id){
        if (Yii::$app->user->isGuest) {
            return $this->goBack();
        }

        $data_file = Soal::find()->where(['id_soal' => $id])->one();
        $file = Yii::$app->basePath. '/web/' . $data_file->soal;

        if (file_exists($file)) {
           Yii::$app->response->sendFile($file);
        }
    }

    public function actionNewsoal($id){

        return $this->render('newsoal', [
            'id' => $id,
        ]);
    }

    public function actionNewbab($id){

        return $this->render('newbab', [
            'id' => $id,
        ]);
    }

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionUploadmateri()
    {
        $request = (Object)Yii::$app->request->post();
//            var_dump($request);
    }

    public function actionUploadbab(){
        
        $now_date = date('Y-m-d');

        $namaFile = $_FILES['filename']['name'];
        $ukuranFile = $_FILES['filename']['size'];
        $error = $_FILES['filename']['error'];

        if ($namaFile!=null && $error !== 4) {
            $tmpName = $_FILES['filename']['tmp_name'];
            $ekstensiFile = explode('.', $namaFile);
            $ekstensiFile = strtolower(end($ekstensiFile));
            $namaFileBaru = 'uploads/'. $namaFile .'_';
            // $namaFileBaru .= '.' . $ekstensiFile;

            move_uploaded_file($tmpName, Yii::$app->basePath. '/web/' . $namaFileBaru);

            $request = (Object)Yii::$app->request->post();
            $session = Yii::$app->session;
            $session->open();
            //ambil id_jenjang
            $pelajaran = Pelajaran::find()
            ->where('id_pelajaran = :id', [':id' => $request->id_pelajaran])
            ->one();
            $GLOBALS['nama_pelajaran'] = $pelajaran['nama_pelajaran'];
            $semester = Semester::find()
            ->where('id_semester = :id', [':id' => $pelajaran['id_semester_pelajaran']])
            ->one();
            $jenjang = Jenjang::find()
            ->where('id_jenjang = :id', [':id' => $semester['id_jenjang_semester']])
            ->one();
            $id_jenjang = $jenjang['id_jenjang'];

            //ambil id_dosen
            $dosen = Dosen::find()
            ->where('username = :user', [':user' => $session['dosen']])
            ->one();
            $id_dosen = $dosen['id'];

            $Babs = new Bab();
            $Babs->id_jenjang_bab = $id_jenjang;
            $Babs->id_pelajaran_bab = $request->id_pelajaran;
            $Babs->id_dosen_bab = $id_dosen;
            $Babs->deskripsi = $request->deskripsi;
            $Babs->video = $namaFileBaru;
            $Babs->dates = $now_date;
            // $Babs->id_murid_jenjang = $this->id_jenjang;
            $Babs->save();

            return $this->render('detail', [
                'id' => $request->id_pelajaran,
            ]);

        }

        return $this->goBack();

    }

    public function actionUploadsoal(){
        
        $now_date = date('Y-m-d');

        $namaFile = $_FILES['filename']['name'];
        $ukuranFile = $_FILES['filename']['size'];
        $error = $_FILES['filename']['error'];

        if ($namaFile!=null && $error !== 4) {
            $tmpName = $_FILES['filename']['tmp_name'];
            $ekstensiFile = explode('.', $namaFile);
            $ekstensiFile = strtolower(end($ekstensiFile));
            $namaFileBaru = 'soal/'. $namaFile;
            // $namaFileBaru .= '.' . $ekstensiFile;

            move_uploaded_file($tmpName, Yii::$app->basePath. '/web/' . $namaFileBaru);

            $request = (Object)Yii::$app->request->post();
            $session = Yii::$app->session;
            $session->open();

            //ambil id_dosen
            $dosen = Dosen::find()
            ->where('username = :user', [':user' => $session['dosen']])
            ->one();
            $id_dosen = $dosen['id'];

            $Soals = new Soal();
            $Soals->id_bab_soal = $request->id_bab;
            $Soals->deskripsi = $request->deskripsi;
            $Soals->judul_soal = $request->judul;
            $Soals->soal = $namaFileBaru;
            $Soals->id_dosen_soal = $id_dosen;
            $Soals->waktu_upload = $now_date;
            // $Soals->id_murid_jenjang = $this->id_jenjang;
            $Soals->save();

            return $this->render('detail', [
                'id' => $request->id_pelajaran,
            ]);

        }

        return $this->goBack();

    }
}
