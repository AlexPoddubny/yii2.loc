<?php
	
	
	namespace app\models;
	
	
	use yii\db\ActiveRecord;
	
	abstract class BaseModel
		extends ActiveRecord
	{
		public static function tableName()
		{
			$name = strtolower(static::className());
			$name = substr($name, strripos($name, '\\') + 1);
			$l = substr($name, -1);
			switch ($l){
				case 's':
					$name .= 'es';
					break;
				case 'y':
					$name = substr($name, 0, strlen($name) - 1) . 'ies';
					break;
				default:
					$name .= 's';
					break;
			}
			return $name;
		}
	}