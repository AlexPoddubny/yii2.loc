<?php

namespace app\modules\admin\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property string|null $content
 * @property float $price
 * @property string|null $keywords
 * @property string|null $description
 * @property string|null $img
 * @property string $hit
 * @property string $new
 * @property string $sale
 */
class Product
	extends ActiveRecord
{
 
	public $image;
	public $gallery;
	
	/**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }
	
	public function behaviors()
	{
		return [
			'image' => [
				'class' => 'rico\yii2images\behaviors\ImageBehave',
			]
		];
	}

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'name'], 'required'],
            [['category_id'], 'integer'],
            [['content', 'hit', 'new', 'sale'], 'string'],
            [['price'], 'number'],
            [['name', 'keywords', 'description', 'img'], 'string', 'max' => 255],
	        [['image'], 'file', 'extensions' => 'png, jpg'],
	        [['gallery'], 'file', 'extensions' => 'png, jpg', 'maxFiles' => 4],
        ];
    }
	
	public function getCategory()
	{
		return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category',
            'name' => 'Name',
            'content' => 'Content',
            'price' => 'Price',
            'keywords' => 'Keywords',
            'description' => 'Description',
            'image' => 'Image',
	        'gallery' => 'Gallery',
            'hit' => 'Hit',
            'new' => 'New',
            'sale' => 'Sale',
        ];
    }
	
	public function upload()
	{
		if ($this->validate()){
			$path = 'upload/store/'
				. $this->image->baseName . '.'
				. $this->image->extension;
			$this->image->saveAs($path);
			$this->attachImage($path, true);
			@unlink($path);
			return true;
		} else {
			return false;
		}
	}
	public function uploadGallery()
	{
		if ($this->validate()){
			foreach ($this->gallery as $file){
				$path = 'upload/store/'
					. $file->baseName . '.'
					. $file->extension;
				$file->saveAs($path);
				$this->attachImage($path);
				@unlink($path);
			}
			return true;
		} else {
			return false;
		}
	}
	
}
