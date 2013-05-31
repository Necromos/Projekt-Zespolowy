<?php

/**
 * This is the model class for table "article".
 *
 * The followings are the available columns in table 'article':
 * @property integer $id
 * @property integer $author
 * @property string $title
 * @property string $content
 * @property string $create_date
 * @property string $status
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
	 
	public $users = array();
	public $category = array("id"=>1);
	public $tagList = '';
	private $_model;
	
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
			array('title, content, author, category, tagList', 'required'),
			array('author, category',  'numerical', 'integerOnly'=>true),
			array('users', 'type','type'=>'array','allowEmpty'=>false),
			array('title', 'length', 'max'=>50),
			array('content', 'file', 'types'=>'pdf, doc, docx'),
			array('create_date', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, author, title, content, category, create_date', 'safe', 'on'=>'search'),
		);
	}

	public function beforeSave(){
		if(parent::beforeSave()){
			$this->tags->add((string)$this->tagList);
			return true;	
		}
		return false;
	}

	public function afterSave(){
    	if(parent::afterSave()){
    		User::updateUsers($this->users, $this->id);
    		return true;
    	}
        return false;
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
			'category' => array(self::BELONGS_TO, 'Category', 'category(id)'),
			//'project_id' => array(self::MANY_MANY, 'Project', 'project_user_assignment(user_id, project_id)')
			'FK_article_id' => array(self::MANY_MANY, 'User', 'article_user(article_id, user_id)'),
		);
	}
	

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	 
	public function attributeLabels()
	{
		
		$user = User::model()->findByPk(Yii::app()->user->id);
		
		return array(
			'id' => 'Id Article',
			'author' => 'Author',
			'users' => 'Optional authors',
			'title' => 'Title',
			'content' => 'Content',
			'category' => 'Category',
			'create_date' => 'Create Date',
			'status' => 'Approval status',
			'tagList' => 'Article tags',
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
		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title);
		$criteria->compare('author',$this->author);
		$criteria->compare('content',$this->content);
		$criteria->compare('category',$this->category);
		$criteria->compare('create_date',$this->create_date);
		$criteria->compare('status',$this->status);
		
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function behaviors() {
        return array(
            'tags' => array(
                'class' => 'ext.Su_MpaK.Taggable.behaviours.TaggableBehaviour',
 
                // Tag model path alias.
                'tagModel' => 'Tag',
 
                // The field name which contains tag title.
                'tagTableTitle' => 'name',
 
                // The name of relation table.
                'tagRelationTable' => 'article_tag',
 
                // The name of attribute in relation table which recalls tag.
                'tagRelationTableTagFk' => 'tag',
 
                // The name of attribute in relation table which recalls model.
                'tagRelationTableModelFk' => 'article',
 
                // Separator for tags in strings.
                'tagsSeparator' => ','
            )
        );
    }
}