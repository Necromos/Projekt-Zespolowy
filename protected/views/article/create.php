<?php
/* @var $this ArticleController */
/* @var $model Article */


$this->breadcrumbs=array(
	'Articles'=>array('index'),
	'Create',
);
?>

<?php 
$this->menu=array(
	array('label'=>'List Articles', 'url'=>array('index')),
	array('label'=>'Create Article', 'url'=>array('create')),
	array('label'=>'Manage Articles', 'url'=>array('admin')),
);
?>

<h1>Create Article</h1>
<div class="form">

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>