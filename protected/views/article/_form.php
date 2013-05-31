<?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'article-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    ));
?>

	<?php echo $form->errorSummary($model); ?>
    
<div class="row">
	<?php echo $form->labelEx($model,'title'); ?>
	<?php echo $form->textField($model,'title'); ?>
	<?php echo $form->error($model,'title'); ?>
</div>
<div class="row">
	<?php echo $form->labelEx($model,'author'); ?>
    <?php echo $form->hiddenField($model,'author', array('value'=>1)); ?>
    <?php echo $form->error($model,'author'); ?>
</div>
<div class="row">
 	<?php echo $form->labelEx($model,'category'); ?>
  	<?php echo $form->dropDownList($model,'category', 
  	CHtml::listData(category::model()->findAll(array('order'=>'id')), 'id', 'name'),
   	array('empty'=>'','multiple'=>false ,'style'=>'width:150px;','size'=>'10')); ?>
  	<?php echo $form->error($model,'category'); ?>
</div>
<div class="row">
 	<?php echo $form->labelEx($model,'users'); ?>
  	<?php echo $form->dropDownList($model,'users', 
  	CHtml::listData(user::model()->findAll(array('order'=>'username')), 'id', 'username'),
   	array('empty'=>'','multiple'=>true ,'style'=>'width:150px;','size'=>'10')); ?>
  	<?php echo $form->error($model,'users'); ?>
</div>
<div class="row">
	<?php echo $form->labelEx($model,'content'); ?>
	<?php echo $form->fileField($model,'content'); ?>
	<?php echo $form->error($model,'content'); ?>
</div>
<div class="row">
    <?php echo $form->labelEx($model,'tagList'); ?>
    <?php echo $form->textArea($model,'tagList'); ?>
    <?php echo $form->error($model,'tagList'); ?>
  </div>
<div class="row buttons">
		<?php echo CHtml::submitButton('Submit Article'); ?>
</div>


<?php $this->endWidget(); ?>