<?php

/**
 * This is the model class for table "article".
 *
 * The followings are the available columns in table 'article':
 * @property integer $id_article
 * @property integer $author
 * @property string $title
 * @property string $content
 * @property string $create_date
 *
 * The followings are the available model relations:
 * @property User $author0
 * @property ArticleHistory[] $articleHistories
 * @property ArticleTag[] $articleTags
 * @property Review[] $reviews
 */
class Article extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Article the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'article';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('author, content', 'required'),
			array('author', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>50),
			array('content', 'length', 'max'=>100),
			array('create_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_article, author, title, content, create_date', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'author0' => array(self::BELONGS_TO, 'User', 'author'),
			'articleHistories' => array(self::HAS_MANY, 'ArticleHistory', 'article'),
			'articleTags' => array(self::HAS_MANY, 'ArticleTag', 'article'),
			'reviews' => array(self::HAS_MANY, 'Review', 'article'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_article' => 'Id Article',
			'author' => 'Author',
			'title' => 'Title',
			'content' => 'Content',
			'create_date' => 'Create Date',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_article',$this->id_article);
		$criteria->compare('author',$this->author);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('create_date',$this->create_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}