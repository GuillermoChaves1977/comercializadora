<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "people".
 *
 * @property int $id
 * @property string $document
 * @property string $name
 * @property string $direction
 * @property string $city
 * @property int $phone
 * @property int $status
 * @property int $id_thirdtypes
 *
 * @property Thirdtypes $thirdtypes
 */
class People extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'people';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['document', 'name', 'direction', 'city', 'phone', 'id_thirdtypes'], 'required'],
            [['phone', 'status', 'id_thirdtypes'], 'integer'],
            [['document'], 'string', 'max' => 30],
            [['name'], 'string', 'max' => 100],
            [['direction'], 'string', 'max' => 200],
            [['city'], 'string', 'max' => 50],
            [['id_thirdtypes'], 'exist', 'skipOnError' => true, 'targetClass' => Thirdtypes::className(), 'targetAttribute' => ['id_thirdtypes' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'document' => 'Documento',
            'name' => 'Nombre',
            'direction' => 'Dirección',
            'city' => 'Ciudad',
            'phone' => 'Teléfono',
            'status' => 'Estado',
            'id_thirdtypes' => 'Tipo',
        ];
    }

    /**
     * Gets query for [[Thirdtypes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getThirdtypes()
    {
        return $this->hasOne(Thirdtypes::className(), ['id' => 'id_thirdtypes']);
    }
}
