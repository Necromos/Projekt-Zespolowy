<h2>EditorMain panel</h2>

<?php 
$this->widget('zii.widgets.CMenu', array(
	'items'=>array(
		array('label'=>'Unpublished articles.', 'url'=>array('/editormain/unpublished'))
	)
));