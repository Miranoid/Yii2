<?php

namespace app\models;
use yii\db\ActiveRecord;

class Products extends ActiveRecord
{
  public static function TableName()
{
	return 'products';
}
}
