<?php
namespace frontend\controllers;

use Yii;
use frontend\models\Y;
use yii\web\Controller;


use frontend\models\Address;
use backend\models\Seeds;
use frontend\models\UploadForm;
use yii\web\UploadedFile;
use frontend\models\ReleaseInfo;

/**
 * Dihu controller
 */
class DihuController extends Controller
{
    //该控制器关闭csrf验证
    public $enableCsrfValidation = false;

    //地图分布页面
    public function actionMap()
    {
        return $this->render('map');
    }


    public function actionGetaddress()
    {
        $parentId = Y::Q()->post('parentId');
//        $sql = "select * from address where parent_id={$parentId}";
//        $res['data'] = Address::findBySql($sql)->asArray()->all();
//
        $res['data'] = Address::find()->where(['parent_id' => $parentId])->asArray()->all();
        return json_encode($res);
    }

    /**
     * 获取区域
     */
    public function actionGet_region()
    {
        $data_r = $village_r = array();
        $province = $village = $city = '';

        $data_r = Y::Q()->post();

        $province = $data_r['province'];
        $city = $data_r['city'];
        $village_r = $data_r['village'];

        foreach ((array)$village_r as $val) {
            $village .= $val . ',';
        }
        $village = trim($village, ',');
    }

    /**
     * 根据区域获取地虎
     */
    public function actionGet_dihu($province, $city, $village)
    {

    }

    /**
     * 发布
     */
    public function actionRelease()
    {
//        $seedsModel = new Seeds();
//        $sql = "select id, name from seeds";
//
//        $data['seeds'] = $seedsModel::findBySql($sql)->asArray()->all();
        $data['seeds'] = Seeds::find(['id', 'name'])->asArray()->all();
        $id = Y::Q()->get('id');

        if( $id ){
            $data['data'] = ReleaseInfo::find()->where(["id"=>$id])->asArray()->one();
        }


        return $this->render('release', $data);
    }

    public function actionDo_release()
    {
        $ReleaseInfoModel = new ReleaseInfo();

        if (Yii::$app->request->isPost) {
            $data = Y::Q()->post();
            
            $villages  = $seeds =  '';
            foreach ($data as $key => &$val) {
                //多区 处理
                /*
                if($key == 'village' && is_array($val)){
                    foreach($val as $v){
                        $villages .= $v.',';
                    }
                    $val = trim(rtrim($villages,','));
                }

                //多种子处理
                if($key == 'seeds' && is_array($val)){
                    foreach($val as $v){
                        $seeds .= $v.',';
                    }
                    $val = trim(rtrim($seeds,','));
                }*/

                $ReleaseInfoModel->$key = $val;
            }

            $userId = Yii::$app->user->identity->id;
            $ReleaseInfoModel->user_id = $userId;
            $time = time();
            $ReleaseInfoModel->time = $time;

            //土地编号
            $number = md5(time() . mt_rand(1,1000000));
            $ReleaseInfoModel->number = $number;

            //上传图片
            if(!empty($_FILES['images']['tmp_name'])){
                $images = '';
                //获取用户ID
                $day = date('Ymd', $time);
                $imgPath = Yii::$app->basePath . '/web/uploads/'.$userId.'/'.$day.'/'.$number;
                if (!file_exists($imgPath)) {
                    mkdir("$imgPath", 0777, true);
                } else {
                    $this->delfile($imgPath);
                }
                foreach ($_FILES['images']['tmp_name'] as $k => $v) {
                    move_uploaded_file($v, $imgPath .'/'. $k . '.jpg');
                    $images .= $k . '.jpg' . ',';
                }
                $images = trim(rtrim($images,','));;
                $ReleaseInfoModel->images = $images;
            }

            $v_result = $this->validate($ReleaseInfoModel);

            if($v_result['status'] < 0){
                die($v_result['message']);
            }

            if($ReleaseInfoModel->save()){
                $this->redirect(array('dihu/myrelease'));
            }
        }

    }

    /**
     * @return string
     * 我的发布
     */
    public function actionMyrelease()
    {
        $userId = Yii::$app->user->identity->id;

        $data['data'] = ReleaseInfo::find()->where(['user_id'=>$userId])->asArray()->orderBy('id DESC')->all();
        return $this->render('myrelease',$data);
    }

    /**
     * 删除发布
     */
    public function actionDelete()
    {
        $userId = Yii::$app->user->identity->id;
        $id = Y::Q()->post('id');
        $model = ReleaseInfo::findOne(["user_id" => $userId, "id" => $id]);

        if($model->delete()){
            $number = $model->number;
            $day = date('Ymd',$model->time);
            //删除上传图片
            $imgPath = Yii::$app->basePath . '/web/uploads/'.$userId.'/'.$day.'/'.$number;
            $this->delfile($imgPath);
            
            $result = array( 'status'=>1, 'data'=>'', 'message'=>'删除成功');
        }else{
            $result = array( 'status'=>-1, 'data'=>'', 'message'=>'删除失败');
        }
        return json_encode($result);
    }

    /**
     * 修改发布
     */
    public function actionEdit(){
        $id = Y::Q()->get('id');
        $data['data'] = ReleaseInfo::find()->where(["id"=>$id])->asArray()->one();
        return $this->render('release',$data);
    }

    /**
     * @param $dirName
     * @return bool
     * 删除指定目录下的文件，不删除目录文件夹
     */
    function delfile($dirName){
        if ( $handle = opendir( "$dirName" ) ) {
            while ( false !== ( $item = readdir( $handle ) ) ) {
                if ( $item != "." && $item != ".." ) {
                    if ( is_dir( "$dirName/$item" ) ) {
                        delDirAndFile( "$dirName/$item" );
                    } else {
                        unlink( "$dirName/$item" );
                    }
                }
            }
            closedir( $handle );
            rmdir( $dirName );
        }
    }

    /**
     * @param $model
     * @return array
     * 表单提交数据验证
     */
    function validate($model){
        $model->validate(); //启用验证
        $errors = array();
        $error_msg = '';
        if ($model->hasErrors()) {
            $errors =  $model->errors;
            foreach((array)$errors as $key=>$value){
                $error_msg .=  $value[0].'<br/>';
            }
            return array('status'=>-1, 'data'=>$errors, 'message'=>'提交内容出差：<br/>'.$error_msg);
        }
        return array( 'status'=>1, 'data'=>'', 'message'=>'验证成功');
    }
}