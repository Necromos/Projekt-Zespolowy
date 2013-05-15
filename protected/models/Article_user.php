<?php
class Article_user extends CActiveRecord
{
        public static function model($className=__CLASS__)
        {
                return parent::model($className);
        }

        public static function updateAssignments($article_id, $user_id){
                $criteria=new CDbCriteria;
                $criteria->condition='article_id=:article_id and user_id=:user_id';
                $criteria->params=array(':article_id'=>$article_id, ':user_id'=>$user_id);
                
                $assignment = self::model()->find($criteria);
                if($assignment===null) {
                        $assignment = new Article_user;
                        $assignment->attributes = array('article_id'=>$article_id, 'user_id'=>$user_id);
                        $assignment->save();
                }
        }
         
        public function tableName()
        {
                return 'article_user';
        }

        public function rules()
        {
                return array(
                        array('article_id, user_id', 'required'),
                        array('article_id, user_id', 'numerical', 'integerOnly'=>true),
                        array('id, article_id, user_id', 'safe', 'on'=>'search'),
                );
        }

        public function attributeLabels()
        {
                return array(
                        'article_id' => 'Article',
                        'user_id' => 'Author',
                );
        }

        public function search()
        {
                $criteria=new CDbCriteria;
				$criteria->compare('id',$this->id);
                $criteria->compare('article_id',$this->article_id);
                $criteria->compare('user_id',$this->user_id);

                return new CActiveDataProvider($this, array(
                        'criteria'=>$criteria,
                ));
        }
}