<?php
/* @var $this ArticleController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Articles',
);
?>

<?php 
$this->menu=array(
	array('label'=>'List Articles', 'url'=>array('index')),
	array('label'=>'Create Article', 'url'=>array('create')),
	array('label'=>'Manage Articles', 'url'=>array('admin')),
);
?>

<h1>Articles</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
