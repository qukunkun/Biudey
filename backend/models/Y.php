<?php

namespace app\models;

use Yii;

class Y extends Yii{
    /**
     * 创建SQL语句命令
     *
     * @param string $sql
     */
    public static function C($sql = '', $db = 'db') {
        return Yii::$app->db->createCommand ( $sql );
    }

    /**
     * 返回页面请求
     */
    public static function Q() {
        return Yii::$app->request;
    }

    /**
     * 最后插入ID
     */
    public static function I() {
        return Yii::$app->db->getLastInsertID ();
    }

    /**
     * 返回session
     */
    public static function S() {
        return Yii::$app->session;
    }

    /**
     * 响应response
     */
    public static function R(){
       return Yii::$app->response;
    }

    /**
     * 响应返回用json
     */
    public static function J(){
      return Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    }
}