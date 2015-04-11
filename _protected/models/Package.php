<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "package".
 *
 * @property integer $id
 * @property string $description
 * @property string $startdate
 * @property string $enddate
 * @property string $type
 * @property string $cost
 * @property integer $created_by
 * @property integer $updated_by
 * @property string $updated_at
 *
 * @property User $createdBy
 * @property User $updatedBy
 * @property Packageservices[] $packageservices
 */
class Package extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'package';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['startdate', 'enddate', 'updated_at'], 'safe'],
            [['cost'], 'number'],
            [['created_by', 'updated_by'], 'integer'],
            [['description'], 'string', 'max' => 500],
            [['type'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'description' => Yii::t('app', 'Description'),
            'startdate' => Yii::t('app', 'Startdate'),
            'enddate' => Yii::t('app', 'Enddate'),
            'type' => Yii::t('app', 'Type'),
            'cost' => Yii::t('app', 'Cost'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPackageservices()
    {
        return $this->hasMany(Packageservices::className(), ['package' => 'id']);
    }
}
