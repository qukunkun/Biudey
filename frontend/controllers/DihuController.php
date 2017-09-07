<?php
namespace frontend\controllers;

use Yii;
use frontend\models\Y;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

use frontend\models\Address;

/**
 * Dihu controller
 */
class DihuController extends Controller
{
    //地图分布页面
    public function actionMap(){
        return $this->render('map');
    }


    public function actionGetaddress(){
        $parentId = Y::Q()->post('parentId');
        $addressModel = new Address();
        $sql = "select * from address where parent_id={$parentId}";
        $res['data'] = $addressModel::findBySql($sql)->asArray()->all();
        return json_encode($res);
    }

    /**
     * 获取区域
     */
    public function actionGet_region(){
        $data_r = $village_r = array();
        $province = $village = $city = '';

        $data_r = Y::Q()->post();
        $province = $data_r['province'];
        $city = $data_r['city'];
        $village_r  = $data_r['village'];

        foreach( (array)$village_r as $val){
            $village .= $val.',';
        }
        $village = trim($village,',');

    }

    /**
     * 根据区域获取地虎
     */
    public function actionGet_dihu($province, $city, $village){

    }


}
