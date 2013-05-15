<?php
/* @var $this SiteController */
/* @var $model SubmitRegisterForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Article';
$this->breadcrumbs=array(
	'Article',
);
?>

<h1>Article</h1>

<p>Please fill out the following form with your credentials:</p>

<div class="form">
<?php 
$form=$this->beginWidget(
	'CActiveForm', 
	array(
		'id'=>'article-form',
    	'enableAjaxValidation'=>true,
    	'enableClientValidation'=>true,
		'htmlOptions' => array('enctype' => 'multipart/form-data'),
		'clientOptions'=>array('validateOnSubmit'=>true),
	)
);
?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title'); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textField($model,'content'); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'files'); ?>
		<?php echo CHtml::activeFileField($model, 'files'); ?>
		<?php echo $form->error($model,'files'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
