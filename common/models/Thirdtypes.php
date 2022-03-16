<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "thirdtypes".
 *
 * @property int $id
 * @property string $name
 * @property int $estatus
 *
 * @property People[] $peoples
 */
class Thirdtypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'thirdtypes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['estatus'], 'integer'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'estatus' => 'Estatus',
        ];
    }

    /**
     * Gets query for [[Peoples]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPeoples()
    {
        return $this->hasMany(People::className(), ['id_thirdtypes' => 'id']);
    }

    //obtener los tipos de usuario
    public static function getThirdtypes()
    {
      return ArrayHelper::map(Thirdtypes::find()->all(), 'id', 'name');
    }
}
