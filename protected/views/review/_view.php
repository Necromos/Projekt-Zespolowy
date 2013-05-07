<?php
/* @var $this ReviewController */
/* @var $data Review */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_review')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_review), array('view', 'id'=>$data->id_review)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reviewer')); ?>:</b>
	<?php echo CHtml::encode($data->reviewer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('article')); ?>:</b>
	<?php echo CHtml::encode($data->article); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_date')); ?>:</b>
	<?php echo CHtml::encode($data->create_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('content')); ?>:</b>
	<?php echo CHtml::encode($data->content); ?>
	<br />


</div>