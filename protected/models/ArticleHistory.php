<?php

/**
 * This is the model class for table "article_history".
 *
 * The followings are the available columns in table 'article_history':
 * @property integer $id_history
 * @property integer $article
 * @property integer $status
 * @property string $date
 * @property integer $isenabled
 *
 * The followings are the available model relations:
 * @property Status $status0
 * @property Article $article0
 */
class ArticleHistory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ArticleHistory the static model class
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
		return 'article_history';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('article, status, date, isenabled', 'required'),
			array('article, status, isenabled', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_history, article, status, date, isenabled', 'safe', 'on'=>'search'),
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
			'status0' => array(self::BELONGS_TO, 'Status', 'status'),
			'article0' => array(self::BELONGS_TO, 'Article', 'article'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_history' => 'Id History',
			'article' => 'Article',
			'status' => 'Status',
			'date' => 'Date',
			'isenabled' => 'Isenabled',
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

		$criteria->compare('id_history',$this->id_history);
		$criteria->compare('article',$this->article);
		$criteria->compare('status',$this->status);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('isenabled',$this->isenabled);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}