<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "articles".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $existence
 * @property float $purchase_price
 * @property float $sale_price
 * @property float $weighted
 * @property int $status
 * @property int $id_category
 *
 * @property Categories $category
 */
class Articles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'articles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'purchase_price', 'sale_price', 'weighted', 'id_category'], 'required'],
            [['existence', 'status', 'id_category'], 'integer'],
            [['purchase_price', 'sale_price', 'weighted'], 'number'],
            [['name'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 250],
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['id_category' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nombre',
            'description' => 'Descripción',
            'existence' => 'Stock',
            'purchase_price' => 'Precio Compra',
            'sale_price' => 'Precio Venta',
            'weighted' => 'Ponderado',
            'status' => 'Estado',
            'id_category' => 'Categoria',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['id' => 'id_category']);
    }
}
