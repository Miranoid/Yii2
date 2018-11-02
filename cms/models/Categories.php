<?php

namespace app\models;
use yii\db\ActiveRecord;

class Categories extends ActiveRecord
{
  public static function TableName()
{
	return 'categories';
}
}
