<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "agency".
 *
 * @property integer $id
 * @property string $name
 * @property string $NIPT
 * @property string $address
 * @property string $email
 * @property string $tel
 * @property integer $created_by
 * @property integer $updated_by
 * @property string $updated_at
 *
 * @property User $updatedBy
 * @property User $createdBy
 * @property Branch[] $branches
 * @property Clientusers[] $clientusers
 * @property Packageservices[] $packageservices
 */
class Agency extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'agency';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'address', 'email', 'tel'], 'required'],
            [['created_by', 'updated_by'], 'integer'],
            [['updated_at'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['NIPT'], 'string', 'max' => 20],
            [['address'], 'string', 'max' => 150],
            [['email'], 'string', 'max' => 50],
            [['tel'], 'string', 'max' => 15]
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
            'address' => Yii::t('app', 'Address'),
            'email' => Yii::t('app', 'Email'),
            'tel' => Yii::t('app', 'Tel'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'updated_at' => Yii::t('app', 'Updated At'),
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
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBranches()
    {
        return $this->hasMany(Branch::className(), ['member_of' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientusers()
    {
        return $this->hasMany(Clientusers::className(), ['agency' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPackageservices()
    {
        return $this->hasMany(Packageservices::className(), ['agency' => 'id']);
    }
}
