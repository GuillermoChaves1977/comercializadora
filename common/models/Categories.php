<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "categories".
 *
 * @property int $id
 * @property string $name
 * @property string $image
 *
 * @property Articles[] $articles
 */
class Categories extends \yii\db\ActiveRecord
{
    
    public $archive;
    /**
     * 
     * 
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 50],
            //para la imagen
            [['archive'], 'file', 'extensions'=>'jpg, png'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Categoria',
            'archive' => 'Imagen',
            'image' => 'Imagen',
        ];
    }

    /**
     * Gets query for [[Articles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Articles::className(), ['id_category' => 'id']);
    }

    //obtener la categoria
    public static function getCategories()
    {
      return ArrayHelper::map(Categories::find()->all(), 'id', 'name');
    }

    
}
