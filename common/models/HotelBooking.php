<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hotel_booking".
 *
 * @property integer $id
 * @property integer $room_id
 * @property integer $menu_id
 * @property string $name
 * @property string $surname
 * @property string $pid
 * @property string $country
 * @property string $city
 * @property string $mobile
 * @property string $email
 * @property integer $start_date
 * @property integer $end_date
 * @property integer $price
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $deleted_at
 *
 * @property HotelMenu $menu
 * @property HotelRoom $room
 */
class HotelBooking extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hotel_booking';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['room_id', 'name', 'surname', 'pid', 'country', 'city', 'mobile', 'start_date', 'end_date', 'price'], 'required'],
            [['room_id', 'menu_id', 'start_date', 'end_date', 'price', 'created_at', 'updated_at', 'deleted_at'], 'integer'],
            [['name'], 'string', 'max' => 63],
            [['surname'], 'string', 'max' => 127],
            [['pid'], 'string', 'max' => 32],
            [['country', 'city'], 'string', 'max' => 123],
            [['mobile', 'email'], 'string', 'max' => 31],
            [['menu_id'], 'exist', 'skipOnError' => true, 'targetClass' => HotelMenu::className(), 'targetAttribute' => ['menu_id' => 'id']],
            [['room_id'], 'exist', 'skipOnError' => true, 'targetClass' => HotelRoom::className(), 'targetAttribute' => ['room_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('hotel', 'ID'),
            'room_id' => Yii::t('hotel', 'Room ID'),
            'menu_id' => Yii::t('hotel', 'Menu ID'),
            'name' => Yii::t('hotel', 'Name'),
            'surname' => Yii::t('hotel', 'Surname'),
            'pid' => Yii::t('hotel', 'Personal ID'),
            'country' => Yii::t('hotel', 'Country'),
            'city' => Yii::t('hotel', 'City'),
            'mobile' => Yii::t('hotel', 'Mobile'),
            'email' => Yii::t('hotel', 'Email'),
            'start_date' => Yii::t('hotel', 'Start Date'),
            'end_date' => Yii::t('hotel', 'End Date'),
            'price' => Yii::t('hotel', 'Price'),
            'created_at' => Yii::t('hotel', 'Created At'),
            'updated_at' => Yii::t('hotel', 'Updated At'),
            'deleted_at' => Yii::t('hotel', 'Deleted At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenu()
    {
        return $this->hasOne(HotelMenu::className(), ['id' => 'menu_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoom()
    {
        return $this->hasOne(HotelRoom::className(), ['id' => 'room_id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\query\HotelBookingQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\HotelBookingQuery(get_called_class());
    }
}
