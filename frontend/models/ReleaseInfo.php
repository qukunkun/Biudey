<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "release_info".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $seeds
 * @property integer $area
 * @property string $price
 * @property string $province
 * @property string $city
 * @property string $village
 * @property string $address
 * @property string $images
 * @property integer $start_month
 * @property integer $end_month
 * @property string $title
 * @property string $describe
 * @property string $contact_user
 * @property string $contact_phone
 * @property string $number
 * @property string $time
 */
class ReleaseInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'release_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'area', 'start_month', 'end_month'], 'integer'],
            [['price'], 'number'],
            [['describe'], 'string'],
            [['seeds', 'village', 'address', 'images', 'title', 'contact_user', 'number'], 'string', 'max' => 255],
            [['province', 'city'], 'string', 'max' => 6],
            [['contact_phone'], 'string', 'max' => 11],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'seeds' => 'Seeds',
            'area' => 'Area',
            'price' => 'Price',
            'province' => 'Province',
            'city' => 'City',
            'village' => 'Village',
            'address' => 'Address',
            'images' => 'Images',
            'start_month' => 'Start Month',
            'end_month' => 'End Month',
            'title' => 'Title',
            'describe' => 'Describe',
            'contact_user' => 'Contact User',
            'contact_phone' => 'Contact Phone',
            'number' => 'Number',
            'time' => 'Time',
        ];
    }
}
