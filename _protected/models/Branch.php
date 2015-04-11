<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "branch".
 *
 * @property integer $id
 * @property string $name
 * @property string $NIPT
 * @property integer $member_of
 * @property string $address
 * @property string $tel
 * @property string $email
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 *
 * @property User $updatedBy
 * @property Agency $memberOf
 * @property User $createdBy
 * @property Packageservices[] $packageservices
 */
class Branch extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'branch';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'member_of', 'address', 'tel', 'email'], 'required'],
            [['member_of', 'created_by', 'updated_by'], 'integer'],
            [['updated_at'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['NIPT', 'tel', 'email'], 'string', 'max' => 20],
            [['address'], 'string', 'max' => 150]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'NIPT' => Yii::t('app', 'Nipt'),
            'member_of' => Yii::t('app', 'Member Of'),
            'address' => Yii::t('app', 'Address'),
            'tel' => Yii::t('app', 'Tel'),
            'email' => Yii::t('app', 'Email'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
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
    public function getMemberOf()
    {
        return $this->hasOne(Agency::className(), ['id' => 'member_of']);
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
    public function getPackageservices()
    {
        return $this->hasMany(Packageservices::className(), ['branch' => 'id']);
    }
}
