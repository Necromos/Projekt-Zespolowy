<?php
/* @var $this ArticleController */
/* @var $model Article */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'article-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'author'); ?>
		<?php echo $form->textField($model,'author'); ?>
		<?php echo $form->error($model,'author'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'create_date'); ?>
        <?php
		$this->widget('zii.widgets.jui.CJuiDatePicker',
 		array(
    		'attribute'=>'create_date',
    		'model'=>$model,
    		'options' => array(
            	'mode'=>'focus',
                'dateFormat'=>'yy-mm-d',
				'timeFormat' => 'hh:mm tt',
                'showAnim' => 'slideDown',
          	),
    		'htmlOptions'=>array('size'=>30,'class'=>'date', 'value'=>date("Y-m-d_H:i:s")),
 		));
		?>
		<?php echo $form->error($model,'create_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->fileField($model,'content'); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->