<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $img
 *
 * @property SiteOrganization[] $siteOrganizations
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string'],
            [['img'], 'file', 'skipOnEmpty' => false, 'extensions' => 'jpg, png, jpeg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nomi',
            'img' => 'Rasm',
        ];
    }

    /**
     * Gets query for [[SiteOrganizations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSiteOrganizations()
    {
        return $this->hasMany(SiteOrganization::className(), ['category_id' => 'id']);
    }
    public function upload()
    {
        if ($this->validate()) {

            $this->img->saveAs('uploads/' . $this->img->baseName . '.' . $this->img->extension, false);
            return true;
        } else {
            return false;
        }
    }
}
