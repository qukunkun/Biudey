<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "address".
 *
 * @property integer $id
 * @property string $area_name
 * @property integer $parent_id
 * @property string $lng
 * @property string $lat
 * @property integer $level
 * @property integer $sort
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'area_name', 'parent_id', 'level'], 'required'],
            [['id', 'parent_id', 'level', 'sort'], 'integer'],
            [['area_name'], 'string', 'max' => 50],
            [['lng', 'lat'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'area_name' => 'Area Name',
            'parent_id' => 'Parent ID',
            'lng' => 'Lng',
            'lat' => 'Lat',
            'level' => 'Level',
            'sort' => 'Sort',
        ];
    }

}
