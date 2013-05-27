<ul>
	<?php foreach ($articles as $article): ?>
		<li>
			<?php echo $article->title; ?>,
			autor: <?php echo $article->author0->username; ?>,  
			data utworzenia: <?php echo $article->create_date; ?>
			<?php echo CHtml::link('Approve', array('article/approvestatus/'.$article->id)); ?>
			<?php echo CHtml::link('Disapprove', array('article/disapprovestatus/'.$article->id)); ?>
		</li>
	<?php endforeach; ?>
</ul>