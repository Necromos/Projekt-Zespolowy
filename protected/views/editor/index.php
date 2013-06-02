<h2>Editor panel</h2>

<?php 
$this->widget('zii.widgets.CMenu', array(
	'items'=>array(
		array('label'=>'Lists of articles and reviewers.', 'url'=>array('/editor/lists'))
	)
));
