<?php
/* @var $this ArticleController */
/* @var $model Article */
?>
<h1>Create Article</h1>
<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'article-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    ));
?>

<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
    
<div class="row">
	<?php echo $form->labelEx($model,'title'); ?>
	<?php echo $form->textField($model,'title'); ?>
	<?php echo $form->error($model,'title'); ?>
</div>
<div class="row">
 	<?php echo $form->labelEx($model,'author'); ?>
  	<?php echo $form->dropDownList($model,'author', 
  	CHtml::listData(user::model()->findAll(array('order'=>'username')), 'id', 'username'),
   	array('empty'=>'','multiple'=>true ,'style'=>'width:150px;','size'=>'10')); ?>
  	<?php echo $form->error($model,'author'); ?>
</div>
<div class="row">
	<?php echo $form->labelEx($model,'content'); ?>
	<?php echo $form->fileField($model,'content'); ?>
	<?php echo $form->error($model,'content'); ?>
</div>
<div class="row buttons">
		<?php echo CHtml::submitButton('Article'); ?>
</div>


<?php $this->endWidget(); ?>