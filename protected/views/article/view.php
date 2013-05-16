<?php
/* @var $this ArticleController */
/* @var $model Article */

$this->breadcrumbs=array(
	'Articles'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Articles', 'url'=>array('index')),
	array('label'=>'Create Article', 'url'=>array('create')),
	array('label'=>'Manage Articles', 'url'=>array('admin')),
);
?>

<h1>View Article #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'author',
		'users',
		'create_date',
		'content',
	),
)); ?>
