<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\web\Session;
use yii\db\Query;
use backend\models\Pelajaran;
use backend\models\Jenjang;
use backend\models\Semester;
use backend\models\Bab;
use backend\models\Soal;
use frontend\models\Dosen;

$session = Yii::$app->session;
$session->open();

/**
 * Login form
 */
class SoalForm extends Model
{
    public $deskripsi;
    public $judul_soal;
    public $uploadFile;
    private $idBab;
    private $idDosen;
    private $now_date;


    /**
     * {@inheritdoc}
     */
    /**
     * @var UploadedFile
     */
    public function rules()
    {
        return [
            // username and password are both required
            ['deskripsi', 'required'],
            ['deskripsi', 'string', 'min' => 4, 'max' => 255],
            ['judul_soal', 'required'],
            ['judul_soal', 'string', 'min' => 4, 'max' => 255],
            [['uploadFile'],'file','skipOnEmpty'=>FALSE,'extensions'=>'docx, doc, ppt, pptx, pdf']
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */

    /**
     * @return bool whether the user is logged in successfully
     */
    public function createsoal()
    {
        if (!$this->validate()) {
            return null;
        }
        // $this->idBab = $id_bab;
    	$this->now_date = date('Y-m-d');
	    
	    //ambil id_dosen
	    $session = Yii::$app->session;
		$session->open();

	    $dosen = Dosen::find()
	    ->where('username = :user', [':user' => $session['dosen']])
	    ->one();
	    $this->idDosen = $dosen['id'];

        $soals = new Soal();
        // $soals->id_bab_soal = $this->idBab;
        $soals->deskripsi = $this->deskripsi;
        $soals->judul_soal = $this->judul_soal;
        $soals->soal = $this->uploadFile;
        $soals->id_dosen_soal = $this->idDosen;
        $soals->waktu_upload = $this->now_date;

        $soals-> file = UploadedFile::getInstance($soals,'uploadFile');
        // $this->soals->saveAs('soal/'.$this->uploadFile.'.'.$this->soals->extension);
        $this->uploadFile->saveAs('soal/'.$this->uploadFile->baseName.'.'.$this->uploadFile->extension);

        $soals->save();

        return true;

        // return $this->redirect(['view', 'id' => $model->id_bab]);

    }
}
