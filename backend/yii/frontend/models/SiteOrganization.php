<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "site_organization".
 *
 * @property int $id
 * @property string|null $org_name
 * @property string|null $email
 * @property string|null $hisob_raqam
 * @property int|null $category_id
 * @property string|null $service_name
 * @property string|null $description
 * @property string|null $service_img
 * @property int|null $yuridik_id
 *
 * @property BankYuridikSh $yuridik
 * @property Category $category
 */
class SiteOrganization extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'site_organization';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['org_name', 'service_name', 'description'], 'string'],
            [['category_id', 'yuridik_id'], 'default', 'value' => null],
            [['category_id', 'yuridik_id', 'created_at', 'updated_at'], 'integer'],
            [['email', 'hisob_raqam'], 'string', 'max' => 255],
            [['yuridik_id'], 'exist', 'skipOnError' => true, 'targetClass' => BankYuridikSh::className(), 'targetAttribute' => ['yuridik_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['service_img'], 'file', 'skipOnEmpty' => false, 'extensions' => 'jpg, png, jpeg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'org_name' => 'Tashkilot nomi',
            'email' => 'Elektron pochta',
            'hisob_raqam' => 'Hisob Raqam',
            'category_id' => 'Kategoriya',
            'service_name' => 'Xizmat turi',
            'description' => 'Izoh',
            'service_img' => 'Rasm',
            'yuridik_id' => 'Yuridik tashkilot',
            'created_at'=>'Yozuv yaratilgan sana',
            'updated_at'=>'Yozuv o\'zgartirilgan sana',
        ];
    }

    /**
     * Gets query for [[Yuridik]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getYuridik()
    {
        return $this->hasOne(BankYuridikSh::className(), ['id' => 'yuridik_id']);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
    public function uploadserviceimg()
    {
        if ($this->validate()) {

            $this->service_img->saveAs('uploads/' . $this->service_img->baseName . '.' . $this->service_img->extension, false);
            return true;
        } else {
            return false;
        }
    }
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // если вместо метки времени UNIX используется datetime:
                // 'value' => new Expression('NOW()'),
            ],
        ];
    }
}
